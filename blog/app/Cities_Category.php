<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities_Category extends Model
{
    protected $table="Cities_Categories";
    protected $fillable= ['City_id','Category_id','created_at','updated_at'];

}
