<?php

namespace App\Http\Controllers;

use App\Models\group;
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
}
