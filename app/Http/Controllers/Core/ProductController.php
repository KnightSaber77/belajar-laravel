<?php

namespace App\Http\Controllers\Core;


use App\Core\Models\Product;
use App\Core\Models\Provider;
use App\Core\Services\ProductService;
use App\Core\Services\ProviderService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: KnightSaber77
 * Date: 1/16/2018
 * Time: 3:47 PM
 */

class ProductController extends Controller
{
    private $productService;
    private $providerService;

    public function __construct()
    {
        $this->productService = new ProductService();
        $this->providerService = new ProviderService();
    }

    public function productShow()
    {
        $data['products'] = $this->productService->getAll();
        $data['providers'] = $this->providerService->getAll();
        return view('product', $data);
    }
    public function productAdd(Request $request)
    {
        $productName = $request->input('product_name');
        $providerId = $request->input('provider_id');
        $price = $request->input('price');
        $tipe = $request->input('tipe');
        $this->productService->productAdd($productName, $providerId, $price, $tipe);

        return redirect('admin/product');
    }

    public function productDelete(Product $product)
    {
        $this->productService->productDelete($product);
        return redirect('/admin/product');
    }

    public function productShowNew()
    {
        $data['providers'] = $this->providerService->getAll();
        return view('product_new', $data);
    }

    public function productShowEdit($product_name)
    {
        $data['product'] = $this->productService->getOne($product_name);
        $data['providers'] = $this->providerService->getAll();
        return view('product_edit', $data);
    }

    public function productEdit($product_name, Request $request)
    {
        $product = $this->productService->getOne($product_name);

        $this->productService->productEdit($product, $request);
        return redirect('admin/product');
    }
}