<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partenaire;
use App\Models\Categorie;
use App\Models\Region;

class PartenaireController extends Controller
{
    public function index()
    {
        $partenaires = Partenaire::all();
        return view('partenaire.index')->with('partenaires', $partenaires);
        // $partenaires = Partenaire::where('confirmed', 1 )->get();

    }

    // public function partnersNoneConfirmed(){
    //     $partenaires = Partenaire::with('categories' , 'regions')->where("confirmed", 0)->get();
    //     return view('home' , compact('partenaires','partenaire'));
    // }

    public function getPartnerCategories($id)
    {
        
        $partenaire = Partenaire::where('id', $id)->with('categories')->first();
        $array = [];
        foreach ($partenaire->categories as $category){
            $array[] = $category->categoryName;
        }
        
        
        $categories = Categorie::whereNotIn('categoryName', $array )->get();
        
        return view('partenaire.categories', compact('partenaire','categories'));
        // return $categories;
        // $categories = $partenaire->categories;
        
        // return $partenaire;
    }



    public function getPartnerRegions($id)
    {
        
        $partenaire = Partenaire::where('id', $id)->with('regions')->first();
        $array = [];
        foreach ($partenaire->regions as $region){
            $array[] = $region->regionName;
        }
        
        
        $regions = Region::whereNotIn('regionName', $array )->get();
        
        return view('partenaire.regions', compact('partenaire','regions'));
        // return $categories;
        // $categories = $partenaire->categories;
        
        // return $partenaire;
    }

    public function store(Request $request)
    {


        $requestData = $request->all();
        $filename= time().$request->file('img_path')->getClientOriginalName();
        $path = $request->file('img_path')->storeAs('images', $filename , 'public');
        $requestData["img_path"] = '/storage/' . $path;
        Partenaire::create($requestData);

        return redirect()->back()->with('success', 'Data inserted successfully');
        

    }




    public function addCategory(Request $request){

        // dd($request->all());
        // $input = $request->all();
        // Region::create($input);

        $partenaire = Partenaire::find($request->partenaire_id);
        $categorie = Categorie::find($request->category);
        $partenaire->categories()->attach($categorie);
        

        return redirect()->back()->with('success', 'Data inserted successfully');
    }

    public function addRegion(Request $request){

        // dd($request->all());
        // $input = $request->all();
        // Region::create($input);

        $partenaire = Partenaire::find($request->partenaire_id);
        $region = Region::find($request->region);
        $partenaire->regions()->attach($region);
        

        return redirect()->back()->with('success', 'Data inserted successfully');
    }

    

    public function delete($id) 
    {
        // dd($request);
        
        $partenaire = Partenaire::find($id);
        $partenaire->delete();
        return redirect()->back()->with('success', 'Data deleted successfully');
    }  


    public function edit($id){

        $partenaire = Partenaire::where('id', $id)->first();
        // return $partenaire;
        return view('partenaire.edit', compact('partenaire','partenaire'));


    }

    public function update(Request $request){



        
         Partenaire::where('id', $request->partenaireId)->update([
            'nom' => $request->nom,
            'email' => $request->email,
            'tele' => $request->tele,
            'site' => $request->site,
            'description' => $request->description
         ]);

         $partenaires = Partenaire::all();
        return view('partenaire.index')->with('partenaires', $partenaires);
        // return redirect()->back()->with('success', 'Data updated successfully');
        // return view('partenaire.index')->with('success', 'partenaire updated');


    }

    public function deletePartenaireCategory(Request $request){

        // dd($request->all());
        // $input = $request->all();
        // Region::create($input);

        $partenaire = Partenaire::find($request->partenaireId);
        $categorie = Categorie::find($request->categoryId);
        $partenaire->categories()->detach($categorie);
        

        return redirect()->back()->with('success', 'Data inserted successfully');
    }


    public function deletePartenaireRegion(Request $request){

        // dd($request->all());
        // $input = $request->all();
        // Region::create($input);

        $partenaire = Partenaire::find($request->partenaireId);
        $region = Region::find($request->regionId);
        $partenaire->regions()->detach($region);
        

        return redirect()->back()->with('success', 'Data inserted successfully');
    }

}
