<?php
/**
 * Created by PhpStorm.
 * User: KnightSaber77
 * Date: 1/23/2018
 * Time: 5:25 PM
 */

namespace App\Core\Repositories;

use App\Core\Models\Payment;

class PaymentRepository
{

    public function getAll()
    {
        return Payment::all();
    }

    public function getOne($payment_id)
    {
        return Payment::find($payment_id);
    }
    public function paymentAdd($payment)
    {
        $payment->save();
    }
}
