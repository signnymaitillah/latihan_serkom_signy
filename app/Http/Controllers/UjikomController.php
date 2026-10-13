<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UjikomController extends Controller
{
    public function index()
    {
        return view('landing.ujikom');
    }
    public function hitung(Request $request)
    {
        $nama1 = $request->nama_barang1;
        $harga1 = $request->harga_barang1;
        $nama2 = $request->nama_barang2;
        $harga2 = $request->harga_barang2;

        $totalHarga = $harga1 + $harga2;

        if ($totalHarga > 500000) {
            $hadiah = 'Gelas Cantik';
        } else {
            $hadiah = 'Pensil';
        }

        return view('landing.ujikom', compact(
            'nama1', 'harga1', 'nama2', 'harga2', 'totalHarga', 'hadiah'
        ));
    }
}