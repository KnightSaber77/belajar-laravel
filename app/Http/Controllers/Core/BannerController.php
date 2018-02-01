<?php
/**
 * Created by PhpStorm.
 * User: KnightSaber77
 * Date: 1/23/2018
 * Time: 5:22 PM
 */

namespace App\Http\Controllers\Core;

use App\Core\Models\Banner;
use App\Core\Services\BannerService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class BannerController
{
    private $bannerService;

    public function __construct()
    {
        $this->bannerService = new BannerService;
    }

    public function bannerShow()
    {
        $banners = $this->bannerService->getAll();
        $data['banners'] = $banners;
        return view('banner', $data);
    }

    public function showNew()
    {
        return view('banner_new');
    }

    public function bannerAdd(Request $request)
    {
        if (Input::hasFile('file')) {
            $file = Input::file('file');

            $name = $request->input('name');
            $path = "/banner_pulta/" . $file->getClientOriginalName();

            $this->bannerService->bannerAdd($file, $name, $path);
            return redirect('/admin/banner');
        }
    }

    public function bannerDelete($id)
    {
        $banner = $this->bannerService->getOne($id);
        $this->bannerService->bannerDelete($banner);
        return redirect('/admin/banner');
    }
}