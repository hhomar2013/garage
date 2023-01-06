@extends('layouts.app')
<style>
    body {
        /*background: black;*/
        background: linear-gradient(to right, #94a3b8, #0f172a);
    }

    .card{
        border: none;
        box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
    }

    img{
        height: 200px;

    }
</style>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="card ">
                <h1 class="text-center p-1">
                    <i class="fas fa-car-side"></i>
                </h1>
                <div class="card-body d-grid">
                    <a href="{{route('parking_register.index')}}" id="test" class="btn btn-primary" >
                        تسجــل مبيــت جديد
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card " style="">
                <h1 class="text-center">{{$total_pk}}</h1>
                <div class="card-body d-grid">
                    <a href="{{route('users.parking_show')}}" id="test" class="btn btn-success" >
                        مبيت السيارات
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card" style="">
{{--                <img class="card-img-top" src="{{asset("img/sign.png")}}" alt="Card image cap">--}}
                <h1 class="text-center">{{$total_period}} <span>جنيه</span></h1>
                <div class="card-body d-grid">
                    <a href="{{route('admin.show_shifts')}}" id="test" class="btn btn-warning" >
                        <i class="fa fa-dollar-sign"></i> تقفيل الشيفت
                    </a>
                </div>
            </div>
        </div>









            {{--                    <a href="{{route('send.email')}}" id="test" class="btn btn-success" >--}}
            {{--                        Mail To Omar--}}
            {{--                    </a>--}}

            <a href="login/api" class="btn btn-primary">api</a>


    </div>
</div>


@endsection
