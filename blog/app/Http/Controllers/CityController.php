<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use Image;
use DB;
class CityController extends Controller
{
    //
    public function indexCity(){
        $index=City::all();
        $count= DB::table('cities')->count();
        //dd($count);
        return view('city')->with('index',$index)->with('count',$count);
    }

        ######### Add City###########
    public function AddNewCity(request $request){
       $request->validate([
            'name'=>'required | max:15 |min:2',
            'img'=> 'required'
        ]);
        //dd($request->img->getClientOriginalName());
        $city=new City;
        $city->name=$request->name; 
        $img=$request->img;
        $filename=$img->getClientOriginalName();
        $img_resize= Image::make($img->getRealPath());
        $img_resize->resize(400,400);
        $img_resize->save(public_path('images/' .$filename));
        $img_path = public_path('images/'.$filename);
        $city->imgurl=$img_path;
        $city->save();
        return redirect('/admin/cities');
    }
    ##########     end Add City   ###########
    ##########    edit City       ###########
    public function EditCity($id){
        $EditCity=City::find($id);
        return view('/EditCity')->with('EditCity',$EditCity);
    }
    ##########  end edit CITY     ###########
    public function deletecity($id){
        $del= City::find($id);
        $del->delete();
        return redirect('/admin/cities');
    }
    public function updatecity(Request $request,$id){
        //dd($request->img->getClientOriginalName());
        $city=City::find($id);
        $city->name=$request->newname; 
        if ($request ->has('img')){
            $img=$request->img;
        $filename=$img->getClientOriginalName();
        $img_resize= Image::make($img->getRealPath());
        $img_resize->resize(400,400);
        $img_resize->save(public_path('images/' .$filename));
        $img_path = public_path('images/'.$filename);
        $city->imgurl=$img_path;
        $city->save();
        return redirect('/admin/cities');
    }
}
}

