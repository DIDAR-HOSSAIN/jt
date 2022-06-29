
@extends('backend.layouts.master')

@section('content')
    <div class="col-md-12">
        <div class="text-center">
            <h3>4NS ENTERPRISE, DUTCH BANGLA AGENT BANKING</h3>
            <h4>Monthly Expenditure Summary</h4>
            <p class="lead">From {{$formDate}} to till {{$tillDate}}</p>
        </div>
        <p class="text-right">
            @php
                $date = \Carbon\Carbon::now(+6)->format('d/m/Y');
            @endphp
            Date : {{date($date)}}
        </p>

        <table class="table table-hover table-striped table-bordered">
            <tr class="bg-warning text-center">
                <th> Entry Date </th>
                <th> Expense Type </th>
                <th> Amount </th>
            </tr>
        @foreach($expenseData as $expense)
            <tr class="text-left">
                <td>@if(!empty($expense->date)){{date('d-m-yy', strtotime($expense->date))}}@endif</td>
                <td> {{$expense->expense_type }}</td>
                <td class="text-right"> {{$expense->expense_amount }}</td>
            </tr>
        @endforeach
            <tr class="text-right">
                <td colspan="2"> Total </td>
                <td class=""> {{$total}} </td>
            </tr>
        </table>
    </div>
@endsection


