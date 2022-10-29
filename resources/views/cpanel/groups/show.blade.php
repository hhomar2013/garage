@extends('layouts.app')

@section('content')

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"> <i class="fa fa-home-alt"></i>الرئيسية </a></li>
                <li class="breadcrumb-item"><a href="{{route('group.index')}}"> </i>إدارة المجموعات </a></li>
                <li class="breadcrumb-item active" aria-current="page">مشاهدة المجموعات</li>
            </ol>
        </nav>
        <hr>
        <div class="row">

            <form  method="POST" action="">
                @csrf
                {{method_field('PATCH')}}
            <div class="card">
                <div class="card-header bg-dark">
                    <h3 class="p-2 text-center text-white"><i class="fas fa-user-circle"></i>
                        {{$park[0]->get_group->g_name}}
                    </h3>
                </div>
                <div class="card-body">

                        <div class="">

                                @foreach($park as $key => $val)
                                   <span class="badge bg-secondary">{{$val->p_name }}</span>
                                @endforeach


                        </div>


                </div>


            </div>
            </form>

        </div>
    </div>

@endsection
