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

class PaymentController extends Controller
{
    private $paymentService;

    public function __construct()
    {
        $this->paymentService = new PaymentService();
    }

    public paymentAdd(Request $request)
    {
        $payment_id = $request->input('kode');
        $status = 2;
        $total = $product->price;
    }
}