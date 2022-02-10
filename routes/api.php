<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Products;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AuthController;

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
Route::group(['middleware' => ['auth:sanctum']],function(){
    
    Route::post('/products',[ProductsController::class,'store']);
    
    Route::delete('/products/{id}',[ProductsController::class,'destroy']);

    Route::put('/products/{id}',[ProductsController::class,'update']);
    
    Route::post('/logout',[AuthController::class,'logout']);
});
Route::get('/products',[ProductsController::class,'index']);

Route::get('/products/{id}',[ProductsController::class,'show']);

Route::get('/products/search/{name}',[ProductsController::class,'search']);

Route::post('/register',[AuthController::class,'register']);

Route::post('/login',[AuthController::class,'login']);