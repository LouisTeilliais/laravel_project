<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlcoholType extends Model
{
    use HasFactory;

    protected $table = "types_alcohol";

    protected $fillable = [

        "name",
        "alcohol_id"
    ];


}
