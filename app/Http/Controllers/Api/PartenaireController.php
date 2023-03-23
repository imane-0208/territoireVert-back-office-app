<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\Partenaire;
use App\Models\Region;
class PartenaireController extends Controller
{
    public function index()
    {
        
        $partenaires = Partenaire::with('categories' , 'regions')->where("confirmed", 1)->get();
        return response()->json([
            "success" => true,
            "message" => "Partenaire List",
            "data" => $partenaires
            ]);
        
        

    }

    public function store(Request $request)
    {
        $requestData = new Partenaire;
        $requestData->nom = $request->nom;
        $requestData->email = $request->email;
        $requestData->tele = $request->tele;
        $requestData->site = $request->site;
        $requestData->description = $request->description;
        
        $requestData->save();

        $partenaire = Partenaire::find($requestData->id);
        $partenaire->categories()->attach($request->categories);
        $partenaire->regions()->attach($request->regions);

        $partenaires = Partenaire::with('categories' , 'regions')->where("confirmed", 1)->get();
        

        
        return response()->json([
            "success" => true,
            "message" => "Partenaire has created successfuly",
             "data" => $partenaires
            
            ]);
        
        
    }

    function getPartenaireByCategoryAndRegion(Request $request){

        $idCat = $request->idCat;
        $idReg = $request->idReg;


        $partenaires = Partenaire::with([
            'categories', 'regions'
        ])->whereHas('categories', function ($query) use ($idCat) {
            $query->where('categories.id', $idCat);
        })->whereHas('regions', function ($query) use ($idReg) {
            $query->where('regions.id', $idReg);
        })->get();

        return response()->json([
            "success" => true,
            "message" => "Categories List",
            "data" => $partenaires
            ]);

    }
}
