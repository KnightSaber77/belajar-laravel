<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    const STATUS_PENDING = 2;

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
