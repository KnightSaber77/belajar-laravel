<?php

namespace App\Http\Controllers\Core;


use App\Core\Models\Product;
use App\Core\Models\Provider;
use App\Core\Services\ProductService;
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
    public function __construct()
    {
        $this->productService = new ProductService();
    }

    public function productShow()
    {
        $data['products'] = Product::all();
        $data2['providers'] = Provider::all();
        return view('product', $data, $data2) ;
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
        $data['providers'] = Provider::all();
        return view('product_new', $data);
    }

    public function productShowEdit($product_name)
    {
        $data['product'] = Product::find($product_name);
        $data2['providers'] = Provider::all();
        return view('product_edit', $data, $data2);
    }

    public function productEdit($product_name, Request $request)
    {
        $product = Product::find($product_name);

        $this->productService->productEdit($product, $request);
        return redirect('admin/product');
    }
}