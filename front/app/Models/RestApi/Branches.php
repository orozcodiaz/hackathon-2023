<?php

namespace App\Models\RestApi;

use App\Models\RestApiConnector;
use Illuminate\Http\JsonResponse;

class Branches extends RestApiConnector
{
    public function getBranches($asReturn = false)
    {
        $response = $this->getBackendData('/api/v1/branches');

        if ($asReturn === true) {
            return json_decode($response, 1);
        }

        return response()->json(json_decode($response, 1));
    }
}