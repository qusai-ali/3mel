<?php

namespace App;
use App\City;

use Illuminate\Database\Eloquent\Model;

class CityImage extends Model
{
    protected $table = 'cityimages';
    protected $fillable = ['img'];

    public function items() {
        return $this->belongTo('App\City');
    }
}
