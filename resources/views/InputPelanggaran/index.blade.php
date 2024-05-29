@extends('layouts.app')

@section('title', 'User List')

@section('content')

<div class="bg-light rounded mt-3">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Input Data Pelanggaran Siswa</h5>
            <h6 class="card-subtitle mb-2 text-muted">input pelanggaran Siswa di sini.</h6>

            <div class="mb-7 text-end">
                <button type="button" class="btn btn-primary btn-sm float-right" data-bs-toggle="modal" data-bs-target="#addInputModal">Tambah</button>
            </div>

            <div class="mt-2">
                @include('layouts.includes.messages')
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" width="5%">#</th>
                        <th scope="col" width="15%">tanggal</th>
                        <th scope="col" width="15%">Nis</th>
                        <th scope="col" width="30%">Nama Siswa</th>
                        <th scope="col" width="15%">Pelanggaran</th>
                        <th scope="col" >Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($detailPoin as $detailpoin)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $detailpoin->tanggal}}</td>
                        <td>{{ $detailpoin->nis}}</td>
                        <td>{{ $detailpoin->siswa->nama }}</td>
                        <td>{{ $detailpoin->pelanggaran->nama_pelanggaran }}</td>
                        
                        <td>
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

<!-- AddInputModal.blade.php -->
<div class="modal fade" id="addInputModal" tabindex="-1" aria-labelledby="addInputModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInputModalLabel">Tambah Data Pelanggaran Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('InputPelanggaran.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label for="nis" class="form-label">NIS / Nama</label>
                        <select class="form-select" id="nis" name="nis" required>
                            <option selected disabled>-- Pilih --</option>
                            @foreach($siswas as $siswa)
                                <option value="{{ $siswa->nis }}">{{ $siswa->nis }} - {{ $siswa->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_pelanggaran" class="form-label">Pelanggaran</label>
                        <select class="form-select" id="id_pelanggaran" name="id_pelanggaran" required>
                            <option selected disabled>-- Pilih Pelanggaran --</option>
                            @foreach($pelanggarans as $pelanggaran)
                            <option value="{{ $pelanggaran->id }}">{{ $pelanggaran->nama_pelanggaran }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="ket" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="ket" name="ket" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script>
    $(document).ready(function() {
        $('#nis').autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: '{{ route("searchSiswa") }}',
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        query: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            minLength: 2
        });
    });
</script>

@endsection
