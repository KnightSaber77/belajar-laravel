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
        $productCode = $request->input('product_code');
        $productName = $request->input('product_name');
        $providerId = $request->input('provider_id');
        $price = $request->input('price');
        $tipe = $request->input('tipe');
        $this->productService->productAdd($productCode, $productName, $providerId, $price, $tipe);

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

    public function productShowEdit($productCode)
    {
        $data['product'] = $this->productService->getOne($productCode);
        $data['providers'] = $this->providerService->getAll();
        return view('product_edit', $data);
    }

    public function productEdit($productCode, Request $request)
    {
        $product = $this->productService->getOne($productCode);

        $this->productService->productEdit($product, $request);
        return redirect('admin/product');
    }

    public function getProductsByPhoneNumber(Request $request)
    {
        $providers = $this->providerService->getAll();
        $phonePrefix = substr($request->get('nomor_hp'), 0, 4);
        $tipe = intval($request->get('tipe'));
        $productArray = [];
        foreach ($providers as $provider) {
             $providerPrefixes = explode(',', $provider->prefixes);
             if (in_array($phonePrefix, $providerPrefixes)){
                 foreach($provider->products as $product){
                     if ($product->tipe == $tipe) array_push($productArray, $product);
                 }
             }
        }

        return json_encode($productArray);
    }
}