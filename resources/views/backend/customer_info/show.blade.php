
@extends('backend.layouts.master')

{{--@section('breadcrumb')--}}
{{--    <div class="block-header">--}}
{{--        <div class="row clearfix">--}}
{{--            <div class="col-md-6 col-sm-12">--}}
{{--                <nav aria-label="breadcrumb">--}}
{{--                    <ol class="breadcrumb">--}}
{{--                        <li class="breadcrumb-item"><a href="#"> Customer List </a></li>--}}
{{--                        <li class="breadcrumb-item"><a href="{{route('customers.index')}}">  Customer List </a></li>--}}
{{--                    </ol>--}}
{{--                </nav>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 col-sm-12 text-right">--}}
{{--                @role('writter|admin')--}}
{{--                <a href="{{route('customers.create')}}" class="btn btn-group-lg btn-warning"> <i class="fa fa-plus"></i> Add Customer </a>--}}
{{--                @endrole--}}
{{--            </div>--}}
{{--        </div> <!-- end row clearfix -->--}}
{{--    </div> <!-- end block-header -->--}}
{{--@endsection--}}

@section('content')
    <div class="col-12">
        <div class="header"> <h6 class="text-uppercase text-center"> <strong> Customer Details  </strong> </h6> </div>
        <div class="row">
            @if(session('message'))
                <div class="col-8 alert alert-success posMessage"> {{session('message')}}  </div>
            @endif
        </div> <!-- end row -->
        <div class="table-responsive">
            <table class="table table-hover table-custom spacing8">


                <tbody>

                <tr>
                    <th> Opening Date </th>
                    <td> {{$customer->opening_date}}</td>
                </tr>

                <tr>
                    <th> Account Name </th>
                    <td> {{$customer->account_name}}</td>
                </tr>

                <tr>
                    <th> Account No </th>
                    <td> {{$customer->account_no}}</td>
                </tr>

                <tr>
                    <th> Account Type </th>
                    <td> {{$customer->account_type}}</td>
                </tr>

                <tr>
                    <th> Mobile No </th>
                    <td> {{$customer->mobile_no}}</td>
                </tr>

                <tr>
                    <th> Customer ID No </th>
                    <td> {{$customer->customer_id_no}}</td>
                </tr>

                <tr>
                    <th> Finger Print </th>
                    <td> {{$customer->finger_print}}</td>
                </tr>

                <tr>
                    <th> Nominee Name </th>
                    <td> {{$customer->nominee_name}}</td>
                </tr>

                <tr>
                    <th> Nominee Mobile No </th>
                    <td> {{$customer->nominee_mobile_no}}</td>
                </tr>

                <tr>
                    <th> Relationship With Account Holder </th>
                    <td> {{$customer->relationship_with_account_holder}}</td>
                </tr>

                <tr>
                    <th> Opening Deposit </th>
                    <td> {{$customer->opening_deposit}}</td>
                </tr>

                <tr>
                    <th> DPS No </th>
                    <td> {{$customer->dps_no}}</td>
                </tr>

                <tr>
                    <th> DPS Amount Date </th>
                    <td> {{$customer->dps_amount_date}}</td>
                </tr>

                <tr>
                    <th> FDR No </th>
                    <td> {{$customer->fdr_No}}</td>
                </tr>

                <tr>
                    <th> FDR Amount </th>
                    <td> {{$customer->fdr_amount}}</td>
                </tr>

                <tr>
                    <th> User Name </th>
                    <td>{{ucfirst(trans(\Illuminate\Support\Facades\Auth::user()->name))}} </td>
                </tr>

                <tr>
                    <th> Actions </th>

                    <td>
                        @can('customer_edit')
                            <a href="{{route('customers.edit', $customer->id)}}" class="btn btn-outline-warning btn-sm actionButton"> <i class="fa fa-pencil"></i> </a>
                        @endcan

                        @can('customer_show')
                        <a href="{{route('customers.show', $customer->id)}}" class="btn btn-outline-success btn-sm actionButton"> <i class="fa fa-eye"></i> </a>
                        @endcan

                        @can('customer_delete')
                                {!! Form::open(array('url' => "customers/$customer->id",'method' => 'delete', 'class'=>'actionButton')) !!}
                                {{ Form::button('<i class="fa fa-remove"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-sm float left'])}}
                        @endcan

                        {!! Form::close() !!}

                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div> <!-- end col-12 -->
@endsection

