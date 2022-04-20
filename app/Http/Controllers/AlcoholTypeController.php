<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlcoholType;
use App\Models\AlcoholList;
use App\Models\Cocktails;
use App\Models\Liaison\CocktailFruits;
use App\Models\Liaison\CocktailMarques;
use App\Models\Liaison\CocktailSirops;
use App\Models\Liaison\CocktailSofts;


class AlcoholTypeController extends Controller
{
    public function index(){

        $brand = AlcoholList::all();
        $type = AlcoholType::all();
        return view("alcohol.type", compact("brand", "type"));
    }
    
    public function create(Request $request){
        
        $type = new AlcoholType();
        $type ->name = $request->get('typeAlcohol');
        $type->save();

        return redirect() -> route("type.index");

    }

    public function delete($id){
        $type = AlcoholType::destroy($id); 
        $brands = AlcoholList::all();
        $cocktailMarques = CocktailMarques::all();
        foreach($brands as $brand) {
            if($brand->alcohol_id == $id){
                AlcoholList::destroy($brand->id);
                foreach($cocktailMarques as $cocktailMarque){
                    if($cocktailMarque->brand_id == $brand->id){
                        $cocktails = CocktailMarques::where('cocktail_id', $cocktailMarque->cocktail_id)->delete();
                        $cocktails = CocktailFruits::where('cocktail_id', $cocktailMarque->cocktail_id)->delete();
                        $cocktails = CocktailSofts::where('cocktail_id', $cocktailMarque->cocktail_id)->delete();
                        $cocktails = CocktailSirops::where('cocktail_id', $cocktailMarque->cocktail_id)->delete();
                        $cocktails = Cocktails::destroy($cocktailMarque->cocktail_id);
                    }
                }
            }
        }
        return redirect() -> route('type.index');
    }


    public function update(Request $request, $id){

        $type = AlcoholType::findOrFail($id);
        $type->name = $request->get('typeAlcohol');
        $type->save();

        return redirect()->route('type.index');
    }

}

