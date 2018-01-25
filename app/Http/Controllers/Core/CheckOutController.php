<?php
/**
 * Created by PhpStorm.
 * User: KnightSaber77
 * Date: 1/23/2018
 * Time: 5:22 PM
 */

namespace App\Http\Controllers\Core;

use App\Core\Models\Payment;
use App\Core\Models\Transaction;
use App\Core\Services\ProductService;
use App\Core\Services\ProviderService;
use App\Core\Services\TransactionService;
use App\Core\Services\PaymentService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    private $transactionService;
    private $productService;
    private $providerService;
    private $paymentService;

    public function __construct()
    {
        $this->productService = new ProductService();
        $this->providerService = new ProviderService();
        $this->transactionService = new TransactionService();
        $this->paymentService = new PaymentService();
    }

    public function showHome()
    {
        $data['products'] = $this->productService->getAll();
        $data['providers'] = $this->providerService->getAll();
        return view('home', $data);
    }

    public function transactionCart(Request $request)
    {
        $data['product'] = $this->productService->getOne($request->input('product_code'));
        $data['payment_id'] = strtoupper(str_random(8));
        $data['nomor_hp'] = $request->input('nomor_hp');

        return view('payment', $data);
    }

    public function checkOut(Request $request)
    {
        $product = $this->productService->getOne($request->input('product_code'));

        $paymentId = $request->input('payment_id');
        $nomorHp = $request->input('nomor_hp');
        $productName = $request->input('product_code');
        $paymentStatus = Payment::STATUS_PENDING;
        $transactionStatus = Transaction::STATUS_PENDING;
        $price = $product->price;

        $payment = $this->paymentService->paymentAdd($paymentId, $paymentStatus, $price);
        $transaction = $this->transactionService->transactionAdd($paymentId, $nomorHp, $productName, $transactionStatus, $price);

        $data['transaction'] = $transaction;
        $data['payment'] = $payment;

        return view('transfer', $data);
    }
}