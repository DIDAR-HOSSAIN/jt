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
                <h2 class="text-uppercase text-center" style="color:orange"> <strong> Add Category  </strong> </h2>
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

                    {!! Form::open(array('url' => "expensecategories/$expensecategory->id",'method' => 'PUT', 'enctype' =>'multipart/form-data')) !!}

                @else
                    {!! Form::open(array('url' => "expensecategories",'method' => 'POST', 'enctype' =>'multipart/form-data')) !!}
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">


                                <div class="form-group">
                                    {{ Form::label("expense_type", 'Expense Type')}}
                                    {{Form::text('expense_type' , old('expense_type') ? old('expense_type') : (!empty($expensecategory) ? $expensecategory->expense_type : null),
                                            ['class' => 'form-control','id' => 'expense_type', 'placeholder' => 'Expense Type Here......', 'required']
                                    )}}
                                </div> <!-- end form-group -->

                            </div>

                        </div> <!-- end row -->
                    </div>
                </div> <!-- end row -->

                    {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
                    {!! Form::close() !!}

            </div><!-- end body -->
        </div> <!-- card -->
    </div> <!-- end col-md-12 -->


@endsection
