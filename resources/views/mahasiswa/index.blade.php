@extends('layouts.app')

@section('content')

<div class="container m-3">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">{{ __('Daftar tabel Mahasiswa') }}</div>

                <div class="card-body">
                    <div class="m-3">
                        <a href="{{ route("mahasiswa.create") }}" class="btn btn-secondary">Tambah data Mahasiswa</a>
                    </div>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mahasiswa</th>
                                <th>Foto Mahasiswa</th>
                                <th>NIM</th>
                                <th>Rata Rata</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswas as $maha)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $maha->nm_mahasiswa }}</td>

                                <td><img src="{{ secure_asset('storage') }}/{{ $maha->foto }}" alt="" height="200px" width="200px"></td>
                                <td>{{ $maha->nim }}</td>
                                <td>{{ $maha->nilai_rata_rata }}</td>
                                <td>
                                    @if ($maha->nilai_rata_rata > 70)
                                        lulus
                                    @elseif ($maha->nilai_rata_rata > 50 )
                                        Remidial
                                    @else
                                    Tidak Lulus
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                          Aksi
                                        </a>

                                        <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="{{ route("mahasiswa.edit",$maha->id) }}">Edit</a></li>
                                          <li>
                                            <form action="{{ route("mahasiswa.destroy",$maha->id) }}" method="post" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item" href="{{ route("mahasiswa.destroy",$maha->id) }}" >Hapus</button>
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
