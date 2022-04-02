<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlcoholList extends Model
{
    use HasFactory;

    protected $table = "alcoholList";

    protected $fillable = [

        "name", 
        "degrees",
        
    ];
}
