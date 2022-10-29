@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header text-white bg-dark">
                <div class="col-lg-12 margin-tb">
                    <div class="text-center">
                        <h3>الصلاحيات</h3>
                    </div>

                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $role->name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permissions:</strong>
                            @if(!empty($rolePermissions))
                                @foreach($rolePermissions as $v)
                                    <label class="badge bg-success">{{ $v->name }}</label>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>


            <div class="card-footer text-white bg-dark">
                <div class="pull-right">
                    <a class="btn bg-transparent text-white" href="{{ route('roles.index') }}"> رجوع </a>
                </div>
            </div>


        </div>
    </div>







@endsection
