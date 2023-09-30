<?php

namespace App\Models\RestApi;

use App\Models\RestApiConnector;
use Illuminate\Http\JsonResponse;

class Conditions extends RestApiConnector
{
    public function getConditions()
    {
        // @TODO: call S api, get products as JSON
        $response = [
            ['id' => 1, 'name' => 'New'],
            ['id' => 2, 'name' => 'Like New'],
            ['id' => 3, 'name' => 'Good'],
            ['id' => 4, 'name' => 'Fair'],
            ['id' => 5, 'name' => 'Poor']
        ];

        //return response()->json($response);
        return json_encode($response);
    }
}