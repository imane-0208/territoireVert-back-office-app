<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partenaire;

class PartenaireController extends Controller
{
    public function index()
    {
        // $partenaires = Partenaire::all();
        $partenaires = Partenaire::with('categories' , 'regions')->get();
        return response()->json([
            "success" => true,
            "message" => "Partenaire List",
            "data" => $partenaires
            ]);
        
        

    }
}
