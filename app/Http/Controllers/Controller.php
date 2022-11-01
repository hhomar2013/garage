<?php

namespace App\Http\Controllers;

use App\Models\customers_subscriptions;
use App\Models\group;
use App\Models\park_register;
use App\Models\period;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function Period_check()
    {
        $user_id = Auth::id();
        $period = period::where('user_id',$user_id)->where('isOpen',0)->get();
        if ($period->count() == 1)
        {
          return  $period[0]['id'];
        }
        else
        {
            return 0;
        }
    }

    public function period_total()
    {
        $period_id =  $this->Period_check();
        $pk = park_register::query()->where('period_id',$period_id)->get();
        $customers = customers_subscriptions::query()->where('period_id',$period_id)->get();
        $total = value($pk->sum('total') + $customers->sum('price'));
        return  [
            'total_period'=>$total,
            'total_pk'=>$pk->count(),
        ];
    }
}
