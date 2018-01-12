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

use App\Core\Models\Provider;
use Illuminate\Http\Request;

Route::get('/admin', function () {
    return view('login');
});

Route::post('/admin/login', 'Core\LoginController@login');


//Tampilin List Provider yang ada, menu home provider
Route::get('/admin/provider', 'Core\ProviderController@providershow');

//Add Provider

Route::get('/admin/provider/new', function () {
    return view('providernew');
});

Route::post('/admin/createnewprovider', 'Core\ProviderController@provideradd');

Route::delete('/admin/provider/{provider}', 'Core\ProviderController@providerdelete');

Route::get('/admin/provider/edit/{id}', function ($id) {
    $data['provider'] = Provider::find($id);
    return view('provideredit', $data);
});

Route::post('admin/provider/editprovider/{id}', 'Core\ProviderController@provideredit');