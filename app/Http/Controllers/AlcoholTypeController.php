<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlcoholType;
use App\Models\AlcoholList;


class AlcoholTypeController extends Controller
{
    public function index(){

        $brand = AlcoholList::all();
        $type = AlcoholType::all();

        return view("admin.type", compact("brand", "type"));
    }
    
    public function create(Request $request){
        
        $type = new AlcoholType();
        $type ->name = $request->get('typeAlcohol');
        $type->save();

        return redirect() -> route("type.index");

    }

    public function delete($id){
        $type = AlcoholType::destroy($id); 
        return redirect() -> route('type.index');
    }


    public function update(Request $request, $id){

        $type = AlcoholType::findOrFail($id);
        $type->name = $request->get('typeAlcohol');
        $type->save();

        return redirect()->route('type.index');
    }

}

