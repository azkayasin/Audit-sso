<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Illuminate\Support\Facades\Auth;
use Hash;
class AuthController extends Controller
{
    public function showlogin()
    {
    	return view('auth.login');
    }
    public function login(Request $request)
    {
    	if (Auth::attempt(['email' => $request->email, 'password' => $request->password]) )
    	{
    		if (Auth::User()->status =='admin')
    		{
    			return redirect('/admin');
    		}
    		else
    		{
    			return redirect('/member');
    		}
    	}
    	else
    	{
    		return redirect ('/login');
    	}
    }

    public function showRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',

        ]);
        if($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }
        else
        {
            $usr=new User();
            $usr->email=$request->email;
            $usr->name=$request->name;
            $usr->password=bcrypt($request->password);
            $usr->status=$request->status;
            $usr->save();
            if ( Auth::attempt(['email' => $request->email, 'password' => $request->password]) ) 
            {
                if(Auth::user()->status=='admin')
                {
                    return redirect('/admin');
                }
                else
                {
                    return redirect('/member');
                }
            }
        }
    }
	public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function home()
    {
    	return view ('admin.admin');
    }
    public function homemember()
    {
    	return view('member.home');
    }
    public function hak()
    {
        return view('hak');
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
