@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h2 class="mb-4">Tambah Data Transaksi</h2>
    <div class="card shadow-sm p-4">
        <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="kd_barang" class="form-label">Pilih Barang</label>
                <select class="form-select" id="kd_barang" name="kd_barang" required>
                    <option value="" disabled selected>-- Pilih Barang --</option>
                    @foreach($barangs as $barang)
                    <option value="{{ $barang->kd_barang }}">
                        {{ $barang->nm_barang }} - Stok: {{ $barang->stok }} - Harga: {{ $barang->harga }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="qty" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="qty" name="qty" min="1" placeholder="Masukkan jumlah" required>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-cart-plus"></i> Simpan Transaksi
            </button>
            <a href="{{ route('transaksi.index') }}" class="btn btn-secondary ms-2">Batal</a>
        </form>
    </div>
</div>
@endsection
