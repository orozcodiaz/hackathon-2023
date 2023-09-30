<?php

namespace App\Models\RestApi;

class Products
{
    public function getProducts()
    {
        $response = [
            [
                'id' => 23,
                'sku' => 'CTFURNTR-128293',
                'description' => 'You know the feeling when you sit, lie down or hang out in a sofa, rather than on it. That’s how embracing the deep and generous UPPLAND sofa is – your new favorite place for cozy evenings and lazy days!',
                'name' => 'UPPLAND Sofa, Karlshov gray-beige',
                'category' => 2,
                'condition' => 3,
                'branches' => [
                    [
                        'id' => 1,
                        'qty' => 17,
                    ],
                    [
                        'id' => 2,
                        'qty' => 3,
                    ],
                    [
                        'id' => 8,
                        'qty' => 2,
                    ]
                ]
            ],
            [
                'id' => 45,
                'sku' => 'CTFURNTR-39492',
                'description' => '',
                'name' => 'KIVIK Sofa, Tibbleby beige/gray',
                'category' => 2,
                'condition' => 1,
                'branches' => [
                    [
                        'id' => 5,
                        'qty' => 9,
                    ],
                    [
                        'id' => 3,
                        'qty' => 2,
                    ],
                    [
                        'id' => 4,
                        'qty' => 3,
                    ]
                ]
            ]
        ];

        return response()->json($response);
    }

    public function getProductsByBranchId()
    {

    }

}