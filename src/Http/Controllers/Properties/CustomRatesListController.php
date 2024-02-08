<?php

namespace NovaIprosoftwareApi\Http\Controllers\Properties;

use Illuminate\Http\Request;
use LaravelIproSoftwareApi\IproSoftwareFacade;
use NovaIprosoftwareApi\Http\Controllers\Controller;

class CustomRatesListController extends Controller
{
    protected function getList(Request $request): \LaravelIproSoftwareApi\IproApiResponse
    {
        return IproSoftwareFacade::getPropertyCustomRates($request->route('ipro_id'), [
            'query' => [
                'latestRates' => 'today',
            ],
        ]);
    }
}
