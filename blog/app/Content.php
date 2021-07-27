<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table="contents";
    protected $fillable= ['name','Type','Category_id','created_at','updated_at'];

public function category(){
    return $this->belongsTo('App\Category','category_id','id');
}


}
