<?php

namespace NovaIprosoftwareApi\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Response;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    abstract protected function getList(Request $request): \Angecode\LaravelIproSoft\IproApiResponse;

    public function __invoke(Request $request)
    {
        try {
            $data = json_decode((string)$this->getList($request)->getBody(), true);
        } catch (\Angecode\IproSoftware\Exceptions\IproSoftwareApiAccessTokenException $e) {
            return Response::json([
                'response' => (array) $e->getResponse(),
            ], 500);
        }

        return Response::json([
            'data' => $data,
        ]);
    }
}
