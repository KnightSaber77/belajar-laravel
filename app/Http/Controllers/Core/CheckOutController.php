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
use App\Core\Services\CartService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    private $transactionService;
    private $productService;
    private $providerService;
    private $paymentService;
    private $cartService;

    public function __construct()
    {
        $this->productService = new ProductService();
        $this->providerService = new ProviderService();
        $this->transactionService = new TransactionService();
        $this->paymentService = new PaymentService();
        $this->cartService = new CartService();
    }

    public function showHome()
    {
        $data['products'] = $this->productService->getAll();
        $data['providers'] = $this->providerService->getAll();
        return view('home', $data);
    }

    public function transactionCart(Request $request)
    {
        $carts = $this->cartService->getAll();
        $data['carts'] = $carts;
        return view('payment', $data);
    }

    public function checkOut()
    {
        $carts = $this->cartService->getAll();

        $paymentIdGenerate = strtoupper(str_random(8));
        $paymentStatus = Payment::STATUS_PENDING;

        $payment = $this->paymentService->addByCart($paymentIdGenerate, $paymentStatus, $carts);

        $this->transactionService->transactionAddAll($paymentIdGenerate, $carts);

        $data['transactions'] = Transaction::where('payment_id', '=', $paymentIdGenerate);
        $data['payment'] = $payment;

        $this->cartService->cartDeleteAll();

        return view('transfer', $data);
    }
}