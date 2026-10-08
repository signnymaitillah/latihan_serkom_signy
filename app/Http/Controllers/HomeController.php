<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Berita;
use App\Models\Ekstrakulikuler;
use App\Models\Siswa;

class HomeController extends Controller
{
    public function index()
    {
        $gurus = Guru::all();
        $siswa = Siswa::all();
        $berita = Berita::latest()->get();
        $ekstrakulikuler = Ekstrakulikuler::all();

        $totalSiswa  = Siswa::count();
        $totalGuru   = $gurus->count();
        $totalBerita = $berita->count();
        $totalEkskul = $ekstrakulikuler->count();

        return view('landing.index', compact(
            'gurus',
            'siswa',
            'berita',
            'ekstrakulikuler',
            'totalSiswa',
            'totalGuru',
            'totalBerita',
            'totalEkskul'
        ));
    }

    // Method baru untuk mengambil data detail 1 guru
    public function showGuru($id)
    {
        $guru = Guru::findOrFail($id);

        return view('landing.guru.detail', compact('guru'));
    }
        public function showBerita($id)
    {
        $berita = Berita::findOrFail($id);
        return view('landing.berita.detail', compact('berita'));
    }
        public function showEkskul($id)
    {
        $ekskul = Ekstrakulikuler::findOrFail($id);
        return view('landing.ekstrakulikuler.detail', compact('ekskul'));
    }
}