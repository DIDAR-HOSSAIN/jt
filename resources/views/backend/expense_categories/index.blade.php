
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
                    <a href="{{route('expensecategories.create')}}" class="btn btn-info">Add Category</a>
                </span>
                    </div>
                </form>
            </div>

            <tr>
                <th>S/N</th>
                <th>Expense Type</th>
                <th>User Name</th>
                <th>Actions </th>

            </tr>
            {{--        @php $i=1;--}}
            {{--        @endphp--}}
            @foreach($expensecategories as $key=> $expensecategory)
                <tr>
                    {{--                <td>{{$i++}}</td>--}}
                    <td>{{$expensecategories->firstitem()+$key}}</td>
                    <td> {{$expensecategory->expense_type}} </td>
                    <td>{{ucfirst(trans(\Illuminate\Support\Facades\Auth::user()->name))}} </td>

                    <td>

                        @can('expense_category_edit')
                        <a href="{{URL::to('expensecategories/'.$expensecategory->id.'/edit')}}" class="btn btn-sm btn btn-info">Edit</a>
                        @endcan

                            @can('expense_category_show')
                            <a href="{{URL::to('expensecategories/'.$expensecategory->id)}}" class="btn btn-sm btn btn-success">Show</a>
                            @endcan

                            @can('expense_category_delete')
                            <form action="{{URL::to('expensecategories/'.$expensecategory->id)}}" method="post" class="float-left">
                            @csrf
                            @method('Delete')
                            <button class="btn btn-sm btn btn-danger"onclick="return confirm('Are you sure Want to Delete Expense Category?')" type="submit" >Delete</button>
                        </form>
                            @endcan


                    </td>
                </tr>
            @endforeach
        </table>
        {{$expensecategories->links()}}
    </div>
@endsection

