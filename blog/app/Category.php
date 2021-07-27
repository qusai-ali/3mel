<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="categories";
    protected $fillable= ['title','created_at','updated_at'];



    public function cites(){
        return belongsToMany('App\City','cities__categories','Category_id','City_id');
    }
    public function contents(){
        return $this ->hasMany ('App\content','category_id','id');
    }
}
