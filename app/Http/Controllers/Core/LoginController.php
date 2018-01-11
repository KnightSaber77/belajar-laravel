<?php

namespace App\Http\Controllers\Core;

use App\Core\Services\LoginService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    private $loginService;
    public function __construct() {
        $this->loginService = new LoginService();
    }

    public function login(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');

        $isAdminExist = $this->loginService->login($username, $password);
        dd($isAdminExist);
    }
}
