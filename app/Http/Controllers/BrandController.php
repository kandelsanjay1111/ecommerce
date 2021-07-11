<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Storage;

class BrandController extends Controller
{
    public function index()
    {
        $brand=Brand::all();
        return view('admin.brand.index')->with('brands',$brand);
    }

    public  function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required|string|max:255',
            'image'=>'sometimes|mimes:jpg,jpeg,png'
        ]);

        $brand=new Brand();
        $brand->name=$data['name'];
        if($request->hasFile('image'))
        {
            $extension=$request->file('image')->extension(); 
            $image_name=$data['name'].time().'.'.$extension;
            $request->image->storeAs('public/media/brand',$image_name);
            $brand->image=$image_name;
        }
        $brand->save();
        return redirect()->route('admin.brand')->with('success','Brand is created successfully');
    }

    public function edit($id)
    {
        $brand=Brand::find($id);
        return view('admin.brand.edit')->with('brand',$brand);
    }

    public function update(Request $request,$id)
    {
        $data=$request->validate([
            'name'=>'required|string|max:255',
            'image'=>'sometimes|mimes:jpg,jpeg,png'
        ]);

        $brand=Brand::find($id);
        $brand->name=$data['name'];
        if($request->hasFile('image'))
        {
            Storage::delete('public/media/brand/'.$brand->image);
            $extension=$request->file('image')->extension(); 
            $image_name=$data['name'].time().'.'.$extension;
            $request->image->storeAs('public/media/brand',$image_name);
            $brand->image=$image_name;
        }
        $brand->save();
        return redirect()->route('admin.brand')->with('success','Brand is updated successfully');
    }

    public function destroy($id)
    {
        $brand=Brand::find($id);
        if($brand->image!=null)
        {
        Storage::delete('public/media/brand/'.$brand->image);
        }
        
        $brand->delete();
        return redirect()
        ->route('admin.brand')->
        with('success','brand is deleted successfully');
    }

    public function status($id)
    {
        $brand=Brand::find($id);
        if($brand->status=="active"){
            $brand->status='deactive';
        }
        else{
            $brand->status='active';
        }
        $brand->save();
        return redirect()
        ->route('admin.brand')->
        with('success','Status is updated successfully');
    }
}
