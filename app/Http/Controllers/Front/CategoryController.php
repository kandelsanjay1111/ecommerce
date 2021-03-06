<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index(Request $request,$slug)
    {
        // dd($request->all());
        $sort="name";
        $color=[];
        if(isset($request->color))
        {
            $color_value=explode(',',$request->color);
            foreach($color_value as $value){
                $color[]=$value;
            } 
        }
        
        if($request->has('sort_by'))
        {
            if(in_array($data=$request->sort_by, ['name','price','created_at']))
            {
            $sort=$data;
            }
        }
        $products=Product::select(
            'products.*',
            'products_attr.price',
            'products_attr.id as attr_id',
        )->whereHas('category',function($query) use($slug){
            return $query->where('category_slug',$slug);
        })
        ->leftJoin('products_attr','products.id','=','products_attr.id');

        $products=$this->filter($products,$sort,$color);    
        // dd($products);

        $categories=Category::where('status','active')->get();
        // dd($categories);

        return view('frontend.category')->with([
            'products'=>$products,
            'categories'=>$categories
        ]);
    }

    protected function filter($products,$sort,$color)
    {
        // dd($color);
        $products=$products
                ->orderBy($sort,'asc');
        if($color!=[])
        {
            $products->select('colors.color','products.*')
                ->leftJoin('colors','products_attr.color_id','=','colors.id')
                ->whereIn('color',$color);
        }
        return $products->get();
    }
}
