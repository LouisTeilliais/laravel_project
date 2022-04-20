<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sirop;
use App\Models\Cocktails;
use App\Models\Liaison\CocktailFruits;
use App\Models\Liaison\CocktailMarques;
use App\Models\Liaison\CocktailSirops;
use App\Models\Liaison\CocktailSofts;

class SiropController extends Controller
{
    public function index(){

        $sirop = Sirop::all();

        return view("alcohol.sirop", compact("sirop"));
    }
    
    public function create(Request $request){
        
        $sirop = new Sirop();
        $sirop ->name = $request->get('add');
        $sirop->save();

        return redirect() -> route("sirop.index");

    }

    public function delete($id){
        $sirop = Sirop::destroy($id);
        $cocktailSirops = CocktailSirops::all();
        foreach($cocktailSirops as $cocktailSirop){
            if($cocktailSirop->sirop_id == $id){
                
                $cocktails = Cocktails::destroy($cocktailSirop->cocktail_id);
                $cocktails = CocktailSirops::where('cocktail_id', $cocktailSirop->cocktail_id)->delete();
                $cocktails = CocktailSofts::where('cocktail_id', $cocktailSirop->cocktail_id)->delete();
                $cocktails = CocktailMarques::where('cocktail_id', $cocktailSirop->cocktail_id)->delete();
                $cocktails = CocktailFruits::where('cocktail_id', $cocktailSirop->cocktail_id)->delete();
            }
        } 
        return redirect() -> route('sirop.index');
    }

    public function update(Request $request, $id){

        $sirop = Sirop::findOrFail($id);
        $sirop->name = $request->get('add');
        $sirop->save();

        return redirect()->route('sirop.index');
    }

}
