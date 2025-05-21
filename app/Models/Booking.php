<?php

namespace App\Models;

use App\Models\Dokter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $guarded = ["id"];
    public function dokter():BelongsTo
    {
        return $this->belongsTo(Dokter::class,"dokter_id");
    }
}
