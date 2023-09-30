<?php

namespace App\Models\RestApi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Products
{
    public function getProducts()
    {
        $response = [
            [
                'id' => 23,
                'sku' => 'CTFRNTR-128293',
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
                'sku' => 'CTFRNTR-39492',
                'description' => 'A sofa is a comfortable and versatile piece of furniture commonly found in living rooms and lounges. It typically features padded cushions and a supportive frame, designed to provide relaxation and seating for multiple individuals. Sofas come in various styles, materials, and sizes, catering to diverse tastes and room layouts. They serve as a central piece of home decor, offering both functionality and aesthetic appeal to any interior space.',
                'name' => 'KIVIK Sofa, Tibbleby beige/gray',
                'category' => 5,
                'condition' => 1,
                'branches' => [
                    [
                        'id' => 5,
                        'qty' => 9,
                    ],
                    [
                        'id' => 3,
                        'qty' => 2,
                    ]
                ]
            ]
        ];

        //return response()->json($response);
        return json_encode($response);
    }

    public function getProductsView(Request $request)
    {
        $categoriesModel = new Categories();
        $conditionsModel = new Conditions();
        $categories = $this->getConvertedArray(
            json_decode($categoriesModel->getCategories(), 1)
        );

        $conditions = $this->getConvertedArray(
            json_decode($conditionsModel->getConditions(), 1)
        );

        $products = json_decode($this->getProducts(), 1);

        foreach ($products as &$product) {
            $branches = $product['branches'];

            $totalQty = 0;
            foreach ($branches as $branch) {
                $totalQty += $branch['qty'];
            }

            $product['totalQty'] = $totalQty;

            $categoryTitle = $categories[$product['category']];
            $product['category'] = '<a href="'.route('getProductsByCategory', ['categoryTitle' => $categoryTitle]).'">'.$categoryTitle.'</a>';
            $product['condition'] = $conditions[$product['condition']];
        }

        return response()->json([
            'success' => true,
            'content' => view('rest.products', ['products' => $products])->render()
        ]);
    }

    /**
     * @param $incomingArray
     * @return array
     */
    protected function getConvertedArray($incomingArray): array
    {
        $outputArray = [];

        foreach ($incomingArray as $item) {
            $outputArray[$item['id']] = $item['name'];
        }

        return $outputArray;
    }
}