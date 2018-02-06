<?php
/**
 * Created by PhpStorm.
 * User: KnightSaber77
 * Date: 1/23/2018
 * Time: 5:22 PM
 */

namespace App\Http\Controllers\Core;

use App\Core\Models\Cart;
use App\Core\Models\Payment;
use App\Core\Models\Transaction;
use App\Core\Models\Product;
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
        $carts = Cart::all();
        $data['carts'] = $carts;
        return view('payment', $data);
    }

    public function checkOut()
    {
        $carts = Cart::all();
        $paymentIdGenerate = strtoupper(str_random(8));
        $paymentStatus = Payment::STATUS_PENDING;
        $paymentPrice = 0;

        foreach($carts as $cart) {
            $paymentPrice += $cart->product->price;
        }
        $payment = $this->paymentService->paymentAdd($paymentIdGenerate, $paymentStatus, $paymentPrice);

        $carts = Cart::all();
        foreach($carts as $cart) {
            $paymentId = $paymentIdGenerate;
            $nomorHp = $cart->nomor_hp;
            $productName = $cart->product_code;
            $transactionStatus = Transaction::STATUS_PENDING;
            $price = $cart->product->price;

            $this->transactionService->transactionAdd($paymentId, $nomorHp, $productName, $transactionStatus, $price);
        }
        $data['transactions'] = Transaction::where('payment_id', '=', $paymentIdGenerate);
        $data['payment'] = $payment;

        foreach($carts as $cart) {
            $cart->delete();
        }

        return view('transfer', $data);
    }
}