<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class SalesProduct extends Eloquent
{
    use HasFactory;
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
