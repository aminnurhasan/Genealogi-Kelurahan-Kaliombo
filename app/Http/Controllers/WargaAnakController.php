<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Traits\ImageStorage;
use DB;

class WargaAnakController extends Controller
{
    use ImageStorage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::User()->id;
        $ua = User::findOrFail($id);

        $anak = DB::select(DB::raw('
            SELECT id, email, nama, jk, anakKe, tglLahir, agama
            FROM user
            WHERE ayah = :email
            GROUP BY id, email, nama, jk, anakKe, tglLahir, agama
        '), ['email' => $ua->email]);
        // dd($anak);

        return view('warga.anak.index', compact('anak', 'ua'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('warga.anak.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $ortu = User::findOrFail($id);

        if($ortu->jk == "L"){
            $nikAyah = $ortu->email;
            $ibu = DB::table('pasangan')
                ->select('id', 'nik_istri')
                ->where('nik_suami', '=', $nikAyah)
                ->get();
            $nikIbu = $ibu[0]->nik_istri;
            $pasanganId = $ibu[0]->id;
            $anak = [
                'email' => $request->email,
                'password' => Hash::make($request->email),
                'nama' => $request->nama,
                'jk' => $request->jk,
                'ayah' => $nikAyah,
                'ibu' => $nikIbu,
                'pasangan_id' => $pasanganId,
                'tglLahir' => $request->tglLahir,
                'agama' => $request->agama,
                'anakKe' => $request->anakKe,
                'alamat' => $ortu->alamat
            ];
            // dd($anak);
            User::create($anak);
        }else{
            $nikIbu = $ortu->email;
            $ayah = DB::table('pasangan')
                ->select('id', 'nik_suami')
                ->where('nik_istri', '=', $nikIbu)
                ->get();
            $nikAyah = $ayah[0]->nik_suami;
            $pasanganId = $ayah[0]->id;
            $anak = [
                'email' => $request->email,
                'password' => Hash::make($request->email),
                'nama' => $request->nama,
                'jk' => $request->jk,
                'ayah' => $nikAyah,
                'ibu' => $nikIbu,
                'pasangan_id' => $pasanganId,
                'tglLahir' => $request->tglLahir,
                'agama' => $request->agama,
                'anakKe' => $request->anakKe,
                'alamat' => $ortu->alamat
            ];
            // dd($anak);
            User::create($anak);
        }
        return redirect()->route('anak.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $warga = User::findOrFail($id);

        $ortu = DB::table('user AS u')
            ->select('u.id AS id', 'u.nama AS nama', 'u.ayah AS nikAyah', 'ayah.nama AS namaAyah', 'u.ibu AS nikIbu','ibu.nama AS namaIbu')
            ->leftJoin('user AS ayah', 'u.ayah', '=', 'ayah.email')
            ->leftJoin('user AS ibu', 'u.ibu', '=', 'ibu.email')
            ->where('u.id', '=', $id)
            ->first();

        return view('warga.anak.show', compact('warga', 'ortu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warga = User::findOrFail($id);

        $ayah = DB::select(DB::raw('
            SELECT id, nama, email
            FROM user
            WHERE role = 0
            AND jk = "L"
        '));

        $ibu = DB::select(DB::raw('
            SELECT id, nama, email
            FROM user
            WHERE role = 0
            AND jk = "P"
        '));

        return view('warga.anak.edit', compact('warga', 'ayah', 'ibu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $warga = User::findOrFail($id);

        $foto = $request->file('foto');

        if($foto != NULL){
            $update = [
                'email' => $request->email,
                'nama' => $request->nama,
                'jk' => $request->jk,
                'tglLahir' => $request->tglLahir,
                'agama' => $request->agama,
                'ayah' => $request->ayah,
                'ibu' => $request->ibu,
                'alamat' => $request->alamat,
                'hp' => $request->hp,
                'foto' => $this->uploadImage($foto, $request->nama, 'profile', true, $warga->foto),
            ];
            $warga->update($update);
        } else{
            $update = [
                'email' => $request->email,
                'nama' => $request->nama,
                'jk' => $request->jk,
                'tglLahir' => $request->tglLahir,
                'agama' => $request->agama,
                'ayah' => $request->ayah,
                'ibu' => $request->ibu,
                'alamat' => $request->alamat,
                'hp' => $request->hp,
            ];
            $warga->update($update);
        }

        return redirect()->route('anak.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
