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

use App\Http\Middleware\AdminLoginMiddleware;

Route::get('/admin', 'Core\LoginController@showLayout');

Route::post('/admin/login', 'Core\LoginController@login');

Route::get('/admin/logout', 'Core\LoginController@logout');

Route::get('admin/dashboard', function () {
    return view('dashboard');
});

Route::get('/admin/provider', 'Core\ProviderController@providershow')->middleware(AdminLoginMiddleware::class);

Route::get('/admin/provider/new', 'Core\ProviderController@showNew')->middleware(AdminLoginMiddleware::class);

Route::post('/admin/createnewprovider', 'Core\ProviderController@provideradd')->middleware(AdminLoginMiddleware::class);

Route::delete('/admin/provider/{provider}', 'Core\ProviderController@providerdelete')->middleware(AdminLoginMiddleware::class);

Route::get('/admin/provider/edit/{id}', 'Core\ProviderController@providerShowOne')->middleware(AdminLoginMiddleware::class);

Route::post('admin/provider/editprovider/{id}', 'Core\ProviderController@providerEdit')->middleware(AdminLoginMiddleware::class);