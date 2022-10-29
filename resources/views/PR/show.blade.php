@extends('layouts.app')
<style>


    .card {
    border: none;
    border-radius: 10px
    }

    .c-details span {
    font-weight: 300;
    font-size: 13px
    }

    .icon {
    width: 50px;
    height: 50px;
    background-color: transparent;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 39px
    }

    .badge span {
    background-color: #fffbec;
    width: 60px;
    height: 25px;
    padding-bottom: 3px;
    border-radius: 5px;
    display: flex;
    color: crimson;
    justify-content: center;
    align-items: center
    }

    .progress {
    height: 10px;
    border-radius: 10px
    }

    .progress div {
    background-color: red
    }

    .text1 {
    font-size: 14px;
    font-weight: 600
    }

    .text2 {
    color: #a5aec0
    }
    </style>


@section('content')

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"> <i class="fa fa-home-alt"></i>الرئيسية </a></li>
                <li class="breadcrumb-item active" aria-current="page">تقرير  المبيت</li>
            </ol>
        </nav>

        {{-- <h3><i class="fas fa-car-alt"></i>تقرير المبيت</h3> --}}
        <hr>

        <div class="row scroll">
                        <div class="row ">
                                @forelse ($pr as $val)
                                <div class="col-md-4">
                                    <div class="card p-3 mb-2">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-row align-items-center">
                                                <div class="icon"> <i class="fas fa-square-parking"></i> </div>
                                                <div class="ms-2 c-details">
                                                    <h6 class="mb-0"><small>رقم التسجيل :  {{$val->register_id}}</small></h6> <span>{{\Carbon\Carbon::parse($val->created_at)->longRelativeToNowDiffForHumans()}}</span>
                                                </div>
                                            </div>
                                            <div class="badge"> <span >مبيت</span> </div>
                                        </div>
                                        <div class="mt-5">
                                            <h4 class="heading"><small>الأسم :  {{$val->c_name}}</small>
                                                <br>
                                                <small>رقم اللوحه :  {{$val->car_num}}</small>
                                            </h4>
                                            <div class="mt-5">
                                                 <div class="">
                                                    <div></div>
                                                </div>
                                                <div class="mt-3"> <span class="text1">تاريخ و وقت الدخول<span class="text2"><small>{{\Carbon\Carbon::parse($val->created_at)->format('Y/m/d h:i')}}</small></span></span> <small>اليوم : {{\Carbon\Carbon::parse($val->created_at)->getTranslatedDayName()}}</small></div>
                                            </div>
                                        </div>
                                        <hr>
                                        <button class="btn btn-primary" onclick="sign_out_park({{$val->id}})">تسجيل خروج من الجراج</button>
                                    </div>
                                </div>
                                    @empty
                                    <h3 class="bg-danger text-white p-4 text-center rounded-pill">لا يوجد بيانات لعرضها</h3>
                                    @endforelse

                        </div>

        </div>
    </div>

@endsection
