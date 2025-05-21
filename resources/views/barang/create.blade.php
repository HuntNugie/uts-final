@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Tambah Data Barang</h2>
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nm_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nm_barang" name="nm_barang" placeholder="Masukkan nama barang" required>
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" placeholder="Masukkan stok" min="0" required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan harga" min="0" required>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Barang</label>
                    <input class="form-control" type="file" id="foto" name="foto" accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('barang.index') }}" class="btn btn-secondary ms-2">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
