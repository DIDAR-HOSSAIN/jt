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
                <h2 class="text-uppercase text-center" style="color:orange"> <strong> Add Balance Cash </strong> </h2>
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

                    {!! Form::open(array('url' => "balancecash/$balancecash->id",'method' => 'PUT', 'enctype' =>'multipart/form-data')) !!}

                @else
                    {!! Form::open(array('url' => "balancecash",'method' => 'POST', 'enctype' =>'multipart/form-data')) !!}
                @endif

                    <div class="row">
                        <div class="col-md-8 offset-2">
                        <div class="form-group">
                            {{ Form::label("cash_in", 'Cash In')}}
                            {{Form::text('cash_in', old('cash_in') ? old('cash_in') : (!empty($balancecash) ? $balancecash->cash_in : null),
                                    ['class' => 'form-control','id' => 'cash_in','placeholder'=>'Cash in amount Here....', ]
                            )}}
                        </div> <!-- end form-group -->

                        <div class="form-group">
                            {{ Form::label("cash_out", 'Cash Out')}}
                            {{Form::text('cash_out', old('cash_out') ? old('cash_out') : (!empty($balancecash) ? $balancecash->cash_out : null),
                                    ['class' => 'form-control','id' => 'cash_out','placeholder'=>'Cash Out amount Here....', ]
                            )}}
                        </div> <!-- end form-group -->

                        <div class="form-group">
                            {{ Form::label("user_name", 'User Name')}}
                            {{Form::text('user_name' , old('user_name') ? old('user_name') : (!empty($balancecash) ? $balancecash->user_name : null),
                                    ['class' => 'form-control', 'id' => 'user_name', 'placeholder' => 'User Name Here......', ]
                            )}}
                        </div> <!-- end form-group -->


                        {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
                    </div> <!-- end col-md-8 -->
                </div> <!-- end row -->


                {!! Form::close() !!}

            </div><!-- end body -->
        </div> <!-- card -->
    </div> <!-- end col-md-12 -->


@endsection


