<?php

namespace App\Models\Liaison;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CocktailFruits extends Model
{
    use HasFactory;

    protected $table = "cocktails_fruits";

    protected $fillable = [
        "cocktail_id",
        "fruits_id",
    ];

    public function cocktailsId() {
        return $this->belongsTo('App\Models\Cocktails', "cocktail_id");
    }

    public function cocktailsFruits() {
        return $this->belongsTo('App\Models\Fruits', "fruits_id");
    }

}