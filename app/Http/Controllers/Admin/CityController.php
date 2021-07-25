<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Category;
use Image;
use App\City;


class CityController extends Controller
{
     public function __construct()
    {
      $this->middleware('auth:admin');
    }
    public function index(){
        
    }

    // Show all Cities
    public function admin() {
    $cities = City::orderBy('id','DESC')->paginate(15);
    return view('dashboard.city.city',compact('cities'));
     }

    // Go to add new city page

     public function create() {
      $Cities = City::all();
      return view('dashboard.city.city-add',compact('Cities'));
      }
     public function store(request $request){
      $city=new City;
      $last_cit = City::latest('id')->first();
      if ($last_cit == NULL) {
          $i = 1;
      } else {
        $i = $last_cit->id + 1;
      }
      $request->validate([
            'city_name'=>'required | max:15 |min:2',
            'img'=> 'required'
        ],
        [
            'city_name.required' => 'هذا الحقل مطلوب',
            'img.required' => 'هذا الحقل مطلوب',
       ]);

      $city_name=$request->city_name;
      $city_name_en=$request->city_name_en;

      $data = [
           'ar' => [
               'name' => $city_name,
             ],
           'en' => ['name' =>$city_name_en,]
             ];
      
      if($request->file('img')){
            $image=$request->file('img');

            $input['img'] = $image->getClientOriginalName();
            $path = 'images/city/';
            $destinationPath = 'images/city';
            // $destinationPath = '/images/city';
            $img = Image::make($image->getRealPath());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.time().$input['img']);
            $name = $path.time().$input['img'];

         $data['image'] =  $name;
       }
        //dd($data);
      $city->create($data);

      return redirect('/admin/cities')->with('message','تم إضافة مدينة جديدة بنجاح');

    }

}
