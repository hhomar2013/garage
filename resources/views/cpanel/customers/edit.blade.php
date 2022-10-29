@extends('layouts.app')

@section('content')

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"> <i class="fa fa-home-alt"></i>الرئيسية </a></li>
                <li class="breadcrumb-item"><a href="{{route('customers.index')}}"> </i>إدارة العملاء </a></li>
                <li class="breadcrumb-item active" aria-current="page">تعديل العملاء</li>
            </ol>
        </nav>
        <hr>
        <div class="row">

            <form  method="POST" action="{{route('customers.update', $customers->id)}}">
                @csrf
                {{method_field('PATCH')}}
            <div class="card">
                <div class="card-header bg-dark">
                    <h3 class="p-2 text-center text-white"><i class="fas fa-user-circle"></i> تعديل العملاء </h3>
                </div>
                <div class="card-body">

                        <div class="row p-3">
                            <div class="form-group col-lg-6">
                                <label>الأسم</label>
                                <input type="text" name="c_name" id="" class="form-control form-control c_name" value="{{$customers->c_name}}"/>
                                <label>رقم التليفون</label>
                                <input type="number" name="phone" id="" class="form-control text-center  form-control phone" value="{{$customers->phone}}"/>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>التاريخ</label>
                                <input type="text" name="" id="" class="form-control form-control c_name" disabled value="{{date('Y/m/d')}}"/>
                                <label>المستخدم</label>
                                <input type="text" name="user_id" id="" class="form-control form-control phone"  disabled value="{{Auth::user()->name}}"/>

                            </div>
                        </div>


                </div>

                <div class="card-footer text-white bg-dark">
                    <button type="submit" class="btn bg-transparent text-white "><i class="fa fa-save"></i> حفظ </button>
                </div>
            </div>
            </form>

        </div>
    </div>

@endsection
