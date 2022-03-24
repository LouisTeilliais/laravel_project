<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Glasses;


class GlassesController extends Controller
{
    public function index(){

        $glasse = Glasses::all();

        return view("alcohol.glasse", compact("glasse"));
    }
    
    public function create(Request $request){
        
        $glasse = new Glasses();
        $glasse ->name = $request->get('add');
        $glasse->save();

        return redirect() -> route("glasse.index");

    }

    public function delete($id){
        $glasse = Glasses::destroy($id); 
        return redirect() -> route('glasse.index');
    }


    public function update(Request $request, $id){

        $glasse = Glasses::findOrFail($id);
        $glasse->name = $request->get('add');
        $glasse->save();

        return redirect()->route('glasse.index');
    }
}

