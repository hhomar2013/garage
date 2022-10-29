<?php

namespace App\Http\Controllers;

use App\Models\customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CustomersController extends Controller
{

    public function index()
    {

        $customers = customers::paginate(5);
        return view('cpanel.customers.index',compact('customers'));

    }


    public function create()
    {
        return view('cpanel.customers.create');
    }

    public function store(Request $request)
    {
        $customers = customers::where('phone','=',$request->phone)->where('c_name','=',$request->c_name)->get();
        if($customers->count() == 1){
            return redirect()->route('customers.create')->with('error',  'هذا العميل مسجل من قبل بأسم :' . $customers[0]->c_name)->withInput();
        }else{
            customers::create([
                'c_name'=>$request->c_name,
                'phone'=>$request->phone,
                'user_id'=>Auth::id(),
                'car_no'=>$request->input('car_no'),
            ]);
        }

    return redirect()->route('customers.index')->with('success','تم أضافة العميل بنجاح');
    }


    public function show($id)
    {
        $customers = customers::find($id);
        return view("cpanel.customers.delete",compact('customers'));


    }


    public function edit($id)
    {

            $customers = customers::find($id);
            return view("cpanel.customers.edit",compact('customers'));


    }


    public function update(Request $request, $id)
    {
        $customers = customers::find($id);
        if($customers){
            $customers->update([
                'c_name'=>$request->c_name,
                'phone'=>$request->phone,
                'user_id'=>Auth::id(),
                'car_no'=>$request->car_no,
            ]);
            return redirect()->route('customers.index')->with('success','تم تعديل العميل بنجاح');
        }
    }



    public function destroy($id)
    {
        $customers = customers::find($id);
        $customers->delete();
        return redirect()->route('customers.index')->with('success','تم حذف العميل بنجاح');
    }


    public function subscription($id)
    {
        dd($id);
    }



}
