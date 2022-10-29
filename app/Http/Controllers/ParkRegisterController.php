<?php

namespace App\Http\Controllers;

use App\Mail\notification_users;
use App\Models\customers;
use App\Models\group;
use App\Models\park;
use App\Models\park_register;
use App\Models\period;
use App\Models\User;
use App\Notifications\WelcomeNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PeriodController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use NotificationChannels\Whatsapp\Whatsapp;
use NotificationChannels\Whatsapp\WhatsappChannel;

class ParkRegisterController extends Controller
{




    public function send_email()
    {
        $data = [
          'name'=> 'عمر محجوب',
            'car_nom'=>'ا ع ي 1879',
            'type'=>'مبيت',
            'id_nom'=>'66352'
        ];

//        return new notification_users($data);

        Mail::to('hhomar2013@gmail.com')->send(new notification_users($data));
        return redirect()->route('home')->with('success','تم ألارسال بنجاح');
    }//end to send email


    public function index()
    {
        $period_id = $this->Period_check();
        if ($period_id == 0){
            return redirect()->route('period.index');
        }else{
            $group = group::all();
            return view('PR.index',compact('group','period_id'));
        }

    }


    public function create(){

    }

    public function store(Request $request)
    {
        $message ='';

      $prk_register =  park_register::create([
            'register_id' =>$request->input('register_id'),
            'c_name' =>$request->input('c_name'),
            'phone' =>$request->input('phone'),
            'car_num' =>$request->input('car_num'),
            'price' =>$request->input('price'),
            'days' =>$request->input('days'),
            'total' =>$request->input('total'),
            'user_id' =>Auth::id(),
            'parking_id'=>$request->input('parking_id'),
        ]);

      $p_id = $request->input('parking_id');
      $parking = park::find($p_id);
      $parking->update([
         'statue'=>1
      ]);

      if($prk_register){
          $customer = customers::where('phone',$request->phone)->get();
          if ($customer->count() != 1)
          {
              customers::create([
                  'c_name' =>$request->input('c_name'),
                  'phone' =>$request->input('phone'),
                  'car_no' =>$request->input('car_num'),
                  'user_id' =>Auth::id(),
              ]);
          }
      }

    $message .= ' رقم التسجيل : ' . $request->input('register_id');

            return response()->json($message);
    }


    public function show()
    {
        $user_id = Auth::id();
        $date = Carbon::now()->format('Y-m-d');
        $pr = park_register::where('statue',0)->latest()->get();
        return view('PR.show',compact('pr'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\park_register  $park_register
     * @return \Illuminate\Http\Response
     */
    public function edit(park_register $park_register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\park_register  $park_register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, park_register $park_register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\park_register  $park_register
     * @return \Illuminate\Http\Response
     */
    public function destroy(park_register $park_register)
    {
        //
    }


    public function parking_group(Request $request)
    {
        $output = '';
        $id = $request->id;
        if ($request->input('all') == 'all'){
            $parking = park::where('g_id',$id)->get();
        }else{
            $parking = park::where('g_id',$id)->where('statue','0')->get();
        }

        if ($parking->count()!= 0){
            $output .= '<option disabled selected>برجاء أختيار البارك</option>';
            foreach ($parking as $value){
                    $output .='<option value="'.$value->id.'">'.$value->p_name.'</option>';
            }
        }else{
            $output .='<option disabled selected>لا يوجد بيانات</option>';
        }

        return response()->json($output);
    }


    public function parking_off(Request $request)
    {
        $output ='';
        $id = $request->input('id');
        $parking = park_register::find($id);

        $register_park = $parking['parking_id'];
        $park_id = park::find($register_park);
        $park_id->update([
           'statue'=>0,
        ]);
        $parking->update([
           'statue'=>1,
            'user_id'=>Auth::id(),
        ]);
        return response()->json('تم تسجيل خرج السيارة :' . $parking->car_num);
    }//end parking_off


    public function show_parking()
    {
        $group = group::all();
        return view('cpanel.reports.show_park',compact('group'));
    }

    public function parking_report_result(Request $request)
    {
        $output='';
//        $date_to =   Carbon::createFromFormat('Y-m-d',$request->data['date_to']);
//        $date_from =   Carbon::createFromFormat('Y-m-d',$request->data['date_from']);

        $to = Carbon::parse($request->data['date_to'])->toDateTimeString();
        $from = Carbon::parse($request->data['date_from'])->toDateTimeString();

//        dd($to ,' -  ' .$from);
//        $p_k = park_register::query()->where('statue','like',$request->data['status'])->get();
        $p_k = DB::table('park_registers')
//            ->where('phone','like','%'.$request->data['phone'].'%')
            ->whereDate('updated_at','<=',$from)
            ->whereDate('updated_at','>=',$to)
            ->where('statue',$request->data['status'])
            ->get();
        ($p_k->count() == 0 ? $output .= '<h3 class="text-center text-danger">لا يوجد بيانات لعرضها</h3>' : $output .= '<h3 class="text-center text-primary">العدد : '.$p_k->count().'</h3>');


        foreach ($p_k as $val){
            $output .='<div class="col-md-4">
                                    <div class="card p-3 mb-2 '.($val->statue == 1 ? 'bg-danger text-white' : '').' ">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-row align-items-center">
                                                <div class="icon"> <i class="fas fa-square-parking"></i> </div>
                                                <div class="ms-2 c-details">';

                                                    $output .='<h6 class="mb-0"><small>رقم التسجيل : '. $val->register_id. '</small></h6> <span>'.\Carbon\Carbon::parse($val->created_at)->longRelativeToNowDiffForHumans(). '</span>

                                                </div>
                                            </div>
                                            <div class="badge"> <span >مبيت</span> </div>
                                        </div>
                                        <div class="mt-5">';

                                         $output .='   <h4 class="heading"><small>الأسم :  '.$val->c_name .'</small><br>';
                                                $output .='<small>رقم اللوحه :  '.$val->car_num.'</small></h4>';

                                          $output .='  <div class="mt-5">
                                                 <div class="">
                                                    <div></div>
                                                </div>';
                                           $output.='<div class="mt-3"> <span class="text1">تاريخ و وقت الدخول<span class="text2"><small>'.\Carbon\Carbon::parse($val->created_at)->format('Y/m/d h:i').'</small></span></span> <small>اليوم : '.\Carbon\Carbon::parse($val->created_at)->getTranslatedDayName().'</small></div></div></div>';

//                                       $output.=' <button class="btn btn-primary" onclick="sign_out_park('.$val->id.')"><i class="fa fa-caravan"></i> تسجيل خروج</button>';
                                  $output.='</div>
                                </div>';
            }

        return response()->json($output);
    }

}
