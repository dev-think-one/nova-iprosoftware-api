<?php

namespace NovaIprosoftwareApi\Http\Controllers\Bookings;

use Illuminate\Http\Request;
use LaravelIproSoftwareApi\IproSoftwareFacade;
use NovaIprosoftwareApi\Http\Controllers\Controller;

class IndexController extends Controller
{
    protected function getList(Request $request): \LaravelIproSoftwareApi\IproApiResponse
    {
        return IproSoftwareFacade::searchBookings([
            'query' => array_filter(json_decode($request->input('search') ?: '', true)),
        ]);
    }
}
