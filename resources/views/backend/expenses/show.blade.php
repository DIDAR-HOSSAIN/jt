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
        <div class="header"> <h6 class="text-uppercase text-center"> <strong> Expense Details  </strong> </h6> </div>
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
                    <td> {{$expense->date}} </td>
                </tr>

                <tr>
                    <th> Expense Type </th>
                    <td> {{$expense->expense_type}} </td>
                </tr>

                <tr>
                    <th> Payment Type </th>
                    <td>
                        @if($expense->payment_type == 1)
                            {{'Cash'}}
                        @else
                            {{'Cheque'}}
                        @endif
                    </td>
                </tr>

                <tr>
                    <th> Description </th>
                    <td> {{$expense->description}} </td>
                </tr>

                <tr>
                    <th> Amount </th>
                    <td> {{$expense->amount}} </td>
                </tr>

                <tr>
                    <th> User Name </th>
                    <td>{{ucfirst(trans(\Illuminate\Support\Facades\Auth::user()->name))}} </td>
                </tr>


                <tr>
                    <th> Actions </th>

                    <td>
                        @can('expense_edit')
                    <a href="{{route('expenses.edit', $expense->id)}}" class="btn btn-outline-warning btn-sm actionButton"> <i class="fa fa-pencil"></i> </a>
                        @endcan

                        @can('expense_show')
                     <a href="{{route('expenses.show', $expense->id)}}" class="btn btn-outline-success btn-sm actionButton"> <i class="fa fa-eye"></i> </a>
                        @endcan

                        @can('expense_delete')
                     {!! Form::open(array('url' => "expenses/$expense->id",'method' => 'delete', 'class'=>'actionButton')) !!}
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


