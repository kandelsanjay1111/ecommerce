<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Hash;
use Validator;

class AdminController extends Controller
{
    public function index()
    {
        if(session()->has('ADMIN_LOGIN'))
        {
            return redirect()->route('admin.dashboard');   
        }
        else
        {
        return view('admin.login');
        }
    }


    public function auth(Request $request)
    {
        $data=Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required',
            'remember'=>'nullable'
        ]);
        if($data->fails())
        {
            return $this->redirectAuth($data->errors(),'admin.login');
        }
        $valid_data=$data->valid();
        $admin=Admin::where('email',$valid_data['email'])->first();
        if(is_object($admin))
        {
            $password_check=Hash::check($valid_data['password'],$admin->password);
            if($password_check===true)
            {
                request()->session()->put('ADMIN_LOGIN',true);
                request()->session()->put('ADMIN_ID',$admin->id);
                return $this->redirectAuth('You are successfully logged in','admin.dashboard');
            }
            else{
                return $this->redirectLogin();
            }
        }

        else{
            return $this->redirectLogin();
        }

    }

    public function logout(Request $request)
    {
        //dd('logging out');
        $request->session()->forget('ADMIN_LOGIN');
        $request->session()->forget('ADMIN_ID');
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function redirectAuth($data,$route)
    {
        return redirect()->route($route)->with('message',$data);
    }

    public function redirectLogin()
    {
      return $this->redirectAuth('Credentials not found in records','admin.login');   
    }

}
