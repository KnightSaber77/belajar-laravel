<?php
/**
 * Created by PhpStorm.
 * User: KnightSaber77
 * Date: 1/11/2018
 * Time: 5:32 PM
 */

namespace App\Core\Services;

use App\Core\Models\Provider;
use App\Core\Repositories\ProviderRepository;
class ProviderService {
    private $providerRepository;
    public function __construct(){
        $this->providerRepository = new ProviderRepository();
    }

    public function provideradd($providername, $description){
        $provider = new Provider();
        $provider->providername = $providername;
        $provider->description = $description;

        $this->providerRepository->provideradd($provider);
    }
}
