<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Commission Report</title>
</head>
<body>

<div class="col-md-12">
    <div class="text-center">
        <h3 class="text">4NS ENTERPRISE, DUTCH BANGLA AGENT BANKING</h3>
        <h4>Monthly Commission Summary</h4>
{{--        <p class="lead">From {{$fromDate}} to Till {{$tillDate}}</p>--}}
        <p class="lead">From {{$fromDt= date("d-m-Y", strtotime($fromDate))}} to Till {{$tillDt= date("d-m-Y", strtotime($tillDate))}}</p>

    </div>
    <p class="text-right">
        @php
            $date = \Carbon\Carbon::now(+6)->format('d/m/Y');
        @endphp
        Date : {{date($date)}}
    </p>

    <table class="table table-hover table-striped table-bordered">
        <tr class="bg-warning text-center">
                <th> Commission Type </th>
                <th> Amount </th>
            </tr>
            @foreach($commissions as $key=>$commision)
                <tr>
                    <td> {{$key}} </td>
                    <td class="text-right"> {{$commision}}/- </td>
                </tr>
            @endforeach
        <tr>
            <td>Total</td>
            <td class="text-right">{{$total}}/-</td>
        </tr>
        </table>
    <p>Prepared By: {{ucfirst(trans(\Illuminate\Support\Facades\Auth::user()->name))}} </p>
    </div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
