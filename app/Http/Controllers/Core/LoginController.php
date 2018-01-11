<?php

namespace app\Http\Controllers\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request){
        dd($request->input());
    }
}
