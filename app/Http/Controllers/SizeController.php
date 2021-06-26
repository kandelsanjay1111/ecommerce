<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;

class SizeController extends Controller
{
    public function index()
    {
        $size=Size::all();
        return view('admin.size.index')->with('sizes',$size);
    }

    public function create()
    {
        return view('admin.size.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $data=$request->validate([
            'size'=>'bail|required|string|max:255',
        ]);

        $size=new Size;
        $size->size=$data['size'];
        $size->save();

        return redirect()->route('admin.size')->with('success','Size is created successfully');
    }

    public function edit($id)
    {
        $size=Size::find($id);
        return view('admin.size.edit')->with('size',$size);
    }

    public function update(Request $request,$id)
    {
        $data=$request->validate([
            'size'=>'bail|required|string|max:255',
        ]);

        $size=Size::find($id);
        $size->size=$data['size'];
        $size->save();

        return redirect()->route('admin.size')->with('success','Size is updated successfully');
    }

    public function destroy($id)
    {
        $size=Size::find($id);
        $size->delete();
        return redirect()
        ->route('admin.size')->
        with('success','Size is deleted successfully');
    }

    public function status($id)
    {
        $size=Size::find($id);
        if($size->status=="active"){
            $size->status='deactive';
        }
        else{
            $size->status='active';
        }
        $size->save();
        return redirect()
        ->route('admin.size')->
        with('success','Status is updated successfully');
    }

}
