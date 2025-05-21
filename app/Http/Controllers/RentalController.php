<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("rental.index",["rentals" => Rental::with("mobil")->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("rental.create",["mobils" => Mobil::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            "mobils_id" => "required",
            "tgl_awal" => "required | date",
            "tgl_akhir" => "required | date",
        ]);

        // cek apakah mobil sudah pernah di buat di tanggal tersebut ?
        $rental = Rental::all();
        foreach($rental as $mob){
            if($mob->mobils_id == $valid["mobils_id"] && $mob->tgl_awal <= $valid["tgl_akhir"] && $mob->tgl_akhir >= $valid["tgl_awal"]){
                return redirect()->route("rental.create")->with("error","Di tanggal tersebut mobil masih di rental");
            }
        }
        // cek rental tanggal awal tidak boleh lebih besar dari tanggal akhir
        if($request->tgl_awal >= $request->tgl_akhir){
            return back()->with("error","tanggal awal tidak boleh lebih besar dari tanggal akhir");
        }
        Rental::create($valid);
        return redirect()->route("rental.index")->with("sukses","Berhasil merental mobil");
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
    public function edit(Rental $rental)
    {
        return view("rental.edit",["mobils" => Mobil::all(),"rental" => $rental]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rental $rental)
    {
        $valid = $request->validate([
            "mobils_id" => "required",
            "tgl_awal" => "required | date",
            "tgl_akhir" => "required | date",
        ]);


        // cek rental tanggal awal tidak boleh lebih besar dari tanggal akhir
        if($request->tgl_awal >= $request->tgl_akhir){
            return redirect()->route("rental.edit",$rental->id)->with("error","tanggal awal tidak boleh lebih besar dari tanggal akhir");
        }

        $rent = Rental::all();
        foreach($rent as $mob){
            if($mob->mobils_id == $valid["mobils_id"] && $mob->tgl_awal <= $valid["tgl_akhir"] && $mob->tgl_akhir >= $valid["tgl_awal"] && $mob->id != $rental->id){
                return back()->with("error","Di tanggal tersebut mobil masih di rental");
            }
        }
        $rental->update($valid);
        return redirect()->route("rental.index")->with("sukses","Berhasil mengupdate data rental");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rental $rental)
    {
        $rental->delete();
        return redirect()->route("rental.index")->with("sukses","Berhasil menghapus data transaksi");
    }
}
