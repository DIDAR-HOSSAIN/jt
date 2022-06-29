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
                    <a href="{{route('salaries.create')}}" class="btn btn-info">Add Salary</a>
                </span>
                    </div>
                </form>
            </div>

            <tr>
                <th>S/N</th>
                <th>Month </th>
                <th>Year </th>
                <th>Working Day </th>
                <th>Actions </th>

            </tr>



            {{--        @php $i=1;--}}
            {{--        @endphp--}}
            @foreach($salaries as $key=> $salary)
                <tr>
                    {{--                <td>{{$i++}}</td>--}}
                    <td>{{$salaries->firstitem()+$key}}</td>
                    <td> {{$salary->month}} </td>
                    <td> {{$salary->year}} </td>
                    <td> {{$salary->working_day}} </td>


                    <td>
                        @can('salary_edit')
                        <a href="{{URL::to('salaries/'.$salary->id.'/edit')}}" class="btn btn-sm btn btn-info">Edit</a>
                        @endcan

                        @can('salary_show')
                        <a href="{{URL::to('salaries/'.$salary->id)}}" class="btn btn-sm btn btn-success">Show</a>
                        @endcan

                            @can('salary_delete')
                        <form action="{{URL::to('salaries/'.$salary->id)}}" method="post" class="float-left">
                            @csrf
                            @method('Delete')
                            <button class="btn btn-sm btn btn-danger"onclick="return confirm('Are you sure Delete Salary?')" type="submit" >Delete</button>
                        </form>
                       @endcan
                    </td>

                </tr>
            @endforeach
        </table>
        {{$salaries->links()}}
    </div>
@endsection

