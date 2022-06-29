
@extends('backend.layouts.master')

@section('content')

<div class="col-md-12">
    <table class="table table-hover table-striped">
{{--        @include('Elements.card')--}}

<div class="col-md-8">
        <form action="/search_slider" method="get">
            @csrf
            <div class="input-group downlib">
                <input type="search" name="search" class="form-control">
                <span class="input-prepend">
                    <button type="submit" class=" btn btn-primary">Search</button>
                    <a href="{{route('sliders.create')}}" class="btn btn-info">Create Slider</a>
                </span>
            </div>
        </form>
</div>

        <tr>
            <th>S/N</th>
            <th>Slider Title</th>
            <th>Slider Image </th>
            <th>Status </th>
            <th>Actions </th>

        </tr>
{{--        @php $i=1;--}}
{{--        @endphp--}}
        @foreach($sliders as $key=> $slider)
            <tr>
{{--                <td>{{$i++}}</td>--}}
                <td>{{$sliders->firstitem()+$key}}</td>
                <td> {{$slider->title}} </td>
                <td><img src="{{ URL::to('backend-lib/images/sliders/'.$slider->image) }}" style="height: 100px; width: 100px;"></td>
{{--                <td> {{$slider->status}} </td>--}}
                <td>
                    @if($slider->status == 1)
                        {{'Publish'}}
                    @else
                        {{'Un Publish'}}
                    @endif
                </td>
                <td>
                    @can('slider_edit')
                    <a href="{{route('sliders.edit',$slider->id)}}" class="btn btn-sm btn btn-info">Edit</a>
                    @endcan

                    @can('slider_show')
                    <a href="{{URL::to('sliders/'.$slider->id)}}" class="btn btn-sm btn btn-success">Show</a>
                        @endcan

                        @can('slider_delete')
                    <form action="{{URL::to('sliders/'.$slider->id)}}" method="post" class="float-left">
                        @csrf
                        @method('Delete')
                        <button class="btn btn-sm btn btn-danger"onclick="return confirm('Are you sure Delete Slider?')" type="submit" >Delete</button>
                    </form>
                        @endcan

                </td>
            </tr>
        @endforeach
    </table>
    {{$sliders->links()}}
</div>
@endsection
