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

use App\Core\Models\Cart;
use App\Core\Models\Payment;
use App\Core\Models\Product;
use App\Core\Models\Provider;
use App\Core\Models\Transaction;
use App\Core\Models\Admin;
use App\Core\Models\Banner;
use App\Http\Middleware\AdminLoginMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

Route::get('/', 'Core\CheckOutController@showHome');

Route::get('product', 'Core\ProductController@getProductsByPhoneNumberAndType');

Route::get('addtocart', function(Request $request){
    $cart = new Cart();
    $cart->product_code = $request->input('product_code');
    $cart->nomor_hp = $request->input('nomor_hp');

    $cart->save();
    return view('home');
});

Route::delete('/cart/delete/{cart}', function(Cart $cart){
    $cart->delete();
    return redirect ('/cart');
});

Route::get('/cart', 'Core\CheckOutController@transactionCart');

Route::get('checkout/', 'Core\CheckOutController@checkOut');

Route::get('lacak', 'Core\PaymentController@showSearchHome');

Route::get('status', 'Core\PaymentController@searchPaymentById');

Route::get('/admin', 'Core\LoginController@showLayout');

Route::post('/admin/login', 'Core\LoginController@login');

Route::get('/admin/logout', 'Core\LoginController@logout');

Route::get('admin/dashboard', function () {
    return view('admin_payment');
});

Route::get('/admin/provider', 'Core\ProviderController@providershow')->middleware(AdminLoginMiddleware::class);

Route::get('/admin/provider/new', 'Core\ProviderController@showNew')->middleware(AdminLoginMiddleware::class);

Route::post('/admin/provider/new', 'Core\ProviderController@provideradd')->middleware(AdminLoginMiddleware::class);

Route::delete('/admin/provider/delete/{provider}', 'Core\ProviderController@providerdelete')->middleware(AdminLoginMiddleware::class);

Route::get('/admin/provider/edit/{id}', 'Core\ProviderController@providerShowOne')->middleware(AdminLoginMiddleware::class);

Route::post('admin/provider/edit/{id}', 'Core\ProviderController@providerEdit')->middleware(AdminLoginMiddleware::class);

Route::get('admin/product', 'Core\ProductController@productShow')->middleware(AdminLoginMiddleware::class);

Route::get('admin/product/new', 'Core\ProductController@productShowNew')->middleware(AdminLoginMiddleware::class);

Route::post('admin/product/new', 'Core\ProductController@productAdd')->middleware(AdminLoginMiddleware::class);

Route::delete('/admin/product/delete/{product}', 'Core\ProductController@productDelete')->middleware(AdminLoginMiddleware::class);

Route::get('admin/product/edit/{product_code}', 'Core\ProductController@productShowEdit')->middleware(AdminLoginMiddleware::class);

Route::post('admin/product/edit/{product_code}', 'Core\ProductController@productEdit')->middleware(AdminLoginMiddleware::class);

Route::get('admin/payment', 'Core\PaymentController@showAdminPayment')->middleware(AdminLoginMiddleware::class);

Route::get('admin/payment/{payment_id}', 'Core\PaymentController@showAdminPaymentStatus')->middleware(AdminLoginMiddleware::class);

Route::get('admin/user', 'Core\AdminController@adminShow')->middleware(AdminLoginMiddleware::class);

Route::get('admin/user/new', 'Core\AdminController@showNew')->middleware(AdminLoginMiddleware::class);

Route::post('admin/user/new', 'Core\AdminController@adminAdd')->middleware(AdminLoginMiddleware::class);

Route::get('admin/user/edit/{username}', 'Core\AdminController@showEdit')->middleware(AdminLoginMiddleware::class);

Route::post('admin/user/edit/{username}', 'Core\AdminController@adminEdit')->middleware(AdminLoginMiddleware::class);

Route::delete('admin/user/delete/{username}', 'Core\AdminController@adminDelete')->middleware(AdminLoginMiddleware::class);

Route::get('test', function(){
   return view('test');
});

Route::get('admin/banner', 'Core\BannerController@bannerShow')->middleware(AdminLoginMiddleware::class);

Route::get('admin/banner/new', 'Core\BannerController@showNew')->middleware(AdminLoginMiddleware::class);

Route::post('upload', 'Core\BannerController@bannerAdd')->middleware(AdminLoginMiddleware::class);

ROute::delete('/admin/banner/delete/{id}', 'Core\BannerController@bannerDelete')->middleware(AdminLoginMiddleware::class);