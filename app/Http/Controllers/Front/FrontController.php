<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Category;
use  App\Models\Product;
use DB;

class FrontController extends Controller
{
    public function index()
    {
        $categories=Category::where('status','active')
        ->where('parent_id',NULL)
        ->take(4)
        ->get();
        // dd($categories[0]->products);
        return view('frontend.index')->with([
            'categories'=>$categories,
        ]);
    }
}
