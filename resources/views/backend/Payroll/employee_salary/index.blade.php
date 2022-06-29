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
                    <a href="{{route('empSalaries.create')}}" class="btn btn-info">Add Employee & Salary</a>
                </span>
                    </div>
                </form>
            </div>

            <tr>
                <th>S/N</th>
                <th>Basic</th>
                <th>Total Present </th>
                <th>Deduct</th>
                <th> Vat </th>
                <th> Provident Fund </th>
                <th> Net Payable </th>
                <th>Actions </th>

            </tr>



            {{--        @php $i=1;--}}
            {{--        @endphp--}}
            @foreach($empSalaries as $key=> $empSalary)
                <tr>
                    {{--                <td>{{$i++}}</td>--}}
                    <td>{{$employees->firstitem()+$key}}</td>
                    <td> {{$empSalary->basic}} </td>
                    <td> {{$empSalary->total_present}} </td>
                    <td> {{$empSalary->deduct}} </td>
                    <td> {{$empSalary->vat}} </td>
                    <td> {{$empSalary->provident_Fund}} </td>
                    <td> {{$empSalary->net_payable}} </td>



                    <td>
                        @can('emp_edit')
                        <a href="{{URL::to('empSalaries/'.$empSalary->id.'/edit')}}" class="btn btn-sm btn btn-info">Edit</a>
                        @endcan

                        @can('emp_show')
                        <a href="{{URL::to('empSalaries/'.$empSalary->id)}}" class="btn btn-sm btn btn-success">Show</a>
                        @endcan

                    @can('emp_delete')
                    <form action="{{URL::to('empSalaries/'.$empSalary->id)}}" method="post" class="float-left">
                    @csrf
                    @method('Delete')
                    <button class="btn btn-sm btn btn-danger"onclick="return confirm('Are you sure Want to Delete Employee & Salary?')" type="submit" >Delete</button>
                </form>
                @endcan

                    </td>

                </tr>
            @endforeach
        </table>
        {{$empSalaries->links()}}
    </div>
@endsection

