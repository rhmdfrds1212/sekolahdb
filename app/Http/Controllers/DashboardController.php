<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $siswajurusan = DB::select("SELECT jurusans.singkatan, COUNT(*) as jumlah FROM siswas
        JOIN jurusans ON siswas.jurusan_id = jurusans.id
        GROUP BY jurusans.singkatan  ");
        return view('dashboard')->with('siswajurusan', $siswajurusan);
    }
}
