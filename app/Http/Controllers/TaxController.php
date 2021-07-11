<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tax;

class TaxController extends Controller
{
    public function index()
    {
        $tax=Tax::all();
        return view('admin.tax.index')->with('taxes',$tax);
    }

    public function create()
    {
        return view('admin.tax.create');
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'tax_desc'=>'required|string|max:255',
            'amount'=>'required|max:10'
        ]);
        $tax=new Tax();
        $tax->tax_desc=$data['tax_desc'];
        $tax->amount=$data['amount'];
        $tax->save();

        return redirect()->route('admin.tax')->with('success','Tax is added successfully');
    }

    public function edit($id)
    {
        $tax=Tax::find($id);
        return view('admin.tax.edit')->with('tax',$tax);
    }

    public function update(Request $request,$id)
    {
        // dd($request->all());
        $data=$request->validate([
            'tax_desc'=>'required|string|max:255',
            'amount'=>'required|max:10'
        ]);

        $tax=Tax::find($id);
        $this->save_tax($tax,$data);
        return redirect()->route('admin.tax')->with('success','Tax is updated successfully');
    }

    public function destroy($id)
    {
        $tax=Tax::find($id);
        $tax->delete();
        return redirect()->route('admin.tax')->with('success','Tax is deleted successfully');
    }

    public function status($id)
    {
        $tax=Tax::find($id);
        if($tax->status=="active"){
            $tax->status='deactive';
        }
        else{
            $tax->status='active';
        }
        $tax->save();
        return redirect()
        ->route('admin.tax')->
        with('success','Status is updated successfully');
    }

    private function save_tax($tax,$data)
    {
        $tax->tax_desc=$data['tax_desc'];
        $tax->amount=$data['amount'];
        $tax->save();
    }
}
