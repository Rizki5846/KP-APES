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
                    <button type="button" class="btn btn-primary btn-sm float-right" data-bs-toggle="modal" data-bs-target="#addSubKategoriModal">Tambah Kategori Pelanggaran</button>
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

<!-- Modal Add Kategori Pelanggaran -->
<div class="modal fade" id="addKategoriModal" tabindex="-1" aria-labelledby="addKategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addKategoriModalLabel">Tambah Kategori Pelanggaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Pelanggaran.storeKategori') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_kategori" class="form-label">Nama Kategori:</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                </form>

               
                <table class="table table-striped mt-4">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kategori</th>
                            <th scope="col">Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kategoris as $kategori)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kategori->nama_kategori }}</td>
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
</div>
<!-- Tutup Modal Add Kategori Pelanggaran -->

<!--  Modal SUB Kategori Pelanggaran -->
<div class="modal fade" id="addSubKategoriModal" tabindex="-1" aria-labelledby="addSubKategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSubKategoriModalLabel">Tambah Sub Kategori Pelanggaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               
                    @csrf
                    <div class="mb-3">
                        <label for="nama_sub_kategori" class="form-label">Nama Sub Kategori:</label>
                        <input type="text" class="form-control" id="nama_sub_kategori" name="nama_sub_kategori" required>
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Tambah Sub Kategori</button>
                </form>

                <hr>

                <h5 class="mt-4">Daftar Sub Kategori Pelanggaran</h5>
                <table class="table table-striped mt-2">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Sub Kategori</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subKategories as $subKategori)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $subKategori->nama_sub_kategori }}</td>
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
</div>




@endsection
