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

Route::get('/admin', 'Core\LoginController@showLayout');

Route::post('/admin/login', 'Core\LoginController@login');

Route::get('/admin/provider', 'Core\ProviderController@providershow');

Route::get('/admin/provider/new', 'Core\ProviderController@showNew');

Route::post('/admin/createnewprovider', 'Core\ProviderController@provideradd');

Route::delete('/admin/provider/{provider}', 'Core\ProviderController@providerdelete');

Route::get('/admin/provider/edit/{id}', 'Core\ProviderController@providerShowOne');

Route::post('admin/provider/editprovider/{id}', 'Core\ProviderController@providerEdit');