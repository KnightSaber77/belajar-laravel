<?php
/**
 * Created by PhpStorm.
 * User: KnightSaber77
 * Date: 1/23/2018
 * Time: 5:24 PM
 */

namespace App\Core\Services;

use App\Core\Models\Payment;
use App\Core\Repositories\PaymentRepository;

class PaymentService
{
    private $paymentRepository;

    public function __construct()
    {
        $this->paymentRepository = new PaymentRepository();
    }
    public function paymentAdd($payment_id, $status, $price)
    {
        $payment = new Payment();
        $payment->payment_id = $payment_id;
        $payment->status = $status;
        $payment->total = $price;

        $this->paymentRepository->paymentAdd($payment);
        return $payment;
    }
}