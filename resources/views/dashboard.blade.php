@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <!-- Display the highest point holder -->
    <div class="col-sm-6 col-lg-3">
        <div class="card mb-4 shadow-sm border-primary">
            <div class="card-body">
                <h5 class="card-title text-primary">Jumlah Pelanggaran</h5>
                <h2 class="card-title text-primary">10</h2>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card mb-4 shadow-sm border-primary">
            <div class="card-body">
                <h5 class="card-title text-primary">Kategori Pelanggaran</h5>
                <h2 class="card-title text-primary">3</h2>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card mb-4 shadow-sm border-primary">
            <div class="card-body">
                <h5 class="card-title text-primary">Sub Kategori Pelanggaran</h5>
                <h2 class="card-title text-primary">10</h2>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card mb-4 shadow-sm border-primary">
            <div class="card-body">
                <h5 class="card-title text-primary">Jumlah Siswa</h5>
                <h2 class="card-title text-primary">30</h2>
            </div>
        </div>
    </div>
</div>
  
@endsection
