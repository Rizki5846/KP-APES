@extends('layouts.app')

@section('title', 'User List')

@section('content')
<div class="bg-light rounded mt-3">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Siswa</h5>
            <h6 class="card-subtitle mb-2 text-muted">Kelola data siswa di sini.</h6>

            <div class="mb-7 text-end">
                <button type="button" class="btn btn-primary btn-sm float-right" data-bs-toggle="modal" data-bs-target="#addSiswaModal">Tambah Siswa</button>
            </div>

            <div class="mt-2">
                @include('layouts.includes.messages')
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" width="5%">#</th>
                        <th scope="col" width="15%">Nis</th>
                        <th scope="col" width="30%">Nama Siswa</th>
                        <th scope="col" width="20%">Kelas</th>
                        <th scope="col" width="15%">Angkatan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($siswas as $siswa)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $siswa->nis}}</td>
                        <td>{{ $siswa->nama}}</td>
                        <td>{{ $siswa->kelas}}</td>
                        <td>{{ $siswa->th_angkatan}}</td>
                        <td>
                            <a href="{{ route('Siswa.show', $siswa->nis) }}" class="btn btn-primary btn-sm">Detail</a>
                            <a href="#" class="btn btn-info btn-sm">Edit</a>
                            <form action="#" method="POST" style="display:inline;">
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
@include('Siswa.AddSiswaModal')
@endsection
