<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\InputPelanggaran;
use App\Models\Pelanggaran;

class InputController extends Controller
{
    public function index()
    {
        $pelanggarans = Pelanggaran::all();
        $siswas = Siswa::all();
        $detailPoin = InputPelanggaran::all();
        return view('InputPelanggaran.index', compact('pelanggarans', 'detailPoin','siswas'));
    }
    // Fungsi untuk menampilkan form pencarian siswa dengan autocomplete
    public function searchSiswa(Request $request)
    {
        $query = $request->get('query');
        $siswas = Siswa::where('nis', 'LIKE', '%' . $query . '%')->get();
        $data = [];
        foreach ($siswas as $siswa) {
            $data[] = [
                'id' => $siswa->nis,
                'value' => $siswa->nis . ' - ' . $siswa->nama // Sesuaikan dengan format yang diinginkan
            ];
        }
        return response()->json($data);
    }
    
    public function create()
    {
        // Ambil daftar siswa dan daftar pelanggaran untuk ditampilkan di form
        $siswas = Siswa::all();
        $pelanggarans = Pelanggaran::all();
        // Tampilkan halaman form untuk input data pelanggaran siswa
        return view('InputPelanggaran.create', compact('siswas', 'pelanggarans'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'tanggal' => 'required|date',
            'nis' => 'required|exists:siswas,nis',
            'id_pelanggaran' => 'required|exists:pelanggarans,id',
            'ket' => 'required|string',
        ]);

        // Buat objek InputPelanggaran
        $inputPelanggaran = new InputPelanggaran();
        $inputPelanggaran->tanggal = $request->tanggal;
        $inputPelanggaran->nis = $request->nis;
        $inputPelanggaran->id_pelanggaran = $request->id_pelanggaran;
        $inputPelanggaran->ket = $request->ket;
        
        // Simpan data ke database
        $inputPelanggaran->save();

        // Redirect dengan pesan sukses
        return redirect()->route('InputPelanggaran.index')->with('success', 'Data pelanggaran siswa berhasil ditambahkan.');
    }
}
