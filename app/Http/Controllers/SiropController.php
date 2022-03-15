<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sirop;



class SiropController extends Controller
{
    public function index(){

        $sirop = Sirop::all();

        return view("alcohol.sirop", compact("sirop"));
    }
    
    public function create(Request $request){
        
        $sirop = new Sirop();
        $sirop ->name = $request->get("add");
        $sirop->save();

        // return redirect() -> route("alcohol.sirop");

    }

}
