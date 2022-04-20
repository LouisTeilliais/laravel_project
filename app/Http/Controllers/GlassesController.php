<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Glasses;
use App\Models\Cocktails;
use App\Models\Liaison\CocktailFruits;
use App\Models\Liaison\CocktailMarques;
use App\Models\Liaison\CocktailSirops;
use App\Models\Liaison\CocktailSofts;


class GlassesController extends Controller
{
    public function index(){

        $glasse = Glasses::all();

        return view("alcohol.glasse", compact("glasse"));
    }
    
    public function create(Request $request){
        
        $glasse = new Glasses();
        $glasse->name = $request->get("add");
        $newImageName = time().'-'. $request->file("image")->getClientOriginalName();
        $glasse->image_url = $newImageName;
        $request->file('image')->storeAs('public/images', $newImageName);
        $glasse->save();
        return redirect() -> route("glasse.index");

    }

    public function delete($id){
        $glasse = Glasses::destroy($id);
        $cocktails = Cocktails::where('glasse_id', $id)->delete(); 
        $cocktails = Cocktails::all();
        foreach($cocktails as $cocktail){
            if($cocktail->glasse_id == $id){
                $del = CocktailFruits::where('cocktail_id', $cocktail->id)->delete();
                $del = CocktailMarques::where('cocktail_id', $cocktail->id)->delete();
                $del = CocktailSirops::where('cocktail_id', $cocktail->id)->delete();
                $del = CocktailSofts::where('cocktail_id', $cocktail->id)->delete();
            }
        }
        return redirect() -> route('glasse.index');
    }


    public function update(Request $request, $id){

        $glasse = Glasses::findOrFail($id);
        $glasse->name = $request->get('add');

        if($request->hasfile('image')){
            $newImageName = time().'-'. $request->file("image")->getClientOriginalName();
            $glasse->image_url = $newImageName;
            $request->file('image')->storeAs('public/images', $newImageName);

            $destination = 'public/images'.$glasse->image_url;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
        }

        $glasse->save();
        return redirect()->route('glasse.index');
    }
}

