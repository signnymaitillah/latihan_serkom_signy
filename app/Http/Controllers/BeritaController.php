<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::with('user')->latest('tanggal');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('isi', 'like', '%' . $search . '%');
            });
        }

        $berita = $query->get();

        return view('berita.index', compact('berita'));
    }

    public function create()
    {
        return view('berita.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'judul'   => 'required|max:50|unique:beritas,judul',
            'isi'     => 'required',
            'tanggal' => 'required|date',
            'status'  => 'required|in:draf,publis',
            'gambar'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'slug'  => 'required|unique:beritas,slug',
        ]);

        $namaGambar = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaGambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('uploads/berita'), $namaGambar);
        }

        Berita::create([
            'judul'   => $request->judul,
            'isi'     => $request->isi,
            'tanggal' => $request->tanggal,
            'status'  => $request->status,
            'gambar'  => $namaGambar,
            'id_user' => Auth::user()->id_user ?? Auth::id(),
        ]);

        return redirect()->route('berita.index')->with('success', 'Data berita berhasil ditambahkan!');
    }

    public function edit($id)
    {
        try {
            $decryptedId = Crypt::decrypt($id);
            $berita = Berita::findOrFail($decryptedId);
        } catch (\Exception $e) {
            $berita = Berita::findOrFail($id);
        }

        return view('berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        try {
            $decryptedId = Crypt::decrypt($id);
            $berita = Berita::findOrFail($decryptedId);
        } catch (\Exception $e) {
            $berita = Berita::findOrFail($id);
        }

        $primaryKey = $berita->getKeyName();

        $request->validate([
            'judul'   => 'required|max:50|unique:beritas,judul,' . $berita->{$primaryKey} . ',' . $primaryKey,
            'isi'     => 'required',
            'tanggal' => 'required|date',
            'status'  => 'required|in:draf,publis',
            'gambar'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'judul.required'   => 'Judul berita wajib diisi.',
            'judul.max'        => 'Judul berita maksimal 50 karakter.',
            'judul.unique'     => 'Judul berita sudah ada, silakan gunakan judul lain.',
            'isi.required'     => 'Isi berita wajib diisi.',
            'tanggal.required' => 'Tanggal berita wajib diisi.',
            'status.required'  => 'Status berita wajib dipilih.',
            'gambar.image'     => 'File harus berupa gambar.',
            'gambar.max'       => 'Ukuran gambar maksimal 2MB.',
        ]);

        $namaGambar = $berita->gambar;
        if ($request->hasFile('gambar')) {
            if ($berita->gambar && file_exists(public_path('uploads/berita/' . $berita->gambar))) {
                unlink(public_path('uploads/berita/' . $berita->gambar));
            }
            $gambar = $request->file('gambar');
            $namaGambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('uploads/berita'), $namaGambar);
        }

        $berita->update([
            'judul'   => $request->judul,
            'isi'     => $request->isi,
            'tanggal' => $request->tanggal,
            'status'  => $request->status,
            'gambar'  => $namaGambar,
        ]);

        return redirect()->route('berita.index')->with('success', 'Data berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        try {
            $decryptedId = Crypt::decrypt($id);
            $berita = Berita::findOrFail($decryptedId);
        } catch (\Exception $e) {
            $berita = Berita::findOrFail($id);
        }

        if ($berita->gambar && file_exists(public_path('uploads/berita/' . $berita->gambar))) {
            unlink(public_path('uploads/berita/' . $berita->gambar));
        }

        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Data berita berhasil dihapus!');
    }
}