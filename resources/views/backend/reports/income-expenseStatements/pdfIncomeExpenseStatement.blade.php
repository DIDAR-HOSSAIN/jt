<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Income Expense Statement</title>
</head>
<body>

<div class="col-md-12">
    <div class="text-center">
        <h3 class="text">4NS ENTERPRISE, DUTCH BANGLA AGENT BANKING</h3>
        <h4>Monthly Income Expenditure Statement</h4>
{{--        <p class="lead">From {{$fromDate}} to Till {{$tillDate}}</p>--}}
        <p class="lead">From {{$fromDt= date("d-m-Y", strtotime($fromDate))}} to Till {{$tillDt= date("d-m-Y", strtotime($tillDate))}}</p>

    </div>
    <p class="text-right">
        @php
            $date = \Carbon\Carbon::now(+6)->format('d/m/Y');
        @endphp
        Date : {{date($date)}}
    </p>

    <hr/>
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
                        <td> {{date('d-m-Y', strtotime($key))}} </td>
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

                <p>Prepared By: {{ucfirst(trans(\Illuminate\Support\Facades\Auth::user()->name))}} </p>
            </table>
        </div> <!-- table responsive -->
    </div> <!-- end row -->



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
