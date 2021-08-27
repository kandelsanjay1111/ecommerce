<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Product;
use  App\Models\Brand;
use DB;
use Storage;
class ProductController extends Controller
{
    public function index()
    {
        $product=Product::all();
        return view('admin.product.index')->with('products',$product);
    }

    public function create()
    {
        $categories=DB::table('categories')->where('status','active')->get();
        $sizes=DB::table('sizes')->where('status','active')->get();
        $colors=DB::table('colors')->where('status','active')->get();
        $brands=Brand::all();
        // dd($categories);
        return view('admin.product.create')->with([
            'categories'=>$categories,
            'sizes'=>$sizes,
            'colors'=>$colors,
            'brands'=>$brands
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data=$request->validate([
            'name'=>'required|string|max:255',
            'category_id'=>'required',
            'slug'=>'required|string|max:255|unique:products',
            'brand'=>'required',
            'model'=>'required',
            'image'=>'required',
            'short_desc'=>'required',
            'keywords'=>'required',
            'technical_specification'=>'required',
            'warranty'=>'required',
            'is_promo'=>'required',
            'is_featured'=>'required',
            'is_discounted'=>'required',
            'is_trending'=>'required',
            'attr_image'=>'required',
            'product_image'=>'required'
        ]);
         // dd($request->all());
        $product=new Product();
        $product->name=$data['name'];
        $product->category_id=$data['category_id'];
        $product->slug=$data['slug'];
        $product->brand=$data['brand'];
        if($request->hasFile('product_image'))
        {
            $ext=$request->file('product_image')->extension();
            $image_name=$request->slug.time().'.'.$ext;
            $request->product_image->storeAs('public/media',$image_name);
            $product->image=$image_name;
        }
        $product->model=$data['model'];
        $product->short_desc=$data['short_desc'];
        $product->keywords=$data['keywords'];
        $product->technical_specification=$data['technical_specification'];
        $product->warranty=$data['warranty'];
        $product->is_promo=$data['is_promo'];
        $product->is_featured=$data['is_featured'];
        $product->is_discounted=$data['is_discounted'];
        $product->is_trending=$data['is_trending'];
        $product->save();

        foreach ($request->sku as $key => $value) {
            $newData=[
                'product_id'=>$product->id,
                'sku'=>$value,
                'mrp'=>$request->mrp[$key],
                'price'=>$request->price[$key],
                'quantity'=>$request->quantity[$key],
                'size_id'=>$request->size_id[$key],
                'color_id'=>$request->color_id[$key]
            ];

            if($request->hasFile('attr_image'))
            {
                $ext=$request->file('attr_image')[$key]->extension();
                $image_name=$request->slug.time().'.'.$ext;
                $request->attr_image[$key]->storeAs('public/media',$image_name);
                $newData['image']=$image_name;
            }

            DB::table('products_attr')->insert($newData);
        }

        //multiple image store

        foreach($request->image as $key=>$image)
        {
            $imageData[]=[
                'product_id'=>$product->id
            ];
           if(is_file($request->image[$key]))
           {
                $ext=$request->image[$key]->extension();
                $image_name=$request->slug.time().'.'.$ext;
                $request->image[$key]->storeAs('public/media',$image_name);
                $imageData[$key]['image']=$image_name;
           }
        }

        DB::table('product_images')->insert($imageData);


        return redirect()->route('admin.product')->with('success','Product is created successfully');
    }

    public function edit($id)
    {
        $product=Product::find($id);
        $categories=DB::table('categories')->where('status','active')->get();
        $sizes=DB::table('sizes')->where('status','active')->get();
        $colors=DB::table('colors')->where('status','active')->get();
        $attributes=DB::table('products_attr')->where('product_id',$id)->get();
        $images=DB::table('product_images')->where('product_id',$id)->get();
        $brands=Brand::all();
        return view('admin.product.edit')->with([
            'product'=>$product,
            'categories'=>$categories,
            'sizes'=>$sizes,
            'colors'=>$colors,
            'attributes'=>$attributes,
            'images'=>$images,
            'brands'=>$brands
        ]);
    }

    public function update(Request $request,$id)
    {
        $data=$request->validate([
            'name'=>'required|string|max:255',
            'category_id'=>'required',
            'slug'=>'required|string|max:255|unique:products,slug,'.$id,
            'image'=>'sometimes',
            'brand'=>'required',
            'model'=>'required',
            'short_desc'=>'required',
            'keywords'=>'required',
            'technical_specification'=>'required',
            'warranty'=>'required',
            'is_promo'=>'required',
            'is_featured'=>'required',
            'is_discounted'=>'required',
            'is_trending'=>'required',
            'product_image'=>'sometimes|mimes:jpg,jpeg,png'
        ]);

        // dd($request->image);
        $product= Product::find($id);
        $product->name=$data['name'];
        $product->category_id=$data['category_id'];
        $product->slug=$data['slug'];
        $product->brand=$data['brand'];

        if($request->hasFile('product_image'))
        {
            $ext=$request->file('product_image')->extension();
            $image_name=$request->slug.time().'.'.$ext;
            if(Storage::exists('public/media/'.$product->image))
            {
                Storage::delete('public/media/'.$product->image);
            }
            $request->product_image->storeAs('public/media',$image_name);
            $product->image=$image_name;
        }
        
        $product->model=$data['model'];
        $product->short_desc=$data['short_desc'];
        $product->keywords=$data['keywords'];
        $product->technical_specification=$data['technical_specification'];
        $product->warranty=$data['warranty'];
        $product->is_promo=$data['is_promo'];
        $product->is_featured=$data['is_featured'];
        $product->is_discounted=$data['is_discounted'];
        $product->is_trending=$data['is_trending'];
        $product->save();

        $attributes=DB::table('products_attr')->select('id')->where('product_id',$id)->get();
          foreach ($attributes as $key => $attribute) {
              $ids[]=$attribute->id;
          }
          $deleted_ids=array_diff($ids,$request->attribute_id);

          if(count($deleted_ids)>0)
          {
            foreach($deleted_ids as $id)
            {
                DB::table('products_attr')->where('id',$id)->delete();
            }
          }

          //dd($request->attr_image);
          if($request->hasFile('attr_image'))
          {
           $image_keys=array_keys($request->attr_image); 
          }
          else{
            $image_keys=[];
          }

        foreach ($request->sku as $key => $value) {
            $newData=[
                'product_id'=>$product->id,
                'sku'=>$value,
                'mrp'=>$request->mrp[$key],
                'price'=>$request->price[$key],
                'quantity'=>$request->quantity[$key],
                'size_id'=>$request->size_id[$key],
                'color_id'=>$request->color_id[$key]
            ];

            foreach($image_keys as $ikey)
            {
                if($ikey==$key){
                    $ext=$request->attr_image[$key]->extension();
                    $image_name=$request->slug.time().'.'.$ext;
                    $request->attr_image[$key]->storeAs('public/media',$image_name);
                    $newData['image']=$image_name;
                }
            }

            if($request->attribute_id[$key]=='')
            {
            DB::table('products_attr')->insert($newData);
            }
            else{
                $attributes=DB::table('products_attr')->where('id',$request->attribute_id[$key]);
                $attributes->update($newData);
            }
        }

        //delete multiple images
        $product_images=DB::table('product_images')->select('id')->where('product_id',$id)->get();
          foreach ($product_images as $key => $images) 
          {
              $image_ids[]=$images->id;
          }
          $deleted_image_ids=array_diff($image_ids,$request->image_id);
          if(count($deleted_image_ids)>0)
          {
            foreach($deleted_image_ids as $img_id)
            {
                $product_image=DB::table('product_images')->where('id',$img_id);
                $image_item=$product_image->get();
                foreach($image_item as $item)
                {
                    if($item->image)
                    {
                        Storage::delete('public/media/'.$item->image);
                    }
                }
                $product_image->delete();
            }
          }


          //create new entry of images
          if($request->hasFile('image'))
          {

            foreach($request->image as $key=>$image)
            {
                // dd($request->image_id);
                if($request->image_id[$key]!='')
                {
                    $ext=$request->image[$key]->extension();
                    $image_name=$request->slug.$request->image_id[$key].time().'.'.$ext;
                    $request->image[$key]->storeAs('public/media',$image_name);

                    $product_images=DB::table('product_images')
                                    ->where('id',$request->image_id[$key])
                                    ->where('product_id',$id);
                    $image_item=$product_images->first();
                    if($image_item->image)
                    {
                        Storage::delete('public/media/'.$image_item->image);
                    }
                    $product_images->update(['image'=>$image_name]);
                }
                else
                {
                    $ext=$request->image[$key]->extension();
                    $image_name=$request->slug.time().'.'.$ext;
                    $request->image[$key]->storeAs('public/media',$image_name);

                    DB::table("product_images")->insert([
                        'product_id'=>$id,
                        'image'=>$image_name
                    ]);
                }
            }

          }

        return redirect()->route('admin.product')->with('success','Product is updated successfully');
    }

    public function destroy(Product $product)
    {
        if($product->image)
        {
            Storage::delete('/public/media/'.$product->image);
        }
        $attributes=DB::table('products_attr')->where('product_id',$product->id);
        foreach($attributes->get() as $attribute)
        {
            if($attribute->image)
            {
                Storage::delete('/public/media/'.$attribute->image);
            }
        }

        $product_images=DB::table('product_images')->where('product_id',$product->id);
        foreach($product_images->get() as $image)
        {
            if($image->image)
            {
                Storage::delete('/storage/media'.$image->image);
            }
        }

        $product_images->delete();
        $attributes->delete();
        $product->delete();

        return redirect()->route('admin.product')->with('success','Product is deleted successfully');
    }

    public function status()
    {

    }

}