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
                    <a href="{{route('employees.create')}}" class="btn btn-info">Add Employee</a>
                </span>
                    </div>
                </form>
            </div>

            <tr>
                <th>S/N</th>
                <th>Employee Name</th>
                <th>Designatione </th>
                <th>Joining Date</th>
                <th>Basic Salary </th>
                <th>Actions </th>

            </tr>



            {{--        @php $i=1;--}}
            {{--        @endphp--}}
            @foreach($employees as $key=> $employee)
                <tr>
                    {{--                <td>{{$i++}}</td>--}}
                    <td>{{$employees->firstitem()+$key}}</td>
                    <td> {{$employee->name}} </td>
                    <td> {{$employee->designation}} </td>
                    <td> {{$employee->joining_date}} </td>
                    <td> {{$employee->basic}} </td>



                    <td>
                        @can('emp_edit')
                        <a href="{{URL::to('employees/'.$employee->id.'/edit')}}" class="btn btn-sm btn btn-info">Edit</a>
                        @endcan
                        @can('show')
                        <a href="{{URL::to('employees/'.$employee->id)}}" class="btn btn-sm btn btn-success">Show</a>
                        @endcan

                        @can('delete')
                        <form action="{{URL::to('employees/'.$employee->id)}}" method="post" class="float-left">
                            @csrf
                            @method('Delete')
                            <button class="btn btn-sm btn btn-danger"onclick="return confirm('Are you sure Want to Delete Employee?')" type="submit" >Delete</button>
                        </form>
                       @endcan
                    </td>

                </tr>
            @endforeach
        </table>
        {{$employees->links()}}
    </div>
@endsection

