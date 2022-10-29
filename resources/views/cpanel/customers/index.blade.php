@extends('layouts.app')


@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card header bg-dark text-white">

            <div class="col-lg-12 margin-tb">
                <div class="text-center">
                    <h2 class="p-2">إدارة العملاء</h2>
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
                    <th>رقم التليفون</th>
                    <th width="280px"><i class="fa fa-cogs"></i></th>
                </tr>
                <?php $i=1; ?>
                @forelse ($customers as$val)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $val->c_name }}</td>
                        <td>{{ $val->phone }}</td>
                        <td>
                            <a class="btn bg-transparent text-dark" title="تسجيل أشتراك" href="{{route('customersSubscription.show',$val->id)}}"><i class="fa fa-ticket"></i> أشتراك</a>
                            <a class="btn bg-transparent text-primary" href="{{route('customers.edit',$val->id)}}"><i class="fa fa-user-edit"></i></a>
                            <a class="btn bg-transparent text-danger" href="{{route('customers.show',$val->id)}}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="3" class="bg-secondary text-white text-center">لا يوجد بيانات لعرضها</td>

                    </tr>
                @endforelse
            </table>


        </div>
        {{$customers->links()}}

        <div class="card-footer bg-dark text-white">
            <div class="pull-right">
                    <a class="btn text-white" href="{{ route('customers.create') }}">أضافة عميل جديد</a>
            </div>



        </div>

    </div>


</div>







@endsection
