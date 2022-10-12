<?php

namespace NovaIprosoftwareApi\Http\Controllers\Settings\Attributes;

use Angecode\LaravelIproSoft\IproSoftwareFacade;
use Illuminate\Http\Request;
use NovaIprosoftwareApi\Http\Controllers\Controller;

class ListController extends Controller
{
    protected function getList(Request $request): \Angecode\LaravelIproSoft\IproApiResponse
    {
        return IproSoftwareFacade::getAttributesList();
    }
}
