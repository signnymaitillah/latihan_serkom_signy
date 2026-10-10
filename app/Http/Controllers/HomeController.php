<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Berita;
use App\Models\Ekstrakulikuler;
use App\Models\Siswa;
use App\Models\Galeri;

class HomeController extends Controller
{
    public function index()
    {
        $gurus = Guru::all();
        $siswa = Siswa::all();

        $berita = Berita::where('status', 'publis')->latest('tanggal')->get();

        $ekstrakulikuler = Ekstrakulikuler::all();

        $galeri = Galeri::latest()->get(); 

        $totalSiswa  = Siswa::count();
        $totalGuru   = $gurus->count();
        $totalBerita = Berita::where('status', 'publis')->count();
        $totalEkskul = $ekstrakulikuler->count();

        return view('landing.index', compact(
            'gurus',
            'siswa',
            'berita',
            'ekstrakulikuler',
            'galeri',
            'totalSiswa',
            'totalGuru',
            'totalBerita',
            'totalEkskul'
        ));
    }

   public function showGuru($id)
    {
        // Langsung cari berdasarkan id_guru atau biarkan Eloquent mencari via Model Guru
        $guru = Guru::where('id_guru', $id)->firstOrFail();

        return view('landing.guru.detail', compact('guru'));
    }
   public function showBerita($id)
    {
        $berita = Berita::where('status', 'publis')
                        ->where('id_berita', $id)
                        ->firstOrFail();

        return view('landing.berita.detail', compact('berita'));
    }

   public function showEkskul($id)
    {
        // Menggunakan instance model agar Eloquent mencari sesuai Primary Key tabel secara otomatis
        $ekskul = (new Ekstrakulikuler)->newQuery()->findOrFail($id);

        return view('landing.ekstrakulikuler.detail', compact('ekskul'));
    }
    public function showGaleri($id)
    {
        $galeri = Galeri::findOrFail($id);

        return view('landing.galeri.detail', compact('galeri'));
    }
}