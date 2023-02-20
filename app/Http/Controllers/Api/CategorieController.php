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
        
        // $categorie = Categorie::where('id', $id)->with('partenaires')->first();
        $categorie = Categorie::where('id', $id)->with(['partenaires' => function($p){
            $p->with([
                'categories', 'regions'
            ]);
        }])->first();


        $partenaires= $categorie->partenaires;

        return response()->json([
            "success" => true,
            "message" => "Categories List",
            "data" => $partenaires
            ]);
    }
}
