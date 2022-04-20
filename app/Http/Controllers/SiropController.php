<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sirop;
use App\Models\Cocktails;
use App\Models\Liaison\CocktailSirops;

class SiropController extends Controller
{
    public function index(){

        $sirop = Sirop::all();

        return view("admin.sirop", compact("sirop"));
    }

    public function create(Request $request){
        
        $sirop = new Sirop();
        $sirop ->name = $request->get('add');
        $sirop->save();

        return redirect() -> route("sirop.index");

    }

    public function delete($id){
        $sirop = Sirop::destroy($id);
        $cocktailSirops = cocktailSirops::all();
        foreach($cocktailSirops as $cocktailSirop){
            if($cocktailSirop->sirop_id == $id){
                
                $cocktails = Cocktails::destroy($cocktailSirop->cocktail_id);
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
