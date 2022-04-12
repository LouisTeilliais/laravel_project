<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cocktails;

class Fruits extends Model
{
    use HasFactory;

    protected $table = "fruits";

    protected $fillable = [
        "name",
        "image_url"
    ];

    public function cocktails(){
        return $this->belongToMany(Cocktails::class);
    }
}