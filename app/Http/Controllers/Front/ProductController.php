<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function product($id)
    {
       $product=Product::with('attributes')->findorFail($id);
       // dd($product);
        return view('frontend.product_detail')->with('product',$product);
    }

    public function cart()
    {
        // dd(session()->all());
        return view('frontend.cart');
    }

    public function addToCart(Request $request)
    {
        // dd($request['item-no']);
        $cart=session()->get('cart');
        if(isset($cart[$request->product_id]))
        {
            if(isset($request['item-no']))
            {
                $cart[$request->product_id]['quantity']=$request['item-no'];
            }
            else
            {
            $cart[$request->product_id]['quantity']++;
            }
        }
        else
        {
           $cart[$request->product_id]=[
            'name'=>$request->product_name,
            'quantity'=>$request->quantity,
            'color'=>$request->color,
            'size'=>$request->size,
            'price'=>$request->price,
            'total'=>$request->price*$request->quantity
           ];
        }
        
        // dd($cart);
        session()->put('cart',$cart);
        return redirect()->back()->with('success','Product is added successfully');

    }

    public function deleteCart(Request $request,$id)
    {
        $cart=session()->get('cart');
        if(isset($cart[$id]))
        {
            if(count($cart)==1){
                session()->forget('cart');
            }
            else{
            session()->forget('cart.'.$id);
            }
        }
        return redirect()->back();
    }
}
