@extends('layouts.app')

@section('content')

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"> <i class="fa fa-home-alt"></i>الرئيسية </a></li>
                <li class="breadcrumb-item"><a href="{{route('customers.index')}}"> </i>إدارة العملاء </a></li>
                <li class="breadcrumb-item active" aria-current="page">عميل جديد</li>
            </ol>
        </nav>
        <hr>
        <div class="row">
            <h3><i class="fas fa-user-circle"></i> تسجيل عميل جديد</h3>
            <form  method="POST" action="{{route('customers.store')}}">
                @csrf
            <div class="card">
                <div class="card-body">

                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>الأسم</label>
                                <input type="text" name="c_name" id="" class="form-control form-control c_name" value="{{old('c_name')}}"/>
                                <label>رقم التليفون</label>
                                <input type="number" name="phone" id="" class="form-control form-control text-center phone" value="{{old('phone')}}"/>
                             <label>رقم اللوحة</label>
                                <input type="text" name="car_no" id="" class="form-control form-control text-center car_no" value="{{old('car_no')}}"/>

                            </div>
                            <div class="form-group col-lg-6">
                                <label>التاريخ</label>
                                <input type="text" name="" id="" class="form-control form-control c_name" disabled value="{{date('Y/m/d')}}"/>
                                <label>المستخدم</label>
                                <input type="text" name="user_id" id="" class="form-control form-control phone"  disabled value="{{Auth::user()->name}}"/>

                            </div>
                        </div>


                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary  "><i class="fa fa-save"></i> حفظ </button>
                </div>
            </div>
            </form>

        </div>
    </div>

@endsection
