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

    public function store(Request $request)
    {
            period::create([
               'per_start'=>$request->input('per_start'),
               'user_id'=>Auth::id()
            ]);
            return response()->json('تم تسجيل الشيفت للمستخدم : ' . $request->input('user_name'));


    }

    public function period_close(Request $request)
    {
       $id= $request->input('per_id');
       $per = period::find($id);
       $per->update([
          'per_end'=>$request->input('per_end'),
           'note'=>$request->input('note'),
           'isOpen'=>1,
       ]);

           return response()->json('تم تقفيل الشيفت بنجاح');

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
            return view('cpanel.period.show',compact('pk','customers','period_details','total_pk','total_customers_sub_count','total_pk_count','total_customers_sub'));
        }


    }

    public function show_all_shifts()
    {
        return view('cpanel.reports.show_periods');
    }

    public function show_all_shifts_get(Request $request)
    {
        $output='';
        $id = $request->input('id');
        $per = period::query()->where('isOpen','=',$id)->orderBy('id','DESC')->get();
        $output .= '<table class="table table-bordered table-responsive ">
                <tr class="bg-success text-white">
                    <th>#</th>
                    <th>رصيد بداية الشيفت</th>
                    <th>رصيد نهاية الشيفت</th>
                    <th>الأجمالي</th>
                    <th>ملاحظات</th>
                    <th>المستخدم</th>
                    <th>التاريخ و الوقت</th>
                </tr>';
                    $i = 1;
                    if ($per->count() == 0){
                        $output .='
                        <tr>
                            <td colspan="7" class="text-center">لا يوجد بيانات لعرضها</td>
                        </tr>';
                    }
                    foreach ($per as $val)
                    {
                        $output .='
                        <tr>
                            <td>'.$i++.'</td>
                            <td>'.$val->per_start.' </td>
                            <td>'.$val->per_end.'</td>
                            <td>'.value($val->per_start + $val->per_end).'</td>
                            <td>'.$val->note.'</td>
                            <td>'.$val->GetUser->name.'</td>
                            <td>'.$val->updated_at.'</td>
                        </tr>';
                    }
           $output .= '</table>';
        return response()->json($output);
    }

}
