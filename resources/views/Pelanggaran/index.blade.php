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
                    <a href="{{ route('Kategori.index') }}" class="btn btn-primary btn-sm float-right">Kategori Pelanggaran</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar Sub Kategori Pelanggaran</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Tambahkan data sub kategori pelanggaran baru.</h6>
                    <a href="#" class="btn btn-primary btn-sm float-right">Sub Kategori Pelanggran</a>
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
                <a href="{{ route('Pelanggaran.create') }}" class="btn btn-primary btn-sm float-right">Tambah Pelanggaran</a>
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
                        <th scope="col" >Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pelanggarans as $pelanggaran)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $pelanggaran->katPelanggaran->nama_kategori}}</td>
                        <td>{{ $pelanggaran->nama_pelanggaran }}</td>
                        <td>{{ $pelanggaran->poin }}</td>
                      
                        <td>
                            <a href="#" class="btn btn-warning btn-sm">Show</a>
                            <a href="#" class="btn btn-info btn-sm">Edit</a>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
