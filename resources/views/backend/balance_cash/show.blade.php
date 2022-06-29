@extends('backend.layouts.master')

{{--@section('breadcrumb')--}}
{{--    <div class="block-header">--}}
{{--        <div class="row clearfix">--}}
{{--            <div class="col-md-6 col-sm-12">--}}
{{--                <nav aria-label="breadcrumb">--}}
{{--                    <ol class="breadcrumb">--}}
{{--                        <li class="breadcrumb-item"><a href="#"> Passenger List </a></li>--}}
{{--                        <li class="breadcrumb-item"><a href="{{route('sliders.index')}}"> Choices </a></li>--}}
{{--                    </ol>--}}
{{--                </nav>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 col-sm-12 text-right">--}}
{{--                @role('writter|admin')--}}
{{--                <a href="{{route('sliders.create')}}" class="btn btn-group-lg btn-warning"> <i class="fa fa-plus"></i> Add Choice </a>--}}
{{--                @endrole--}}
{{--            </div>--}}
{{--        </div> <!-- end row clearfix -->--}}
{{--    </div> <!-- end block-header -->--}}
{{--@endsection--}}

@section('content')
    <div class="col-12">
        <div class="header"> <h6 class="text-uppercase text-center"> <strong> Balance Cash Details  </strong> </h6> </div>
        <div class="row">
            @if(session('message'))
                <div class="col-8 alert alert-success posMessage"> {{session('message')}}  </div>
            @endif
        </div> <!-- end row -->
        <div class="table-responsive">
            <table class="table table-hover table-custom spacing8">


                <tbody>

                <tr>
                    <th> Cash In </th>
                    <td> {{$balancecash->cash_in}} </td>
                </tr>

                <tr>
                    <th> Cash Out </th>
                    <td> {{$balancecash->cash_out}} </td>
                </tr>

                <tr>
                    <th> User Name </th>
                    <td>{{ucfirst(trans(\Illuminate\Support\Facades\Auth::user()->name))}} </td>
                </tr>


                <tr>
                    <th> Actions </th>

                    <td>
                        <a href="{{route('balancecash.show', $balancecash->id)}}" class="btn btn-outline-success btn-sm actionButton"> <i class="fa fa-eye"></i> </a>
                        <a href="{{route('balancecash.edit', $balancecash->id)}}" class="btn btn-outline-warning btn-sm actionButton"> <i class="fa fa-pencil"></i> </a>

                        {!! Form::open(array('url' => "balancecash/$balancecash->id",'method' => 'delete', 'class'=>'actionButton')) !!}
                        {{ Form::button('<i class="fa fa-remove"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-sm float left'])}}
                        {!! Form::close() !!}

                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div> <!-- end col-12 -->
@endsection




