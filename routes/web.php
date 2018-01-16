<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Core\Models\Product;
use App\Core\Models\Provider;
use App\Http\Middleware\AdminLoginMiddleware;
use Illuminate\Http\Request;

Route::get('/admin', 'Core\LoginController@showLayout');

Route::post('/admin/login', 'Core\LoginController@login');

Route::get('/admin/logout', 'Core\LoginController@logout');

Route::get('admin/dashboard', function () {
    return view('dashboard');
});

Route::get('/admin/provider', 'Core\ProviderController@providershow')->middleware(AdminLoginMiddleware::class);

Route::get('/admin/provider/new', 'Core\ProviderController@showNew')->middleware(AdminLoginMiddleware::class);

Route::post('/admin/createnewprovider', 'Core\ProviderController@provideradd')->middleware(AdminLoginMiddleware::class);

Route::delete('/admin/provider/delete/{provider}', 'Core\ProviderController@providerdelete')->middleware(AdminLoginMiddleware::class);

Route::get('/admin/provider/edit/{id}', 'Core\ProviderController@providerShowOne')->middleware(AdminLoginMiddleware::class);

Route::post('admin/provider/editprovider/{id}', 'Core\ProviderController@providerEdit')->middleware(AdminLoginMiddleware::class);

Route::get('admin/product', function() {
    $data['products'] = Product::all();
    $data2['providers'] = Provider::all();
    return view('product', $data, $data2) ;
});

Route::get('admin/product/new', function() {
    $data['providers'] = Provider::all();
    return view('product_new', $data) ;
});

Route::post('admin/createnewproduct', function(\Illuminate\Http\Request $request){
    $product = new Product();
    $product->product_name = $request->product_name;
    $product->provider_id = $request->provider_id;
    $product->price = $request->price;
    $product->tipe = $request->tipe;

    $product->save();
    return redirect('admin/product');
});

Route::delete('/admin/product/delete/{product}', function (Product $product) {
    $product->delete();
    return redirect('/admin/product');
});

Route::get('admin/product/edit/{product_name}', function($product_name){
    $data['product'] = Product::find($product_name);
    $data2['providers'] = Provider::all();
    return view('product_edit', $data, $data2);
});

Route::post('admin/product/editproduct/{product_name}', function($product_name, Request $request){
    $product = Product::find($product_name);

    $product->provider_id = $request->input('provider_id');
    $product->price = $request->input('price');
    $product->tipe = $request->input('tipe');
    $product->product_name = $request->input('product_name');

    $product->save();
    return redirect('/admin/product');
});