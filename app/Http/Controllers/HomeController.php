<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cocktails;
use App\Models\Glasses;
use App\Models\Fruits;
use App\Models\AlcoholType;
use App\Models\AlcoholList;
use App\Models\Softs;
use App\Models\Sirop;
use App\Models\Liaison\CocktailFruits;
use App\Models\Liaison\CocktailMarques;
use App\Models\Liaison\CocktailSirops;
use App\Models\Liaison\CocktailSofts;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cocktails= Cocktails::all();
        $alcohols = AlcoholType::all();
        $glasses = Glasses::all();
        $fruits = Fruits::all();
        $brands = AlcoholList::all();
        $softs = Softs::all();
        $sirops = Sirop::all();
        $cocktailFruits = CocktailFruits::all();
        $cocktailMarques = CocktailMarques::all();
        $cocktailSirops = CocktailSirops::all();
        $cocktailSofts = CocktailSofts::all();

        return view("home", compact("cocktails", "glasses", "fruits", "alcohols", "brands", "softs", "sirops", "cocktailFruits", "cocktailMarques", "cocktailSirops", "cocktailSofts"));
    }
}
