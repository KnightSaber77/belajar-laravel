<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
