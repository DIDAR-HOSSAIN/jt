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
                <h2 class="text-uppercase text-center"> <strong> Add Employee & Salary </strong> </h2>
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

                    {!! Form::open(array('url' => "empSalaries/$empSalary->id",'method' => 'PUT', 'enctype' =>'multipart/form-data')) !!}

                @else
                    {!! Form::open(array('url' => "empSalaries",'method' => 'POST', 'enctype' =>'multipart/form-data')) !!}
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    {{ Form::label('basic',"Basic Salary" ) }}
                                    {{ Form::text('basic',
                                        old('basic') ? old('basic') : (!empty($empSalary) ? $empSalary->basic : null),
                                        ["class" => 'form-control',"id" => "basic","placeholder" => "Enter Basic Salary"] ) }}
                                </div> <!-- end form-group -->

                                <div class="form-group">
                                    {{ Form::label('total_present',"Present" ) }}
                                    {{ Form::text('total_present',
                                        old('total_present') ? old('total_present') : (!empty($empSalary) ? $empSalary->total_present : null),
                                        ["class" => 'form-control',"id" => "total_present","placeholder" => "Enter Total Present"]) }}
                                </div> <!-- end form-group -->

                                <div class="form-group">
                                    {{ Form::label('deduct',"Deduct" ) }}
                                    {{ Form::text('deduct',
                                        old('deduct') ? old('deduct') : (!empty($empSalary) ? $empSalary->deduct : null),
                                        ["class" => 'form-control',"id" => "deduct","placeholder" => "Enter Deduct"]) }}
                                </div> <!-- end form-group -->
                            </div>


                            <div class="col-md-6">

                                <div class="form-group">
                                    {{ Form::label('vat',"Vat" ) }}
                                    {{ Form::text('vat',
                                        old('vat') ? old('vat') : (!empty($empSalary) ? $empSalary->vat : null),
                                        ["class" => 'form-control',"id" => "vat","placeholder" => "Enter Total Vat"]) }}
                                </div> <!-- end form-group -->

                                <div class="form-group">
                                    {{ Form::label('provident_Fund', "Provident Fund" ) }}
                                    {{ Form::text('provident_Fund' ,
                                        old('provident_Fund') ? old('provident_Fund') : (!empty($empSalary) ? $empSalary->provident_Fund : null),
                                        ["class" => 'form-control',"id" => "provident_Fund","placeholder" => "Enter Provident"]) }}
                                </div> <!-- end form-group -->

                                <div class="form-group">
                                    {{Form::label("net_payable", "Net Payable")}}
                                    {{Form::text('net_payable',
                                        old('net_payable') ? old('net_payable') : (!empty($empSalary) ? $empSalary->net_payable : null),
                                        ["class" => 'form-control',"id" => "net_payable","placeholder" => "Enter Net Payable"]
                                    )}}
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
