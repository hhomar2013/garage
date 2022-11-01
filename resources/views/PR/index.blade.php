@extends('layouts.app')

@section('content')

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"> <i class="fa fa-home-alt"></i>الرئيسية </a></li>
                <li class="breadcrumb-item active" aria-current="page">تسجيل مبيت</li>
            </ol>
        </nav>
        <hr>
        <div class="row">
            <h3><i class="fas fa-car-alt"></i> تسجيل مبيت جديد</h3>

            <div class="card">
                <div class="card-body">
                    <form id="frm_parking_register">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>الأسم</label>
                                <input type="text" name="" id="" class="form-control form-control text-center c_name" />
                                <label>رقم التليفون</label>
                                <input type="number" name="" id="" class="form-control form-control text-center phone" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;"/>
                                <label>رقم اللوحة</label>
                                <input type="text" name="" id="" class="form-control form-control text-center car_num" />
                                <div class="row">
                                    <div class="col-4">
                                        <label>السعر</label>
                                        <input type="number" value="20" data-price="20" name="" id="" class="form-control form-control bg-light text-center price" readonly/>
                                    </div>
                                    <div class="col-4">
                                        <label>الايام</label>
                                        <input type="number" value="0"  name="" id="" class="form-control form-control bg-light text-center parking_days" />
                                    </div>
                                    <div class="col-4">
                                        <label>الاجمالي</label>
                                        <input type="number" value=""  name="" id="" class="form-control form-control bg-light text-center parking_total" readonly/>
                                    </div>

                                </div>
                             </div>
                            <div class="form-group col-lg-6">
                                <div class="row">
                                    <div class="col-6">
                                        <label>المنطقة</label>
                                        <select class="p-1 park_group form-control">
                                            <option value="" disabled selected>برجاء أختيار المنطقة</option>
                                            @foreach($group as $val)
                                                <option value="{{$val->id}}" data-id="">{{$val->g_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label>البارك</label>
                                        <select name="" id="" class="form-control park parking_id">
                                            <option disabled selected>لا يوجد بيانات</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="">رقم الشيفت</label>
                                        <input type="text" name="period_id" id="period_id" class="form-control period_id" value="{{$period_id}}" disabled>
                                    </div>
                                    <div class="col-6">
                                        <label>رقم التسجيل</label>
                                        <input type="text" name="" id="" class="form-control form-control text-center register_id"  disabled value="{{random_int(100,10000)}}"/>

                                    </div>
                                </div>

                                <label>التاريخ</label>
                                <input type="text" name="" id="" class="form-control form-control text-center c_name" disabled value="{{date('Y/m/d')}}"/>
                                <label>المستخدم</label>
                                <input type="text" name="" id="" class="form-control form-control text-center phone"  disabled value="{{Auth::user()->name}}"/>

                            </div>
                        </div>
                    </form>

                </div>

                <div class="card-footer">
                    <button type="button" class="btn btn-primary enter_save"><i class="fa fa-save"></i> تسجيل</button>
                </div>
            </div>
        </div>
    </div>

@endsection
