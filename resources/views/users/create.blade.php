@extends('layouts.app')


@section('content')

    <div class="card">
        <div class="card-header bg-dark text-white">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="text-center">
                        <h3>أضافة مستخدم جديد</h3>
                    </div>

                </div>
            </div>
        </div>

        <div class="card-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>خطأ!</strong> هناك مشكله في اليانات برجاء مراجعتها.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                <div class="container p-2">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <strong>الأسم :</strong>
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <strong>البريد الالكتروني :</strong>
                                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <strong>كلمة المرور :</strong>
                                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <strong>إعادة كلمة المرور :</strong>
                                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>الصلاحيات :</strong>
                                {!! Form::select('role_name[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                            <hr>
                            <button type="submit" class="btn btn-primary"> حفـظ <i class="fas fa-save"></i></button>
                        </div>
                    </div>
                </div>


                {!! Form::close() !!}

        </div>

        <div class="card-footer bg-dark text-white">
            <div class="pull-right">
                <a class="btn bg-transparent text-danger" href="{{ route('users.index') }}"> رجوع </a>
            </div>
        </div>


    </div>




@endsection
