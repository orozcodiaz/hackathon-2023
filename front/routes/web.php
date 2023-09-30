<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes(['register' => false]);

// Internal routes
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

// External routes
Route::prefix('/api/v1/')->group(function () {
    // Get all branches
    Route::get('/branches', [\App\Models\RestApi\Branches::class, 'getBranches'])
        ->name('get-branches');

    // Get all conditions
    Route::get('/conditions', [\App\Models\RestApi\Conditions::class, 'getConditions'])
        ->name('get-conditions');

    // Get all categories
    Route::get('/categories', [\App\Models\RestApi\Categories::class, 'getCategories'])
        ->name('get-categories');
});
