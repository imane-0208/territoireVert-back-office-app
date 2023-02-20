<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategorieController;
use App\Http\Controllers\Api\RegionController;
use App\Http\Controllers\Api\PartenaireController;

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

Route::get('/categories',[CategorieController::class, 'index'])->name('categories');
Route::get('/regions',[RegionController::class, 'index'])->name('regions');
Route::get('/partenaires',[PartenaireController::class , 'index'])->name('partenaire');
Route::get('/categories/partenaire/{id}',[CategorieController::class, 'getCategoriePartners'])->name('categorie.partners');
Route::get('/regions/partenaire/{id}',[RegionController::class, 'getRegionPartners'])->name('region.partners');
