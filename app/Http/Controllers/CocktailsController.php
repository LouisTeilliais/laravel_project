<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cocktails;
use App\Models\Glasses;
use App\Models\Fruits;
use App\Models\AlcoholType;
use App\Models\AlcoholList;
use App\Models\Softs;
use App\Models\Sirop;
use App\Models\Liaison\CocktailFruits;
use App\Models\Liaison\CocktailMarques;
use App\Models\Liaison\CocktailSirops;
use App\Models\Liaison\CocktailSofts;

class CocktailsController extends Controller
{
    public function index(){

        $cocktails= Cocktails::all();
        $alcohols = AlcoholType::all();
        $glasses = Glasses::all();
        $fruits = Fruits::all();
        $brands = AlcoholList::all();
        $softs = Softs::all();
        $sirops = Sirop::all();
        $cocktailFruits = CocktailFruits::all();
        $cocktailMarques = CocktailMarques::all();
        $cocktailSirops = CocktailSirops::all();
        $cocktailSofts = CocktailSofts::all();

        return view("cocktails", compact("cocktails", "glasses", "fruits", "alcohols", "brands", "softs", "sirops", "cocktailFruits", "cocktailMarques", "cocktailSirops", "cocktailSofts"));
    }
    
    public function create(Request $request){
        
        $cocktails = new Cocktails();

        if($request->get('glasses') != "null"){
            $cocktails ->name = $request->get('name');
            $cocktails ->glasse_id = $request->get('glasses');
            $cocktails->save();
        }

        return redirect() -> route("cocktails.index");
    }


    public function delete($id){
        $cocktails = Cocktails::destroy($id);
        $cocktails = CocktailFruits::where('cocktail_id', $id)->delete();
        $cocktails = CocktailSofts::where('cocktail_id', $id)->delete();
        $cocktails = CocktailMarques::where('cocktail_id', $id)->delete();
        $cocktails = CocktailSirops::where('cocktail_id', $id)->delete();
        return redirect() -> route('cocktails.index');
    }


    public function add(Request $request, $id){

        $cocktails = Cocktails::findOrFail($id);
        $element = $request->get('element');
        if($element == "brand"){
            if($request->get('brand') == "null"){
                return redirect()->route('cocktails.index');
            }else{
                $cocktailMarques = new CocktailMarques();
                $cocktailMarques->cocktail_id = $id;
                $cocktailMarques->brand_id = $request->get('brand');
                $cocktailMarques->save();
            }
        }elseif($element == "soft"){
            if($request->get('soft') == "null"){
                return redirect()->route('cocktails.index');
            }else{
                $cocktailSofts = new CocktailSofts();
                $cocktailSofts->cocktail_id = $id;
                $cocktailSofts->softs_id = $request->get('soft');
                $cocktailSofts->save();
            }
        }elseif($element == "fruit"){
            if($request->get('fruit') == "null"){
                return redirect()->route('cocktails.index');
            }else{
                $cocktailFruits = new CocktailFruits();
                $cocktailFruits->cocktail_id = $id;
                $cocktailFruits->fruits_id = $request->get('fruit');
                $cocktailFruits->save();
            }
        }elseif($element == "sirop"){
            if($request->get('sirop') == "null"){
                return redirect()->route('cocktails.index');
            }else{
                $cocktailSirops = new CocktailSirops();
                $cocktailSirops->cocktail_id = $id;
                $cocktailSirops->sirop_id = $request->get('sirop');
                $cocktailSirops->save();
            }
        }

        return redirect()->route('cocktails.index');
    }

}
