<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    protected $guarded = ["id"];
    public function barang():BelongsTo
    {
        return $this->belongsTo(Barang::class,"kd_barang","kd_barang");
    }
}
