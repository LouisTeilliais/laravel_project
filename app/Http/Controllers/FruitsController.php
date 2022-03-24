<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fruits;

class FruitsController extends Controller
{
    public function index(){

        $fruits = Fruits::all();

        return view("alcohol.fruits", compact("fruits"));
    }
    
    public function create(Request $request){
        
        $fruits = new Fruits();
        $fruits->name = $request->get("fruit");
        $fruits->save();
        return redirect() -> route("fruits.index");

    }

    public function delete($id){
        $fruits = Fruits::destroy($id); 
        return redirect() -> route('fruits.index');
    }

    public function update(Request $request, $id){

        $fruits = Fruits::findOrFail($id);
        $fruits->name = $request->get('fruit');
        $fruits->save();
        return redirect() -> route('fruits.index');
    }
}
