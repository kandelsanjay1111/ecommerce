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
        $sort="name";
        if($request->has('sort_by'))
        {
            $sort=$request->sort_by;
        }
        $products=Product::whereHas('category',function($query) use($slug){
            return $query->where('category_slug',$slug);
        })
        ->orderBy($sort,'asc')
        ->get();

        // dd($products);

        $categories=Category::where('status','active')->get();

        return view('frontend.category')->with([
            'products'=>$products,
            'categories'=>$categories
        ]);
    }
}
