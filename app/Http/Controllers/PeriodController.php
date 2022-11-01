<?php

namespace App\Http\Controllers;

use App\Models\customers_subscriptions;
use App\Models\park_register;
use App\Models\period;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeriodController extends Controller
{



    public function index()
    {
        return view('cpanel.period.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
            period::create([
               'per_start'=>$request->input('per_start'),
               'user_id'=>Auth::id()
            ]);
            return response()->json('تم تسجيل الشيفت للمستخدم : ' . $request->input('user_name'));


    }

    public function show()
    {
        $period_id = $this->Period_check();
        if ($period_id == 0){
            return redirect()->route('period.index');
        }else{
            $period_details = period::query()->find($period_id);
            $pk = park_register::where('period_id',$period_id)->get();
            $customers = customers_subscriptions::where('period_id',$period_id)->get();

            $total_pk = $pk->sum('total');
            $total_pk_count = $pk->count();
            $total_customers_sub_count = $customers->count();
            $total_customers_sub = $customers->sum('price');
            return view('cpanel.period.show',compact('pk','period_details','total_pk','total_customers_sub_count','total_pk_count','total_customers_sub'));
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\period  $period
     * @return \Illuminate\Http\Response
     */
    public function edit(period $period)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\period  $period
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, period $period)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\period  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy(period $period)
    {
        //
    }
}
