@extends('layouts.app')

@section('content')

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"> <i class="fa fa-home-alt"></i>الرئيسية </a></li>
                <li class="breadcrumb-item active" aria-current="page">تقفيل شيفت</li>
            </ol>
        </nav>
        <hr>
        <div class="row">
            <h3><i class="fas fa-car-alt"></i> تقفيل شيفت {{ Auth::user()->name }}</h3>
            <div class="card">
                <div class="card-body">
                    <form id="frm_period">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label>أجمالى بداية الشيفت</label>
                                        <input disabled type="number" value="{{$period_details->per_start}}" name="" id="" class="form-control  text-center per_start" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;"/>

                                    </div>
                                    <div class="col-lg-4">
                                        <label>أجمالى نهاية الشيفت</label>
                                        <input disabled type="number" value="{{value($total_pk + $total_customers_sub) }}" name="" id="" class="form-control  text-center per_start" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;"/>

                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">الاجمالي</label>
                                    <input class="form-control text-center" value="{{value($total_pk + $total_customers_sub + $period_details->per_start) }}" disabled />

                                    </div>
                                </div>
                                <br>
                                    <div class="card ">
                                        <div class="card-header text-center"><h5> فواتير المبيت </h5></div>

                                            <div class="card-body bg-dark text-white">
                                                <div class="row">
                                                    @foreach($pk as $val_pk)
                                                        <div class=" col-lg-2 border text-center">
                                                            <h6>الأسم: {{$val_pk->c_name}}</h6>
                                                            <h6>رقم البارك: {{$val_pk->parking->p_name}}</h6>
                                                            <h6>عدد أيام المبيت: {{$val_pk->days}}</h6>
                                                            <h6>الأجمالى: {{$val_pk->total}}</h6>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div>

                                    <div class="card-footer text-right">
                                            <h4> العدد  : {{$total_pk_count}}</h4>
                                    </div>
                                    </div>
                                 <label>عدد فواتير الاشتراكات</label>
                                <input disabled type="number" value="{{$total_customers_sub_count}}" name="" id="" class="form-control form-control text-center per_start" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;"/>

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
