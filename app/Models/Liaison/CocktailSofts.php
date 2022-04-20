<?php

namespace App\Models\Liaison;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CocktailSofts extends Model
{
    use HasFactory;

    protected $table = "cocktails_softs";

    protected $fillable = [
        "cocktail_id",
        "softs_id",
    ];

    public function cocktailsId() {
        return $this->belongsTo('App\Models\Cocktails', "cocktail_id");
    }

    public function cocktailsSirops() {
        return $this->belongsTo('App\Models\Softs', "softs_id");
    }

}