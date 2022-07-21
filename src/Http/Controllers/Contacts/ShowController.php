<?php

namespace NovaIprosoftwareApi\Http\Controllers\Contacts;

use Angecode\LaravelIproSoft\IproSoftwareFacade;
use Illuminate\Http\Request;
use NovaIprosoftwareApi\Http\Controllers\Controller;

class ShowController extends Controller
{
    protected function getList(Request $request): \Psr\Http\Message\ResponseInterface
    {
        return IproSoftwareFacade::getContact($request->route('ipro_id'));
    }
}
