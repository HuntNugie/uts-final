<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rental extends Model
{
    protected $guarded = ["id"];
    public function mobil():BelongsTo
    {
        return $this->belongsTo(Mobil::class,"mobils_id");
    }
}
