@extends('layouts.app')

@section('content')


<div class="container m-3">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">{{ __('Daftar tabel rental') }}</div>
                <div class="m-3">
                    <a href="{{ route("rental.create") }}" class="btn btn-secondary">Tambah data rental</a>
                </div>
                <div class="card-body">
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tipe kendaraan</th>
                                <th>Nomor Polisi</th>
                                <th>Tanggal awal sewa</th>
                                <th>Tanggal akhir sewa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rentals as $rent)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $rent->mobil->tipe }}</td>
                               <td>{{ $rent->mobil->nomor_polisi }} </td>
                               <td>{{ $rent->tgl_awal }} </td>
                               <td>{{ $rent->tgl_akhir }} </td>
                               <td>
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                      Aksi
                                    </a>

                                    <ul class="dropdown-menu">
                                      <li><a class="dropdown-item" href="{{ route("rental.edit",$rent->id) }}">Edit</a></li>
                                      <li>
                                          <form action="{{ route("rental.destroy",$rent->id) }}" method="post" >
                                              @csrf
                                              @method('DELETE')
                                            <button type="submit" class="dropdown-item" href="" >Hapus</button>
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
