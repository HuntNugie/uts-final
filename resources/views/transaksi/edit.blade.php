@extends('layouts.app')

@section('content')
@if (session("error"))
    <script>
        Swal.fire({
  icon: "error",
  title: "gagal mengedit transaksi",
  text: "{{ session('error') }}",
});
    </script>
@endif
<div class="container mt-5">
    <h2 class="mb-4">Edit Data Transaksi</h2>
    <div class="card shadow-sm p-4">
        <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="kd_barang" class="form-label">Pilih Barang</label>
                <select class="form-select" id="kd_barang" name="kd_barang" required>
                    <option value="" disabled>-- Pilih Barang --</option>
                    @foreach($barangs as $barang)
                    <option value="{{ $barang->kd_barang }}" {{ $barang->kd_barang == old('kd_barang', $transaksi->kd_barang) ? 'selected' : '' }}>
                        {{ $barang->nm_barang }} - Stok: {{ $barang->stok }} - Harga: {{ $barang->harga }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="qty" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="qty" name="qty" min="1" value="{{ old('qty', $transaksi->qty) }}" placeholder="Masukkan jumlah" required>
            </div>
            <div class="mb-3">
                <p>total harga sebelumnya : {{ $transaksi->total_harga }}</p>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-cart-check"></i> Update Transaksi
            </button>
            <a href="{{ route('transaksi.index') }}" class="btn btn-secondary ms-2">Batal</a>
        </form>
    </div>
</div>
@endsection
