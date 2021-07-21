<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Category;
use  App\Models\Product;
use  App\Models\Banner;
use DB;

class FrontController extends Controller
{
    public function index()
    {
        $categories=Category::with('subcategory')
                    ->where('status','active')
                    ->where('parent_id',NULL)
                    ->get();

        $products=Product::where('status','active')->get();
        $banners=Banner::where('status','active')->get();
        return view('frontend.index')->with([
            'categories'=>$categories,
            'products'=>$products,
            'banners'=>$banners
        ]);
    }

    public function product(Product $product)
    {
        dd($product);
    }
}
