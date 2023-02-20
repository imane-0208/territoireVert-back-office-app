<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;

class RegionController extends Controller
{
    public function index(){
        $regions = Region::all();
        return view('region.index')->with('regions', $regions);

    }

    public function store(Request $request){
        $input = $request->all();
        Region::create($input);
        return redirect('region')->with('flash message', 'region a été ajouté avec succés');
    }

    public function edit($id){
        $region = Region::find($id);
        return view('region.index')->with('region', $region);

    }
}
