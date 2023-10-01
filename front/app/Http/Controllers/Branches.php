<?php

namespace App\Http\Controllers;

class Branches extends Controller
{
    public function showBranchesPage()
    {
        $branchesModel = new \App\Models\RestApi\Branches();
        $branchesList = $branchesModel->getBranches(true);
        return view('branches', compact('branchesList'));
    }

}