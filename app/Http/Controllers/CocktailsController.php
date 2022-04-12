<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cocktails;
use App\Models\Glasses;
use App\Models\Fruits;

class CocktailsController extends Controller
{
    public function index(){

        // $cocktails = Cocktails::with('cocktailsFruits')->first();
        $cocktails= Cocktails::all();
        $glasses = Glasses::all();
        // $fruits = Fruits::first();
        // $cocktails->cocktailsFruits()->attach($fruits);
        // dd($cocktails);
        return view("cocktails", compact("cocktails", "glasses"));
    }
    
    public function create(Request $request){
        
        $cocktails = new Cocktails();
        $cocktails ->name = $request->get('cocktailsName');
        $cocktails ->glasse_id = $request->get('glasse_id');
        // $cocktails->alcohol_id = $request->get('alcoholType_id');
        $cocktails->save();
        return redirect() -> route("cocktails.index");

    }

    public function delete($id){
        $cocktails = Cocktails::destroy($id); 
        return redirect() -> route('cocktails.index');
    }


    public function update(Request $request, $id){

        $cocktails = Cocktails::findOrFail($id);
        $cocktails->name = $request->get('cocktailsName');
        $cocktails->save();

        return redirect()->route('cocktails.index');
    }

}
