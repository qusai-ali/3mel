<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Item;
use App\ItemImage;
use App\Category;
use App\CategoryItem;
use App\City;
use Image;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //  ***** Admin Functions ***** //

    // Show all items
    public function admin() {
        $items = Item::orderBy('id','DESC')->paginate(15);
        return view('dashboard.item.item',compact('items'));
    }
    
    // Go to add new item page
    public function create() {
        $categories = Category::all();
        $cities = City::all();
        return view('dashboard.item.item-add',compact('categories','cities'));
    }
    
    // Add new item
    public function store(Request $request) {

        $request->validate([
            'item_title_ar' => 'required',
            'item_title_en' => 'required',
            'item_desc_ar' => 'required',
            'item_desc_en' => 'required',
            'item_address_ar' => 'required',
            'item_address_en' => 'required',
            'item_phone' => 'required',
            'item_city' => 'required',
            'img' => 'required',
            'category' => 'required',
        ],
        [
            'item_title_ar.required' => 'هذا الحقل مطلوب',
            'item_title_en.required' => 'هذا الحقل مطلوب',
            'item_desc_ar.required' => 'هذا الحقل مطلوب',
            'item_desc_en.required' => 'هذا الحقل مطلوب',
            'item_address_ar.required' => 'هذا الحقل مطلوب',
            'item_address_en.required' => 'هذا الحقل مطلوب',
            'item_phone.required' => 'هذا الحقل مطلوب',
            'item_city.required' => 'هذا الحقل مطلوب',
            'img.required' => 'هذا الحقل مطلوب',
            'category' => 'هذا الحقل مطلوب'
        ]);
        
        

        $data = [
            
            'phone_number' => $request->item_phone,
            'city_id' => $request->item_city,
            'ar' => [
                'item_title_ar' => $request->item_title_ar,
                'item_desc_ar' => $request->item_desc_ar,
                'item_address_ar' => $request->item_address_ar
            ],
            'en' => [
                'item_title_en' => $request->item_title_en,
                'item_desc_en' => $request->item_desc_en,
                'item_address_en' => $request->item_address_en
            ]
        ];

        dd($data);

        $item = Item::create($data);

        $item_categories = $request->category;
        
        if(!$item_categories == NULL) {
            foreach($item_categories as $cat) {
                CategoryItem::insert( [
                    'category_id'=>  $cat,
                    'item_id'=> $item->id
                ]);
            }
        } 
        
        if($request->file('img')){
            $path = 'images/items/'.$item->id.'/';
            if(!(\File::exists($path))){
                \File::makeDirectory($path);
            } 
            $files=$request->file('img');
            foreach($files as $file) {
 
                $input['img'] = $file->getClientOriginalName();
                $destinationPath = 'images/items/';
                
                $img = Image::make($file->getRealPath());
                $img->resize(800, 750, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path.$input['img']);
                $name = $path.$input['img'];
                ItemImage::insert( [
                    'img'=>  $name,
                    'item_id'=> $item->id
                ]);
            }
        }

        return redirect('/admin/items')->with('message','تم إضافة مكان جديد بنجاح');

    }
    
    // Show all items related to spicifice category
    public function show($id) {
        $category = Category::find($id);
        $items = $category->items;
        return view('dashboard.item.item-cat',compact('items'));
    }

    // Go to edit item page
    public function edit($id) {
        $item = Item::where('id',$id)->first();
        $categories = Category::all();
        $item_id = $item->id;
        $item_categories = CategoryItem::where('item_id',$item_id)->get();
        return view('dashboard.item.item-edit',compact('item','item_categories','categories'));
    }
    
    //Update item info
    public function update(Request $request, $id) {
        
        $item = Item::where('id',$id)->first();
        $item_id = $item->id;
        $item_categories = CategoryItem::where('item_id',$item_id)->delete();
        $request->validate([
            'item_title_ar' => 'required',
            'item_title_en' => 'required',
            'item_desc_ar' => 'required',
            'item_desc_en' => 'required',
            'item_address_ar' => 'required',
            'item_address_en' => 'required',
            'item_phone' => 'required',
            'item_city' => 'required',
            'category' => 'required',
        ],
        [
            'item_title_ar.required' => 'هذا الحقل مطلوب',
            'item_title_en.required' => 'هذا الحقل مطلوب',
            'item_desc_ar.required' => 'هذا الحقل مطلوب',
            'item_desc_en.required' => 'هذا الحقل مطلوب',
            'item_address_ar.required' => 'هذا الحقل مطلوب',
            'item_address_en.required' => 'هذا الحقل مطلوب',
            'item_phone.required' => 'هذا الحقل مطلوب',
            'item_city.required' => 'هذا الحقل مطلوب',
            'category' => 'هذا الحقل مطلوب'
        ]);
        
        $data = [
            
            'phone_number' => $request->item_phone,
            'city_id' => $request->item_city,

            'ar' => [
                'item_title_ar' => $request->item_title_ar,
                'item_desc_ar' => $request->item_desc_ar,
                'item_address_ar' => $request->item_address_ar
            ],
            'en' => [
                'item_title_en' => $request->item_title_en,
                'item_desc_en' => $request->item_desc_en,
                'item_address_en' => $request->item_address_en
            ]
        ];

        $item->update($data);

        $item_categories = $request->category;
        if($item_categories != NULL) {
            foreach($item_categories as $cat) {
                CategoryItem::insert( [
                    'category_id'=>  $cat,
                    'item_id'=> $item->id
                ]);
            }
        } 

        if($request->file('img')){
            $path = 'images/items/'.$item->id.'/';
            $files=$request->file('img');
            foreach($files as $file) {
                $input['img'] = $file->getClientOriginalName();
          
                $img = Image::make($file->getRealPath());
                $img->resize(800, 750, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path.$input['img']);
                $name = $path.$input['img'];
                ItemImage::insert( [
                    'img'=>  $name,
                    'item_id'=> $item->id
                ]);
            }
        }

        return redirect()->back()->with('message','تم تعديل بيانات المكان بنجاح');
    }

    // Delete Sub image form item
    public function imagedelete($id) {
        $img = ItemImage::where('id',$id)->first();
        $item_id = $img->item_id;
        $images = ItemImage::where('item_id',$item_id)->get();
        if (count($images) > 1) {
             $path = 'images/items/';
            if(\File::exists($img->img)){
                \File::delete($img->img);
            }
            $img->delete();
            return redirect()->back()->with('message','تم حذف الصورة بنجاح');
        } else {
            return redirect()->back()->with('message','لايمكنك حذف الصورة، يجب أن يكون للمكان صورة واحدة على الأقل');
        }
    }

    // Delete item with all images form directory
    public function destroy($id) {
        $item = Item::where('id',$id)->first();
        foreach($item->images as $img) {
            if(\File::exists($img->img)){
                \File::delete($img->img);
        }
        }
        $path = 'images/items/'.$item->id.'/';
        if(\File::exists($path)){
            \File::deleteDirectory($path);
        }    
        $item->delete();
        return redirect('/admin/items')->with('message','تم حذف بيانات المكان بنجاح');
    }
}
