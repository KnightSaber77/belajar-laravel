<?php
/**
 * Created by PhpStorm.
 * User: KnightSaber77
 * Date: 1/23/2018
 * Time: 5:22 PM
 */

namespace App\Http\Controllers\Core;

use App\Core\Models\Admin;
use App\Core\Services\AdminService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $adminService;

    public function __construct()
    {
        $this->adminService = new AdminService;
    }

    public function adminShow()
    {
        $admins = $this->adminService->getAll();
        $data['admins'] = $admins;
        return view('user', $data);
    }

    public function showNew()
    {
        return view('user_new');
    }

    public function adminAdd(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $description = $request->input('description');

        $this->adminService->adminAdd($username, $password, $description);
        return redirect('admin/user');
    }

    public function showEdit($username)
    {
        $admin = $this->adminService->getOne($username);
        $data['admin'] = $admin;
        return view('user_edit', $data);
    }

    public function adminEdit($username, Request $request)
    {
        $admin = $this->adminService->getOne($username);

        $this->adminService->adminEdit($admin, $request);
        return redirect('admin/user');
    }

    public function adminDelete($username)
    {
        $admin = $this->adminService->getOne($username);

        $this->adminService->adminDelete($admin);
        return redirect('admin/user');
    }
}