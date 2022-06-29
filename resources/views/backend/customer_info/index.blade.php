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
                    <a href="{{route('customers.create')}}" class="btn btn-info">Add Customer</a>
                </span>
                </div>
            </form>
        </div>

        <tr class="text-center bg-success">
            <th> S/N </th>
            <th> Opening Date </th>
            <th> Account Name </th>
            <th> Account No </th>
            <th> Dps No </th>
            <th> FDR Amount </th>
            <th> Actions </th>

        </tr>
        {{--        @php $i=1;--}}
        {{--        @endphp--}}
        @foreach($customers as $key=> $customer)
            <tr>
                {{--                <td>{{$i++}}</td>--}}
                <td>{{$customers->firstitem()+$key}}</td>
                <td> {{\Carbon\Carbon::parse ($customer->opening_date)->format('j F, Y') }} </td>
                <td> {{$customer->account_name}} </td>
                <td> {{$customer->account_no}} </td>
                <td class="text-right"> {{$customer->dps_no}} </td>
                <td class="text-right"> {{$customer->fdr_amount}} </td>


                <td>
                    @can('customer_edit')
                    <a href="{{URL::to('customers/'.$customer->id.'/edit')}}" class="btn btn-sm btn btn-info">Edit</a>
                    @endcan
{{--                    <a href="{{route('customers.edit',$customer->id)}}" class="btn btn-sm btn btn-info">Edit</a>--}}

                        @can('customer_show')
                        <a href="{{URL::to('customers/'.$customer->id)}}" class="btn btn-sm btn btn-success">Show</a>
                        @endcan

                        @can('customer_delete')
                        <form action="{{URL::to('customers/'.$customer->id)}}" method="post" class="float-left">
                        @csrf
                        @method('Delete')
                     <button class="btn btn-sm btn btn-danger"onclick="return confirm('Are you sure Delete Account Information?')" type="submit" >Delete</button>
                    </form>
                  @endcan

                </td>

            </tr>
        @endforeach
    </table>
    {{$customers->links()}}
</div>
@endsection
