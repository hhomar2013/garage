@extends('layouts.app')

@section('content')

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"> <i class="fa fa-home-alt"></i>الرئيسية </a></li>
                <li class="breadcrumb-item"><a href="{{route('customers.index')}}"> </i>إدارة العملاء </a></li>
                <li class="breadcrumb-item active" aria-current="page">أشتراك العملاء</li>
            </ol>
        </nav>
        <hr>
        <div class="row">

            <form  method="POST" action="{{route('customers.update', $customers->id)}}">
                @csrf
                {{method_field('PATCH')}}
            <div class="card">
                <div class="card-header bg-warning">
                    <h3 class="p-2 text-center text-black"><i class="fas  fa-user-clock"></i> أشتراك العملاء </h3>
                </div>
                <div class="card-body">

                        <div class="row p-3">
                            <div class="form-group col-lg-4">
                                <label>الأسم</label>
                                <input type="hidden" name="c_name" id="" class="form-control form-control c_id" readonly value="{{$customers->id}}"/>
                                <input type="text" name="c_name" id="" class="form-control form-control c_name" readonly value="{{$customers->c_name}}"/>
                                <label>رقم التليفون</label>
                                <input type="number" name="phone" id="" class="form-control text-center  form-control phone" readonly value="{{$customers->phone}}"/>
                               <label>رقم اللوحة</label>
                                <input type="text" name="phone" id="" class="form-control text-center  form-control phone" readonly value="{{$customers->car_no}}"/>
                            </div>
                            <div class="form-group col-lg-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>المنطقة</label>
                                        <select class="p-1 park_group form-control">
                                            <option value="" disabled selected>برجاء أختيار المنطقة</option>
                                            @foreach($group as $val)
                                                <option value="{{$val->id}}" data-id="">{{$val->g_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>البارك</label>
                                        <select name="" id="" class="form-control park parking_id">
                                            <option disabled selected>لا يوجد بيانات</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6">
                                        <label>بداية الاشتراك</label>
                                        <input type="date" class="form-control"  id="start_date" name="start_date"/>
                                    </div>

                                    <div class="col-lg-6 end_date"></div>
                                </div>
                            </div>
                        </div>


                </div>

                <div class="card-footer text-white bg-dark">
                    <button type="submit" class="btn bg-transparent text-warning save_subscription"><i class="fa fa-save"></i> حفظ </button>
                </div>
            </div>
            </form>

        </div>
    </div>

@endsection
