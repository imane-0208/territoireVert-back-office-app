<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\PartenaireController;


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
    return view('auth/login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    
    Route::get('/partenaire',[PartenaireController::class , 'index'])->name('partenaire');
    Route::post('/partenaire/addPartenaire',[PartenaireController::class, 'store'])->name('addPartenaire');
    Route::post('/partenaire/delete',[PartenaireController::class, 'delete'])->name('deletePartenaire');
    Route::get('/partenaire/edit/{id}',[PartenaireController::class, 'edit'])->name('partenaire.edit');
    Route::post('/partenaire/update',[PartenaireController::class, 'update'])->name('partenaire.update');

    Route::get('/partenaire/categories/{id}',[PartenaireController::class, 'getPartnerCategories'])->name('partenaire.categories');
    Route::post('/partenaire/addCategory',[PartenaireController::class, 'addCategory'])->name('addCategory');
    Route::post('/partenaire/deleteCategory',[PartenaireController::class, 'deletePartenaireCategory'])->name('deletePartenaireCategory');
    Route::post('/partenaire/deleteRegion',[PartenaireController::class, 'deletePartenaireRegion'])->name('deletePartenaireRegion');

    Route::get('/partenaire/region/{id}',[PartenaireController::class, 'getPartnerRegions'])->name('partenaire.regions');
    Route::post('/partenaire/addRegion',[PartenaireController::class, 'addRegion'])->name('addRegion');

    Route::get('/region',[RegionController::class, 'index'])->name('regions');
    Route::post('/region/add',[RegionController::class, 'store'])->name('addRegion');

    Route::get('/categories',[CategorieController::class, 'index'])->name('categories');
    Route::post('/categories/add',[CategorieController::class, 'store'])->name('addcategory');

  
    // Route::resource('categorie',CategorieController::class);
    // Route::resource('region',RegionController::class);
    
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/categories/{id}',[CategorieController::class, 'getCategoriePartners'])->name('categorie.partners');



// Route::get('/partenairee/{partenaire->id}',[PartenaireController::class , 'getPartnerCategories'])->name('partenaire.categories');
