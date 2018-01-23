<?php
/**
 * Created by PhpStorm.
 * User: KnightSaber77
 * Date: 1/23/2018
 * Time: 4:01 PM
 */

namespace App\Http\Controllers\Core;

use App\Core\Services\ProductService;
use App\Core\Services\ProviderService;
use App\Core\Services\TransactionService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    private $transactionService;
    private $productService;
    private $providerService;

    public function __construct()
    {
        $this->productService = new ProductService();
        $this->providerService = new ProviderService();
        $this->transactionService = new TransactionService();
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

    public function transactionAdd(Request $request)
    {
        $product = $this->productService->getOne($request->input('product_code'));

        $payment_id = $request->input('kode');
        $nomor_hp = $request->input('nomor_hp');
        $product_name = $request->input('product_code');
        $status = 2;
        $price = $product->price;

        $this->transactionService->transactionAdd($payment_id, $nomor_hp, $product_name, $status, $price);
    }
}