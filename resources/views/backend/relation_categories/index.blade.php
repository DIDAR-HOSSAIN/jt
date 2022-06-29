
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
                    <a href="{{route('relations.create')}}" class="btn btn-info">Add Category</a>
                </span>
                    </div>
                </form>
            </div>

            <tr class="bg-success">
                <th>S/N</th>
                <th>Relation Type</th>
                <th> User Name </th>
                <th>Actions </th>

            </tr>
            {{--        @php $i=1;--}}
            {{--        @endphp--}}
            @foreach($relations as $key=> $relation)
                <tr>
                    {{--                <td>{{$i++}}</td>--}}
                    <td>{{$relations->firstitem()+$key}}</td>
                    <td> {{$relation->relation_type}} </td>
                    <td>{{ucfirst(trans(\Illuminate\Support\Facades\Auth::user()->name))}} </td>

                    <td>

                        @can('relation_edit')
                        <a href="{{URL::to('relations/'.$relation->id.'/edit')}}" class="btn btn-sm btn btn-info">Edit</a>
                        @endcan

                        @can('relation_show')
                        <a href="{{URL::to('relations/'.$relation->id)}}" class="btn btn-sm btn btn-success">Show</a>
                        @endcan

                        @can('relation_delete')
                        <form action="{{URL::to('relations/'.$relation->id)}}" method="post" class="float-left">
                        @endcan

                            @csrf
                            @method('Delete')
                            <button class="btn btn-sm btn btn-danger"onclick="return confirm('Are you sure Want to Delete Relation Category?')" type="submit" >Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </table>
        {{$relations->links()}}
    </div>
@endsection

