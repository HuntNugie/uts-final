<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Barang;
use App\Models\Dokter;
use App\Models\Rental;
use App\Models\Booking;
use App\Models\Mahasiswa;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jml_barang = Barang::count();
        $jml_transaksi = Transaksi::count();
        $mahasiswa = Mahasiswa::count();
        $mobil = Mobil::count();
        $rental = Rental::count();
        $dokter = Dokter::count();
        $booking = Booking::count();
        return view('home',["barang" => $jml_barang,"transaksi" => $jml_transaksi,"mahasiswa" => $mahasiswa,"mobil" => $mobil,"rental" => $rental,"dokter" => $dokter,"booking" => $booking]);
    }
}
