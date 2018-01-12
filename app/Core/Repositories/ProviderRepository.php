<?php
/**
 * Created by PhpStorm.
 * User: KnightSaber77
 * Date: 1/11/2018
 * Time: 5:15 PM
 */

namespace App\Core\Repositories;

use App\Core\Models\Provider;

class ProviderRepository{
    public function getAll(){
        return Provider::get();
    }

    public function provideradd($provider){
        $provider->save();
    }

    public function providerdelete($provider){
        $provider->delete();
    }

    public function providershow($data){

    }

    public function provideredit($provider){
        $provider->save();
    }
}