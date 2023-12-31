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
    Route::get('/products/create', [App\Http\Controllers\Products::class, 'createProductPage'])->name('createProductPage');
    Route::get('/products/edit/{productId}', [App\Http\Controllers\Products::class, 'editProductPage'])->name('editProductPage');
    Route::post('/products/save', [App\Http\Controllers\Products::class, 'saveProduct'])->name('saveProduct');
    Route::get('/category/{categoryTitle}', [App\Http\Controllers\HomeController::class, 'getProductsByCategory'])->name('getProductsByCategory');
    Route::get('/branches', [App\Http\Controllers\Branches::class, 'showBranchesPage'])->name('showBranchesPage');
    Route::get('/conditions', [App\Http\Controllers\Conditions::class, 'showConditionsPage'])->name('showConditionsPage');
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

    // Get all products
    Route::get('/products', [\App\Models\RestApi\Products::class, 'getProducts'])
        ->name('get-products');

    // Get all products by branch ID
    Route::get('/products/branch/{id}', [\App\Models\RestApi\Products::class, 'getProducts'])
        ->name('get-products');
});

// Views
Route::get('/internal/getProductsView', [\App\Models\RestApi\Products::class, 'getProductsView'])
    ->name('get-products-view');

Route::get('/internal/getBranchNameById/{branchId}', [\App\Http\Controllers\Branches::class, 'getBranchNameById'])
    ->name('getBranchNameById');

Route::get('/internal/getProductsByCategoryView/{categoryTitle}', [\App\Models\RestApi\Products::class, 'getProductsViewByCategory'])
    ->name('get-products-by-category-view');

