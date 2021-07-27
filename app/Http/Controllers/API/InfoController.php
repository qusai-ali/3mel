<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\City;
use App\Category;
use App\Item;

class InfoController extends Controller
{
    // Get All Cities
    public function cities(){
        $cities = City::all();
        return response()->json($cities);
    }

    // Get All Categories
    public function categories(){
        $categories = Category::all();
        return response()->json($categories);
    }

    // Get All Places 
    public function places() {
        $places = Item::all();
        return response()->json($places);
    }
    
}
