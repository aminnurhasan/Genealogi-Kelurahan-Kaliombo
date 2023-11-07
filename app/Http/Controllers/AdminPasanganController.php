<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasangan;
use App\Models\User;
use DB;

class AdminPasanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasangan = DB::select(DB::raw('
            SELECT p.id AS id, u1.nama AS suami, u1.email AS nikSuami, u2.nama AS istri, u2.email AS nikIstri, p.tglMenikah AS tglMenikah, p.status AS status
            FROM pasangan p
            JOIN user u1 ON p.nik_suami = u1.email
            JOIN user u2 ON p.nik_istri = u2.email
        '));
        return view('admin.pasangan.index', compact('pasangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $pasangan = Pasangan::findOrFail($id);
        $statusGet = $pasangan->status;
        // dd($user);
        if($statusGet == 0) {
            $pasangan->update(['status' => 1]);
            return redirect()->route('pasangan.index');
        }else{
            $pasangan->update(['status' => 0]);
            return redirect()->route('pasangan.index');
        }
    }

     public function create()
    {
        $warga = User::all();
        
        $suami = DB::select(DB::raw('
            SELECT id, email, nama
            FROM user
            WHERE role = 0
            AND jk = "L"
        '));

        $istri = DB::select(DB::raw('
            SELECT id, email, nama
            FROM user
            WHERE role = 0
            AND jk = "P"
        '));

        return view('admin.pasangan.create', compact('warga', 'suami', 'istri'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tglMenikah' => 'required'
        ],[
            'tglMenikah.required' => 'Tanggal Menikah Wajib Diisi'
        ]);

        $pasangan = [
            'nik_suami' => $request->nik_suami,
            'nik_istri' => $request->nik_istri,
            'tglMenikah' => $request->tglMenikah
        ];

        Pasangan::create($pasangan);
        return redirect()->route('pasangan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $pasangan = Pasangan::findOrFail($id);

        $pasangan = DB::select(DB::raw('
            SELECT p.id AS id, u1.nama AS suami, u1.email AS nikSuami, u2.nama AS istri, u2.email AS nikIstri, tglMenikah
            FROM pasangan p
            JOIN user u1 ON p.nik_suami = u1.email
            JOIN user u2 ON p.nik_istri = u2.email
            WHERE p.id = :id
        '),['id' => $id]);

        return view('admin.pasangan.show', compact('pasangan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pasangan = Pasangan::findOrFail($id);

        $suami = DB::select(DB::raw('
            SELECT id, email, nama
            FROM user
            WHERE role = 0
            AND jk = "L"
        '));

        $istri = DB::select(DB::raw('
            SELECT id, email, nama
            FROM user
            WHERE role = 0
            AND jk = "P"
        '));

        return view('admin.pasangan.edit', compact('pasangan', 'suami', 'istri'));
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
        $pasangan = Pasangan::findOrFail($id);
        $update = [
            'nik_suami' => $request->nik_suami,
            'nik_istri' => $request->nik_istri,
            'tglMenikah' => $request->tglMenikah
        ];
        $pasangan->update($update);
        return redirect()->route('pasangan.index');
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
