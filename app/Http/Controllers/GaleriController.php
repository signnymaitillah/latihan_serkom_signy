<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $galeris = Galeri::when($search, function ($query, $search) {
            return $query->where('judul', 'like', "%{$search}%")
                         ->orWhere('kategori', 'like', "%{$search}%");
        })->latest('tanggal')->paginate(8);

        return view('galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'       => 'required|max:50|unique:galeris,judul',
            'keteranngan' => 'required',
            'kategori'    => 'required|in:Foto,Video',
            'tanggal'     => 'required|date',
            'file'        => 'required|file|mimes:jpg,jpeg,png,mp4,mkv|max:20480',
        ]);

        $fileName = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/galeri'), $fileName);
        }

        Galeri::create([
            'judul'       => $request->judul,
            'keteranngan' => $request->keteranngan,
            'kategori'    => $request->kategori,
            'tanggal'     => $request->tanggal,
            'file'        => $fileName,
        ]);

        return redirect()->route('galeri.index')->with('success', 'Data galeri berhasil ditambahkan!');
    }

    public function edit($id)
    {
        try {
            $decryptedId = Crypt::decrypt($id);
            $galeri = Galeri::findOrFail($decryptedId);
        } catch (\Exception $e) {
            $galeri = Galeri::findOrFail($id);
        }

        return view('galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        try {
            $decryptedId = Crypt::decrypt($id);
            $galeri = Galeri::findOrFail($decryptedId);
        } catch (\Exception $e) {
            $galeri = Galeri::findOrFail($id);
        }

        $primaryKey = $galeri->getKeyName(); 

        $request->validate([
            'judul'       => 'required|max:50|unique:galeris,judul,' . $galeri->{$primaryKey} . ',' . $primaryKey,
            'keteranngan' => 'required',
            'kategori'    => 'required|in:Foto,Video',
            'tanggal'     => 'required|date',
            'file'        => 'nullable|file|mimes:jpg,jpeg,png,mp4,mkv|max:20480',
        ], [
            'judul.required'       => 'Judul galeri wajib diisi.',
            'judul.max'            => 'Judul galeri maksimal 50 karakter.',
            'judul.unique'         => 'Judul galeri sudah ada, silakan gunakan judul lain.',
            'keteranngan.required' => 'Keterangan galeri wajib diisi.',
            'kategori.required'    => 'Kategori wajib dipilih.',
            'kategori.in'          => 'Kategori tidak valid.',
            'tanggal.required'     => 'Tanggal galeri wajib diisi.',
            'file.mimes'           => 'Format file harus berupa jpg, jpeg, png, mp4, atau mkv.',
            'file.max'             => 'Ukuran file maksimal 20MB.',
        ]);

        $fileName = $galeri->file;
        if ($request->hasFile('file')) {
            if ($fileName && File::exists(public_path('uploads/galeri/' . $fileName))) {
                File::delete(public_path('uploads/galeri/' . $fileName));
            }

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/galeri'), $fileName);
        }

        $galeri->update([
            'judul'       => $request->judul,
            'keterangan' => $request->keterangan,
            'kategori'    => $request->kategori,
            'tanggal'     => $request->tanggal,
            'file'        => $fileName,
        ]);

        return redirect()->route('galeri.index')->with('success', 'Data galeri berhasil diperbarui!');
    }

    public function destroy($id)
    {
        try {
            $decryptedId = Crypt::decrypt($id);
            $galeri = Galeri::findOrFail($decryptedId);
        } catch (\Exception $e) {
            $galeri = Galeri::findOrFail($id);
        }

        if ($galeri->file && File::exists(public_path('uploads/galeri/' . $galeri->file))) {
            File::delete(public_path('uploads/galeri/' . $galeri->file));
        }

        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Data galeri berhasil dihapus!');
    }
}