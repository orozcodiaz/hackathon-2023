<?php

namespace App\Http\Controllers;

class Conditions extends Controller
{
    public function showConditionsPage()
    {
        $conditionsModel = new \App\Models\RestApi\Conditions();
        $conditionsList = $conditionsModel->getConditions(true);
        return view('conditions', compact('conditionsList'));
    }
}