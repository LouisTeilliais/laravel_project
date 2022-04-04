<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlcoholList extends Model
{
    use HasFactory;

    protected $table = "alcohol_list";

    protected $fillable = [

        "name", 
        "degrees",
        "alcohol_id"

    ];

    public function alcoholBrand() {
        return $this->belongsTo('App\Models\AlcoholType', "alcohol_id");
    }
}

?>