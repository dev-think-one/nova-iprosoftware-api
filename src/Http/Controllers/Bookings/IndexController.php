<?php

namespace NovaIprosoftwareApi\Http\Controllers\Bookings;

use Angecode\LaravelIproSoft\IproSoftwareFacade;
use Illuminate\Http\Request;
use NovaIprosoftwareApi\Http\Controllers\Controller;

class IndexController extends Controller
{
    protected function getList(Request $request): \Angecode\LaravelIproSoft\IproApiResponse
    {
        return IproSoftwareFacade::searchBookings([
            'query' => array_filter(json_decode($request->input('search') ?: '', true)),
        ]);
    }
}
