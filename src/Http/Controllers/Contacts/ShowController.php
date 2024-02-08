<?php

namespace NovaIprosoftwareApi\Http\Controllers\Contacts;

use Illuminate\Http\Request;
use LaravelIproSoftwareApi\IproSoftwareFacade;
use NovaIprosoftwareApi\Http\Controllers\Controller;

class ShowController extends Controller
{
    protected function getList(Request $request): \LaravelIproSoftwareApi\IproApiResponse
    {
        return IproSoftwareFacade::getContact($request->route('ipro_id'));
    }
}
