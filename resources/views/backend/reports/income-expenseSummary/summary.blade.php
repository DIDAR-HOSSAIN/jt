<link rel="stylesheet" href="{{asset('backend-lib.style.css')}}">
@extends('backend.layouts.master')

@section('content')
            <h3 class="text-center">4NS ENTERPRISE, DUTCH BANGLA AGENT BANKING</h3>
            <h4 class="text-center">Monthly Income & Expenditure Summary</h4>
            <h5 class="text-center">
                @php
                    $date = \Carbon\Carbon::now(+6)->format('d/m/Y');
                @endphp
                Date : {{date($date)}}
            </h5>
<hr/>

            <div class="row">
                <div class="col-md-6">
                    <table border = "2" width = "100%">
                        <tr>

                            <th class="text-center">Bank Commission Title</th>
                            <th class="text-center">Amount</th>

                        </tr>

                        <tr>
                            <td class="bg-success">Balance B/D </td>
                            <td class="text-right">{{$balanceBd}} </td>
                        </tr>

                    <tr>
                        <td class="bg-success"> Virtual B/D</td>
                        <td class="text-right">{{$virtualBd}}</td>
                    </tr>

                    <tr>
                        <td> Commission</td>
                        <td class="text-right">{{$incomeCatCommission}}</td>
                    </tr>

                    @foreach($incomeCatSum as $key => $catIncome)
                        <tr>
                            <td> {{$key}} </td>
                            <td class="text-right"> {{$catIncome}} </td>
                        </tr>
                    @endforeach

                    </table>

                        <table  width = "100%">

                    <td class="pull-left"> Office Expenditure </td>
                        <td class="pull-right">(-){{$expenseAmount}}</td>

                        </table>

                    <table border = "2" width = "100%">

                        <td class="bg-danger"> Total Hand Cash</td>
                        <td class="text-right">{{$handCash}}</td>

                    </table>

                </div>



                <div class="col-md-6">
                    <table border = "2" width = "100%">

                        <tr>

                            <th class="text-center">Rocket Commission Title</th>
                            <th class="text-center">Amount</th>

                        </tr>

                        @foreach($incomeRocketCatSum as $key => $rocketCatIncome)
                            <tr>
                                <td> {{$key}} </td>
                                <td class="text-right"> {{$rocketCatIncome}} </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td class="bg-danger"> Virtual Cash</td>
                            <td class="text-right">{{$virtualcash}}</td>
                        </tr>
                    </table>

                </div>

            </div>

@endsection


