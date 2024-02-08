<?php


namespace NovaIprosoftwareApi\Http\Controllers\Settings\Sources;

use Illuminate\Http\Request;
use LaravelIproSoftwareApi\IproSoftwareFacade;
use NovaIprosoftwareApi\Http\Controllers\Controller;

class ListController extends Controller
{
    protected function getList(Request $request): \LaravelIproSoftwareApi\IproApiResponse
    {
        return IproSoftwareFacade::getSourcesList();
    }
}
