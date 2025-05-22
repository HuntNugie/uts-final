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

    <h4 class="mb-3">Manajemen Mahasiswa</h4>
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card text-white bg-primary h-100">
                <div class="card-body d-flex align-items-center">
                   <i class="bi bi-people-fill fa-3x me-3"></i>
                    <div>
                        <h5 class="card-title">Total Mahasiswa</h5>
                        <p class="card-text fs-4">{{ $mahasiswa }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h4 class="mb-3">Manajemen Pencatatan Rental Mobil</h4>
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card text-white bg-primary h-100">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-car-front-fill fa-3x me-3"></i>
                    <div>
                        <h5 class="card-title">Total Mobil</h5>
                        <p class="card-text fs-4">{{ $mobil }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success h-100">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-ev-front-fill fa-3x me-3"></i>
                    <div>
                        <h5 class="card-title">Total Rental Mobil</h5>
                        <p class="card-text fs-4">{{ $rental }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h4 class="mb-3">Booking Dokter</h4>
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card text-white bg-primary h-100">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-person-arms-up fa-3x me-3"></i>
                    <div>
                        <h5 class="card-title">Total Dokter</h5>
                        <p class="card-text fs-4">{{ $dokter }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success h-100">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-file-medical-fill fa-3x me-3"></i>
                    <div>
                        <h5 class="card-title">Total Booking Dokter</h5>
                        <p class="card-text fs-4">{{ $booking }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
