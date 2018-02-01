<?php
/**
 * Created by PhpStorm.
 * User: KnightSaber77
 * Date: 1/25/2018
 * Time: 5:15 PM
 */

namespace App\Core\Services;

use App\Core\Models\Banner;
use App\Core\Repositories\BannerRepository;

class BannerService
{
    private $bannerRepository;
    public function __construct()
    {
        $this->bannerRepository = new BannerRepository();
    }

    public function getAll()
    {
        return $this->bannerRepository->getAll();
    }

    public function getOne($id)
    {
        return $this->bannerRepository->getOne($id);
    }

    public function bannerAdd($file, $name, $path)
    {
        $banner = new Banner();
        $banner->name = $name;
        $banner->path = $path;
        $file->move('banner_pulta', $file->getClientOriginalName());

        $this->bannerRepository->bannerAdd($banner);
    }

    public function bannerDelete($banner)
    {
        $file_path = public_path().$banner->path;
        unlink($file_path);
        $this->bannerRepository->bannerDelete($banner);
    }
}