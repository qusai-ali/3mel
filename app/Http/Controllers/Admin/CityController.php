<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Category;
use Image;
use App\City;
use App\CityImage;



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

      
      $city = City::create($data);
             if($request->file('img')){
              $path = 'images/city/'.$city->id.'/';
              if(!(\File::exists($path))){
                  \File::makeDirectory($path);
              } 
              $files=$request->file('img');

              foreach($files as $file) {
                  $input['img'] = $file->getClientOriginalName();
                  $destinationPath = 'images/city/';
                  $img = Image::make($file->getRealPath());
                  $img->resize(800, 750, function ($constraint) {
                      $constraint->aspectRatio();
                  })->save($path.$input['img']);
                  $name = $path.$input['img'];
                  CityImage::insert( [
                      'img'=>  $name,
                      'City_id'=> $city->id
                  ]);
              }
          }
        //dd($data);########################

     return redirect('/admin/cities')->with('message','تم إضافة مدينة جديدة بنجاح');

     }
     public function destroy($id) {
      $city = City::where('id',$id)->first();
        if(\File::exists($city->img)){
              \File::delete($city->img);
              \File::delete($city->name);
           }
     $city->delete();
     return redirect('/admin/cities')->with('message','تم حذف المدينة بنجاح');
 }

 //##############city edit########
 public function edit($id) {
  $city = City::where('id',$id)->first();
  return view('dashboard.city.city-edit',compact('city'));
}

public function update(Request $request, $id) {
  
  $city = City::where('id',$id)->first();
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
  $city->update($data);

  return redirect()->back()->with('message','تم تعديل بيانات العلامة التجارية بنجاح');
}


}
