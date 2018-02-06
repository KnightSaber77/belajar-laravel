<?php
/**
 * Created by PhpStorm.
 * User: KnightSaber77
 * Date: 1/11/2018
 * Time: 5:32 PM
 */

namespace App\Core\Services;

use App\Core\Models\Cart;
use App\Core\Repositories\CartRepository;

class CartService
{
    private $cartRepository;

    public function __construct()
    {
        $this->cartRepository = new CartRepository();
    }

    public function cartAdd($product_code, $nomor_hp)
    {
        $cart = new Cart();
        $cart->product_code = $product_code;
        $cart->nomor_hp = $nomor_hp;

        $this->cartRepository->cartAdd($cart);
    }

    public function cartDelete($cart)
    {
        $this->cartRepository->cartDelete($cart);
    }

    public function getAll()
    {
        return $this->cartRepository->getAll();
    }

    public function cartDeleteAll()
    {
        $this->cartRepository->cartDeleteAll();
    }
}