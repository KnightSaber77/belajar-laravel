<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    const STATUS_SUCCESS = 1;
    const STATUS_PENDING = 2;
    const STATUS_FAILED = 3;

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function getStatusName()
    {
        switch ($this->status) {
            case self::STATUS_PENDING:
                return "Pending";
            case self::STATUS_SUCCESS:
                return "Sukses";
            case self::STATUS_FAILED:
                return "Gagal";
            default:
                return "-";
        }

    }
}
