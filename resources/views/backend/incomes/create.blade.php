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

@section('style')
    <!--formden.js communicates with FormDen server to validate fields and submit via AJAX -->
    <script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>

    <!-- Special version of Bootstrap that is isolated to content wrapped in .bootstrap-iso -->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

    <!--Font Awesome (added because you use icons in your prepend/append)-->
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

    <!-- Inline CSS based on choices in "Settings" tab -->
    <style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

@endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2 class="text-uppercase text-center" style="color:orange"> <strong> Add Trading  </strong> </h2>
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

                    {!! Form::open(array('url' => "incomes/$income->id",'method' => 'PUT', 'enctype' =>'multipart/form-data')) !!}

                @else
                    {!! Form::open(array('url' => "incomes",'method' => 'POST', 'enctype' =>'multipart/form-data')) !!}
                @endif

                <div class="row">
                    <div class="col-md-12 ">
                        <div class="row">
                            <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('date', "Date" ) }}
                            {{ Form::text('date',
                                old('date') ? old('date') : (!empty($income->date) ? date('d-m-Y', strtotime($income->date)) : date('d-m-Y', strtotime(\Carbon\Carbon::now(+6)))),
                                ["class" => 'form-control',"id" => "date"]) }}
                        </div> <!-- end form-group -->

                        <div class="form-group">
                            {{ Form::label("income_type", 'Income Type')}}
                            {{Form::select('income_type', $incomecategories, old('income_type') ? old('income_type') : (!empty($income) ? $income->income_type : null),
                                    ['class' => 'form-control','id' => 'income_type','placeholder'=>'Income Type', ]
                            )}}
                        </div> <!-- end form-group -->

                        <div class="form-group">
                            {{ Form::label("received_type", 'Received Type')}}
                            {{Form::select('received_type',['cash'=> "Cash",'cheque'=>"Cheque"], old('received_type') ? old('received_type') : (!empty($income) ? $income->received_type : null),
                                    ['class' => 'form-control','id' => 'received_type','placeholder'=>'Received Type', ]
                            )}}
                        </div> <!-- end form-group -->
                            </div>

                        <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label("income_amount", 'Amount')}}
                            {{Form::text('income_amount', old('income_amount') ? old('income_amount') : (!empty($income) ? $income->income_amount : null),
                                    ['class' => 'form-control','id' => 'income_amount','placeholder'=>'income_amount', ]
                            )}}
                        </div> <!-- end form-group -->

                        <div class="form-group">
                            {{ Form::label("commission",'Commission?') }}
                            {{ Form::label('Yes') }}
                            {{Form::radio('commission', 1,false)}}
                            {{ Form::label('No') }}
                            {{Form::radio('commission', 0,false)}}
                        </div> <!-- end form-group -->


                        <div class="form-group">
                            {{ Form::label("description", 'Description')}}
                            {{Form::textarea('description' , old('description') ? old('description') : (!empty($income) ? $income->description : null),
                                    ['class' => 'form-control', 'cols' => 20, 'rows' =>2, 'id' => 'description', 'placeholder' => 'Description Here......', ]
                            )}}
                        </div> <!-- end form-group -->
                        </div>
                        </div>

{{--                        <div class="form-group">--}}
{{--                            {{ Form::label("user_name", 'User Name')}}--}}
{{--                            {{Form::text('user_name' , old('user_name') ? old('user_name') : (!empty($income) ? $income->user_name : null),--}}
{{--                                    ['class' => 'form-control', 'id' => 'user_name', 'placeholder' => 'User Name Here......', ]--}}
{{--                            )}}--}}
{{--                        </div> <!-- end form-group -->--}}


                        {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
                    </div> <!-- end col-md-8 -->
                </div> <!-- end row -->


                {!! Form::close() !!}

            </div><!-- end body -->
        </div> <!-- card -->
    </div> <!-- end col-md-12 -->


@endsection


@section('script')


    <!-- Extra JavaScript/CSS added manually in "Settings" tab -->
    <!-- Include jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <script>
        $(document).ready(function(){
            var date_input=$('input[name="date"]'); //our date input has the name "date"
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'dd-mm-yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            })
        })
    </script>
@endsection
