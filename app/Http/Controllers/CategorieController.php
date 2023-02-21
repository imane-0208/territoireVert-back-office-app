<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use App\Models\Partenaire;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index(){
        $categories = Categorie::all();
        return view('categorie.index')->with('categories', $categories);

    }

    public function store(Request $request){
        $input = $request->all();
        Categorie::create($input);
        return redirect()->back()->with('success', 'Data deleted successfully');
    }

    public function edit($id){
        $categorie = Categorie::find($id);
        return view('categorie.index')->with('categorie', $categorie);

    }


    public function getCategoriePartners($id)
    {
        
        $categorie = Categorie::where('id', $id)->with('partenaires')->first();
        $array = [];
        foreach ($categorie->partenaires as $partenaire){
            $array[] = $partenaire->nom;
        }
        
        
        $partenaires = Partenaire::whereNotIn('nom', $array )->get();
        // dd( $partenaires);
        
        // return view('partenaire.categories', compact('partenaire','categories'));
        // return $categories;
        // $categories = $partenaire->categories;
        
        return $partenaire;
    }


    function delete($id){
        $categorie = Categorie::find($id);
        $categorie->delete();

        return redirect()->back()->with('success', 'Data deleted successfully');
    }


}
