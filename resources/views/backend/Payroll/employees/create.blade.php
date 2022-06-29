@extends('backend.layouts.master')


{{--@section('breadcrumb')--}}
{{--    <div class="block-header">--}}
{{--        <div class="row clearfix">--}}
{{--            <div class="col-md-6 col-sm-12">--}}
{{--                <nav aria-label="breadcrumb">--}}
{{--                    <ol class="breadcrumb">--}}
{{--                        <li class="breadcrumb-item"><a href="#"> Choices </a></li>--}}
{{--                        <li class="breadcrumb-item"><a href="{{route('choiceslips.index')}}"> Choices List </a></li>--}}
{{--                    </ol>--}}
{{--                </nav>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 col-sm-12 text-right">--}}
{{--                <a href="{{route('choiceslips.index')}}" class="btn btn-group-lg btn-warning"> <i class="fa fa-list"></i> Choices List </a>--}}
{{--            </div>--}}
{{--        </div> <!-- end row clearfix -->--}}
{{--    </div> <!-- end block-header -->--}}
{{--@endsection--}}

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2 class="text-uppercase text-center"> <strong> Add Employee </strong> </h2>
            </div>
            <div class="body">

                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            {{$error}}
                        @endforeach
                    </div>
                @endif

                @if(session('message'))
                    <div class="alert alert-success"> {{session('message')}}  </div>
                @endif

                @if($formType == 'edit')

                    {!! Form::open(array('url' => "employees/$employee->id",'method' => 'PUT', 'enctype' =>'multipart/form-data')) !!}

                @else
                    {!! Form::open(array('url' => "employees",'method' => 'POST', 'enctype' =>'multipart/form-data')) !!}
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    {{ Form::label('name', "Employee Name" ) }}
                                    {{ Form::text('name' ,
                                        old('name') ? old('name') : (!empty($employee) ? $employee->name : null),
                                        ["class" => 'form-control',"id" => "name","placeholder" => "Enter Employee Name"]) }}
                                </div> <!-- end form-group -->

                                <div class="form-group">
                                    {{ Form::label('father_name', "Father Name" ) }}
                                    {{ Form::text('father_name' ,
                                        old('father_name') ? old('father_name') : (!empty($employee) ? $employee->father_name : null),
                                        ["class" => 'form-control',"id" => "father_name","placeholder" => "Enter Father Name"]) }}
                                </div> <!-- end form-group -->

                                <div class="form-group">
                                    {{ Form::label('mother_name', "Mother Name" ) }}
                                    {{ Form::text('mother_name' ,
                                        old('mother_name') ? old('mother_name') : (!empty($employee) ? $employee->mother_name : null),
                                        ["class" => 'form-control',"id" => "mother_name","placeholder" => "Enter Mother Name"]) }}
                                </div> <!-- end form-group -->

                                <div class="form-group">
                                    {{ Form::label('present_address', "Present Address" ) }}
                                    {{ Form::text('present_address' ,
                                        old('present_address') ? old('present_address') : (!empty($employee) ? $employee->present_address : null),
                                        ["class" => 'form-control',"id" => "present_address","placeholder" => "Enter Present Address"]) }}
                                </div> <!-- end form-group -->

                                <div class="form-group">
                                    {{ Form::label('permanent_address', "Permanent Address" ) }}
                                    {{ Form::text('permanent_address' ,
                                        old('permanent_address') ? old('permanent_address') : (!empty($employee) ? $employee->permanent_address : null),
                                        ["class" => 'form-control',"id" => "permanent_address","placeholder" => "Enter Permanent Address"]) }}
                                </div> <!-- end form-group -->

                                <div class="form-group">
                                    {{Form::label("designation", "Designation")}}
                                    {{Form::text('designation',
                                        old('designation') ? old('designation') : (!empty($employee) ? $employee->designation : null),
                                        ["class" => 'form-control',"id" => "designation","placeholder" => "Enter Designation"]
                                    )}}
                                </div> <!-- end form-group -->
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('joining_date',"Joining Date") }}
                                    {{ Form::date('joining_date',
                                        old('joining_date') ? old('joining_date') : (!empty($employee) ? $employee->joining_date : null),
                                        ["class" => 'form-control',"id" => "joining_date",]) }}
                                </div> <!-- end form-group -->

                                <div class="form-group">
                                    {{ Form::label('basic',"Basic Salary" ) }}
                                    {{ Form::text('basic',
                                        old('basic') ? old('basic') : (!empty($employee) ? $employee->basic : null),
                                        ["class" => 'form-control',"id" => "basic","placeholder" => "Enter Basic Salary"] ) }}
                                </div> <!-- end form-group -->

                                <div class="form-group">
                                    {{ Form::label('house_rent',"House Rent" ) }}
                                    {{ Form::text('house_rent',
                                        old('house_rent') ? old('house_rent') : (!empty($employee) ? $employee->house_rent : null),
                                        ["class" => 'form-control',"id" => "house_rent","placeholder" => "Enter House Rent"]) }}
                                </div> <!-- end form-group -->

                                <div class="form-group">
                                    {{ Form::label('medical_allowance',"Medical Allowance" ) }}
                                    {{ Form::text('medical_allowance',
                                        old('medical_allowance') ? old('medical_allowance') : (!empty($employee) ? $employee->medical_allowance : null),
                                        ["class" => 'form-control',"id" => "medical_allowance","placeholder" => "Enter Medical Allowance"]) }}
                                </div> <!-- end form-group -->

                                <div class="form-group">
                                    {{ Form::label('total_allowance',"Total Allowance" ) }}
                                    {{ Form::text('total_allowance',
                                        old('total_allowance') ? old('total_allowance') : (!empty($employee) ? $employee->total_allowance : null),
                                        ["class" => 'form-control',"id" => "total_allowance","placeholder" => "Enter Total Allowance"]) }}
                                </div> <!-- end form-group -->

                            </div> <!-- end row -->
                        </div>
                    </div> <!-- end row -->

                    {{Form::submit('Create', ['class'=>"btn btn-success"])}}
                    {!! Form::close() !!}

                </div><!-- end body -->
            </div> <!-- card -->
        </div> <!-- end col-md-12 -->
    </div>
@endsection
