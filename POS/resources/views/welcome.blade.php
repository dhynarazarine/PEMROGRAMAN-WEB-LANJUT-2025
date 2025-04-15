@extends('layouts.template')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Halo, apakabar!!!</h3>
    </div>
    <div class="card-body">
        Selamat datang semua, ini adalah halaman utama dari aplikasi ini.
    </div>
</div>

{{-- Tombol Akses Menu--}}
<div class="row text-center mt-4">
    <div class="col-md-2 col-6 mb-3">
        <a href="{{ url('/kategori') }}" class="btn btn-primary btn-block">
            <i class="fas fa-tags"></i><br>Kategori Barang
        </a>
    </div>
    <div class="col-md-2 col-6 mb-3">
        <a href="{{ url('/supplier') }}" class="btn btn-secondary btn-block">
            <i class="fas fa-truck"></i><br>Data Supplier
        </a>
    </div>
    <div class="col-md-2 col-6 mb-3">
        <a href="{{ url('/barang') }}" class="btn btn-success btn-block">
            <i class="fas fa-boxes"></i><br>Data Barang
        </a>
    </div>
    <div class="col-md-2 col-6 mb-3">
        <a href="{{ url('/penjualan') }}" class="btn btn-danger btn-block">
            <i class="fas fa-cash-register"></i><br>Transaksi Penjualan
        </a>
    </div>
    <div class="col-md-2 col-6 mb-3">
        <a href="{{ url('/stok') }}" class="btn btn-info btn-block">
            <i class="fas fa-warehouse"></i><br>Stok Barang
        </a>
    </div>
</div>

@endsection
