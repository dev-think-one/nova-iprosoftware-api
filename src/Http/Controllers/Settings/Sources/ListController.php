<?php


namespace NovaIprosoftwareApi\Http\Controllers\Settings\Sources;

use Angecode\LaravelIproSoft\IproSoftwareFacade;
use Illuminate\Http\Request;
use NovaIprosoftwareApi\Http\Controllers\Controller;

class ListController extends Controller
{
    protected function getList(Request $request): \Psr\Http\Message\ResponseInterface
    {
        return IproSoftwareFacade::getSourcesList();
    }
}
