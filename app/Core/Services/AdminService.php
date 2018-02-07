<?php
/**
 * Created by PhpStorm.
 * User: KnightSaber77
 * Date: 1/25/2018
 * Time: 5:15 PM
 */

namespace App\Core\Services;

use App\Core\Models\Admin;
use App\Core\Repositories\AdminRepository;

class AdminService
{
    private $adminRepository;
    public function __construct()
    {
        $this->adminRepository = new AdminRepository();
    }

    public function getAll()
    {
        return $this->adminRepository->getAll();
    }

    public function getOne($username)
    {
        return $this->adminRepository->getOne($username);
    }

    public function adminAdd($username, $password, $description)
    {
        $admin = new Admin();
        $admin->username = $username;
        $admin->password = $password;
        $admin->description = $description;

        $this->adminRepository->adminAdd($admin);
    }

    public function adminEdit($admin, $request)
    {
        $admin->password = $request->input('password');
        $admin->description = $request->input('description');

        $this->adminRepository->adminEdit($admin);
    }

    public function adminDelete($admin)
    {
        $this->adminRepository->adminDelete($admin);
    }
}