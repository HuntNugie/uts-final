<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Number;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
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
        return view("barang.index",["barangs" => Barang::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("barang.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            "nm_barang" => "required",
            "harga" => "required | numeric",
            "stok" => "required | integer",
            "foto" => "required | image | max:2048"
        ]);
        // mengubah nama foto
        $file = $request->file("foto");
        $namaBaru = now()."-".Str::random()."-".$file->getClientOriginalName();
        $foto = $file->storeAs("barang",$namaBaru,"public");
        $kode = "BRG-".Str::random(4);



        Barang::create([
            "nm_barang" => $request->nm_barang,
            "kd_barang" => $kode,
            "stok" => $request->stok,
            "harga" => $request->harga,
            "foto" => $foto
        ]);
        return redirect()->route("barang.index")->with("sukses","Anda berhasil menambahkan data barang");
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
    public function edit(Barang $barang)
    {
        return view("barang.edit",["barang"=>$barang]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $valid = $request->validate([
            "nm_barang" => "required",
            "harga" => "required | numeric",
            "stok" => "required | integer",
            "foto" => " image | max:2048"
        ]);

        // cek apakah user ingin mengganti foto
        if($request->hasFile("foto")){
            // cek apakah foto ada di storage
            if(Storage::disk("public")->exists($barang->foto)){
                // jika ada hapus barang
                Storage::disk("public")->delete($barang->foto);
            }
            // upload foto
            $file = $request->file("foto");
            $namaBaru = now()."-".Str::random()."-".$file->getClientOriginalName();
            $valid["foto"] = $file->storeAs("barang",$namaBaru,"public");
        }
        $barang->update($valid);
        return redirect()->route("barang.index")->with("sukses","Berhasil mengupdate data");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        if(Storage::disk("public")->exists($barang->foto)){
            // jika ada hapus barang
            Storage::disk("public")->delete($barang->foto);
        }
        $barang->delete();
        return redirect()->route("barang.index")->with("sukses","Berhasil menghapus data");
    }
}
