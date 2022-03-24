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

}

