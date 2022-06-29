
@extends('backend.layouts.master')

{{--@section('breadcrumb')--}}
{{--    <div class="block-header">--}}
{{--        <div class="row clearfix">--}}
{{--            <div class="col-md-6 col-sm-12">--}}
{{--                <nav aria-label="breadcrumb">--}}
{{--                    <ol class="breadcrumb">--}}
{{--                        <li class="breadcrumb-item"><a href="#"> Customer List </a></li>--}}
{{--                        <li class="breadcrumb-item"><a href="{{route('employees.index')}}">  Customer List </a></li>--}}
{{--                    </ol>--}}
{{--                </nav>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 col-sm-12 text-right">--}}
{{--                @role('writter|admin')--}}
{{--                <a href="{{route('employees.create')}}" class="btn btn-group-lg btn-warning"> <i class="fa fa-plus"></i> Add Customer </a>--}}
{{--                @endrole--}}
{{--            </div>--}}
{{--        </div> <!-- end row clearfix -->--}}
{{--    </div> <!-- end block-header -->--}}
{{--@endsection--}}

@section('content')
    <div class="col-12">
        <div class="header"> <h6 class="text-uppercase text-center"> <strong> Employee Details  </strong> </h6> </div>
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
                    <td> {{$employee->name}} </td>
                </tr>

                <tr>
                    <th> Employee Name </th>
                    <td> {{$employee->father_name}} </td>
                </tr>

                <tr>
                    <th> Employee Name </th>
                    <td> {{$employee->mother_name}} </td>
                </tr>

                <tr>
                    <th> Employee Name </th>
                    <td> {{$employee->present_address}} </td>
                </tr>

                <tr>
                    <th> Employee Name </th>
                    <td> {{$employee->permanent_address}} </td>
                </tr>

                <tr>
                    <th> Designation </th>
                    <td> {{$employee->designation}}</td>
                </tr>

                <tr>
                    <th> Joining Date </th>
                    <td> {{$employee->joining_date}}</td>
                </tr>

                <tr>
                    <th> Basic Salary </th>
                    <td> {{$employee->basic}}</td>
                </tr>

                <tr>
                    <th> House Rent </th>
                    <td> {{$employee->house_rent}}</td>
                </tr>

                <tr>
                    <th> Convence </th>
                    <td> {{$employee->medical_allowance}}</td>
                </tr>

                <tr>
                    <th> Total Allowance </th>
                    <td> {{$employee->total_allowance}}</td>
                </tr>

                <tr>
                    <th> Actions </th>

                    <td>
                        @can('emp_edit')
                        <a href="{{route('employees.edit', $employee->id)}}" class="btn btn-outline-warning btn-sm actionButton"> <i class="fa fa-pencil"></i> </a>
                        @endcan

                        @can('show')
                        <a href="{{route('employees.show', $employee->id)}}" class="btn btn-outline-success btn-sm actionButton"> <i class="fa fa-eye"></i> </a>
                        @endcan

                        @can('delete')
                        {!! Form::open(array('url' => "employees/$employee->id",'method' => 'delete', 'class'=>'actionButton')) !!}
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


