<?php

namespace App\Models\RestApi;

use App\Models\RestApiConnector;

class Conditions extends RestApiConnector
{
    public function getConditions()
    {
        // @TODO: call S api, get products as JSON
        $response = [
            'New',
            'Like New',
            'Good',
            'Fair',
            'Poor',
        ];

        return json_encode($response);
    }
}