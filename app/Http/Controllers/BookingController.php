<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Booking;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("booking.index",["bookings" => Booking::with("dokter")->get()]);
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
        if(Str::ucfirst($request->hari) === Str::ucfirst($dokter->libur)){
            return back()->with("error","Di hari tersebut dokter sedang libur bertugas");
        }
        $pasien = Booking::all();
        foreach($pasien as $pas){
            if($pas->dokter_id == $request->dokter_id && $pas->jam_awal <= $request->jam_akhir && $pas->jam_akhir >= $request->jam_awal){
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
    public function edit(Booking $booking)
    {
        return view("booking.edit",["booking" => $booking,"dokters" => Dokter::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
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
            if($pas->dokter_id == $request->dokter_id && $pas->jam_awal <= $request->jam_akhir && $pas->jam_akhir >= $request->jam_awal && $request->dokter_id != $dokter->id){
                return back()->with("error","Jadwal dokter {$pas->dokter->nama_dokter} sudah terbokking saat di jam tersebut");
            }
        }
        $booking->update($valid);
        return redirect()->route("booking.index")->with("sukses","Berhasil mengupdate bookingan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route("booking.index")->with("sukses","Berhasil menghapus data");
    }
}
