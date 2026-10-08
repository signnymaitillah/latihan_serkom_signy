<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Ekstrakulikuler; 
use App\Models\Berita;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa  = Siswa::count();
        $totalGuru   = Guru::count();
        $totalEkskul = Ekstrakulikuler::count();
        $totalBerita = Berita::count();

        return view('dashboard', compact('totalSiswa', 'totalGuru', 'totalEkskul', 'totalBerita'));
    }
}