<?php
/**
 * Created by PhpStorm.
 * User: KnightSaber77
 * Date: 1/11/2018
 * Time: 5:15 PM
 */

namespace App\Core\Repositories;

use App\Core\Models\Provider;

class ProviderRepository {
    public function getAll()
    {
        return Provider::get();
    }

    public function providerAdd($provider)
    {
        $provider->save();
    }

    public function providerDelete($provider)
    {
        $provider->delete();
    }

    public function providerGetOne($id)
    {
        return Provider::find($id);
    }

    public function providerUpdate($provider)
    {
        $provider->save();
    }
}