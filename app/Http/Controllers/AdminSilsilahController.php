<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pasangan;
use DB;

class AdminSilsilahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $warga = User::findOrFail($id);

        // Mencari Orang Tua User
        $ortu = DB::table('user AS u')
            ->select('u.id AS id', 'u.nama AS nama', 'u.ayah AS nikAyah', 'ayah.id AS idAyah', 'ayah.nama AS namaAyah', 'ayah.jk AS jkAyah', 'ayah.foto AS fotoAyah', 'ayah.meninggal As ayahM', 'u.ibu AS nikIbu', 'ibu.id AS idIbu', 'ibu.nama AS namaIbu', 'ibu.jk AS jkIbu', 'ibu.foto AS fotoIbu', 'ibu.meninggal AS ibuM')
            ->leftJoin('user AS ayah', 'u.ayah', '=', 'ayah.email')
            ->leftJoin('user AS ibu', 'u.ibu', '=', 'ibu.email')
            ->where('u.id', '=', $id)
            ->first();

        $ayahNik = $ortu->nikAyah;
        $ibuNik = $ortu->nikIbu;

        // Mencari Kakek dan Nenek
        $grandAyah = DB::table('user AS u')
            ->select('u.id as id', 'u.email AS nik', 'u.nama AS nama', 'u.ayah AS nikAyah', 'ayah.id AS idAyah', 'ayah.nama AS namaAyah', 'ayah.jk AS jkAyah', 'ayah.foto AS fotoAyah', 'ayah.meninggal As ayahM', 'u.ibu AS nikIbu', 'ibu.id AS idIbu', 'ibu.nama AS namaIbu', 'ibu.jk AS jkIbu', 'ibu.foto AS fotoIbu', 'ibu.meninggal AS ibuM')
            ->leftJoin('user AS ayah', 'u.ayah', '=', 'ayah.email')
            ->leftJoin('user AS ibu', 'u.ibu', '=', 'ibu.email')
            ->where('u.email', '=', $ayahNik)
            ->first();

        $grandIbu = DB::table('user AS u')
            ->select('u.id AS id', 'u.email AS nik', 'u.nama AS nama', 'u.ayah AS nikAyah', 'ayah.id AS idAyah', 'ayah.nama AS namaAyah', 'ayah.jk AS jkAyah', 'ayah.foto AS fotoAyah', 'ayah.meninggal As ayahM', 'u.ibu AS nikIbu', 'ibu.id AS idIbu', 'ibu.nama AS namaIbu', 'ibu.jk AS jkIbu', 'ibu.foto AS fotoIbu', 'ibu.meninggal AS ibuM')
            ->leftJoin('user AS ayah', 'u.ayah', '=', 'ayah.email')
            ->leftJoin('user AS ibu', 'u.ibu', '=', 'ibu.email')
            ->where('u.email', '=', $ibuNik)
            ->first();
        
        // Mencari Data Kakek dan Nenek Buyut
        if(isset($grandAyah->nikAyah)){
            $nikGrandKakekAyah = $grandAyah->nikAyah;
            
            $grandKakekAyah = DB::table('user AS u')
            ->select('u.id AS id', 'u.email AS nik', 'u.nama AS nama', 'u.ayah AS nikAyah', 'ayah.id AS idAyah', 'ayah.nama AS namaAyah', 'ayah.jk AS jkAyah', 'ayah.foto AS fotoAyah', 'ayah.meninggal As ayahM', 'u.ibu AS nikIbu', 'ibu.id AS idIbu', 'ibu.nama AS namaIbu', 'ibu.jk AS jkIbu', 'ibu.foto AS fotoIbu', 'ibu.meninggal AS ibuM')
            ->leftJoin('user AS ayah', 'u.ayah', '=', 'ayah.email')
            ->leftJoin('user AS ibu', 'u.ibu', '=', 'ibu.email')
            ->where('u.email', '=', $nikGrandKakekAyah)
            ->first();
        }
        if(isset($grandAyah->nikIbu)){
            $nikGrandNenekAyah = $grandAyah->nikIbu;
            
            $grandNenekAyah = DB::table('user AS u')
            ->select('u.id AS id', 'u.email AS nik', 'u.nama AS nama', 'u.ayah AS nikAyah', 'ayah.id AS idAyah', 'ayah.nama AS namaAyah', 'ayah.jk AS jkAyah', 'ayah.foto AS fotoAyah', 'ayah.meninggal As ayahM', 'u.ibu AS nikIbu', 'ibu.id AS idIbu', 'ibu.nama AS namaIbu', 'ibu.jk AS jkIbu', 'ibu.foto AS fotoIbu', 'ibu.meninggal AS ibuM')
            ->leftJoin('user AS ayah', 'u.ayah', '=', 'ayah.email')
            ->leftJoin('user AS ibu', 'u.ibu', '=', 'ibu.email')
            ->where('u.email', '=', $nikGrandNenekAyah)
            ->first(); 
        }
        if(isset($grandIbu->nikAyah)){
            $nikGrandKakekIbu = $grandIbu->nikAyah;
            
            $grandKakekIbu = DB::table('user AS u')
            ->select('u.id AS id', 'u.email AS nik', 'u.nama AS nama', 'u.ayah AS nikAyah', 'ayah.id AS idAyah', 'ayah.nama AS namaAyah', 'ayah.jk AS jkAyah', 'ayah.foto AS fotoAyah', 'ayah.meninggal As ayahM', 'u.ibu AS nikIbu', 'ibu.id AS idIbu', 'ibu.nama AS namaIbu', 'ibu.jk AS jkIbu', 'ibu.foto AS fotoIbu', 'ibu.meninggal AS ibuM')
            ->leftJoin('user AS ayah', 'u.ayah', '=', 'ayah.email')
            ->leftJoin('user AS ibu', 'u.ibu', '=', 'ibu.email')
            ->where('u.email', '=', $nikGrandKakekIbu)
            ->first();
        }
        if(isset($grandIbu->nikIbu)){
            $nikGrandNenekIbu = $grandIbu->nikIbu;
            
            $grandNenekIbu = DB::table('user AS u')
            ->select('u.id AS id', 'u.email AS nik', 'u.nama AS nama', 'u.ayah AS nikAyah', 'ayah.id AS idAyah', 'ayah.nama AS namaAyah', 'ayah.jk AS jkAyah', 'ayah.foto AS fotoAyah', 'ayah.meninggal As ayahM', 'u.ibu AS nikIbu', 'ibu.id AS idIbu', 'ibu.nama AS namaIbu', 'ibu.jk AS jkIbu', 'ibu.foto AS fotoIbu', 'ibu.meninggal AS ibuM')
            ->leftJoin('user AS ayah', 'u.ayah', '=', 'ayah.email')
            ->leftJoin('user AS ibu', 'u.ibu', '=', 'ibu.email')
            ->where('u.email', '=', $nikGrandNenekIbu)
            ->first();
        }
        
        // Mencari Data Anak
        if($warga->jk == "L"){
            $anak = DB::table('user AS u')
                ->select('u.id AS id', 'u.nama AS nama', 'u.jk AS jk', 'u.anakKe AS anakKe', 'u.foto AS foto', 'u.meninggal AS meninggal')
                ->leftJoin('user AS ayah', 'u.ayah', '=', 'ayah.email')
                ->where('ayah.email', '=', $warga->email)
                ->orderBy('u.anakKe')
                ->get();
        }else{
            $anak = DB::table('user AS u')
                ->select('u.id AS id', 'u.nama AS nama', 'u.jk AS jk', 'u.anakKe AS anakKe', 'u.foto AS foto', 'u.meninggal AS meninggal')
                ->leftJoin('user AS ibu', 'u.ibu', '=', 'ibu.email')
                ->where('ibu.email', '=', $warga->email)
                ->orderBy('u.anakKe')
                ->get();
        }

        if(isset($grandKakekAyah, $grandKakekIbu, $grandNenekAyah, $grandNenekIbu)){
            return view('admin.silsilah.index', compact('warga', 'ortu', 'grandAyah', 'grandIbu', 'anak', 'grandKakekAyah', 'grandNenekAyah', 'grandKakekIbu', 'grandNenekIbu'));
        }else{
            return view('admin.silsilah.index', compact('warga', 'ortu', 'grandAyah', 'grandIbu', 'anak'));
        }
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
        $warga = User::findOrFail($id);

        // $pasangan = DB::select(DB::raw('
        //     SELECT id, nik_suami, nik_istri
        //     FROM pasangan
        // '));

        $pasangan = DB::table('pasangan')
            ->select('id', 'nik_suami', 'nik_istri')
            ->get();

        foreach($pasangan as $pasangan){
            $ss = $pasangan->id;
        };

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

        $ortu = DB::select(DB::raw('
            SELECT p.id AS id, u1.nama AS suami, u1.email AS nikSuami, u2.nama AS istri, u2.email AS nikIstri
            FROM pasangan p
            JOIN user u1 ON p.nik_suami = u1.email
            JOIN user u2 ON p.nik_istri = u2.email
        '));
        
        // dd($ayah);

        return view('admin.silsilah.edit', compact('warga', 'pasangan', 'ayah', 'ibu', 'ortu', 'ss'));
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

        $update = [
            'ayah' => $request->ayah,
            'ibu' => $request->ibu,
            'pasangan_id' => $request->id_ortu,
            'anakKe' => $request->anakKe
        ];

        // dd($update);
        $warga->update($update);
        return redirect()->route('silsilah.index', $id);
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
