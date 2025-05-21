@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Edit Data Barang</h2>
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nm_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nm_barang" name="nm_barang" value="{{ old('nm_barang', $barang->nm_barang) }}" placeholder="Masukkan nama barang" required>
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" value="{{ old('stok', $barang->stok) }}" placeholder="Masukkan stok" min="0" required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga', $barang->harga) }}" placeholder="Masukkan harga" min="0" required>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Barang</label>
                    @if($barang->foto)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $barang->foto) }}" alt="Foto Barang" class="img-thumbnail" style="max-height: 150px;">
                        </div>
                    @endif
                    <input class="form-control" type="file" id="foto" name="foto" accept="image/*">
                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah foto.</small>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('barang.index') }}" class="btn btn-secondary ms-2">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
