<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EkstrakulikulerController extends Controller
{
    public function index(Request $request)
    {
        $query = Ekstrakulikuler::latest('id_eskul');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('nama_eskul', 'like', "%{$search}%")
                  ->orWhere('pembina', 'like', "%{$search}%")
                  ->orWhere('jadwal_latihan', 'like', "%{$search}%");
        }

        $ekskuls = $query->paginate(10);
        return view('ekstrakulikuler.index', compact('ekskuls'));
    }

    public function create()
    {
        return view('ekstrakulikuler.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_eskul'     => 'required|max:40|unique:ekstrakulikulers,nama_eskul',
            'pembina'        => 'required|max:40',
            'jadwal_latihan' => 'required|max:40',
            'deskripsi'      => 'required',
            'gambar'         => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'nama_eskul.unique' => 'Nama ekstrakulikuler sudah ada, silakan gunakan nama lain.',
            'nama_eskul.required' => 'Nama ekstrakulikuler wajib diisi.',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('uploads/ekskul'), $gambarName);
            $gambarPath = $gambarName;
        }

        Ekstrakulikuler::create([
            'nama_eskul'     => $request->nama_eskul,
            'pembina'        => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi'      => $request->deskripsi,
            'gambar'         => $gambarPath,
        ]);

        return redirect()->route('ekstrakulikuler.index')->with('success', 'Data ekstrakulikuler berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $idDecrypted = Crypt::decrypt($id);
        $ekskul = Ekstrakulikuler::findOrFail($idDecrypted);
        return view('ekstrakulikuler.edit', compact('ekskul'));
    }

    public function update(Request $request, $id)
    {
        $idDecrypted = Crypt::decrypt($id);
        $ekskul = Ekstrakulikuler::findOrFail($idDecrypted);

        $request->validate([
            'nama_eskul'     => 'required|max:40|unique:ekstrakulikulers,nama_eskul,' . $ekskul->id_eskul . ',id_eskul',
            'pembina'        => 'required|max:40',
            'jadwal_latihan' => 'required|max:40',
            'deskripsi'      => 'required',
            'gambar'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'nama_eskul.unique' => 'Nama ekstrakulikuler sudah ada, silakan gunakan nama lain.',
            'nama_eskul.required' => 'Nama ekstrakulikuler wajib diisi.',
        ]);

        $data = [
            'nama_eskul'     => $request->nama_eskul,
            'pembina'        => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi'      => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {
            if ($ekskul->gambar && file_exists(public_path('uploads/ekskul/' . $ekskul->gambar))) {
                unlink(public_path('uploads/ekskul/' . $ekskul->gambar));
            }

            $gambar = $request->file('gambar');
            $gambarName = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('uploads/ekskul'), $gambarName);
            $data['gambar'] = $gambarName;
        }

        $ekskul->update($data);

        return redirect()->route('ekstrakulikuler.index')->with('success', 'Data ekstrakulikuler berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $idDecrypted = Crypt::decrypt($id);
        $ekskul = Ekstrakulikuler::findOrFail($idDecrypted);

        if ($ekskul->gambar && file_exists(public_path('uploads/ekskul/' . $ekskul->gambar))) {
            unlink(public_path('uploads/ekskul/' . $ekskul->gambar));
        }

        $ekskul->delete();

        return redirect()->route('ekstrakulikuler.index')->with('success', 'Data ekstrakulikuler berhasil dihapus!');
    }
}