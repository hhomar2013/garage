@extends('layouts.app')
<style>


    .card {
    border: none;
    border-radius: 10px;
    box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
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

    .search{
        box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
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

        {{--            Search Area--}}
        <div  class="row p-3 g-3 align-items-center bg-success text-white search">
            <div class="col-auto">
                <label for="inputPassword6" class="col-form-label">رقم التسجيل</label>
            </div>
            <div class="col-auto">
                <input type="number" id="search_in_park" class="form-control" >
            </div>
            <div class="col-auto">
    <span  class="form-text">
{{--        <button class="btn btn-primary" id="search_in_park_btn" onclick="search_in_park(document.getElementById('search_in_park').value)">  بحث</button>--}}
        <button class="btn btn-primary" id="search_in_park_btn" >  بحث</button>
{{--        <i class="fas fa-search"></i>--}}
    </span>

{{--                <a class="btn btn-warning" id="search_in_park_all" data-id="all" onclick="search_in_park('all')">  مشاهده الكل</a>--}}
                <button type="button" class="btn btn-warning" id="search_in_park_all">  مشاهده الكل</button>
{{--                <i class="fas fa-arrows-to-eye"></i>--}}
            </div>
        </div>
        <hr>
        {{--            Search End--}}
        <div class="row scroll">
                        <div class="row search_park" ></div>

        </div>
    </div>

@endsection
