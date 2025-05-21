@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Data Booking</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('booking.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nm_pasien" class="form-label">Nama Pasien</label>
                    <input type="text" class="form-control" id="nm_pasien" name="nm_pasien" value="{{ old("nm_pasien") }}" required>
                </div>
                <div class="mb-3">
                    <label for="dokter_id" class="form-label">Pilih Dokter</label>
                    <select class="form-select" id="dokter_id" name="dokter_id" required>
                        <option value="" disabled selected>-- Pilih Dokter --</option>
                        @foreach($dokters as $dokter)
                            <option value="{{ $dokter->id }}" {{ old("dokter_id") == $dokter->id ? 'selected' : '' }}>
                                {{ $dokter->nama_dokter }} - Spesialis : {{ $dokter->spesialis }} (Libur: {{ $dokter->libur }})
                            </option>
                        @endforeach
                    </select>
                    <div class="form-text">Pilih dokter sesuai spesialis dan perhatikan jadwal libur.</div>
                </div>
                <div class="mb-3">
                    <label for="hari" class="form-label">Hari</label>
                     <select class="form-select" id="hari" name="hari" required>
                        <option value="" disabled selected>-- Pilih Hari --</option>
                            <option value="senin" {{ old("hari") == "senin" ? 'selected' : '' }}>
                              Senin
                            </option>
                            <option value="selasa" {{ old("hari") == "selasa" ? 'selected' : '' }}>
                              Selasa
                            </option>
                            <option value="rabu" {{ old("hari") == "rabu" ? 'selected' : '' }}>
                              Rabu
                            </option>
                            <option value="kamis" {{ old("hari") == "kamis" ? 'selected' : '' }}>
                              Kamis
                            </option>
                            <option value="jumat" {{ old("hari") == "jumat" ? 'selected' : '' }}>
                              Jumat
                            </option>
                            <option value="sabtu" {{ old("hari") == "sabtu" ? 'selected' : '' }}>
                              Sabtu
                            </option>
                            <option value="minggu" {{ old("hari") == "minggu" ? 'selected' : '' }}>
                              Minggu
                            </option>
                        </select>
                </div>
                <div class="mb-3">
                    <label for="jam_awal" class="form-label">Jam Awal</label>
                    <input type="time" class="form-control" id="jam_awal" value="{{ old("jam_awal") }}" name="jam_awal" required>
                </div>
                <div class="mb-3">
                    <label for="jam_akhir" class="form-label">Jam Akhir</label>
                    <input type="time" class="form-control" id="jam_akhir" value="{{ old("jam_akhir") }}" name="jam_akhir" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Booking</button>
            </form>
        </div>
    </div>
</div>
@endsection
