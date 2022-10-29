@extends('layouts.app')


@section('content')
    <div class="container-fluid">
      <div class="card">
          <div class="card-header bg-dark text-white">
              <div class="row">
                  <div class="col-lg-12 margin-tb">
                      <div class="text-center">
                          <h3> بيانات المستخدم</h3>
                      </div>

                  </div>
              </div>
          </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>الأسـم : </strong>
                            {{ $user->name }}


                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>البريد الالكتروني : </strong>
                            {{ $user->email }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>الصلاحيات : </strong>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    <label class="badge bg-success">{{ $v }}</label>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>


          <div class="card-footer bg-dark text-white">

                  <a class="btn bg-transparent text-white " href="{{ route('users.index') }}"> رجوع </a>

          </div>
      </div>

    </div>

@endsection
