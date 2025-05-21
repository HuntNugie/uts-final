<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view("mahasiswa.index",["mahasiswas" => Mahasiswa::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("mahasiswa.create",["prodis" => Prodi::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nm_mahasiswa" => "required | string",
            "nim" => "required ",
            "prodi" => "required",
            "nilai_tugas" => "required | numeric | digits_between:0,100",
            "uts" => "required | numeric | digits_between:0,100",
            "uas" => "required | numeric | digits_between:0,100",
            "quiz" => "required | numeric | digits_between:0,100",
            "foto" => "required | image | max:2048",
        ]);
        // mendapatkan kd_prodi
        $prodi = Prodi::findOrFail($request->prodi);

        //membuat nim
        $nim = $prodi->kd_prodi.$request->nim;

        // menghitung rata rata nilai
        $rata = $request->nilai_tugas + $request->uts + $request->uas + $request->quiz;
        $rata /= 4;

        // upload foto
        $file = $request->file("foto");
        $namaBaru = time()."_".$file->getClientOriginalName();
        $foto = $file->storeAs("mahasiswa",$namaBaru,"public");

        // menambahkan data ke database
        Mahasiswa::create([
            "nm_mahasiswa" => $request->nm_mahasiswa,
            "nim" => $nim,
            "nilai_rata_rata" => $rata,
            "prodis_id" => $request->prodi,
            "foto" => $foto
        ]);
        return redirect()->route("mahasiswa.index")->with("sukses","Berhasil membuat mahasiswa baru");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view("mahasiswa.edit",["mahasiswa" => $mahasiswa,"prodis" => Prodi::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $valid = $request->validate([
            "nm_mahasiswa" => "required | string",
            "nilai_tugas" => "required | numeric | digits_between:0,100",
            "uts" => "required | numeric | digits_between:0,100",
            "uas" => "required | numeric | digits_between:0,100",
            "quiz" => "required | numeric | digits_between:0,100",
            "foto" => "image | max:2048",
            "nilai_rata_rata"
        ]);
        // nilai rata rata
        $rata = $request->nilai_tugas + $request->uts + $request->uas + $request->quiz;
        $rata /= 4;
        $valid["nilai_rata_rata"] = $rata;
        // cek apakah mengganti foto atau tidak
        if($request->hasFile("foto")){
            // menghapus foto lama
            if(Storage::disk("public")->exists($mahasiswa->foto)){
                Storage::disk("public")->delete($mahasiswa->foto);
            }
            $file = $request->file("foto");
        $namaBaru = time()."_".$file->getClientOriginalName();
        $valid["foto"] = $file->storeAs("mahasiswa",$namaBaru,"public");
        }
        // masukkan ke dalam database
        $mahasiswa->update($valid);
        return redirect()->route("mahasiswa.index")->with("sukses","Berhasil mengupdate data mahasiswa");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        // hapus foto
        if(Storage::disk("public")->exists($mahasiswa->foto)){
            Storage::disk("public")->delete($mahasiswa->foto);
        }
        // hapus data
        $mahasiswa->delete();
        return redirect()->route("mahasiswa.index")->with("sukses","Berhasil Menghapus data mahasiswa");
    }
}
