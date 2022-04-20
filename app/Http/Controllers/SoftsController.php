<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Softs;
use App\Models\Cocktails;
use App\Models\Liaison\CocktailSofts;



class SoftsController extends Controller
{
    public function index(){

        $softs = Softs::all();

        return view("admin.softs", compact("softs"));
    }
    
    public function create(Request $request){
        
        $softs = new Softs();
        $softs->name = $request->get("add");
        $softs->save();
        return redirect() -> route("softs.index");

    }

    public function delete($id){
        $softs = Softs::destroy($id); 
        $cocktailSofts = CocktailSofts::all();
        foreach($cocktailSofts as $cocktailSoft){
            if($cocktailSoft->softs_id == $id){
                
                $cocktails = Cocktails::destroy($cocktailSoft->cocktail_id);
                $cocktails = CocktailSofts::where('cocktail_id', $cocktailSoft->cocktail_id)->delete();
            }
        }
        return redirect() -> route('softs.index');
    }

    public function update(Request $request, $id){

        $softs = Softs::findOrFail($id);
        $softs->name = $request->get('add');
        $softs->save();
        return redirect() -> route('softs.index');
    }

}