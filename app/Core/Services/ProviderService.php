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

class ProviderService
{
    private $providerRepository;
    public function __construct()
    {
        $this->providerRepository = new ProviderRepository();
    }

    public function providerAdd($providerName, $description)
    {
        $provider = new Provider();
        $provider->provider_name = $providerName;
        $provider->description = $description;

        $this->providerRepository->providerAdd($provider);
    }

    public function providerDelete($provider)
    {
        $this->providerRepository->providerDelete($provider);
    }



    public function providerEdit($provider, $request)
    {
        $provider->provider_name = $request->input('provider_name');
        $provider->description = $request->input('description');

        $this->providerRepository->providerUpdate($provider);
    }

    public function providerGetOne($id)
    {
        return $this->providerRepository->providerGetOne($id);
    }

    public function getAll()
    {
        return $this->providerRepository->getAll();
    }
}
