<?php

namespace App\Http\Controllers;

use App\Models\RestApi\Categories;
use App\Models\RestApi\Conditions;
use App\Models\RestApi\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getProductsByCategory($categoryTitle)
    {
        return view('products-by-category', compact('categoryTitle'));
    }
}
