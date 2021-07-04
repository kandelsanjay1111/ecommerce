<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category=Category::all();
        return view('admin.category')->with('categories',$category);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        //return $request->all();
        $data=$request->validate([
            'category_name'=>'bail|required|max:255',
            'category_slug'=>'required|max:255|unique:categories'
        ]);

        $category=new Category;
        $this->save($category,$data);
        // $category->category_name=$data['category_name'];
        // $category->category_slug=$data['category_slug'];
        // $category->save();
        return redirect()->route('admin.category')->with('success','Category is added successfully');
    }

    public function edit($id)
    {
        $category=Category::find($id);
        return view('admin.category.edit')->with('category',$category);
    }

    public  function update(Request $request,$id)
    {
         $data=$request->validate([
            'category_name'=>'bail|required|max:255',
            'category_slug'=>'required|max:255|unique:categories,category_slug,'.$id,
        ]);
        $category=Category::find($id);
        $this->save($category,$data);
        return redirect()->route('admin.category')->with('success','Category is updated successfully');

    }

    public function destroy(Category $category)
    {
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
        $category->save();
    }
   
}
