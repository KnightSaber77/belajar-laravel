<?php
/**
 * Created by PhpStorm.
 * User: KnightSaber77
 * Date: 1/11/2018
 * Time: 11:00 AM
 */

namespace App\Core\Repositories;

use App\Core\Models\Admin;

class AdminRepository
{
    public function getByUsernameAndPassword($username, $password)
    {
        return Admin::where([
            ['username', '=', $username],
            ['password', '=', $password]
        ])->first();
    }

    public function getAll()
    {
        return Admin::all();
    }

    public function getOne($username)
    {
        return Admin::find($username);
    }

    public function adminAdd($admin)
    {
        $admin->save();
    }

    public function adminEdit($admin)
    {
        $admin->save();
    }

    public function adminDelete($admin)
    {
        $admin->delete();
    }
}