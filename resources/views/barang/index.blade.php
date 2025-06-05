@extends('layouts.app')

@section('content')

<div class="container m-3">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">{{ __('Daftar tabel barang') }}</div>

                <div class="card-body">
                    <div class="m-3">
                        <a href="{{ route("barang.create") }}" class="btn btn-secondary">Tambah data</a>
                    </div>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama barang</th>
                                <th>Foto</th>
                                <th>Kode barang</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangs as $barang)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $barang->nm_barang }}</td>
                                <td><img src="{{ secure_asset('storage') }}/{{ $barang->foto }}" alt="" height="200px" width="200px"></td>
                                <td>{{ $barang->kd_barang }}</td>
                                <td>{{ $barang->stok }}</td>
                                <td>{{ Number::currency($barang->harga,"IDR") }} </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                          Aksi
                                        </a>

                                        <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="{{ route("barang.edit",$barang->id) }}">Edit</a></li>
                                          <li>
                                            <form action="{{ route("barang.destroy",$barang->id) }}" method="post" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item" href="{{ route("barang.destroy",$barang->id) }}" >Hapus</button>
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
