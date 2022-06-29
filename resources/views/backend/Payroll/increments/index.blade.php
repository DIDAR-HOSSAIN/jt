@extends('backend.layouts.master')

@section('content')

    <div class="col-md-12">
        <table class="table table-hover table-striped">
            {{--        @include('Elements.card')--}}


            <div class="col-md-8">
                <form action="/search" method="get">
                    @csrf
                    <div class="input-group downlib">
                        <input type="search" name="search" class="form-control">
                        <span class="input-prepend">
                    <button type="submit" class=" btn btn-primary">Search</button>
                    <a href="{{route('increments.create')}}" class="btn btn-info">Add Increment</a>
                </span>
                    </div>
                </form>
            </div>

            <tr>
                <th>S/N</th>
                <th>Increment</th>
                <th>Current Basic </th>
                <th>Actions </th>

            </tr>



            {{--        @php $i=1;--}}
            {{--        @endphp--}}
            @foreach($increments as $key=> $increment)
                <tr>
                    {{--                <td>{{$i++}}</td>--}}
                    <td>{{$increments->firstitem()+$key}}</td>
                    <td> {{$increment->increment}} </td>
                    <td> {{$increment->current_basic}} </td>

                    <td>
                        @can('increment_edit')
                        <a href="{{URL::to('increments/'.$increment->id.'/edit')}}" class="btn btn-sm btn btn-info">Edit</a>
                        @endcan

                       @can('increment_show')
                            <a href="{{URL::to('increments/'.$increment->id)}}" class="btn btn-sm btn btn-success">Show</a>
                       @endcan

                        @can('increment_delete')
                        <form action="{{URL::to('increments/'.$increment->id)}}" method="post" class="float-left">
                            @csrf
                            @method('Delete')
                            <button class="btn btn-sm btn btn-danger"onclick="return confirm('Are you sure Delete Data?')" type="submit" >Delete</button>
                        </form>
                            @endcan
                    </td>

                </tr>
            @endforeach
        </table>
        {{$increments->links()}}
    </div>
@endsection


