<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaksi;

class TransaksiController extends Controller
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
        return view("transaksi.index",["transaksis" => Transaksi::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("transaksi.create",["barangs" => Barang::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "kd_barang" => "required",
            "qty" => "required|numeric",
        ]);

        $barang = Barang::where("kd_barang","=",$request->kd_barang)->firstOrFail();
        $total = $barang->harga * $request->qty;
        // cek apakah stok barang ada
        if($barang->stok < $request->qty){
            return redirect()->route("transaksi.create")->with("error","Gagal membuat transaksi karna stok barang tidak cukup");
        }
        $stok = $barang->stok - $request->qty;
        Transaksi::create([
            "kd_barang" => $request->kd_barang,
            "qty" => $request->qty,
            "total_harga" => $total,
        ]);
        $barang->update([
            "stok" => $stok
        ]);
        return redirect()->route("transaksi.index")->with("sukses","transaksi berhasil di buat");
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
    public function edit(Transaksi $transaksi)
    {
        return view("transaksi.edit",["transaksi" => $transaksi,"barangs" => Barang::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $valid = $request->validate([
            "kd_barang" => "required",
            "qty" => "required | numeric"
        ]);
        if($request->kd_barang == $transaksi->kd_barang && $request->qty == $transaksi->qty ){
            return redirect()->route("transaksi.index");
        }
        // cek apakah stok nya berkurang atau tidak
        $barang = Barang::where("kd_barang","=",$transaksi->kd_barang)->firstOrFail();

        if($request->qty < $transaksi->qty){
            $sisa = $transaksi->qty - $request->qty;
            $stok = $barang->stok + $sisa;
            $barang->update([
                "stok" => $stok
            ]);
        }else{
            // jika nambah kuantiti berarti cek dulu si stok barang nya memnuhi atau tidak
            if($barang->stok < $request->qty){
                return redirect()->route("transaksi.edit",$transaksi->id)->with("error","gagal mengedit transaksi karena stok barang tidak memnuhi");
            }
            // jika stok barang cukup
            $berubah = $request->qty - $transaksi->qty;
            $stok = $barang->stok - $berubah;
            $barang->update([
                "stok" => $stok
            ]);
        }
        $total = $barang->harga * $request->qty;
        $transaksi->update([
            "kd_barang" => $request->kd_barang,
            "qty" => $request->qty,
            "total_harga" => $total
        ]);

        return redirect()->route("transaksi.index")->with("sukses","Berhasil mengupdate data transaksi");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route("transaksi.index")->with("sukses","Berhasil menghapus data");
    }
}
