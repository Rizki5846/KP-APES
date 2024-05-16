<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KatPelanggaran;

class KategoriPelanggaranController extends Controller
{
    // public function index(){
    //     $data = KatPelanggaran::all();
    //     return view('Pelanggaran.index', compact('data'));
    // }
    // public function create(){
    //     $data = KatPelanggaran::all();
    //     return view('Pelanggaran.create', compact('data'));
    // }


    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nama_kategori' => 'required',
            
    //     ]);

    //     KatPelanggaran::create($request->all());

    //     return redirect()->route('Pelanggaran.index')->with('success', 'Pelanggaran berhasil ditambahkan.');
    // }
}
