<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {

        return view('backend.pages.dashboard');
    }


    public function login()
    {

        return view('backend.pages.login');
    }


    public function doLogin(Request $request)
    {
        //dd($request->all());

        $credentials = $request->except('_token');

        $login = auth()->attempt($credentials);
        if ($login) {

            
            notify()->success('login successful');
            return redirect()->route('dashboard');
        } 

        notify()->error('invalid');
        return redirect()->back();
    
       

    }
    public function signout()
        {
            auth()->logout();
            notify()->success('Logout successful');
            return view('backend.pages.login');
   
        }
    

}