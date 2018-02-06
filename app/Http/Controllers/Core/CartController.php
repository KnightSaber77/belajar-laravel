<?php

namespace App\Http\Controllers\Core;


use App\Core\Models\Product;
use App\Core\Models\Cart;
use App\Core\Services\ProductService;
use App\Core\Services\CartService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: KnightSaber77
 * Date: 1/16/2018
 * Time: 3:47 PM
 */

class CartController extends Controller
{
    private $cartService;

    public function __construct()
    {
        $this->cartService = new CartService();
    }

    public function cartAdd(Request $request)
    {
        $product_code = $request->input('product_code');
        $nomor_hp = $request->input('nomor_hp');

        $this->cartService->cartAdd($product_code, $nomor_hp);
        return view ('home');
    }

    public function cartDelete(Cart $cart)
    {
        $this->cartService->cartDelete($cart);
        return redirect ('cart');
    }

}