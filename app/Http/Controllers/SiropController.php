<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sirop;

class SiropController extends Controller
{
    public function index(){

        $sirop = Sirop::all();

        return view("admin.sirop", compact("sirop"));
    }

    public function create(Request $request){
        
        $sirop = new Sirop();
        $sirop ->name = $request->get('add');
        $sirop->save();

        return redirect() -> route("sirop.index");

    }

    public function delete($id){
        $sirop = Sirop::destroy($id); 
        return redirect() -> route('sirop.index');
    }

    public function update(Request $request, $id){

        $sirop = Sirop::findOrFail($id);
        $sirop->name = $request->get('add');
        $sirop->save();

        return redirect()->route('sirop.index');
    }

}
