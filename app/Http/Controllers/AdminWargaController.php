<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\ImageStorage;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class AdminWargaController extends Controller
{
    use ImageStorage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        $warga = DB::select(DB::raw('
            SELECT id, email AS nik, nama, jk, tglLahir, alamat, status
            FROM user
            WHERE role = 0
            GROUP BY id, nik, nama, jk, tglLahir, alamat, status
        '));

        return view('admin.warga.index', compact('warga'));
    }

    public function status($id)
    {
        $user = User::findOrFail($id);
        $statusGet = $user->status;
        // dd($user);
        if($statusGet == 0) {
            $user->update(['status' => 1]);
            return redirect()->route('warga.index');
        }else{
            $user->update(['status' => 0]);
            return redirect()->route('warga.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        return view('admin.warga.create', compact('ayah', 'ibu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $foto = $request->file('foto');

        $request->validate([
            'email' => 'required|unique:user',
            'nama' => 'required',
            'jk' => 'required',
            'tglLahir' => 'required',
            'alamat' => 'required',
        ],[
            'email.required' => 'NIK Wajib Diisi',
            'email.unique' => 'NIK Harus Unique',
            'name.required' => 'Nama Warga Wajib Diisi',
            'jk.required' => 'Jenis Kelamin Wajib Diisi',
            'alamat.required' => 'Alamat Wajib Diisi',
            'tglLahir.required' => 'Tanggal Lahir Wajib Diisi',
        ]);

        $user = [
            'email' => $request->email,
            'password' => Hash::make($request->email),
            'nama' => $request->nama,
            'jk' => $request->jk,
            'agama' => $request->agama,
            'ayah' => $request->ayah,
            'ibu' => $request->ibu,
            'anakKe' => $request->anakKe,
            'tglLahir' => $request->tglLahir,
            'alamat' => $request->alamat,
            'hp' => $request->hp,
            'foto' => $this->uploadImage($foto, $request->name, 'profile'),
        ];

        User::create($user);

        return redirect()->route('warga.index');
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

        return view('admin.warga.show', compact('warga', 'ortu'));
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

        return view('admin.warga.edit', compact('warga', 'ayah', 'ibu'));
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
        $tgl = $request->input('tglMeninggal');
        $yy = 1;

        if($foto != NULL){
            if($tgl != NULL){
                $update = [
                    'email' => $request->email,
                    'nama' => $request->nama,
                    'jk' => $request->jk,
                    'tglLahir' => $request->tglLahir,
                    'agama' => $request->agama,
                    'ayah' => $request->ayah,
                    'ibu' => $request->ibu,
                    'tglMeninggal' => $request->tglMeninggal,
                    'meninggal' => $yy,
                    'alamat' => $request->alamat,
                    'hp' => $request->hp,
                    'foto' => $this->uploadImage($foto, $request->nama, 'profile', true, $warga->foto),
                ];
            }else{
                $update = [
                    'email' => $request->email,
                    'nama' => $request->nama,
                    'jk' => $request->jk,
                    'tglLahir' => $request->tglLahir,
                    'agama' => $request->agama,
                    'ayah' => $request->ayah,
                    'ibu' => $request->ibu,
                    'tglMeninggal' => $request->tglMeninggal,
                    'alamat' => $request->alamat,
                    'hp' => $request->hp,
                    'foto' => $this->uploadImage($foto, $request->nama, 'profile', true, $warga->foto),
                ];
            }
    
            $warga->update($update);
        } else{
            if($tgl != NULL){
                $update = [
                    'email' => $request->email,
                    'nama' => $request->nama,
                    'jk' => $request->jk,
                    'tglLahir' => $request->tglLahir,
                    'agama' => $request->agama,
                    'ayah' => $request->ayah,
                    'ibu' => $request->ibu,
                    'tglMeninggal' => $request->tglMeninggal,
                    'meninggal' => $yy,
                    'alamat' => $request->alamat,
                    'hp' => $request->hp,
                ];
            }else{
                $update = [
                    'email' => $request->email,
                    'nama' => $request->nama,
                    'jk' => $request->jk,
                    'tglLahir' => $request->tglLahir,
                    'agama' => $request->agama,
                    'ayah' => $request->ayah,
                    'ibu' => $request->ibu,
                    'tglMeninggal' => $request->tglMeninggal,
                    'alamat' => $request->alamat,
                    'hp' => $request->hp,
                ];
            }
            // dd($update);
            $warga->update($update);
        }

        return redirect()->route('warga.index');
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
