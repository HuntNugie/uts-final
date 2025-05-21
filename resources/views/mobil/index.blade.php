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
                                <th>Tipe kendaraan</th>
                                <th>Nomor Polisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mobils as $maha)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $maha->tipe }}</td>
                               <td>{{ $maha->nomor_polisi }} </td>
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
