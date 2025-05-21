@extends('layouts.app')

@section('content')


<div class="container m-3">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">{{ __('Daftar tabel Mobil') }}</div>

                <div class="card-body">
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Dokter</th>
                                <th>Spesialis</th>
                                <th>Hari Libur</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dokters as $dok)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dok->nama_dokter }}</td>
                               <td>{{ $dok->spesialis }} </td>
                               <td>{{ $dok->libur }} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
