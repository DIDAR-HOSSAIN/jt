
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
                    <a href="{{route('balancecash.create')}}" class="btn btn-info">Add Balance Cash</a>
                </span>
                    </div>
                </form>
            </div>

            <tr>
                <th>S/N</th>
                <th>Cash In</th>
                <th>Cash Out</th>
                <th>Actions </th>

            </tr>
            {{--        @php $i=1;--}}
            {{--        @endphp--}}
            @foreach($balancecashData as $key=> $data)
                <tr>
                    {{--                <td>{{$i++}}</td>--}}
                    <td>{{$balancecashData->firstitem()+$key}}</td>
                    <td> {{$data->cash_in}} </td>
                    <td> {{$data->cash_out}} </td>
                    <td>
                        <a href="{{URL::to('balancecash/'.$data->id.'/edit')}}" class="btn btn-sm btn btn-info">Edit</a>

                        {{--                        <a href="{{route('expensecategories.edit',$virtualbd->id)}}" class="btn btn-sm btn btn-info">Edit</a>--}}

                        <a href="{{URL::to('balancecash/'.$data->id)}}" class="btn btn-sm btn btn-success">Show</a>

                        <form action="{{URL::to('balancecash/'.$data->id)}}" method="post" class="float-left">
                            @csrf
                            @method('Delete')
                            <button class="btn btn-sm btn btn-danger"onclick="return confirm('Are you sure Want to Delete Balance Cash?')" type="submit" >Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </table>
        {{$balancecashData->links()}}
    </div>
@endsection


