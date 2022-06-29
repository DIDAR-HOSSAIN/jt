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
        <div class="header"> <h6 class="text-uppercase text-center"> <strong> Income Details  </strong> </h6> </div>
        <div class="row">
            @if(session('message'))
                <div class="col-8 alert alert-success posMessage"> {{session('message')}}  </div>
            @endif
        </div> <!-- end row -->
        <div class="table-responsive">
            <table class="table table-hover table-custom spacing8">


                <tbody>
                <tr>
                    <th> Date </th>
                    <td> {{$income->date}} </td>
                </tr>

                <tr>
                    <th> Income Type </th>
                    <td> {{$income->income_type}} </td>
                </tr>

                <tr>
                    <th> commission</th>
                    <td> {{$income->commission}} </td>
                </tr>

                <tr>
                    <th> Received Type </th>
                    <td>
                        @if($income->received_type == 'cash')
                            {{'Cash'}}
                        @else
                            {{'Cheque'}}
                        @endif
                    </td>
                </tr>

                <tr>
                    <th> Description </th>
                    <td> {{$income->description}} </td>
                </tr>

                <tr>
                    <th> Amount </th>
                    <td> {{$income->income_amount}} </td>
                </tr>
                <tr>
                    <th> User Name </th>
                    <td>{{ucfirst(trans(\Illuminate\Support\Facades\Auth::user()->name))}} </td>
                </tr>


                <tr>
                    <th> Actions </th>

                    <td>
                        @can('income_edit')
                     <a href="{{route('incomes.edit', $income->id)}}" class="btn btn-outline-warning btn-sm actionButton"> <i class="fa fa-pencil"></i> </a>
                        @endcan

                        @can('income_show')
                   <a href="{{route('incomes.show', $income->id)}}" class="btn btn-outline-success btn-sm actionButton"> <i class="fa fa-eye"></i> </a>

                        @endcan

                        @can('income_delete')
                                {!! Form::open(array('url' => "incomes/$income->id",'method' => 'delete', 'class'=>'actionButton')) !!}
                                {{ Form::button('<i class="fa fa-remove"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-sm float left'])}}
                        @endcan

                        {!! Form::close() !!}

                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div> <!-- end col-12 -->
@endsection




