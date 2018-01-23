<?php
/**
 * Created by PhpStorm.
 * User: KnightSaber77
 * Date: 1/23/2018
 * Time: 5:22 PM
 */

namespace App\Http\Controllers\Core;

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
        $data['kode'] = strtoupper(str_random(8));
        $data['nomor_hp'] = $request->input('nomor_hp');

        return view('payment', $data);
    }

    public function checkOut(Request $request)
    {
        $product = $this->productService->getOne($request->input('product_code'));

        $payment_id = $request->input('kode');
        $nomor_hp = $request->input('nomor_hp');
        $product_name = $request->input('product_code');
        $status = 2;
        $price = $product->price;

        $payment = $this->paymentService->paymentAdd($payment_id, $status, $price);
        $transaction = $this->transactionService->transactionAdd($payment_id, $nomor_hp, $product_name, $status, $price);

        $data['transaction'] = $transaction;
        $data['payment'] = $payment;

        return view('transfer', $data);
    }
}