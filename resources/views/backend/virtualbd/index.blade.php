
@extends('backend.layouts.master')

@section('content')

    <div class="col-md-12">
        <table class="table table-hover table-striped">
            <div class="col-md-8">
                <form action="/search" method="get">
                    @csrf
                    <div class="input-group downlib">
                        <input type="search" name="search" class="form-control">
                        <span class="input-prepend">
                    <button type="submit" class=" btn btn-primary">Search</button>
                    <a href="{{route('virtualbd.create')}}" class="btn btn-info">Add virtualbd</a>
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
            @foreach($virtualbdData as $key=> $virtualbd)
                <tr>
                    {{--                <td>{{$i++}}</td>--}}
                    <td>{{$virtualbdData->firstitem()+$key}}</td>
                    <td> {{\Carbon\Carbon::parse ($virtualbd->date)->format('d /m/ Y')}} </td>
                    <td> {{$virtualbd->cash_in}} </td>
                    <td> {{$virtualbd->cash_out}} </td>
                    <td>
                        @can('virtualbd_edit')
                        <a href="{{URL::to('virtualbd/'.$virtualbd->id.'/edit')}}" class="btn btn-sm btn btn-info">Edit</a>
                        @endcan

                        @can('virtualbd_show')
                        <a href="{{URL::to('virtualbd/'.$virtualbd->id)}}" class="btn btn-sm btn btn-success">Show</a>
                        @endcan

                        @can('virtualbd_delete')
                        <form action="{{URL::to('virtualbd/'.$virtualbd->id)}}" method="post" class="float-left">
                        @csrf
                        @method('Delete')
                        <button class="btn btn-sm btn btn-danger"onclick="return confirm('Are you sure Want to Delete Virtual B/D?')" type="submit" >Delete</button>
                        </form>
                        @endcan

                    </td>
                </tr>
            @endforeach
        </table>
        {{$virtualbdData->links()}}
    </div>
@endsection


