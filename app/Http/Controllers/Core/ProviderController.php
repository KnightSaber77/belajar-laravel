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
    public function __construct() {
        $this->providerService = new ProviderService();
    }

    public function provideradd(Request $request){
        $providername = $request->input('providername');
        $description = $request->input('description');
        $this->providerService->provideradd($providername, $description);

        return redirect('admin/provider');
    }

    public function providerdelete(Provider $provider){
        $this->providerService->providerdelete($provider);
        return redirect('/admin/provider');
    }

    public function providershow(){
        $data['providers'] = Provider::all();
        $this->providerService->providershow($data);
        return view('provider', $data);
    }

    public function providerShowOne($id)
    {
        $data['provider'] = $this->providerService->getOne($id);
        return view('provideredit', $data);
    }

    public function provideredit($id, Request $request){
        $provider = Provider::find($id);

        $this->providerService->provideredit($provider, $request);
        return redirect('admin/provider');
    }
}
