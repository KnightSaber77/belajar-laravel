<?php
/**
 * Created by PhpStorm.
 * User: KnightSaber77
 * Date: 1/11/2018
 * Time: 11:00 AM
 */

namespace App\Core\Repositories;

use App\Core\Models\Admin;

class AdminRepository {
    public function getByUsernameAndPassword($username, $password)
    {
        return Admin::where([
            ['username', '=', $username],
            ['password', '=', $password]
        ])->first();
    }
}