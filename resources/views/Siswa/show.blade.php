@extends('layouts.app')

@section('title', 'Detail Siswa')

@section('content')
<div class="bg-light rounded mt-3">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title">Detail Siswa</h5>
            <h6 class="card-subtitle mb-2">Informasi lengkap siswa</h6>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="nis" class="form-label font-weight-bold">NIS:</label>
                </div>
                <div class="col-md-8">
                    <p class="form-control-plaintext">{{ $siswa->nis }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="nama" class="form-label font-weight-bold">Nama:</label>
                </div>
                <div class="col-md-8">
                    <p class="form-control-plaintext">{{ $siswa->nama }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="kelas" class="form-label font-weight-bold">Kelas:</label>
                </div>
                <div class="col-md-8">
                    <p class="form-control-plaintext">{{ $siswa->kelas }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="th_angkatan" class="form-label font-weight-bold">Angkatan:</label>
                </div>
                <div class="col-md-8">
                    <p class="form-control-plaintext">{{ $siswa->th_angkatan }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="alamat" class="form-label font-weight-bold">Alamat:</label>
                </div>
                <div class="col-md-8">
                    <p class="form-control-plaintext">{{ $siswa->alamat }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="total_poin" class="form-label font-weight-bold">Jumlah Poin Pelanggaran:</label>
                </div>
                <div class="col-md-8">
                    <p class="form-control-plaintext">{{ $totalPoin }}</p>
                </div>
            </div>

            <h5 class="mt-4">Riwayat Pelanggaran</h5>
            <table class="table table-striped mt-2">
                <thead>
                    <tr>
                        <th scope="col" width="5%">#</th>
                        <th scope="col" width="20%">Tanggal</th>
                        <th scope="col" width="40%">Pelanggaran</th>
                        <th scope="col" width="20%">Poin</th>
                        <th scope="col" width="15%">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pelanggaranSiswa as $pelanggaran)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pelanggaran->tanggal }}</td>
                        <td>{{ $pelanggaran->pelanggaran->nama_pelanggaran }}</td>
                        <td>{{ $pelanggaran->pelanggaran->poin }}</td>
                        <td>{{ $pelanggaran->ket }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-end">
                <a href="{{ route('Siswa.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
