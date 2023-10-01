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

    public function getProductById($productId, $asReturn = false)
    {
        $response = $this->getBackendData('/api/v1/products/' . $productId);

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

        rsort($products);

        foreach ($products as &$product) {
            $totalQty = 0;
            if (isset($product['branches'])) {
                foreach ($product['branches'] as $qtyValue) {
                    $totalQty += $qtyValue;
                }
            }

            $product['totalQty'] = $totalQty;
            $product['picture'] = $this->getRandomPicture();

            $categoryTitle = $categories[$product['category']];
            $product['category'] = '<a href="'.route('getProductsByCategory', ['categoryTitle' => $categoryTitle]).'">'.$categoryTitle.'</a>';
            $product['condition'] = $conditions[$product['condition']];
        }

        return response()->json([
            'success' => true,
            'content' => view('rest.products', ['products' => $products])->render()
        ]);
    }

    protected function getRandomPicture()
    {
        $files = glob(public_path('assets/img/') . '*.png');
        $randomIndex = array_rand($files);
        $pathInfo = pathinfo($files[$randomIndex]);
        return $pathInfo['basename'];
    }

    public function getProductsViewByCategory($categoryTitle)
    {
        $categoriesModel = new Categories();
        $conditionsModel = new Conditions();
        $categories = $this->getConvertedArray(
            $categoriesModel->getCategories(true)
        );

        $conditions = $this->getConvertedArray(
            $conditionsModel->getConditions(true)
        );

        $products = $this->getProductsByCategory($categoryTitle, true);

//        echo 'Using getProductsByCategory() ' . PHP_EOL;
//        echo 'Received products by category ' . $categoryTitle . ': ' . PHP_EOL;
//        print_r($products);
//
//        die;

        //print_r($products); die;

        rsort($products);

        foreach ($products as &$product) {
            $totalQty = 0;

            if (isset($product['branches'])) {
                foreach ($product['branches'] as $qtyValue) {
                    $totalQty += $qtyValue;
                }
            }

            $product['totalQty'] = $totalQty;
            $product['picture'] = $this->getRandomPicture();

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