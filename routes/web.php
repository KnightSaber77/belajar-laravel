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
use App\Core\Models\Transaction;
use App\Http\Middleware\AdminLoginMiddleware;
use Illuminate\Http\Request;

Route::get('/', function(){
    $data['providers'] = Provider::all();
    $data['products'] = Product::all();
    return view('home', $data);
});

Route::get('/add/{product}', function ($product_name){
    $data['product'] = Product::find($product_name);
    $data['providers'] = Provider::all();
    return view('new_item', $data);
});

Route::post('/addtocart/{product}', function ($product_name, Request $request){
    $product = Product::find($product_name);
    $transaction = new Transaction();

    $transaction->product_name = $product->product_name;
    $transaction->nomor_hp = $request->nomor_hp;
    $transaction->status = 2;
    $transaction->price = $product->price;
    $transaction->save();
    return view('/');
});
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

Route::get('admin/product', 'Core\ProductController@productShow')->middleware(AdminLoginMiddleware::class);

Route::get('admin/product/new', 'Core\ProductController@productShowNew')->middleware(AdminLoginMiddleware::class);

Route::post('admin/createnewproduct', 'Core\ProductController@productAdd')->middleware(AdminLoginMiddleware::class);

Route::delete('/admin/product/delete/{product}', 'Core\ProductController@productDelete')->middleware(AdminLoginMiddleware::class);

Route::get('admin/product/edit/{product_code}', 'Core\ProductController@productShowEdit')->middleware(AdminLoginMiddleware::class);

Route::post('admin/product/editproduct/{product_name}', 'Core\ProductController@productEdit')->middleware(AdminLoginMiddleware::class);

Route::get('product', 'Core\ProductController@getProductsByPhoneNumber');

Route::get('checknumber', function($productArray, $nomor_hp){
    return view('/new_item', $productArray, $nomor_hp);
});

Route::get('testnumber', function(Request $request) {
   $nomorHp = $request->get('nomor_hp');
   return('nomor_hp = ' . $nomorHp);
});

Route::get('/addtransaction', function (Request $request) {
    dd($request->all());
    return view('payment');
});