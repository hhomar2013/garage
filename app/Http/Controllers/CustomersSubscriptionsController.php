<?php

namespace App\Http\Controllers;

use App\Models\customers;
use App\Models\customers_subscriptions;
use App\Models\group;
use Carbon\Carbon;
use Illuminate\Http\Request;


class CustomersSubscriptionsController extends Controller
{


    public function get_end_date(Request $request)
    {


    }

    public function index()
    {

    }


    public function create(Request $request)
    {
        $date = $request->s_date;
        $output='';
        $start_date =  Carbon::parse($date);
        $end_date = $start_date->copy()->addDays(30)->format('Y/m/d');
        $output .='<label>نهاية الاشتراك</label><input type="text" class="form-control " value="'.$end_date.'" name="end_date"  readonly/>';
        return response()->json($output);
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $group = group::all();
        $customers = customers::find($id);
        return view('cpanel.customers.subscription',compact('customers','group'));
    }


    public function edit(customers_subscriptions $customers_subscriptions)
    {
        //
    }


    public function update(Request $request, customers_subscriptions $customers_subscriptions)
    {
        //
    }


    public function destroy(customers_subscriptions $customers_subscriptions)
    {
        //
    }
}
