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
    public function paymentAdd($payment)
    {
        $payment->save();
    }
}
