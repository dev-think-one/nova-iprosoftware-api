<?php

namespace NovaIprosoftwareApi\Http\Controllers\Properties\Offers;

use Angecode\LaravelIproSoft\IproSoftwareFacade;
use Illuminate\Http\Request;
use NovaIprosoftwareApi\Http\Controllers\Controller;

class OffersListController extends Controller
{
    protected function getList(Request $request): \Angecode\LaravelIproSoft\IproApiResponse
    {
        return IproSoftwareFacade::getSpecialOffersList([
            'query' => $request->only([
                'propertyID',
                'type',
            ]),
        ]);
    }
}
