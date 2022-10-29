@extends('layouts.app')


@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header text-white bg-dark">
                    <div class="col-lg-12 margin-tb">
                        <div class="text-center p-2">
                            <h3>أضافة صلاحيه جديدة</h3>
                        </div>

                    </div>
            </div>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card-body">
                {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>الأســم :</strong>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <br>
                        <div class="form-group">
                            <strong>الصلاحــيات :</strong>
                            <br/>
                            @foreach($permission as $value)
                                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                    {{ $value->name }}</label>
                                <br/>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                        <hr>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> حفظ </button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>

            <div class="card-footer text-white bg-dark">
                <div class="pull-right">
                    <a class="btn bg-transparent text-danger" href="{{ route('roles.index') }}"> رجوع</a>
                </div>
            </div>


        </div>
    </div>




@endsection
