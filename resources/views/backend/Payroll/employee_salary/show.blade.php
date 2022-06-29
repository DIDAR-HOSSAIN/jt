
@extends('backend.layouts.master')

{{--@section('breadcrumb')--}}
{{--    <div class="block-header">--}}
{{--        <div class="row clearfix">--}}
{{--            <div class="col-md-6 col-sm-12">--}}
{{--                <nav aria-label="breadcrumb">--}}
{{--                    <ol class="breadcrumb">--}}
{{--                        <li class="breadcrumb-item"><a href="#"> Customer List </a></li>--}}
{{--                        <li class="breadcrumb-item"><a href="{{route('empSalaries.index')}}">  Customer List </a></li>--}}
{{--                    </ol>--}}
{{--                </nav>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 col-sm-12 text-right">--}}
{{--                @role('writter|admin')--}}
{{--                <a href="{{route('empSalaries.create')}}" class="btn btn-group-lg btn-warning"> <i class="fa fa-plus"></i> Add Customer </a>--}}
{{--                @endrole--}}
{{--            </div>--}}
{{--        </div> <!-- end row clearfix -->--}}
{{--    </div> <!-- end block-header -->--}}
{{--@endsection--}}

@section('content')
    <div class="col-12">
        <div class="header"> <h6 class="text-uppercase text-center"> <strong> Employee & Salary Details  </strong> </h6> </div>
        <div class="row">
            @if(session('message'))
                <div class="col-8 alert alert-success posMessage"> {{session('message')}}  </div>
            @endif
        </div> <!-- end row -->
        <div class="table-responsive">
            <table class="table table-hover table-custom spacing8">


                <tbody>
                <tr>
                    <th> Employee Name </th>
                    <td> {{$empSalary->basic}} </td>
                </tr>

                <tr>
                    <th> Employee Name </th>
                    <td> {{$empSalary->total_present}} </td>
                </tr>

                <tr>
                    <th> Employee Name </th>
                    <td> {{$empSalary->deduct}} </td>
                </tr>

                <tr>
                    <th> Employee Name </th>
                    <td> {{$empSalary->vat}} </td>
                </tr>

                <tr>
                    <th> Employee Name </th>
                    <td> {{$empSalary->provident_Fund}} </td>
                </tr>

                <tr>
                    <th> Designation </th>
                    <td> {{$empSalary->net_payable}}</td>
                </tr>

                <tr>
                    <th> Actions </th>

                    <td>
                        @can('emp_edit')
                     <a href="{{route('empSalaries.edit', $empSalary->id)}}" class="btn btn-outline-warning btn-sm actionButton"> <i class="fa fa-pencil"></i> </a>

                        @endcan

                        @can('emp_show')
                    <a href="{{route('empSalaries.show', $empSalary->id)}}" class="btn btn-outline-success btn-sm actionButton"> <i class="fa fa-eye"></i> </a>
                        @endcan

                        @can('emp_delete')
                    {!! Form::open(array('url' => "empSalaries/$empSalary->id",'method' => 'delete', 'class'=>'actionButton')) !!}
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


