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
            'image'=>'required',
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
        return view('admin.product.edit')->with([
            'product'=>$product,
            'categories'=>$categories
        ]);
    }

    public function update(Request $request,$id)
    {
        $data=$request->validate([
            'name'=>'required|string|max:255',
            'category_id'=>'required',
            'slug'=>'required|string|max:255|unique:products,slug,'.$id,
            'image'=>'required',
            'brand'=>'required',
            'model'=>'required',
            'short_desc'=>'required',
            'keywords'=>'required',
            'technical_specification'=>'required',
            'warranty'=>'required'
        ]);
        // dd($data);
        if($request->hasFile('image'))
        {
            $ext=$request->file('image')->extension();
            $image_name=now().'.'.$ext;
            $request->image->storeAs('public/media',$image_name);
        }
        else{
            dd('no image');
        }
        $product= Product::find($id);
        $product->name=$data['name'];
        $product->category_id=$data['category_id'];
        $product->slug=$data['slug'];
        $product->brand=$data['brand'];
        $product->model=$data['model'];
        $product->short_desc=$data['short_desc'];
        $product->keywords=$data['keywords'];
        $product->technical_specification=$data['technical_specification'];
        $product->warranty=$data['warranty'];
        $product->save();
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
