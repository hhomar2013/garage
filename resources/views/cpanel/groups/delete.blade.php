@extends('layouts.app')

@section('content')

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"> <i class="fa fa-home-alt"></i>الرئيسية </a></li>
                <li class="breadcrumb-item"><a href="{{route('group.index')}}"> </i>إدارة المجموعات </a></li>
                <li class="breadcrumb-item active" aria-current="page">حذف المجموعات</li>
            </ol>
        </nav>
        <hr>
        <div class="row">

            <form  method="POST" action="{{route('group.destroy', $group->id)}}">
                @csrf
                {{method_field('DELETE')}}
                <div class="card">
                    <div class="card-header bg-danger">
                        <h3 class="p-2 text-center text-white"><i class="fas fa-user-circle"></i> حذف المجموعات </h3>
                    </div>
                    <div class="card-body">

                        <div class="row p-3">
                            <div class="form-group col-lg-12">
                                <label>الأسم</label>
                                <input type="text" name="g_name" id="" class="form-control form-control c_name" disabled value="{{$group->g_name}}"/>
                              </div>

                        </div>


                    </div>

                    <div class="card-footer text-white bg-danger">
                        <button type="submit" class="btn bg-transparent text-white "><i class="fa fa-trash"></i> حذف </button>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
