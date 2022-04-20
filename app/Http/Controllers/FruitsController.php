<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Fruits;
use App\Models\Cocktails;
use App\Models\Liaison\CocktailFruits;
use App\Models\Liaison\CocktailMarques;
use App\Models\Liaison\CocktailSirops;
use App\Models\Liaison\CocktailSofts;

class FruitsController extends Controller
{
    public function index(){

        $fruits = Fruits::all();

        return view("alcohol.fruits", compact("fruits"));
    }
    
    public function create(Request $request){
        
        $fruits = new Fruits();
        $fruits->name = $request->get("fruitName");
        $newImageName = time().'-'. $request->file("image")->getClientOriginalName();
        $fruits->image_url = $newImageName;
        $request->file('image')->storeAs('public/images', $newImageName);
        $fruits->save();
        return redirect() -> route("fruits.index");

    }

    public function delete($id){
        
        $fruits = Fruits::destroy($id);
        $cocktailFruits = CocktailFruits::all();
        foreach($cocktailFruits as $cocktailFruit){
            if($cocktailFruit->fruits_id == $id){
                $cocktails = Cocktails::destroy($cocktailFruit->cocktail_id);
                $cocktails = CocktailFruits::where('cocktail_id', $cocktailFruit->cocktail_id)->delete();
                $cocktails = CocktailSofts::where('cocktail_id', $cocktailFruit->cocktail_id)->delete();
                $cocktails = CocktailMarques::where('cocktail_id', $cocktailFruit->cocktail_id)->delete();
                $cocktails = CocktailSirops::where('cocktail_id', $cocktailFruit->cocktail_id)->delete();
            }
        }
        return redirect() -> route('fruits.index');
    }

    public function update(Request $request, $id){

        $fruits = Fruits::findOrFail($id);
        $fruits->name = $request->get('fruitName');

        if($request->hasfile('image')){
            $newImageName = time().'-'. $request->file("image")->getClientOriginalName();
            $fruits->image_url = $newImageName;
            $request->file('image')->storeAs('public/images', $newImageName);

            $destination = 'public/images'.$fruits->image_url;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
        }

        $fruits->save();
        return redirect() -> route('fruits.index');
    }
}
