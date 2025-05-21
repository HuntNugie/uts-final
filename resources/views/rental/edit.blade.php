@extends('layouts.app')

@section('content')
<div class="container my-5 d-flex justify-content-center">
    <div class="card shadow-sm rounded-4 p-4" style="max-width: 600px; width: 100%; background-color: #f0f8ff;">
        <h2 class="mb-4 text-center">Edit Data Rental</h2>
        <form action="{{ route('rental.update', $rental->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="mobils_id" class="form-label">Tipe Mobil</label>
                <select class="form-select" id="mobils_id" name="mobils_id" required>
                    <option value="" disabled>Pilih tipe mobil</option>
                    @foreach($mobils as $mobil)
                        <option value="{{ $mobil->id }}" {{ $mobil->id == $rental->mobils_id ? 'selected' : '' }}>
                            {{ $mobil->tipe }} - {{ $mobil->nomor_polisi }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tgl_awal" class="form-label">Tanggal Awal</label>
                <input type="date" class="form-control" id="tgl_awal" name="tgl_awal" value="{{ $rental->tgl_awal }}" required>
            </div>
            <div class="mb-3">
                <label for="tgl_akhir" class="form-label">Tanggal Akhir</label>
                <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir" value="{{ $rental->tgl_akhir }}" required>
            </div>
            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary btn-lg rounded-pill">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
