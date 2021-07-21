<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index()
    {
        $banners=Banner::all();
        return view('admin.banner.index')->with('banners',$banners);
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data=$request->validate([
            'title'=>'required|string|max:255',
            'subtitle'=>'required|string|max:255',
            'image'=>'required|mimes:jpg,jpeg,png'
        ]);
        $banner=new Banner();
        $banner->title=$data['title'];
        $banner->subtitle=$data['subtitle'];
        if($request->hasFile('image'))
        {
            $extension=$request->file('image')->extension(); 
            $image_name=$data['title'].time().'.'.$extension;
            $request->image->storeAs('public/media/brand',$image_name);
            $banner->image=$image_name;
        }
        $banner->save();
        return redirect()->route('admin.banner')->with('success','Banner is created successfully');
    }

    public function edit($id)
    {
        return view('admin.banner.create');
    }

    public function update(Request $request,$id)
    {

    }

    public function destroy($id)
    {
        $banner=Banner::find($id);
        if($banner->image!=null)
        {
        Storage::delete('public/media/banner/'.$banner->image);
        }
        
        $banner->delete();
        return redirect()
        ->route('admin.banner')->
        with('success','banner is deleted successfully');
    }

    public function status($id)
    {
        $banner=Banner::find($id);
        if($banner->status=="active"){
            $banner->status='inactive';
        }
        else{
            $banner->status='active';
        }
        $banner->save();
        return redirect()
        ->route('admin.banner')->
        with('success','Status is updated successfully');
    }
}
