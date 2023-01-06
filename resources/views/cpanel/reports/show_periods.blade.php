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
                <li class="breadcrumb-item active" aria-current="page">تقرير  الشيفتات</li>
            </ol>
        </nav>
        <hr/>
        <div class="row">
            <div  class="row p-3 g-3 align-items-center bg-success text-white search">
                <div class="col-auto">
                    <div class="col-12">
                        <select class="p-1  form-control status_periods">
                            <option value="" disabled selected>برجاء أختيار الحالة</option>
                            <option value="0">نشط</option>
                            <option value="1">مغلق</option>
                        </select>
                    </div>
                </div>
                <div class="col-auto">
{{--                    <span  class="form-text"><button class="btn btn-primary" id="search_in_park_btn" >  بحث</button></span>--}}
{{--                    <button type="button" class="btn btn-warning all_period_report" >  مشاهده الكل</button>--}}
                </div>
            </div>
          </div>
{{--        End Of Search Area--}}
        <hr>
        <div class="row scroll show_shift"></div>
    </div>

@endsection
