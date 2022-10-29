@extends('layouts.app')


@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header text-white bg-dark">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="text-center">
                            <h3>إدارة المستخدمين</h3>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                    <table class="table table-bordered">
                        <tr>
                            <th>#</th>
                            <th>الأسم</th>
                            <th>البريد الالكتروني</th>
                            <th>الصلاحيات</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($data as $key => $user)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $v)
                                            <label class="badge bg-success">{{ $v }}</label>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    <a class="btn  bg-transparent" href="{{ route('users.show',$user->id) }}"><i class="fa fa-eye"></i></a>
                                    <a class="btn  bg-transparent text-primary" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-user-edit"></i></a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                    <button type="submit"  class="btn bg-transparent text-danger"> <i class="fa fa-trash-alt"></i></button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>


                    {!! $data->render() !!}

            </div>
            <div class="card-footer text-white bg-dark">
                <div class="pull-right">
                    <a class="btn btn-success btn-sm" href="{{ route('users.create') }}">أضافة مستخدم جديد</a>
                </div>
            </div>
        </div>

    </div>


@endsection
