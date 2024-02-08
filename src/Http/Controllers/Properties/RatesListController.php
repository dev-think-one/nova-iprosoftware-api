<?php

namespace NovaIprosoftwareApi\Http\Controllers\Properties;

use Illuminate\Http\Request;
use LaravelIproSoftwareApi\IproSoftwareFacade;
use NovaIprosoftwareApi\Http\Controllers\Controller;

class RatesListController extends Controller
{
    protected function getList(Request $request): \LaravelIproSoftwareApi\IproApiResponse
    {
        return IproSoftwareFacade::getPropertyRates($request->route('ipro_id'));
    }
}
