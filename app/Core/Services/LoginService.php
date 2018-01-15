<?php
/**
 * Created by PhpStorm.
 * User: KnightSaber77
 * Date: 1/11/2018
 * Time: 10:58 AM
 */

namespace App\Core\Services;

use App\Core\Repositories\AdminRepository;
use Illuminate\Support\Facades\Session;

class LoginService
{

    private $adminRepository;

    public function __construct()
    {
        $this->adminRepository = new AdminRepository();
    }


    public function login($username, $password)
    {
        $admin = $this->adminRepository->getByUsernameAndPassword($username, $password);

        if (!empty($admin)) {
            Session::put('username', $admin->username);
            Session::save();
        }
        return $admin;
    }
}