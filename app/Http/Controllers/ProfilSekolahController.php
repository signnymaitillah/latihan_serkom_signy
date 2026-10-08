<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfilSekolahController extends Controller
{
    public function index()
    {
        $profil = DB::table('profil_sekolahs')->first();
        return view('profil.index', compact('profil'));
    }

    public function edit()
    {
        $profil = DB::table('profil_sekolahs')->first();
        return view('profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_sekolah'   => 'required',
            'kepala_sekolah' => 'required',
            'npsn'           => 'required',
            'tahun_berdiri'  => 'required',
            'kontak'         => 'required',
            'alamat'         => 'required',
            'visi_misi'      => 'required',
            'deskripsi'      => 'required',
            'logo'           => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto'           => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $profil = DB::table('profil_sekolahs')->first();

        $logoPath = $profil->logo ?? null;
        $fotoPath = $profil->foto ?? null;

       
        if ($request->hasFile('logo')) {
            if ($logoPath && Storage::exists('public/' . $logoPath)) {
                Storage::delete('public/' . $logoPath);
            }
            $logoPath = $request->file('logo')->store('profil', 'public');
        }

  
        if ($request->hasFile('foto')) {
            if ($fotoPath && Storage::exists('public/' . $fotoPath)) {
                Storage::delete('public/' . $fotoPath);
            }
            $fotoPath = $request->file('foto')->store('profil', 'public');
        }

        $data = [
            'nama_sekolah'   => $request->nama_sekolah,
            'kepala_sekolah' => $request->kepala_sekolah,
            'npsn'           => $request->npsn,
            'tahun_berdiri'  => $request->tahun_berdiri,
            'kontak'         => $request->kontak,
            'alamat'         => $request->alamat,
            'visi_misi'      => $request->visi_misi,
            'deskripsi'      => $request->deskripsi,
            'logo'           => $logoPath,
            'foto'           => $fotoPath,
            'updated_at'     => now(),
        ];

        if ($profil) {
            DB::table('profil_sekolahs')->where('nama_sekolah', $profil->nama_sekolah)->update($data);
        } else {
            $data['created_at'] = now();
            DB::table('profil_sekolahs')->insert($data);
        }

        return redirect()->route('profil.index')->with('success', 'Data Profil Sekolah berhasil diperbarui!');
    }
}