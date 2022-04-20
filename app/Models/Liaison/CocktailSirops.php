<?php

namespace App\Models\Liaison;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CocktailSirops extends Model
{
    use HasFactory;

    protected $table = "cocktails_sirop";

    protected $fillable = [
        "cocktail_id",
        "sirop_id",
    ];

    public function cocktailsId() {
        return $this->belongsTo('App\Models\Cocktails', "cocktail_id");
    }

    public function cocktailsSirops() {
        return $this->belongsTo('App\Models\Sirop', "sirop_id");
    }

}