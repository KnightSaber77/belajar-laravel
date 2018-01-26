<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    const STATUS_PAID = 1;
    const STATUS_PENDING = 2;
    const STATUS_FAILED = 3;

    protected $primaryKey = 'payment_id';
    public $incrementing = false;

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'payment_id', 'payment_id');
    }

    public function getStatusName()
    {
        switch ($this->status) {
            case self::STATUS_PENDING:
                return "Pending";
            case self::STATUS_PAID:
                return "Lunas";
            case self::STATUS_FAILED:
                return "Expired";
            default:
                return "-";
        }

    }
}
