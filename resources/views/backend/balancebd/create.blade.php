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
                <h2 class="text-uppercase text-center" style="color:orange"> <strong> Add Balance B/D  </strong> </h2>
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

                    {!! Form::open(array('url' => "balancebd/$balancebd->id",'method' => 'PUT', 'enctype' =>'multipart/form-data')) !!}

                @else
                    {!! Form::open(array('url' => "balancebd",'method' => 'POST', 'enctype' =>'multipart/form-data')) !!}
                @endif

                    <div class="row">
                        <div class="col-md-8 offset-3">
                            <div class="form-group">
                                {{ Form::label('date', "Date" ) }}
                                {{ Form::text('date',
                                    old('date') ? old('date') : (!empty($balancebd->date) ? date('d-m-Y', strtotime($balancebd->date))  : date('d-m-Y', strtotime(\Carbon\Carbon::now(+6))) ),
                                    ["class" => 'form-control',"id" => "date"]) }}
                            </div> <!-- end form-group -->

                        <div class="form-group">
                            {{ Form::label("cash_in", 'Cash In')}}
                            {{Form::text('cash_in', old('cash_in') ? old('cash_in') : (!empty($balancebd) ? $balancebd->cash_in : null),
                                    ['class' => 'form-control','id' => 'cash_in','placeholder'=>'Cash in amount Here....', ]
                            )}}
                        </div> <!-- end form-group -->

                        <div class="form-group">
                            {{ Form::label("cash_out", 'Cash Out')}}
                            {{Form::text('cash_out', old('cash_out') ? old('cash_out') : (!empty($balancebd) ? $balancebd->cash_out : null),
                                    ['class' => 'form-control','id' => 'cash_out','placeholder'=>'Cash Out amount Here....', ]
                            )}}
                        </div> <!-- end form-group -->

{{--                        <div class="form-group">--}}
{{--                            {{ Form::label("user_name", 'User Name')}}--}}
{{--                            {{Form::text('user_name' , old('user_name') ? old('user_name') : (!empty($balancebd) ? $balancebd->user_name : null),--}}
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
