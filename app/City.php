<?php

namespace App;
use App\CityImage;
use App\Item;


use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class City extends Model
{
    use Translatable;
    protected $table = 'cities';
    protected $fillable = ['images'];
    public $translatedAttributes = ['name'];

    public function images(){
        return $this->hasMany('App\CityImage');
    }

    public function items(){
        return $this->hasMany('App\Item');
    }
}
