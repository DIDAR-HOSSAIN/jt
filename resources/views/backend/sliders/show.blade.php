@extends('backend.layouts.master')

{{--@section('breadcrumb')--}}
{{--    <div class="block-header">--}}
{{--        <div class="row clearfix">--}}
{{--            <div class="col-md-6 col-sm-12">--}}
{{--                <nav aria-label="breadcrumb">--}}
{{--                    <ol class="breadcrumb">--}}
{{--                        <li class="breadcrumb-item"><a href="#"> Passenger List </a></li>--}}
{{--                        <li class="breadcrumb-item"><a href="{{route('sliders.index')}}"> Choices </a></li>--}}
{{--                    </ol>--}}
{{--                </nav>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 col-sm-12 text-right">--}}
{{--                @role('writter|admin')--}}
{{--                <a href="{{route('sliders.create')}}" class="btn btn-group-lg btn-warning"> <i class="fa fa-plus"></i> Add Choice </a>--}}
{{--                @endrole--}}
{{--            </div>--}}
{{--        </div> <!-- end row clearfix -->--}}
{{--    </div> <!-- end block-header -->--}}
{{--@endsection--}}

@section('content')
    <div class="col-12">
        <div class="header"> <h6 class="text-uppercase text-center"> <strong> Slider Details  </strong> </h6> </div>
        <div class="row">
            @if(session('message'))
                <div class="col-8 alert alert-success posMessage"> {{session('message')}}  </div>
            @endif
        </div> <!-- end row -->
        <div class="table-responsive">
            <table class="table table-hover table-custom spacing8">


                <tbody>
                <tr>
                    <th> Slider Title </th>
                    <td> {{$slider->title}} </td>
                </tr>

                <tr>
                    <th> status </th>
                    <td>
                        @if($slider->status == 1)
                            {{'Publish'}}
                        @else
                            {{'Un Publish'}}
                        @endif
                    </td>
                </tr>

                <tr>
                    <th> Slider Image </th>
                    <td><img src="{{asset('backend-lib/images/sliders/'.$slider->image)}}" alt="" width="100px" height="100px">
                    </td>
                </tr>

                <tr>
                    <th> User Name </th>
                    <td>{{ucfirst(trans(\Illuminate\Support\Facades\Auth::user()->name))}} </td>
                </tr>

                <tr>
                    <th> Actions </th>

                    <td>
                        @can('slider_edit')
                        <a href="{{route('sliders.edit', $slider->id)}}" class="btn btn-outline-warning btn-sm actionButton"> <i class="fa fa-pencil"></i> </a>
                        @endcan

                        @can('slider_show')
                        <a href="{{route('sliders.show', $slider->id)}}" class="btn btn-outline-success btn-sm actionButton"> <i class="fa fa-eye"></i> </a>
                        @endcan

                        @can('slider_delete')
                        {!! Form::open(array('url' => "sliders/$slider->id",'method' => 'delete', 'class'=>'actionButton')) !!}
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



