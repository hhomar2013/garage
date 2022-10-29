@extends('layouts.app')

@section('content')

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"> <i class="fa fa-home-alt"></i>الرئيسية </a></li>
                <li class="breadcrumb-item active" aria-current="page">تسجيل شيفت</li>
            </ol>
        </nav>
        <hr>
        <div class="row">
            <h3><i class="fas fa-car-alt"></i> تسجيل شيفت جديد</h3>

            <div class="card">
                <div class="card-body">
                    <form id="frm_period">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>أجمالى بداية الشيفت</label>
                                <input type="number" value="0" name="" id="" class="form-control form-control text-center per_start" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;"/>

                                <label>التاريخ</label>
                                <input type="text" name="" id="" class="form-control form-control text-center c_name" disabled value="{{date('Y/m/d')}}"/>
                                <label>المستخدم</label>
                                <input type="text" name="" id="" class="form-control form-control text-center per_user"  disabled value="{{Auth::user()->name}}"/>

                            </div>
                        </div>
                    </form>

                </div>

                <div class="card-footer">
                    <button type="button" class="btn btn-primary period_save"><i class="fa fa-save"></i> تسجيل الشيفت </button>
                </div>
            </div>
        </div>
    </div>

@endsection
