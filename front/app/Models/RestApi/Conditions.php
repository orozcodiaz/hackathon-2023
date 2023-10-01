<?php

namespace App\Models\RestApi;

use App\Models\RestApiConnector;
use Illuminate\Http\JsonResponse;

class Conditions extends RestApiConnector
{
    public function getConditions($asReturn = false)
    {
        $response = $this->getBackendData('/api/v1/conditions');

        if ($asReturn === true) {
            return json_decode($response, 1);
        }

        return response()->json(json_decode($response, 1));
    }
}