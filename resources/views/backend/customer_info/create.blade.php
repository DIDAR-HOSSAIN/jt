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
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2 class="text-uppercase text-center" style="color:orange"> <strong> Add Customer Information  </strong> </h2>
            </div>
            <hr>
            <div class="body">

                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            {{$error}}
                        @endforeach
                    </div>
                @endif

                @if(session('message'))
                    <div class="alert alert-success"> {{session('message')}}  </div>
                @endif

                @if($formType == 'edit')

                    {!! Form::open(array('url' => "customers/$customer->id",'method' => 'PUT', 'enctype' =>'multipart/form-data')) !!}

                @else
                    {!! Form::open(array('url' => "customers",'method' => 'POST', 'enctype' =>'multipart/form-data')) !!}
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">

         <div class="form-group">
        {{ Form::label('Opening_date', "Opening Date" ) }}
        {{ Form::text('opening_date',
            old('opening_date') ? old('opening_date') : (!empty($customer->opening_date) ? date('d-m-Y',strtotime($customer->opening_date))  : date('d-m-Y', strtotime(\Carbon\Carbon::now(+6))) ),
            ["class" => 'form-control',"id" => "opening_date", "required"]) }}
        </div> <!-- end form-group -->

         <div class="form-group">
         {{Form::label("account_name", "Account Name")}}
        {{Form::text('account_name',
            old('account_name') ? old('account_name') : (!empty($customer) ? $customer->account_name : null),
            ["class" => 'form-control',"id" => "account_name","placeholder" => "Enter your Account Name","required"]
        )}}
        </div> <!-- end form-group -->

          <div class="form-group">
        {{ Form::label('account_no',"Account No") }}
        {{ Form::text('account_no',
            old('account_no') ? old('account_no') : (!empty($customer) ? $customer->account_no : null),
            ["class" => 'form-control',"id" => "account_no","placeholder" => "Enter your Account No","required"]) }}
         </div> <!-- end form-group -->

        <div class="form-group">
        {{ Form::label('account_type',"Account Type" ) }}
        {{ Form::select('account_type',['sv'=> "SV",'mse'=>"MSE",'interest free'=>"INTEREST FREE",'school banking'=>"SCHOOL BANKING"],
            old('account_type') ? old('account_type') : (!empty($customer) ? $customer->account_type : null),
            ["class" => 'form-control',"id" => "account_type","placeholder" => "Select Account Type"] ) }}
        </div> <!-- end form-group -->

        <div class="form-group">
        {{ Form::label('mobile_no',"Mobile No" ) }}
        {{ Form::text('mobile_no',
            old('mobile_no') ? old('mobile_no') : (!empty($customer) ? $customer->mobile_no : null),
            ["class" => 'form-control',"id" => "mobile_no","placeholder" => "Enter your Mobile No","required"]) }}
        </div> <!-- end form-group -->

        <div class="form-group">
        {{ Form::label('customer_id_no',"Customer ID No" ) }}
        {{ Form::text('customer_id_no',
            old('customer_id_no') ? old('customer_id_no') : (!empty($customer) ? $customer->customer_id_no : null),
            ["class" => 'form-control',"id" => "customer_id_no","placeholder" => "Enter your Customer ID No","required"]) }}
        </div> <!-- end form-group -->

         <div class="form-group">
        {{ Form::label('finger_print',"Finger Print" ) }}
        {{ Form::select('finger_print',['lt'=>"LT",'rt'=>"RT"],
            old('finger_print') ? old('finger_print') : (!empty($customer) ? $customer->finger_print : null),
            ["class" => 'form-control',"id" => "finger_print","placeholder" => "Select Finger Print"]) }}
        </div> <!-- end form-group -->

            <div class="form-group">
            {{ Form::label('nominee_name',"Nominee Name" ) }}
            {{ Form::text('nominee_name',
            old('nominee_name') ? old('nominee_name') : (!empty($customer) ? $customer->nominee_name : null),
            ["class" => 'form-control',"id" => "nominee_name","placeholder" => " Nominee Name Heare"]) }}
        </div> <!-- end form-group -->
        </div>

        <div class="col-md-6">
      <div class="form-group">
        {{ Form::label('nominee_mobile_no',"Nominee Mobile No" ) }}
        {{ Form::text('nominee_mobile_no',
            old('nominee_mobile_no') ? old('nominee_mobile_no') : (!empty($customer) ? $customer->nominee_mobile_no : null),
            ["class" => 'form-control',"id" => "nominee_mobile_no","placeholder" => "Enter your Nominee Mobile No"]) }}
      </div> <!-- end form-group -->

        <div class="form-group">
        {{ Form::label('relationship_with_account_holder',"Relationship With Account Holder" ) }}
        {{ Form::select('relationship_with_account_holder', $relations,
            old('relationship_with_account_holder') ? old('relationship_with_account_holder') : (!empty($customer) ? $customer->relationship_with_account_holder : null),
            ["class" => 'form-control',"id" => "relationship_with_account_holder","placeholder" => "Enter your Relationship With Account Holder"]) }}
        </div> <!-- end form-group -->

        <div class="form-group">
        {{ Form::label('opening_deposit',"Opening Deposit" ) }}
        {{ Form::text('opening_deposit',
            old('opening_deposit') ? old('opening_deposit') : (!empty($customer) ? $customer->opening_deposit : null),
            ["class" => 'form-control',"id" => "opening_deposit","placeholder" => "Enter your Opening Deposit","required"]) }}
         </div> <!-- end form-group -->

       <div class="form-group">
        {{ Form::label('dps_no',"DPS No" ) }}
        {{ Form::text('dps_no',
            old('dps_no') ? old('dps_no') : (!empty($customer) ? $customer->dps_no : null),
            ["class" => 'form-control',"id" => "dps_no","placeholder" => "Enter your DPS No"]) }}
        </div> <!-- end form-group -->

        <div class="form-group">
        {{ Form::label('dps_amount_date',"DPS Amount Date" ) }}
        {{ Form::text('dps_amount_date',
            old('dps_amount_date') ? old('dps_amount_date') : (!empty($customer) ? $customer->dps_amount_date : null),
            ["class" => 'form-control',"id" => "dps_amount_date","placeholder" => "Enter your DPS Amount Date"]) }}
        </div> <!-- end form-group -->

        <div class="form-group">
        {{ Form::label('fdr_No',"FDR No" ) }}
        {{ Form::text('fdr_No',
            old('fdr_No') ? old('fdr_No') : (!empty($customer) ? $customer->fdr_No : null),
            ["class" => 'form-control',"id" => "fdr_No","placeholder" => "Enter your FDR No"]) }}
        </div> <!-- end form-group -->

        <div class="form-group">
        {{ Form::label('fdr_amount',"FDR Amount" ) }}
        {{ Form::text('fdr_amount',
            old('fdr_amount') ? old('fdr_amount') : (!empty($customer) ? $customer->fdr_amount : null),
            ["class" => 'form-control',"id" => "fdr_amount","placeholder" => "Enter your FDR Amount"]) }}
        </div> <!-- end form-group -->

                </div> <!-- end row -->
                    </div>
                        </div> <!-- end row -->

                        {{Form::submit('Create', ['class'=>"btn btn-success"])}}
                        {!! Form::close() !!}

                            </div><!-- end body -->
                        </div> <!-- card -->
                    </div> <!-- end col-md-12 -->


    </div>


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
            var date_input=$('input[name="opening_date"]'); //our date input has the name "date"
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
