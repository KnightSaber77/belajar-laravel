<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    const STATUS_PENDING = 2;
    protected $primaryKey = 'payment_id';
    public $incrementing = false;

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'payment_id', 'payment_id');
    }
}
