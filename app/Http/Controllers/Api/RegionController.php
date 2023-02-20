<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;

class RegionController extends Controller
{
    public function index(){
        $regions = Region::all();
        return response()->json([
            "success" => true,
            "message" => "Region List",
            "data" => $regions
            ]);

    }

    public function getRegionPartners($id)
    {
        
        $region = Region::where('id', $id)->with(['partenaires' => function($p){
            $p->with([
                'categories', 'regions'
            ]);
        }])->first();
        $partenaires= $region->partenaires;
        // $array = [];
        // foreach ($region->partenaires as $partenaire){
        //     $array[] = $partenaire->nom;
        // }
        
        
        // $partenaires = Partenaire::whereNotIn('nom', $array )->get();
        // dd( $partenaires);

        return response()->json([
            "success" => true,
            "message" => "regions List",
            "data" => $partenaires
            ]);
    }
}
