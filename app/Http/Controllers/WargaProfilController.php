<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Traits\ImageStorage;

class WargaProfilController extends Controller
{
    use ImageStorage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $warga = User::findOrFail($id);
        
        $ortu = DB::table('user AS u')
            ->select('u.id AS id', 'u.nama AS nama', 'u.ayah AS idAyah', 'ayah.nama AS namaAyah', 'u.ibu AS idIbu','ibu.nama AS namaIbu')
            ->leftJoin('user AS ayah', 'u.ayah', '=', 'ayah.email')
            ->leftJoin('user AS ibu', 'u.ibu', '=', 'ibu.email')
            ->where('u.id', '=', $id)
            ->first();

        return view('warga.profil.index', compact('warga', 'id', 'ortu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Auth::user()->id;
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
        // dd($ayah);

        return view('warga.profil.edit', compact('id', 'warga', 'ayah', 'ibu'));
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
                'nama' => $request->nama,
                'jk' => $request->jk,
                'agama' => $request->agama,
                'tglLahir' => $request->tglLahir,
                'tglMeninggal' => $request->tglMeninggal,
                'alamat' => $request->alamat,
                'hp' => $request->hp,
                'ayah' => $request->ayah,
                'ibu' => $request->ibu,
                'anakKe' => $request->anakKe,
                'foto' => $this->uploadImage($foto, $request->nama, 'profile', true, $warga->foto),
            ];
    
            $warga->update($update);
        } else{
            $update = [
                'nama' => $request->nama,
                'jk' => $request->jk,
                'agama' => $request->agama,
                'tglLahir' => $request->tglLahir,
                'tglMeninggal' => $request->tglMeninggal,
                'alamat' => $request->alamat,
                'hp' => $request->hp,
                'ayah' => $request->ayah,
                'ibu' => $request->ibu,
                'anakKe' => $request->anakKe,
            ];
            // dd($update);
            $warga->update($update);
        }

        return redirect()->route('profil.index');
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
