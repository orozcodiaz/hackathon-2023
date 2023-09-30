<?php

namespace App\Models\RestApi;

use App\Models\RestApiConnector;
use Illuminate\Http\JsonResponse;

class Branches extends RestApiConnector
{
    public function getBranches()
    {
        // @TODO: call S api, get branches as JSON
        $response = [
            ['id' => 1, 'name' => 'HFH of Broward', 'address' => '888 NW 62nd St, #2nd Floor, Fort Lauderdale, FL 33309'],
            ['id' => 2, 'name' => 'HFH of Greater Miami', 'address' => '3800 NW 22nd Ave, Miami, FL 33142'],
            ['id' => 3, 'name' => 'HFH of South Palm Beach County', 'address' => '181 SE 5th Ave, Delray Beach, FL 33483-3336'],
            ['id' => 4, 'name' => 'HFH of Palm Beach County', 'address' => '6758 N Military Trl, Ste. 301, Riviera Beach, FL 33407'],
            ['id' => 5, 'name' => 'HFH of the Upper Keys', 'address' => '98970 Overseas Highway, Key Largo, FL 33037-5267'],
        ];

//        return response()->json($response);
        return json_encode($response);
    }
}