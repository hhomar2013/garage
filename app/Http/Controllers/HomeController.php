<?php

namespace App\Http\Controllers;


use App\Models\park_register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }


    public function index()
    {

        $total_period = $this->period_total()['total_period'];
        $total_pk = $this->period_total()['total_pk'];
        return view('home',compact('total_period','total_pk'));

    }



    public function logout_users()
    {
        auth()->logout();
        return redirect()->route('login');
    }

    public function api()
    {
        $Post_api = Http::post('https://qexal.net/api/auth/login', [
            'email'=>'admin@app.com',
            'password'=>'12345678',
            'device_name'=>'android'
         ]);
         if($Post_api){
             return response()->json($Post_api->json());
         }
    }
}
