<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Product;
use DB;
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
        // dd($categories);
        return view('admin.product.create')->with('categories',$categories);
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required|string|max:255',
            'category_id'=>'required',
            'slug'=>'required|string|max:255|unique:products',
            'brand'=>'required',
            'model'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg',
            'short_desc'=>'required',
            'keywords'=>'required',
            'technical_specification'=>'required',
            'warranty'=>'required'
        ]);

        // dd($data);
        $product=new Product();
        $product->name=$data['name'];
        $product->category_id=$data['category_id'];
        $product->slug=$data['slug'];
        $product->brand=$data['brand'];
        if($request->hasFile('image'))
        {
            $ext=$request->file('image')->extension();
            $image_name=$request->slug.time().'.'.$ext;
            $request->image->storeAs('public/media',$image_name);
            $product->image=$image_name;
        }
        $product->model=$data['model'];
        $product->short_desc=$data['short_desc'];
        $product->keywords=$data['keywords'];
        $product->technical_specification=$data['technical_specification'];
        $product->warranty=$data['warranty'];
        $product->save();
        return redirect()->route('admin.product')->with('success','Product is created successfully');
    }

    public function edit($id)
    {
        $product=Product::find($id);
        $categories=DB::table('categories')->where('status','active')->get();
        $sizes=DB::table('sizes')->where('status','active')->get();
        $colors=DB::table('colors')->where('status','active')->get();
        $attributes=DB::table('products_attr')->where('product_id',$id)->get();
        return view('admin.product.edit')->with([
            'product'=>$product,
            'categories'=>$categories,
            'sizes'=>$sizes,
            'colors'=>$colors,
            'attributes'=>$attributes
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
            'warranty'=>'required'
        ]);
        //dd($request->attribute_id);
        $product= Product::find($id);
        $product->name=$data['name'];
        $product->category_id=$data['category_id'];
        $product->slug=$data['slug'];
        $product->brand=$data['brand'];

        if($request->hasFile('image'))
        {
            $ext=$request->file('image')->extension();
            $image_name=$request->slug.time().'.'.$ext;
            $request->image->storeAs('public/media',$image_name);
            $product->image=$image_name;
        }
        
        $product->model=$data['model'];
        $product->short_desc=$data['short_desc'];
        $product->keywords=$data['keywords'];
        $product->technical_specification=$data['technical_specification'];
        $product->warranty=$data['warranty'];
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

        foreach ($request->sku as $key => $value) {
            $newData=[
                'product_id'=>$product->id,
                'sku'=>$value,
                'image'=>'rest',
                'mrp'=>$request->mrp[$key],
                'price'=>$request->price[$key],
                'quantity'=>$request->quantity[$key],
                'size_id'=>$request->size_id[$key],
                'color_id'=>$request->color_id[$key]
            ];
            if($request->attribute_id[$key]=='')
            {
            DB::table('products_attr')->insert($newData);
            }
            else{
                $attributes=DB::table('products_attr')->where('id',$request->attribute_id[$key]);
                $attributes->update($newData);
            }
        }
        return redirect()->route('admin.product')->with('success','Product is updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product')->with('success','Product is deleted successfully');
    }

    public function status()
    {
        
    }
}
