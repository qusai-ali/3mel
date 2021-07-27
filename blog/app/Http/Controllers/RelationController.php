<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Category;
use App\Cities_Category;
use App\Content;
use Image;

class RelationController extends Controller
{
   public function getcat(){
     $city=City::with('categories')->find(1);
 return $city->created_at->format('m/d/Y');
//return $city -> categories;
   }
   public function GetDetails ($cityId){
       $city=City::find($cityId);
       $categories=$city->categories;
       return view('cities',compact('categories','city'));
    }
public function AddNewCategory(request $request)   {
$city=City::find($request->cityid);
$category=new Category;
$category->title=$request->title;
$category->save();
//dd($category->id);
$city->categories()->syncWithoutDetaching($category->id);
//return $city ;
return redirect()->back();
}
public function AddPlace($id){
  // $city=City::with('contents')-> find(1);
   //return $city->name;
 // return  $city->contents;
    //city=City::find($id);
   // $contents=$city->contents;
   // dd($contents);
 //return   view('Addplace',compact('city','contents'));
  // return view('Addplace');
 // $city=City::with('contents')->find($id);
//$content= $city->contents;
//return view('Addplace',compact('content','city'));
$category=Category::with('contents')->find($id);
$content=$category->contents;
return view('Addplace',compact('content','category'));
//dd($id);

}
public function AddNewPlace($id){

    $category=Category::find($id);
    return view('AddNewPlace',compact('category'));
}

public function SaveNewplace(Request $request,$id){
    $request->validate([
        'name'=>'required | max:15 |min:2',
        'img'=> 'required',
        'Address'=>'required | max:70 |min:2',
        'phone'=>'required | max:15 |min:5',
    ]);
    $category=Category::find($request->id);
    //dd($category);
    //$content=Content::find($id);
    $content=new Content;
    $content->name=$request->name;  
    $content->Address=$request->Address;
    $content->phone_number=$request->phone;
    $content->comment=$request->comment;
    $img=$request->img;
        $filename=$img->getClientOriginalName();
        $img_resize= Image::make($img->getRealPath());
        $img_resize->resize(400,400);
        $img_resize->save(public_path('images/' .$filename));
        $img_path = public_path('images/'.$filename);
    $content->imgurl=$img_path;
    $content->category_id=$request->category_id;
    //dd($content);
    $content->save();
    //$category->contents()->syncWithoutDetaching($content->category_id);
return redirect()->back();

}


}