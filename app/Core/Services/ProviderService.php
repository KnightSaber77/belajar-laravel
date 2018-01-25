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

    public function providerAdd($providerName, $description, $prefixes)
    {
        $provider = new Provider();
        $provider->provider_name = $providerName;
        $provider->description = $description;
        $provider->prefixes = $prefixes;

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
        $provider->prefixes = $request->input('prefixes');

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

    public function getProductsByPhoneNumberAndType($phoneNumber, $tipe)
    {
        $providers = $this->providerRepository->getAll();
        $phonePrefix = substr($phoneNumber, 0, 4);
        $productArray = [];
        foreach ($providers as $provider) {
            $providerPrefixes = explode(',', $provider->prefixes);
            if (in_array($phonePrefix, $providerPrefixes)) {
                foreach($provider->products as $product) {
                    if ($product->tipe == $tipe) {
                        array_push($productArray, $product);
                    }
                }
            }
        }

        return($productArray);
    }
}
