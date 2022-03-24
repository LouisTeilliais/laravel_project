<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlcoholType;


class AlcoholTypeController extends Controller
{
    public function index(){

        $type = AlcoholType::all();

        return view("alcohol.type", compact("type"));
    }
    
    public function create(Request $request){
        
        $type = new AlcoholType();
        $type ->name = $request->get('add');
        $type->save();

        return redirect() -> route("type.index");

    }

    public function delete($id){
        $type = AlcoholType::destroy($id); 
        return redirect() -> route('type.index');
    }


    public function update(Request $request, $id){

        $type = AlcoholType::findOrFail($id);
        $type->name = $request->get('add');
        $type->save();

        return redirect()->route('type.index');
    }
}

