<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Partenaire;

class CategorieController extends Controller
{
    public function index(){
        $categories = Categorie::all();
        return response()->json([
            "success" => true,
            "message" => "Categories List",
            "data" => $categories
            ]);

    }

    public function getCategoriePartners($id)
    {
        // $categoryRegion = 2;
        // $categoryName = 10;
        
        $categorie = Categorie::where('id', $id)->with('partenaires')->first();
        $categorie = Categorie::where('id', $id)->with(['partenaires' => function($p){
            $p->with([
                'categories', 'regions'
            ]);
        }])->first();


        // $partenaires = Partenaire::with([
        //     'categories', 'regions'
        // ])->whereHas('categories', function ($query) use ($categoryName) {
        //     $query->where('categories.id', $categoryName);
        // })->whereHas('regions', function ($query) use ($categoryRegion) {
        //     $query->where('regions.id', $categoryRegion);
        // })->get();


        // $categorie = Partenaire::with([
        //     'categories', 'regions'
        // ])->when($categoryName?? null, function ($q) use($categoryName) {
        //     $q->where('categories.id', $categoryName);
        // })->get();

        // return $categorie;


        $partenaires= $categorie->partenaires;

        return response()->json([
            "success" => true,
            "message" => "Categories List",
            "data" => $partenaires
            ]);
    }
}
