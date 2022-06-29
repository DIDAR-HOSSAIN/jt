@extends('backend.layouts.master')
<!-- Right Panel -->
@section('content')
<div id="right-panel" class="right-panel">

        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-flat-color-1">
                <div class="card-body pb-0">
                    <h4 class="mb-0">
                        <span class="count">{{$balanceBd}}</span>
                    </h4>
                    <p class="text-light">Balance B/D</p>

                    <div class="chart-wrapper px-0" style="height:70px;" height="70">
                        <canvas id="widgetChart1"></canvas>
                    </div>

                </div>

            </div>
        </div>
        <!--/.col-->

        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-flat-color-5">
                <div class="card-body pb-0">
                    <div class="dropdown float-right">
                    </div>
                    <h4 class="mb-0">
                        <span class="count">{{$virtualBd}}</span>
                    </h4>
                    <p class="text-light">Virtualbd B/D</p>

                    <div class="chart-wrapper px-0" style="height:70px;" height="70">
                        <canvas id="widgetChart2"></canvas>
                    </div>

                </div>
            </div>
        </div>
        <!--/.col-->

        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-flat-color-3">
                <div class="card-body pb-0">
                    <div class="dropdown float-right">
                    </div>
                    <h4 class="mb-0">
                        <span class="count">{{$virtualcash}}</span>
                    </h4>
                    <p class="text-light">Rocket Virtual</p>

                </div>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart3"></canvas>
                </div>
            </div>
        </div>
        <!--/.col-->


    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-4">
            <div class="card-body pb-0">
                <div class="dropdown float-right">
                </div>
                <h4 class="mb-0">
                    <span class="count">{{$totalCustomer}}</span>
                </h4>
                <p class="text-light">Total Customer</p>

                <div class="chart-wrapper px-3" style="height:70px;" height="70">
                    <canvas id="widgetChart4"></canvas>
                </div>

            </div>
        </div>
    </div>
    <!--/.col-->


    </div> <!-- .content -->
{{--</div><!-- /#right-panel -->--}}

<!-- Right Panel -->

@endsection
