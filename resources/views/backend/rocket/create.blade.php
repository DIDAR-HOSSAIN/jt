@extends('backend.layouts.master')


@section('style')

    <script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>

    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

    <style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

@endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2 class="text-uppercase text-center" style="color:orange"> <strong> Add Rocket Virtual Cash In/Out  </strong> </h2>
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

                    {!! Form::open(array('url' => "virtualcash/$virtualcash->id",'method' => 'PUT', 'enctype' =>'multipart/form-data')) !!}

                @else
                    {!! Form::open(array('url' => "virtualcash",'method' => 'POST', 'enctype' =>'multipart/form-data')) !!}
                @endif

                    <div class="row">
                        <div class="col-md-8 offset-2">
                            <div class="form-group">
                                {{ Form::label('date', "Date" ) }}
                                {{ Form::text('date',
                                    old('date') ? old('date') : (!empty($virtualcash->date) ? date('d-m-Y', strtotime($virtualcash->date))  : date('d-m-Y', strtotime(\Carbon\Carbon::now(+6)))),
                                    ["class" => 'form-control',"id" => "date"]) }}
                            </div> <!-- end form-group -->

                        <div class="form-group">
                            {{ Form::label("cash_in", 'Cash In')}}
                            {{Form::text('cash_in', old('cash_in') ? old('cash_in') : (!empty($virtualcash) ? $virtualcash->cash_in : null),
                                    ['class' => 'form-control','id' => 'cash_in','placeholder'=>'Cash in amount Here....', ]
                            )}}
                        </div> <!-- end form-group -->

                        <div class="form-group">
                            {{ Form::label("cash_out", 'Cash Out')}}
                            {{Form::text('cash_out', old('cash_out') ? old('cash_out') : (!empty($virtualcash) ? $virtualcash->cash_out : null),
                                    ['class' => 'form-control','id' => 'cash_out','placeholder'=>'Cash Out amount Here....', ]
                            )}}
                        </div> <!-- end form-group -->

{{--                        <div class="form-group">--}}
{{--                            {{ Form::label("user_name", 'User Name')}}--}}
{{--                            {{Form::text('user_name' , old('user_name') ? old('user_name') : (!empty($virtualcash) ? $virtualcash->user_name : null),--}}
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



