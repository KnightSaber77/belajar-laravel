<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    const STATUS_PENDING = 2;
    public $incrementing = false;
}
