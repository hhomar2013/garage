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
        <div class="row">
            <div class="col-lg-2 col-xs-12">
                <label>من</label>
                <input type="text" name="" id="" class="form-control phone">
            </div>
            <div class="col-lg-2 col-xs-12">
                <label>من</label>
                <input type="date" name="" id="" class="form-control date_from ">
            </div>

            <div class="col-lg-2 col-xs-12">
                <label>إالى</label>
                <input type="date" name="" id="" class="form-control date_to">
            </div>
            <div class="col-lg-2 col-xs-12">
                <label>الحالة</label>
                <select class="p-1  form-control status">
                    <option value="" disabled selected>برجاء أختيار الحالة</option>
                    <option value="all">الكل</option>
                    <option value="0">داخل الجراج</option>
                    <option value="1">تم خروجه</option>
                </select>
            </div>

            <div class="col-lg-4 ">
                <div class="row">
                    <div class="col-lg-6">
                        <label>المنطقة</label>
                        <select class="p-1 show_park_group form-control">
                            <option value="" disabled selected>برجاء أختيار المنطقة</option>
                            @foreach($group as $val)
                                <option value="{{$val->id}}" data-id="">{{$val->g_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label>البارك</label>
                        <select name="" id="" class="form-control  parking_id show_parking_id">
                            <option disabled selected>لا يوجد بيانات</option>
                        </select>
                    </div>
                </div>

            </div>


            <div class="col-lg-2 ">
                <br>
                <button class="btn btn-primary p-3 get_parking_car" type="button">بحث</button>
            </div>
        </div>
{{--        End Of Search Area--}}
        <hr>

{{--        --}}
        <div class="row scroll show_park">



        </div>

{{--        --}}


    </div>

@endsection
