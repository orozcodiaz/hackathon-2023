<?php

namespace App\Models\RestApi;

use App\Models\RestApiConnector;

class Conditions extends RestApiConnector
{
    public function getConditions()
    {
        // @TODO: call S api, get products as JSON
        $response = [
            ['id' => 1, 'name' => 'Sofa'],
            ['id' => 2, 'name' => 'Chair'],
            ['id' => 3, 'name' => 'Table'],
            ['id' => 4, 'name' => 'Bed'],
            ['id' => 5, 'name' => 'Dresser'],
            ['id' => 6, 'name' => 'Nightstand'],
            ['id' => 7, 'name' => 'Wardrobe'],
            ['id' => 8, 'name' => 'Bookcase'],
            ['id' => 9, 'name' => 'Desk'],
            ['id' => 10, 'name' => 'Dining Chair'],
            ['id' => 11, 'name' => 'End Table'],
            ['id' => 12, 'name' => 'Cabinet'],
            ['id' => 13, 'name' => 'Entertainment Center'],
            ['id' => 14, 'name' => 'Bench'],
            ['id' => 15, 'name' => 'Cabinet']
        ];

        return response()->json($response);
    }
}