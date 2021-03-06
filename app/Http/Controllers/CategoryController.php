<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $category=Category::all();
        // dd($category);
        return view('admin.category')->with('categories',$category);
    }

    public function create()
    {
        $categories=Category::all();
        return view('admin.category.create')->with('categories',$categories);
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'category_name'=>'bail|required|max:255',
            'category_slug'=>'required|max:255|unique:categories',
            'parent_id'=>'numeric'
        ]);

        $category=new Category;

        if($request->hasFile('image'))
        {
            $extension=$request->image->extension();
            $image_name=$data['category_slug'].time().'.'.$extension;
            $request->image->storeAs('public/media',$image_name);
            $category->category_image=$image_name;
        }

        $this->save($category,$data);
        // $category->category_name=$data['category_name'];
        // $category->category_slug=$data['category_slug'];
        // $category->save();
        return redirect()->route('admin.category')->with('success','Category is added successfully');
    }

    public function edit($id)
    {
        $category=Category::find($id);
        $parent_categories=Category::where('parent_id','=',NULL)->get();
        return view('admin.category.edit')->with([
            'category'=>$category,
            'parent_categories'=>$parent_categories,
        ]);
    }

    public  function update(Request $request,$id)
    {
        //dd($request->all());
         $data=$request->validate([
            'category_name'=>'bail|required|max:255',
            'category_slug'=>'required|max:255|unique:categories,category_slug,'.$id,
            'parent_id'=>'sometimes'
        ]);
        $category=Category::find($id);
        if($request->hasFile('image'))
        {
            $extension=$request->image->extension();
            $image_name=$data['category_slug'].time().'.'.$extension;
            if($category->category_image)
            {
                Storage::delete('/public/media/'.$category->category_image);
            }
            $request->image->storeAs('public/media',$image_name);
            $category->category_image=$image_name;
        }
        $this->save($category,$data);
        return redirect()->route('admin.category')->with('success','Category is updated successfully');

    }

    public function destroy(Category $category)
    {
        if($category->category_image)
        {
            Storage::delete('/public/media/'.$category->category_image);
        }
        $category->delete();
        return redirect()
        ->route('admin.category')->
        with('success','Category is deleted successfully');

    }

    public function status($id)
    {
        $category=Category::find($id);
        if($category->status=="active"){
            $category->status='deactive';
        }
        else{
            $category->status='active';
        }
        $category->save();
        return redirect()
        ->route('admin.category')->
        with('success','Status is updated successfully');
    }

    public function save(Category $category,$data)
    {
        $category->category_name=$data['category_name'];
        $category->category_slug=$data['category_slug'];
        $category->parent_id=$data['parent_id'];
        $category->save();
    }
   
}
