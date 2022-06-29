
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
                    <a href="{{route('balancebd.create')}}" class="btn btn-info">Add Balance B/D</a>
                </span>
                    </div>
                </form>
            </div>

            <tr>
                <th>S/N</th>
                <th>Date</th>
                <th>Cash In</th>
                <th>Cash Out</th>
                <th>Actions </th>

            </tr>
            {{--        @php $i=1;--}}
            {{--        @endphp--}}
            @foreach($balancebdData as $key=> $data)
                <tr>
                    {{--                <td>{{$i++}}</td>--}}
                    <td> {{$balancebdData->firstitem()+$key}} </td>
                    <td> {{\Carbon\Carbon::parse ($data->date)->format('j F, Y')}} </td>
                    <td> {{$data->cash_in}} </td>
                    <td> {{$data->cash_out}} </td>
                    <td>
                        @can('balancebd_edit')
                        <a href="{{URL::to('balancebd/'.$data->id.'/edit')}}" class="btn btn-sm btn btn-info">Edit</a>
                        @endcan

                        @can('balancebd_show')
                        <a href="{{URL::to('balancebd/'.$data->id)}}" class="btn btn-sm btn btn-success">Show</a>
                        @endcan

                            @can('balancebd_delete')
                            <form action="{{URL::to('balancebd/'.$data->id)}}" method="post" class="float-left">
                                @csrf
                            @method('Delete')
                            <button class="btn btn-sm btn btn-danger"onclick="return confirm('Are you sure Want to Delete Balance B/D?')" type="submit" >Delete</button>
                        </form>
                       @endcan


                    </td>
                </tr>
            @endforeach
        </table>
        {{$balancebdData->links()}}
    </div>
@endsection


