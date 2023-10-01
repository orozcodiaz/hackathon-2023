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

    public function getBranchNameById($branchId)
    {
        $branchesModel = new \App\Models\RestApi\Branches();
        $branchesList = $branchesModel->getBranches(true);

        $response = 'n/a';
        foreach ($branchesList as $branch) {
            if ($branch['id'] === (int)$branchId) {
                $response = ['success' => true, 'content' => $branch['name']];
                break;
            }
        }

        return response()->json($response);

    }

}