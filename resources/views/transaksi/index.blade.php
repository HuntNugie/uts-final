@extends('layouts.app')

@section('content')
<div class="container m-3">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">{{ __('Daftar Transaksi') }}</div>

                <div class="card-body">
                    <div class="m-3">
                        <a href="{{ route("transaksi.create") }}" class="btn btn-secondary">Tambah Transaksi</a>
                    </div>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama barang</th>
                                <th>foto barang</th>
                                <th>kuantiti</th>
                                <th>harga satuan</th>
                                <th>Total harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksis as $trans)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $trans->barang->nm_barang }}</td>
                                <td><img src="{{ asset("storage") }}/{{ $trans->barang->foto }}" height="200px" width="200px" alt=""></td>
                                <td>{{ $trans->qty }}</td>
                                <td>{{ Number::currency($trans->barang->harga,"IDR") }}</td>
                                <td>{{ Number::currency($trans->total_harga,"IDR") }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                          Aksi
                                        </a>

                                        <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="{{ route("transaksi.edit",$trans->id) }}">Edit</a></li>
                                          <li>
                                            <form action="{{ route("transaksi.destroy",$trans->id) }}" method="post" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item" href="{{ route("transaksi.destroy",$trans->id) }}" >Hapus</button>
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
