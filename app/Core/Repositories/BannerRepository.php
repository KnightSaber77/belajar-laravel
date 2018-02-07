<?php
/**
 * Created by PhpStorm.
 * User: KnightSaber77
 * Date: 1/11/2018
 * Time: 11:00 AM
 */

namespace App\Core\Repositories;

use App\Core\Models\Banner;

class BannerRepository
{
    public function getAll()
    {
        return Banner::all();
    }

    public function getOne($id)
    {
        return Banner::find($id);
    }

    public function bannerAdd($banner)
    {
        $banner->save();
    }

    public function bannerDelete($banner)
    {
        $banner->delete();
    }
}