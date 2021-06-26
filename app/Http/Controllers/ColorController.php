<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $color=Color::all();
        return view('admin.color.index')->with('colors',$color);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $data=$request->validate([
            'color'=>'bail|required|string|max:255',
        ]);

        $color=new Color;
        $color->color=$data['color'];
        $color->save();

        return redirect()->route('admin.color')->with('success','Color is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $color=Color::find($id);
        return view('admin.color.edit')->with('color',$color);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $data=$request->validate([
            'color'=>'bail|required|string|max:255',
        ]);

        $color=Color::find($id);
        $color->color=$data['color'];
        $color->save();

        return redirect()->route('admin.color')->with('success','Color is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color=Color::find($id);
        $color->delete();
        return redirect()
        ->route('admin.color')->
        with('success','Color is deleted successfully');
    }

    public function status($id)
    {
        $color=Color::find($id);
        if($color->status=="active"){
            $color->status='deactive';
        }
        else{
            $color->status='active';
        }
        $color->save();
        return redirect()
        ->route('admin.color')->
        with('success','Status is updated successfully');
    }
}
