<?php

namespace App\Models\RestApi;

use App\Models\RestApiConnector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Products extends RestApiConnector
{
    public function getProducts($asReturn = false)
    {
        $response = $this->getBackendData('/api/v1/products/get');

        if ($asReturn === true) {
            return json_decode($response, 1);
        }

        return response()->json(json_decode($response, 1));
    }

    public function getProductsByCategory($categoryTitle, $asReturn = false)
    {
        $response = $this->getBackendData('/api/v1/products/category/' . $categoryTitle);

        if ($asReturn === true) {
            return json_decode($response, 1);
        }

        return response()->json(json_decode($response, 1));
    }

    public function getProductsView(Request $request)
    {
        $categoriesModel = new Categories();
        $conditionsModel = new Conditions();

        $categories = $this->getConvertedArray(
            $categoriesModel->getCategories(true)
        );

        $conditions = $this->getConvertedArray(
            $conditionsModel->getConditions(true)
        );

        $products = $this->getProducts(true);

        foreach ($products as &$product) {
            $totalQty = 0;
            foreach ($product['branches'] as $branchCode => $qtyValue) {
                $totalQty += $qtyValue;
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

    public function getProductsViewByCategory($categoryTitle)
    {
//        $categoriesModel = new Categories();
//        $conditionsModel = new Conditions();
//        $categories = $this->getConvertedArray(
//            json_decode($categoriesModel->getCategories(), 1)
//        );
//
//        $conditions = $this->getConvertedArray(
//            json_decode($conditionsModel->getConditions(), 1)
//        );

        $products = $this->getProductsByCategory($categoryTitle, true);

        echo 'Using getProductsByCategory() ' . PHP_EOL;
        echo 'Received products by category ' . $categoryTitle . ': ' . PHP_EOL;
        print_r($products);

        die;

        foreach ($products as &$product) {
            $branches = $product['branches'];

            $totalQty = 0;
            foreach ($branches as $branch) {
                $totalQty += $branch['qty'];
            }

            $product['totalQty'] = $totalQty;

            $categoryTitle = $categories[$product['category']];
            $product['category'] = $categoryTitle;
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