<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Products extends Controller
{
    public function createProductPage()
    {
        $generatedSku = $this->generateSku();
        return view('create-product-page', compact('generatedSku'));
    }

    protected function generateSku()
    {
        return 'CTFRNTR-' . rand(1000, 999999);
    }

    public function saveProduct(Request $request)
    {
        $apiPayload = $request->post();
        unset($apiPayload['_token']);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => getenv('BACKEND_SERVER') . '/api/v1/products/create',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $apiPayload,
        ));

        $response = curl_exec($curl);
        $httpResponseCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        // @TODO: if $httpResponseCode = 201 - all good, else - errors

        curl_close($curl);

        return redirect()->route('createProductPage')->with(['success' => 'Product was saved.']);
    }

}