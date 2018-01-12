<?php
/**
 * Created by PhpStorm.
 * User: KnightSaber77
 * Date: 1/11/2018
 * Time: 5:45 PM
 */

namespace App\Http\Controllers\Core;

use App\Core\Models\Provider;
use App\Core\Services\ProviderService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProviderController extends Controller
{
    private $providerService;
    public function __construct()
    {
        $this->providerService = new ProviderService();
    }

    public function providerAdd(Request $request)
    {
        $providerName = $request->input('provider_name');
        $description = $request->input('description');
        $this->providerService->providerAdd($providerName, $description);

        return redirect('admin/provider');
    }

    public function providerDelete(Provider $provider)
    {
        $this->providerService->providerDelete($provider);
        return redirect('/admin/provider');
    }

    public function providerShow()
    {
        $data['providers'] = Provider::all();
        return view('provider', $data);
    }

    public function providerShowOne($id)
    {
        $data['provider'] = $this->providerService->getOne($id);
        return view('provider_edit', $data);
    }

    public function showNew()
    {
        return view('provider_new');
    }

    public function providerEdit($id, Request $request)
    {
        $provider = Provider::find($id);

        $this->providerService->providerEdit($provider, $request);
        return redirect('admin/provider');
    }
}
