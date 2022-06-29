
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
                    <a href="{{route('expenses.create')}}" class="btn btn-info">Add Expense</a>
                </span>
                    </div>
                </form>
            </div>

            <tr>
                <th>S/N</th>
                <th>Date</th>
                <th>Expense Type</th>
                <th>Payment Type</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Actions </th>

            </tr>
            {{--        @php $i=1;--}}
            {{--        @endphp--}}
            @foreach($expenses as $key=> $expense)
                <tr>
                    {{--                <td>{{$i++}}</td>--}}
                    <td>{{$expenses->firstitem()+$key}}</td>
                    <td> {{\Carbon\Carbon::parse ($expense->date)->format('j F, Y')}} </td>
                    <td> {{$expense->expense_type}} </td>
                    <td>
                        @if($expense->payment_type == 1)
                            {{'Cash'}}
                        @else
                            {{'Cheque'}}
                        @endif
                    </td>

                    <td> {{$expense->description}} </td>
                    <td> {{$expense->expense_amount}} </td>
                    <td>
                        @can('expense_edit')
                        <a href="{{URL::to('expenses/'.$expense->id.'/edit')}}" class="btn btn-sm btn btn-info">Edit</a>
                        @endcan

                        @can('expense_show')
                        <a href="{{URL::to('expenses/'.$expense->id)}}" class="btn btn-sm btn btn-success">Show</a>
                        @endcan

                        @can('expense_delete')
                        <form action="{{URL::to('expenses/'.$expense->id)}}" method="post" class="float-left">
                            @csrf
                            @method('Delete')
                            <button class="btn btn-sm btn btn-danger"onclick="return confirm('Are you sure Want to Delete Expense Data?')" type="submit" >Delete</button>
                        </form>
                        @endcan

                    </td>
                </tr>
            @endforeach
        </table>
        {{$expenses->links()}}
    </div>
@endsection



