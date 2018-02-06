<?php
/**
 * Created by PhpStorm.
 * User: KnightSaber77
 * Date: 1/11/2018
 * Time: 5:15 PM
 */

namespace App\Core\Repositories;

use App\Core\Models\Cart;

class CartRepository {
    public function cartAdd($cart)
    {
        $cart->save();
    }

    public function cartDelete($cart)
    {
        $cart->delete();
    }


    public function getAll()
    {
        return Cart::all();
    }
}