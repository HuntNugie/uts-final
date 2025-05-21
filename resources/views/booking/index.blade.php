@extends('layouts.app')

@section('content')


<div class="container m-3">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">{{ __('Daftar Booking') }}</div>

                <div class="card-body">
                    <div class="m-3">
                        <a href="{{ route("booking.create") }}" class="btn btn-secondary">Booking</a>
                    </div>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pasien</th>
                                <th>Nama Dokter</th>
                                <th>Spesialis</th>
                                <th>hari booking</th>
                                <th>jam awal booking</th>
                                <th>jam akhir booking</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Nugie kurniawan</td>
                                <td>Nadin nugraha</td>
                                <td>spesialis otak</td>
                                <td>minggu</td>
                                <td>minggu</td>
                                <td>minggu</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
