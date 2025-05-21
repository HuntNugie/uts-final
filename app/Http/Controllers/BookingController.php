<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("booking.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("booking.create",["dokters" => Dokter::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            "nm_pasien" => "required | string",
            "dokter_id" => "required",
            "hari" => "required",
            "jam_awal" => "required ",
            "jam_akhir" => "required  | after:jam_awal",
        ]);

        // cek hari apakah hari nya itu pas saat hari libur
        $dokter = Dokter::findOrFail($request->dokter_id);
        if($request->hari === $dokter->libur){
            return back()->with("error","Di hari tersebut dokter sedang libur bertugas");
        }
        $pasien = Booking::all();
        foreach($pasien as $pas){
            if($pas->dokter_id === $request->dokter_id && $pas->jam_awal <= $request->jam_akhir && $pas->jam_akhir >= $request->jam_awal){
                return back()->with("error","Jadwal dokter {$pas->dokter->nama_dokter} sudah terbokking saat di jam tersebut");
            }
        }

        Booking::create($valid);
        return redirect()->route("booking.index")->with("sukses","Berhasil menambahkan data booking pasien");
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
