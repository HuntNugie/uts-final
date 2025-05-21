@extends('layouts.app')

@section('content')
<div class="container m-3">
    <h2 class="mb-4">Selamat datang Admin {{ auth()->user()->name }}</h2>

    <h4 class="mb-3">Manajemen Barang</h4>
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card text-white bg-primary h-100">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-box fa-3x me-3"></i>
                    <div>
                        <h5 class="card-title">Total Barang</h5>
                        <p class="card-text fs-4">{{ $barang }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success h-100">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-shopping-cart fa-3x me-3"></i>
                    <div>
                        <h5 class="card-title">Total Transaksi</h5>
                        <p class="card-text fs-4">{{ $transaksi }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h4 class="mb-3">Manajemen Pengguna</h4>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card text-white bg-warning h-100">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-users fa-3x me-3"></i>
                    <div>
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text fs-4">45</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
