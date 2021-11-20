<?php

use App\Http\Controllers\api\CategoriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['api','checkPassword','changeLanguage'],'namespace' => 'Api'], function (){
    Route::post('get-main-categories', [CategoriesController::class, 'index']);
    Route::post('get-category-byId', [CategoriesController::class, 'getCategoryById']);
    Route::post('change-category-status', [CategoriesController::class, 'changeStatus']);
});

