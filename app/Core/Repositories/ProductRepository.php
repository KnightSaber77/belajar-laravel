<?php
/**
 * Created by PhpStorm.
 * User: KnightSaber77
 * Date: 1/15/2018
 * Time: 3:37 PM
 */

namespace App\Core\Repositories;

use App\Core\Models\Product;

class ProductRepository
{
    public function productAdd($product)
    {
        $product->save();
    }

    public function productDelete($product)
    {
        $product->delete();
    }

    public function productUpdate($product)
    {
        $product->save();
    }

    public function getAll()
    {
        return Product::all();
    }

    public function getOne($productCode)
    {
        return Product::find($productCode);
    }
}