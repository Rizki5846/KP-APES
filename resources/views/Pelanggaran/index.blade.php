@extends('layouts.app')

@section('title')
User List
@endsection

@section('content')

<div class="bg-light rounded">
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar Kategori Pelanggaran</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Tambahkan data kategori pelanggaran baru.</h6>
                    <button type="button" class="btn btn-primary btn-sm float-right" data-bs-toggle="modal" data-bs-target="#addKategoriModal">Tambah Kategori Pelanggaran</button>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar Sub Kategori Pelanggaran</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Tambahkan data sub kategori pelanggaran baru.</h6>
                    <button type="button" class="btn btn-primary btn-sm float-right" data-bs-toggle="modal" data-bs-target="#addSubKategoriModal">Tambah Sub Kategori Pelanggaran</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-light rounded mt-3">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Pelanggaran</h5>
            <h6 class="card-subtitle mb-2 text-muted">Kelola data pelanggaran di sini.</h6>

            <div class="mb-7 text-end">
                <button class="btn btn-primary btn-sm float-right" data-bs-toggle="modal" data-bs-target="#createPelanggaranModal">Tambah Pelanggaran</button>
            </div>

            <div class="mt-2">
                @include('layouts.includes.messages')
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" width="1%">#</th>
                        <th scope="col" width="10%">Kategori Pelanggaran</th>
                        <th scope="col" width="50%">Nama Pelanggaran</th>
                        <th scope="col" width="5%">Poin</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pelanggarans as $pelanggaran)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $pelanggaran->katPelanggaran->nama_kategori }}</td>
                        <td>{{ $pelanggaran->nama_pelanggaran }}</td>
                        <td>{{ $pelanggaran->poin }}</td>
                        <td>
                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editPelanggaranModal" data-id="{{ $pelanggaran->id }}" data-nama="{{ $pelanggaran->nama_pelanggaran }}" data-kategori="{{ $pelanggaran->id_kat_pelanggaran }}" data-subkategori="{{ $pelanggaran->id_sub_kategori }}" data-poin="{{ $pelanggaran->poin }}">Edit</button>
                            <form action="{{ route('Pelanggaran.destroy', $pelanggaran->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('Pelanggaran.addKategoriModal')
@include('Pelanggaran.addSubkategorialModal')
@include('Pelanggaran.createPelanggaranModal')
@include('Pelanggaran.editPelanggaranModal')

@endsection
