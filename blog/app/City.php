<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table="cities";
    protected $fillable= ['name','imgurl','created_at','updated_at'];


public function categories(){
    return $this -> belongsToMany ('App\Category','cities__categories','City_id','Category_id','id','id');
}

}