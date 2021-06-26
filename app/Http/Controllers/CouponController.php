<?php

namespace App\Http\Controllers;
use App\Models\Coupon;

use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function  index()
    {
        $coupon=Coupon::all();
        return view('admin.coupon.index')->with('coupons',$coupon);
    }

    public function create()
    {
        return view('admin.coupon.create');
    }

    public  function store(Request $request)
    {
        $data=$request->validate([
            'title'=>'bail|required|max:255',
            'code'=>'required|max:255|unique:coupons',
            'value'=>'required'
        ]);
        
        $coupon=new Coupon;
        $coupon->title=$data['title'];
        $coupon->code=$data['code'];
        $coupon->value=$data['value'];
        $coupon->save();

        return redirect()->route('admin.coupon')->with('success','Coupon is added successfully');
    }

    public function edit($id)
    {
        $coupon=Coupon::find($id);
        return view('admin.coupon.edit')->with('coupon',$coupon);
    }

    public function update(Request $request,$id)
    {
        $data=$request->validate([
            'title'=>'bail|required|max:255',
            'code'=>'required|max:255|unique:coupons,code,'.$id,
            'value'=>'required'
        ]);
        $coupon=Coupon::find($id);
        $coupon->title=$data['title'];
        $coupon->code=$data['code'];
        $coupon->value=$data['value'];
        $coupon->save();
        return redirect()->route('admin.coupon')->with('success','Coupon is updated successfully');
    }

    public function destroy($id)
    {
        $coupon=Coupon::find($id);
        $coupon->delete();
        return redirect()->route('admin.coupon')->with('success','Coupon is deleted successfully');
    }

     public function status($id)
    {
        $coupon=Coupon::find($id);
        if($coupon->status=="active"){
            $coupon->status='deactive';
        }
        else{
            $coupon->status='active';
        }
        $coupon->save();
        return redirect()
        ->route('admin.coupon')->
        with('success','Status is updated successfully');
    }
}
