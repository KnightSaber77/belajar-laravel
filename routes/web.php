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
Route::get('/admin/provider', function () {
    return view('provider');
});

//Add Provider

Route::get('/admin/provider/new', function () {
    return view('providernew');
});

Route::post('/admin/createnewprovider', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'providername' => 'required',
        'description' => 'required'
    ]);

    $provider = new Provider();
    $provider->providername = $request->providername;
    $provider->description = $request->description;

    $provider->save();
    return redirect('admin/provider');

});

Route::delete('/admin/provider/{provider}', function (Provider $provider) {
    //
});