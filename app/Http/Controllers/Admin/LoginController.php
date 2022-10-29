<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\login_request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function index()
    {
        return view('cpanel.auth.login');
    }


    public function login(login_request $request)
    {
        if (auth()->guard('admin')->attempt(['user_name'=>$request->input('user_name'),'password'=>$request->input('password')]))
        {
            return redirect()->route('admin.dashboard')->with('success','أهلا بعودتك ❤❤❤');
        }else{
            return redirect()->route('admin.index')->with('error','برجاء كتابة أسم المستخدم و كلمة المرور بشكل صحيح');
        }
    }

    public function logout()
    {
        auth()->logout();
        return route('admin.index');
    }


}
