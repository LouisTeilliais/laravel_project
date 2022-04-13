<?php

namespace App\Models\Liaison;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CocktailMarques extends Model
{
    use HasFactory;

    protected $table = "cocktails_marque";

    protected $fillable = [
        "cocktail_id",
        "brand_id",
    ];

    public function cocktailsId() {
        return $this->belongsTo('App\Models\Cocktails', "cocktail_id");
    }

    public function cocktailsBrand() {
        return $this->belongsTo('App\Models\AlcoholList', "brand_id");
    }

}