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
                <h2 class="text-uppercase text-center" style="color:orange"> <strong> Add Products  </strong> </h2>
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

                        {!! Form::open(array('url' => "products/$product->id",'method' => 'PUT', 'enctype' =>'multipart/form-data')) !!}

                @else
                    {!! Form::open(array('url' => "products",'method' => 'POST', 'enctype' =>'multipart/form-data')) !!}
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">


        <div class="form-group">
            {{ Form::label("date", 'Date')}}
            {{Form::date('date' , old('date') ? old('date') : (!empty($product) ? $product->date : null),
                    ['class' => 'form-control','id' => 'date','required']
            )}}
        </div> <!-- end form-group -->

         <div class="form-group">
          {{ Form::label("product_name ", 'Product Name ')}}
          {{Form::text('product_name' , old('product_name') ? old('product_name') : (!empty($product) ? $product->date : null),
            ['class' => 'form-control','id' => 'product_name', 'placeholder' => 'Product Name Heare......', 'required']
            )}}
            </div> <!-- end form-group -->

           <div class="form-group">
           {{ Form::label("product_category", 'Product Category')}}
           {{Form::text('product_category' , old('product_category') ? old('product_category') : (!empty($product) ? $product->date : null),
               ['class' => 'form-control','id' => 'product_category', 'placeholder' => 'Select Product Category', 'required']
           )}}
           </div> <!-- end form-group -->

        <div class="form-group d-flex flex-column">
            {{ Form::label("product_image", 'Product Image')}}
            {{Form::file('product_image', null,
                    ['class' => 'form-control','id' => 'product_image', 'required']
            )}}
        </div> <!-- end form-group -->

         <div class="form-group">
        {{ Form::label("product_description", 'Product Description')}}
        {{Form::text('product_description' , old('product_description') ? old('unit_price') : (!empty($product) ? $product->date : null),
        ['class' => 'form-control','product_description' => 'product_description', 'placeholder' => 'Product Description Heare......', 'required']
       )}}
      </div> <!-- end form-group -->

       <div class="form-group">
       {{ Form::label("unit_price", 'Unit Price')}}
       {{Form::text('unit_price' , old('unit_price') ? old('unit_price') : (!empty($product) ? $product->date : null),
        ['class' => 'form-control','unit_price' => 'unit_price', 'placeholder' => 'Unit Price', 'required']
        )}}
       </div> <!-- end form-group -->

       <div class="form-group">
       {{ Form::label("qty", 'Qty')}}
       {{Form::text('qty' , old('qty') ? old('qty') : (!empty($product) ? $product->qty : null),
     ['class' => 'form-control','qty' => 'qty', 'placeholder' => 'Qty', 'required']
       )}}
     </div> <!-- end form-group -->

    <div class="form-group">
     {{ Form::label("Total_price", 'Total Price')}}
     {{Form::text('Total_price' , old('Total_price') ? old('Total_price') : (!empty($product) ? $product->Total_price : null),
     ['class' => 'form-control','Total_price' => 'Total_price', 'placeholder' => 'Total Price', 'required']
      )}}
     </div> <!-- end form-group -->

            @if($formType == 'edit')
                <div class="form-group d-flex flex-column">
                    <img src='{{asset("backend-lib/images/products/$product->product_image")}}' alt="" width="100px" height="100px">
                </div> <!-- end form-group -->
            @endif
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
