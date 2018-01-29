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

    public function getAll()
    {
        return $this->paymentRepository->getAll();
    }

    public function getOne($payment_id)
    {
        return $this->paymentRepository->getOne($payment_id);
    }
    public function paymentAdd($paymentId, $status, $price)
    {
        $payment = new Payment();
        $payment->payment_id = $paymentId;
        $payment->status = $status;
        $payment->total = $price;

        $this->paymentRepository->paymentAdd($payment);
        return $payment;
    }

    public function getByFilter($startDate, $endDate, $status, $paymentId)
    {
        $payments = $this->paymentRepository->getAll();
        $startDate .= ' 00:00:00';
        $endDate .= ' 23:59:59';
        $payments = $payments->where('created_at', '>=', $startDate);
        $payments = $payments->where('created_at', '<=', $endDate);
        if ($status != 0) {
            $payments = $payments->where('status', '=', $status);
        }
        if (!empty($paymentId)) {
            $payments = $payments->where('payment_id', '=', $paymentId);
        }

        return $payments;
    }
}