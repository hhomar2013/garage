@extends('layouts.app')
@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card header bg-dark text-white">

            <div class="col-lg-12 margin-tb">
                <div class="text-center">
                    <h2 class="p-2">إدارة المجموعات</h2>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="card-body">
            <table class="table table-bordered table-responsive table-hover">
                <tr class="bg-success text-white">
                    <th>#</th>
                    <th>الأسم</th>
                    <th width="280px"><i class="fa fa-cogs"></i></th>
                </tr>
                <?php $i=1; ?>
                @forelse ($group as$val)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $val->g_name }}</td>
                        <td>
                            <a class="btn bg-transparent text-dark" href="show_parking/{{$val->id}}"><i class="fa fa-eye"></i></a>
                            <a class="btn bg-transparent text-primary" href="{{route('group.edit',$val->id)}}"><i class="fa fa-user-edit"></i></a>
                            <a class="btn bg-transparent text-danger" href="{{route('group.show',$val->id)}}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="3" class="bg-secondary text-white text-center">لا يوجد بيانات لعرضها</td>

                    </tr>
                @endforelse
            </table>


        </div>
        {{$group->links()}}

        <div class="card-footer bg-dark text-white">
            <div class="pull-right">
                    <a class="btn text-white" href="{{ route('group.create') }}">أضافة مجموعة جديدة</a>
            </div>



        </div>

    </div>


</div>







@endsection
