<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $query = Guru::latest('id_guru');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('nama_guru', 'like', "%{$search}%")
                  ->orWhere('nip', 'like', "%{$search}%")
                  ->orWhere('mapel', 'like', "%{$search}%");
        }

        $gurus = $query->paginate(10);
        return view('guru.index', compact('gurus'));
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required|max:40',
            'nip'       => 'required|max:15|unique:gurus,nip',
            'mapel'     => 'required|max:40',
            'foto'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('uploads/guru'), $fotoName);
            $fotoPath = $fotoName;
        }

        Guru::create([
            'nama_guru' => $request->nama_guru,
            'nip'       => $request->nip,
            'mapel'     => $request->mapel,
            'foto'      => $fotoPath,
        ]);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $idDecrypted = Crypt::decrypt($id);
        $guru = Guru::findOrFail($idDecrypted);
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $idDecrypted = Crypt::decrypt($id);
        $guru = Guru::findOrFail($idDecrypted);

        $request->validate([
            'nama_guru' => 'required|max:40',
            'nip'       => 'required|max:15|unique:gurus,nip,' . $idDecrypted . ',id_guru',
            'mapel'     => 'required|max:40',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'nama_guru' => $request->nama_guru,
            'nip'       => $request->nip,
            'mapel'     => $request->mapel,
        ];

        if ($request->hasFile('foto')) {
            if ($guru->foto && file_exists(public_path('uploads/guru/' . $guru->foto))) {
                unlink(public_path('uploads/guru/' . $guru->foto));
            }

            $foto = $request->file('foto');
            $fotoName = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('uploads/guru'), $fotoName);
            $data['foto'] = $fotoName;
        }

        $guru->update($data);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $idDecrypted = Crypt::decrypt($id);
        $guru = Guru::findOrFail($idDecrypted);

        if ($guru->foto && file_exists(public_path('uploads/guru/' . $guru->foto))) {
            unlink(public_path('uploads/guru/' . $guru->foto));
        }

        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus!');
    }
}