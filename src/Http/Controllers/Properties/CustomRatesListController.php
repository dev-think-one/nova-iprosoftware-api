<?php

namespace NovaIprosoftwareApi\Http\Controllers\Properties;

use Angecode\LaravelIproSoft\IproSoftwareFacade;
use Illuminate\Http\Request;
use NovaIprosoftwareApi\Http\Controllers\Controller;

class CustomRatesListController extends Controller
{
    protected function getList(Request $request): \Psr\Http\Message\ResponseInterface
    {
        return IproSoftwareFacade::getPropertyCustomRates($request->route('ipro_id'), [
            'query' => [
                'latestRates' => 'today',
            ],
        ]);
    }
}
