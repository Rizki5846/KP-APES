<?php

namespace App\Http\Controllers;

use App\Models\InputPelanggaran;
use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        return view('Siswa.index', compact('siswas'));
    }

    public function create()
    {
        $siswas = Siswa::all();
        return view('Siswa.index', compact('siswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'nullable|string|max:10|unique:siswas',
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'th_angkatan' => 'required|numeric',
            'alamat' => 'required|string',
        ]);

        Siswa::create($request->all());
        return redirect()->route('Siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function show($nis)
    {
        $siswa = Siswa::where('nis', $nis)->firstOrFail();
        $pelanggaranSiswa = InputPelanggaran::where('nis', $nis)->with('pelanggaran')->get();
        $totalPoin = $pelanggaranSiswa->sum('pelanggaran.poin');
    
        return view('siswa.show', compact('siswa', 'pelanggaranSiswa', 'totalPoin'));
    }

    public function edit($id)
    {
        $siswas = Siswa::findOrFail($id);
        return view('Siswa.edit', compact('siswas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'nullable|string|max:10|unique:siswas,nis,'.$id,
            'nama' => 'required|string|max:255',
            'th_angkatan' => 'required|numeric',
            'alamat' => 'required|string',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());
        return redirect()->route('Siswa.index')->with('success', 'Siswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return redirect()->route('Siswa.index')->with('success', 'Siswa berhasil dihapus.');
    }
}
