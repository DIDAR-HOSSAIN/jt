
@extends('backend.layouts.master')

@section('style')
    <!--formden.js communicates with FormDen server to validate fields and submit via AJAX -->
    <script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>

    <!-- Special version of Bootstrap that is isolated to content wrapped in .bootstrap-iso -->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

    <!--Font Awesome (added because you use icons in your prepend/append)-->
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

    <!-- Inline CSS based on choices in "Settings" tab -->
    <style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

@endsection
@section('content')

        <form action="{{route('incomeExpensesmry')}}" method="post">
    <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
            @csrf
            <h3 class="text-center">Date Wise Income Expense Summary</h3>
            <br>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">FROM</label>
                <div class="col-sm-10">
                    <input type="text"  name="fromDate" value="{{date('d-m-Y', strtotime(now()))}}" class="form-control customDate">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Till</label>
                <div class="col-sm-10">
                    <input type="text"  name="tillDate" value="{{date('d-m-Y', strtotime(now()))}}" class="form-control customDate">
                </div>
            </div>

            <button class="btn btn-primary float-right" type="submit" value="Submit"> Submit </button>

        </div>

    </form>

@endsection


@section('script')


    <!-- Extra JavaScript/CSS added manually in "Settings" tab -->
    <!-- Include jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <script>
        $(document).ready(function(){
            var date_input=$('.customDate '); //our date input has the name "date"
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'dd-mm-yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            })
        })
    </script>
@endsection
