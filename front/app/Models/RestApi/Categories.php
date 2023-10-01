<?php

namespace App\Models\RestApi;

use App\Models\RestApiConnector;
use Illuminate\Http\JsonResponse;

class Categories extends RestApiConnector
{
    public function getCategories($asReturn = false)
    {
        $response = $this->getBackendData('/api/v1/categories');

        if ($asReturn === true) {
            return json_decode($response, 1);
        }

        return response()->json(json_decode($response, 1));
    }
}