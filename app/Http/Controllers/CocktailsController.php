<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cocktails;

class CocktailsController extends Controller
{
    public function index(){

        $cocktails = Cocktails::all();
        return view("cocktails", compact("cocktails"));
    }
    
    public function create(Request $request){
        
        $cocktails = new Cocktails();
        $cocktails ->name = $request->get('cocktailsName');
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
