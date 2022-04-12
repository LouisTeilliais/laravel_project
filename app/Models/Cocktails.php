<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fruits;

class Cocktails extends Model
{
    use HasFactory;

    protected $table = "cocktails";

    protected $fillable = [
        "name",
        "glasse_id",
    ];

    public function cocktailsGlasse() {
        return $this->belongsTo('App\Models\Glasses', "glasse_id");
    }

    public function fruits(){
        return $this->belongsToMany(Fruits::class);
    }
}