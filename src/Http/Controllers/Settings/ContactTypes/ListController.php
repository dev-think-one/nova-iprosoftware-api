<?php


namespace NovaIprosoftwareApi\Http\Controllers\Settings\ContactTypes;

use Angecode\LaravelIproSoft\IproSoftwareFacade;
use Illuminate\Http\Request;
use NovaIprosoftwareApi\Http\Controllers\Controller;

class ListController extends Controller
{
    protected function getList(Request $request): \Psr\Http\Message\ResponseInterface
    {
        return IproSoftwareFacade::getContactTypesList();
    }
}
