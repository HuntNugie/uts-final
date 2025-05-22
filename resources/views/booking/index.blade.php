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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $boo )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $boo->nm_pasien }}</td>
                                <td>{{ $boo->dokter->nama_dokter }}</td>
                                <td>spesialis {{ $boo->dokter->spesialis }}</td>
                                <td>{{ $boo->hari }}</td>
                                <td>{{ $boo->jam_awal }}</td>
                                <td>{{ $boo->jam_akhir }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                          Aksi
                                        </a>

                                        <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="{{ route("booking.edit",$boo->id) }}">Edit</a></li>
                                          <li>
                                            <form action="{{ route("booking.destroy",$boo->id) }}" method="post" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item" href="{{ route("booking.destroy",$boo->id) }}" >Hapus</button>
                                            </form>
                                            </li>
                                        </ul>
                                      </div>
                                </td>
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
