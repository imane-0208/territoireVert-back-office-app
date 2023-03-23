<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partenaire;
use App\Models\Categorie;
use App\Models\Region;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $partenaires = Partenaire::with('categories' , 'regions')->where('confirmed', false)->get();
        // dd($partenaires);
        return view('home', compact('partenaires' , 'partenaires'));
        
    }

    public function confirmPartener(Request $request)
    {
        
        Partenaire::where('id', $request->partenaireId)->update([
            'confirmed' => $request->confirmed
         ]);

         $partenaires = Partenaire::with('categories' , 'regions')->where('confirmed', 0)->get();
        // dd($partenaires);
        return redirect()->back()->with('partenaires' , $partenaires );
        
    }
}
