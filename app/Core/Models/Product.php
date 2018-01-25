<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_code';
    public $incrementing = false;

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
