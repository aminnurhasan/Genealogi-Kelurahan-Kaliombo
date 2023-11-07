<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pasangan;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $w = DB::select(DB::raw('
            SELECT COUNT(id) AS jumlah
            FROM user
            WHERE role = 0
            AND status = 1
        '));
        $warga = $w[0];

        $wl = DB::select(DB::raw('
            SELECT COUNT(id) AS jumlah
            FROM user
            WHERE role = 0
            AND status = 1
            AND jk = "L"
        '));
        $wargaL = $wl[0];

        $wp = DB::select(DB::raw('
            SELECT COUNT(id) AS jumlah
            FROM user
            WHERE role = 0
            AND status = 1
            AND jk = "P"
        '));
        $wargaP = $wp[0];

        $p = DB::select(DB::raw('
            SELECT COUNT(id) AS jumlah
            FROM pasangan
        '));
        $pasangan = $p[0];
        
        $jk = DB::table('user')
            ->select('jk', DB::raw('COUNT(id) AS jumlah'))
            ->where('role', 0)
            ->where('status', 1)
            ->groupBy('jk')
            ->pluck('jk', 'jumlah');

        $labelsJk = ['Laki-Laki', 'Perempuan'];
        $dataJk = $jk->keys();

        $agama = DB::table('user')
            ->select('agama', DB::raw('COUNT(id) AS jumlah'))
            ->where('role', '=', 0)
            ->where('status', '=', 1)
            ->groupBy('agama')
            ->pluck('jumlah');
        
        // $sd = User::all();
        // dd($agama);
        
        $labelsAgama = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha'];
        $dataAgama = $agama->values();
        // dd($dataAgama);

        return view('/admin/home', compact('warga', 'wargaL', 'wargaP', 'pasangan', 'labelsJk', 'dataJk', 'labelsAgama', 'dataAgama'));
    }
}
