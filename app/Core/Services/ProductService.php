<?php
/**
 * Created by PhpStorm.
 * User: KnightSaber77
 * Date: 1/15/2018
 * Time: 3:37 PM
 */

namespace App\Core\Services;

use App\Core\Models\Product;
use App\Core\Repositories\ProductRepository;

class ProductService
{
    private $productRepository;
    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }

    public function productAdd($productName, $providerId, $price, $tipe)
    {
        $product = new Product();
        $product->product_name = $productName;
        $product->provider_id = $providerId;
        $product->price = $price;
        $product->tipe = $tipe;

        $this->productRepository->productAdd($product);
    }

    public function productDelete($product)
    {
        $this->productRepository->productDelete($product);
    }

    public function productEdit($product, $request)
    {
        $product->product_name = $request->input('product_name');
        $product->provider_id = $request->input('provider_id');
        $product->price = $request->input('price');
        $product->tipe = $request->input('tipe');

        $this->productRepository->productUpdate($product);
    }

    public function getAll()
    {
        return $this->productRepository->getAll();
    }

    public function getOne($product_name)
    {
        return $this->productRepository->getOne($product_name);
    }
}