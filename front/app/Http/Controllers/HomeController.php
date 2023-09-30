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

    public function showBranchesPage()
    {
        $branchesModel = new \App\Models\RestApi\Branches();
        $branchesList = json_decode($branchesModel->getBranches(), 1);
        return view('branches', compact('branchesList'));
    }

    public function getProductsByCategory($categoryTitle)
    {
        // Send request to pull
    }
}
