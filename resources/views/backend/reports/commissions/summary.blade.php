
@extends('backend.layouts.master')

@section('content')
    <div class="col-md-12">
        <table class="table table-hover table-striped">
            <h3 class="text-center">4NS ENTERPRISE, DUTCH BANGLA AGENT BANKING</h3>
            <h4 class="text-center">Monthly Income Summary</h4>
            <h5 class="text-center">
                @php
                    $date = \Carbon\Carbon::now(+6)->format('d/m/Y');
                @endphp
                Date : {{date($date)}}
            </h5>
            <tr>
                <th> Commission Type </th>
                <th> Amount </th>
            </tr>
        @foreach($commissions as $key=>$commision)
            <tr>
                <td> {{$key}} </td>
                <td class=""> {{$commision}} </td>
            </tr>
        @endforeach
            <tr>
                <td> Total </td>
                <td class=""> {{$total}} </td>
            </tr>
            <tr>
                <td> Expense </td>
                <td class=""> {{$expense}} </td>
            </tr>
            <tr>
                <td> Profit </td>
                <td class=""> {{$profit}} </td>
            </tr>
        </table>
    </div>
@endsection
