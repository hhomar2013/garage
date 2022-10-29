@extends('layouts.app')


@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card header bg-dark text-white">

            <div class="col-lg-12 margin-tb">
                <div class="text-center">
                    <h2 class="p-2">إدارة الصلاحيــات</h2>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="card-body">
            <table class="table table-bordered table-responsive">
                <tr class="bg-success text-white">
                    <th>#</th>
                    <th>الصلاحية</th>
                    <th width="280px"><i class="fa fa-cogs"></i></th>
                </tr>
                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a class="btn bg-transparent" href="{{ route('roles.show',$role->id) }}"><i class="fa fa-eye"></i></a>
                            @can('role-edit')
                                <a class="btn bg-transparent" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-user-edit"></i></a>
                            @endcan
                            @can('role-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                <button type="submit"  class="btn bg-transparent text-danger"> <i class="fa fa-trash-alt"></i></button>
                                {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </table>


            {!! $roles->render() !!}

        </div>


        <div class="card-footer bg-dark text-white">
            <div class="pull-right">
                @can('role-create')
                    <a class="btn text-white" href="{{ route('roles.create') }}">أضافة صلاحية جديدة</a>
                @endcan
            </div>
        </div>

    </div>

</div>







@endsection
