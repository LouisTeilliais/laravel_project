<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cocktails extends Model
{
    use HasFactory;

    protected $table = "cocktails";

    protected $fillable = [
        "name",
    ];
}