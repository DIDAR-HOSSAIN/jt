
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
                    <a href="{{route('incomes.create')}}" class="btn btn-info">Add Trading</a>
                </span>
                    </div>
                </form>
            </div>

            <tr>
                <th>S/N</th>
                <th>Date</th>
                <th>Income Type</th>
                <th>Received Type</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Commission</th>
                <th>Actions </th>

            </tr>
            {{--        @php $i=1;--}}
            {{--        @endphp--}}
            @foreach($incomes as $key=> $income)
                <tr>
                    {{--                <td>{{$i++}}</td>--}}
                    <td>{{$incomes->firstitem()+$key}}</td>
{{--                    <td> {{date('d-M-y', strtotime($income->date))}} --}}
                    <td>
                        @if($income->date)
                            {{\Carbon\Carbon::parse($income->date)->format('j F, Y')}}
                        @endif
                    </td>
                    <td> {{$income->income_type}} </td>
                    <td>
                        @if($income->received_type == 'cash')
                            {{'Cash'}}
                        @else
                            {{'Cheque'}}
                        @endif
                    </td>

                    <td> {{$income->description}} </td>
                    <td> {{$income->income_amount}} </td>
                    <td> {{$income->commission}} </td>


                    <td>
                        @can('income_edit')
                        <a href="{{URL::to('incomes/'.$income->id.'/edit')}}" class="btn btn-sm btn btn-info">Edit</a>
                        @endcan

                        @can('income_show')
                        <a href="{{URL::to('incomes/'.$income->id)}}" class="btn btn-sm btn btn-success">Show</a>
                        @endcan

                            @can('income_delete')
                        <form action="{{URL::to('incomes/'.$income->id)}}" method="post" class="float-left">
                            @csrf
                            @method('Delete')
                            <button class="btn btn-sm btn btn-danger"onclick="return confirm('Are you sure Want to Delete Expense Category?')" type="submit" >Delete</button>
                        </form>
                       @endcan

                    </td>
                </tr>
            @endforeach
        </table>
        {{$incomes->links()}}
    </div>
@endsection


