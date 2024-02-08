<?php

namespace NovaIprosoftwareApi\Http\Controllers\Properties\Offers;

use Illuminate\Http\Request;
use LaravelIproSoftwareApi\IproSoftwareFacade;
use NovaIprosoftwareApi\Http\Controllers\Controller;

class OffersListController extends Controller
{
    protected function getList(Request $request): \LaravelIproSoftwareApi\IproApiResponse
    {
        return IproSoftwareFacade::getSpecialOffersList([
            'query' => $request->only([
                'propertyID',
                'type',
            ]),
        ]);
    }
}
