<?php
/**
 * Created by PhpStorm.
 * User: KnightSaber77
 * Date: 1/25/2018
 * Time: 10:30 AM
 */

namespace App\Http\Controllers\Core;


use App\Core\Models\Payment;
use App\Core\Models\Transaction;
use App\Core\Services\PaymentService;
use App\Core\Services\TransactionService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $paymentService;
    public function __construct()
    {
        $this->paymentService = new PaymentService();
    }

    public function showSearchHome()
    {
        return view('search');
    }
    public function searchPaymentById(Request $request)
    {
        $payment = $this->paymentService->getOne($request->input('payment_id'));
        $data['transactions'] = $payment->transactions;
        $data['payment'] = $payment;
        return view('payment_status', $data);
    }
}