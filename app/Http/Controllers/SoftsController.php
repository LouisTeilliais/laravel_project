<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Softs;



class SoftsController extends Controller
{
    public function index(){

        $softs = Softs::all();

        return view("alcohol.softs", compact("softs"));
    }
    
    public function create(Request $request){
        
        $softs = new Softs();
        $softs->name = $request->get("name2");
        $softs->save();
        return redirect() -> route("softs.index");

    }

    public function delete($id){
        $softs = Softs::destroy($id); // soit sa le trouve est créer un objet Softs sinon ça met une erreur
        return redirect() -> route('softs.index');
    }

    // public function modifier($id){

    //     $softs = Softs::findOrFail($id);
    //     return view("alcohol.modifier", compact("softs"));
    // }

}