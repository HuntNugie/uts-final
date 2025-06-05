@extends('layouts.app')

@section('content')

@if($errors->any())
<script>
    Swal.fire({
  icon: "error",
  title: "{!! implode($errors->all()) !!}",
  text: "Something went wrong!",
  footer: '<a href="#">Why do I have this issue?</a>'
});
</script>
@endif
<div class="container my-5 d-flex justify-content-center">
    <div class="card shadow-sm rounded-4 p-4" style="max-width: 700px; width: 100%; background-color: #e9f7fe;">
        <h2 class="mb-4 text-center">Edit Mahasiswa</h2>
        <form action="{{ route('mahasiswa.update',$mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="nm_mahasiswa" value="{{ $mahasiswa->nm_mahasiswa }}" name="nm_mahasiswa" placeholder="Nama Mahasiswa" required>
                        <label for="nm_mahasiswa">Nama Mahasiswa</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" value="{{ $mahasiswa->nim }}"  id="nim" name="nim" placeholder="Masukkan 4 digit terakhir nim" readonly>
                        <label for="nim">NIM</label>
                        <small class="text-secondary">*Masukkan 4 digit terakhir NIM</small>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">

                        <select name="prodi" class="form-select" id="prodi"
                        aria-label="Floating label select example">
                            <option value="" disabled selected>Masukkan Prodi</option>
                            @foreach ($prodis as $pro)
                            <option value="{{ $pro->id }}" {{ $mahasiswa->prodis_id === $pro->id ? 'selected' : ""   }} disabled>{{ $pro->nm_prodi }} {{ $pro->kd_prodi }}</option>
                            @endforeach
                        </select>
                        <label for="prodi">Prodi jurusan</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="number" value="{{ old("nilai_tugas") }}" step="0.01" min="1" max="100" class="form-control" id="nilai_tugas" name="nilai_tugas" placeholder="Nilai Tugas" required>
                        <label for="nilai_tugas">Nilai Tugas</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="number" step="0.01" min="1" max="100" value="{{ old("quiz") }}" class="form-control" id="quiz" name="quiz" placeholder="Nilai Quiz" required>
                        <label for="quiz">Nilai Quiz</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="number" step="0.01" min="1" max="100" value="{{ old("uts") }}" class="form-control" id="uts" name="uts" placeholder="Nilai UTS" required>
                        <label for="uts">Nilai UTS</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="number" step="0.01" min="1" max="100" value="{{ old("uas") }}" class="form-control" id="uas" name="uas" placeholder="Nilai UAS" required>
                        <label for="uas">Nilai UAS</label>
                    </div>
                </div>
                <div class="col-12">
                    <img src="{{ secure_asset("storage") }}/{{ $mahasiswa->foto }}" height="200px" width="200px" alt="">

                </div>
                <div class="col-12">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*" >
                </div>
            </div>
            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary btn-lg rounded-pill">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
