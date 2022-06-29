
<link rel="stylesheet" href="{{asset('backend-lib/bootstrap-4.4.1-css-js/css/style.css')}}">
<style>
    @media print {
        body * {
            visibility: hidden;
        }
        #section-to-print, #section-to-print * {
            visibility: visible;
        }
        #section-to-print {
            position: absolute;
            left: 0;
            top: 0;
        }
    }
</style>
@extends('backend.layouts.master')
@section('content')


    <h3 class="text-center">4NS ENTERPRISE, DUTCH BANGLA AGENT BANKING</h3>
    <h4 class="text-center">Monthly Income & Expenditure Statement</h4>
    <h5 class="text-center">
        @php
            $date = \Carbon\Carbon::now(+6)->format('d/m/Y');
        @endphp
        Date : {{date($date)}}
    </h5>
    <hr/>
    <div class="row" id="section-to-print">
        <div class="col-md-12 table-response">
           <table class="table table-bordered table-hover">
               <tr class="bg-warning text-center">
                   <th> Sl </th>
                   <th>Date</th>
                   <th>Income Title</th>
                   <th>Amount</th>
                   <th>Expenditure Title</th>
                   <th>Amount</th>
                   <th>Balance</th>
               </tr>
               @php
                $serial = 1;
                $grandTotal = 0;
                $totalIncome = 0;
                $totalExpense = 0;

               @endphp

               @foreach($combineGroup as $key => $data)
               <tr>
                   <td class="text-center"> {{$serial++}} </td>
                   <td> {{date('d-m-yy', strtotime($key))}} </td>
                   <td>
                   @foreach($data as $Key => $singleData)
                       @if($singleData->income_type)
                           {{$singleData->income_type}} @if(!$loop->last) <br> @endif
                       @endif
                   @endforeach
                   </td>
                   <td class="text-right">
                   @foreach($data as $Key => $singleData)
                       @if($singleData->income_type)
                           {{"$singleData->income_amount/-"}} @if(!$loop->last) <br> @endif
                           @php($totalIncome += $singleData->income_amount)
                       @endif
                   @endforeach
                   </td>
                   <td>
                   @foreach($data as $Key => $singleData)
                           @if($singleData->expense_type)
                               {{$singleData->expense_type}} @if(!$loop->last) <br> @endif
                           @endif
                       @endforeach
                   </td>
                   <td class="text-right">
                   @foreach($data as $Key => $singleData)
                       @if($singleData->expense_type)
                           {{"$singleData->expense_amount/-"}} @if(!$loop->last) <br> @endif
                           @php($totalExpense += $singleData->expense_amount)
                       @endif
                   @endforeach
                   </td>
                   <td class="text-right">
                       {{$result = $totalIncome - $totalExpense}}/-
                       @php($grandTotal += $result)
                   </td>
               </tr>
               @endforeach
               <tr>
                   <td></td>
                   <td>Summary </td>
                   <td class="text-right">Total Income </td>
                   <td class="text-right">{{$totalIncome}}/-</td>
                   <td class="text-right">Total Expense </td>
                   <td class="text-right">{{$totalExpense}}/-</td>
                   <td class="text-right">{{$result}}/-</td>
               </tr>
           </table>
        </div> <!-- table responsive -->
        <div class="col-md-6">
            <a url="" class="btn btn-block btn-warning" onclick="window.print()"> Print </a>
        </div>
    </div> <!-- end row -->
@endsection


