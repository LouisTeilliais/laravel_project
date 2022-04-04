<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlcoholList;
use App\Models\AlcoholType;


class AlcoholBrandController extends Controller
{
    public function index(){

        $brand = AlcoholList::all();
        $type = AlcoholType::all();

        return view("alcohol.brand", compact("brand", "type"));
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
        return redirect() -> route('brand.index');
    }


    public function update(Request $request, $id){

        $brand = AlcoholList::findOrFail($id);
        $brand->name = $request->get('brandName');
        $brand->save();

        return redirect()->route('brand.index');
    }

}

