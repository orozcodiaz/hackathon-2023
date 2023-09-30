<?php

namespace App\Http\Controllers;

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

}