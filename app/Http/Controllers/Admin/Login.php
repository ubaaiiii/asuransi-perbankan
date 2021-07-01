<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\ModelLogin;

class Login extends Controller
{

    public function index(){
        if(Session::get('Admin_Login')){
            return redirect('/');
        }
        else{
            return view('admin/login');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }
    
    public function postLogin(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->username;
        $password = md5($request->password);

        $checkAdmin = ModelLogin::where('username', $username)->first();

        if ($checkAdmin != null){
            Session::put('id_peg',$checkAdmin->id_peg);
            Session::put('userid',$checkAdmin->username);
            Session::put('idLevel',$checkAdmin->level);
            Session::put('photo',$checkAdmin->photo);
            Session::put('Admin_Login',TRUE);
            return redirect('/');
            // echo "oke";
        }else{
            return redirect('/login')->with('passwordWrong',"<font style='color:red;'> <b>Login failed</b> </font> <br> Email or password is incorrect!");
            // echo "no";
        }
    }
}
