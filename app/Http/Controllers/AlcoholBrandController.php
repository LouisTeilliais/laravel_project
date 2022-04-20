<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlcoholList;
use App\Models\AlcoholType;
use App\Models\Liaison\CocktailMarques;
use App\Models\Cocktails;


class AlcoholBrandController extends Controller
{
    public function index(){

        $brand = AlcoholList::all();
        $type = AlcoholType::all();

        return view("admin.brand", compact("brand", "type"));
    }
    
    public function create(Request $request){
        
        $brand = new AlcoholList();
        $brand ->name = $request->get('brandName');
        $brand->degrees = $request->get('degrees');
        $brand->alcohol_id = $request->get('alcoholType_id');
        $brand->save();

        return redirect() -> route("brand.index");

    }

    public function delete($id){
        $brand = AlcoholList::destroy($id); 
        $cocktailBrands = CocktailMarques::all();
        foreach($cocktailBrands as $cocktailBrand){
            if($cocktailBrand->brand_id == $id){
                $cocktails = Cocktails::destroy($cocktailBrand->cocktail_id);
                $cocktails = CocktailMarques::where('cocktail_id', $cocktailBrand->cocktail_id)->delete();
            }
        }
        return redirect() -> route('brand.index');
    }


    public function update(Request $request, $id){

        $brand = AlcoholList::findOrFail($id);
        $brand->name = $request->get('brandName');
        $brand->degrees = $request->get('degrees');
        $brand->save();

        return redirect()->route('brand.index');
    }

}
