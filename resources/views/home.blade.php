@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header p-4 mb-2 bg-danger text-center text-white">الرئيسية</h5>

                <div class="card-body p-4 ">

                    <a href="{{route('parking_register.index')}}" id="test" class="btn btn-primary" >
                        تسجــل مبيــت
                    </a>


                    <a href="{{route('users.parking_show')}}" id="test" class="btn btn-success" >
                    مبيت السيارات
                    </a>

                    <a href="{{route('send.email')}}" id="test" class="btn btn-success" >
                        Mail To Omar
                    </a>






                    {{--  --}}



                    {{--  --}}

                </div>


            </div>
        </div>
    </div>
</div>
@endsection
