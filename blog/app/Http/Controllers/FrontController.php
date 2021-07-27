<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Category;
use App\Cities_Category;
use App\Content;
use Image;

class FrontController extends Controller
{
    public function Details($id){
       $city=City::find($id);
       $category=Category::find($id);

       $category=Category::with('contents')->find($id);
       $content= $category->contents;
       return view('places')->with('city',$city)->with('category',$category)->with('content',$content);

    }

        
        //$place=Content::all();
        //return view('places')->with('city',$city)->with('category',$category)->with('place',$place);
       

    }

