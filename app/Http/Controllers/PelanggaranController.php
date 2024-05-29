<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use App\Models\Pelanggaran;
use App\Models\SubKatPelanggaran;
use App\Models\KatPelanggaran;
use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    public function index(){
        $pelanggarans = Pelanggaran::with('katPelanggaran')->get();
        $kategoris = KatPelanggaran::all();
        $subKategories = SubKatPelanggaran::all(); 
        return view('Pelanggaran.index', compact('kategoris', 'pelanggarans', 'subKategories'));
    }

    public function create(){
        $kategories = KatPelanggaran::all();
        $subKategories = SubKatPelanggaran::all();
        return view('Pelanggaran.create', compact('kategoris', 'subKategories'));
    }

    public function getByKatPelanggaran($katPelanggaranId)
    {
        $subKategories = SubKatPelanggaran::where('id_kat_pelanggaran', $katPelanggaranId)->get();
        return response()->json($subKategories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggaran' => 'required',
            'id_sub_kategori' => 'required',
            'id_kat_pelanggaran' => 'required',
            'poin' => 'required|integer',
        ]);

        Pelanggaran::create($request->all());
        return redirect()->route('Pelanggaran.index')->with('success', 'Pelanggaran berhasil ditambahkan.');
    }

    public function storeKategori(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        KatPelanggaran::create($request->all());
        return redirect()->route('Pelanggaran.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function storeSubKategori(Request $request)
    {
        $request->validate([
            'nama_sub_kategori' => 'required',
            'id_kat_pelanggaran' => 'required',
        ]);

        SubKatPelanggaran::create($request->all());
        return redirect()->route('Pelanggaran.index')->with('success', 'Sub Kategori berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pelanggaran = Pelanggaran::findOrFail($id);
        $kategories = KatPelanggaran::all();
        $subKategories = SubKatPelanggaran::all();
        return view('Pelanggaran.edit', compact('pelanggaran', 'kategories', 'subKategories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pelanggaran' => 'required',
            'id_sub_kategori' => 'required',
            'id_kat_pelanggaran' => 'required',
            'poin' => 'required|integer',
        ]);

        $pelanggaran = Pelanggaran::findOrFail($id);
        $pelanggaran->update($request->all());
        return redirect()->route('Pelanggaran.index')->with('success', 'Pelanggaran berhasil diperbarui.');
    }

    public function updateKategori(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        $kategori = KatPelanggaran::findOrFail($id);
        $kategori->update($request->all());
        return redirect()->route('Pelanggaran.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function editSubKategori($id)
    {
        $subKategori = SubKatPelanggaran::findOrFail($id);
        $kategories = KatPelanggaran::all();
        return view('Pelanggaran.editSubKategori', compact('subKategori', 'kategories'));
    }

    public function updateSubKategori(Request $request, $id)
    {
        $request->validate([
            'nama_sub_kategori' => 'required',
            'id_kat_pelanggaran' => 'required',
        ]);

        $subKategori = SubKatPelanggaran::findOrFail($id);
        $subKategori->update($request->all());
        return redirect()->route('Pelanggaran.index')->with('success', 'Sub Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pelanggaran = Pelanggaran::findOrFail($id);
        $pelanggaran->delete();
        return redirect()->route('Pelanggaran.index')->with('success', 'Pelanggaran berhasil dihapus.');
    }

    public function destroyKategori($id)
    {
        $kategori = KatPelanggaran::findOrFail($id);
        $kategori->delete();
        return redirect()->route('Pelanggaran.index')->with('success', 'Kategori berhasil dihapus.');
    }

    public function destroySubKategori($id)
    {
        $subKategori = SubKatPelanggaran::findOrFail($id);
        $subKategori->delete();
        return redirect()->route('Pelanggaran.index')->with('success', 'Sub Kategori berhasil dihapus.');
    }
}
