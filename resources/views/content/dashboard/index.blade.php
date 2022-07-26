@php
use App\Http\Middleware\CheckAdminLogged;
@endphp
@extends('layouts.app')

@section('styles')



@endsection

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
                            <h1 class="page-title">Dashboard</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- ROW-1 -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                                <div class="row">
                                    @if(CheckAdminLogged::role_control('machine')==1)
                                     <div class="col-lg-6 col-md-12 col-sm-12 col-xl-3">
                                         <a href="{{route('machine')}}">
                                        <div class="card overflow-hidden bg-info img-card box-info-shadow">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2 text-white">
                                                        <h6 class="">Machines</h6>
                                                        <h2 class="mb-0 number-font">{{ $machineCount }}</h2>
                                                    </div>
                                                    <div class="ms-auto"> <i class="fa fa-gear text-white fs-30 me-2 mt-2"></i> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    </div>
                                    @endif
                                    @if(CheckAdminLogged::role_control('customer')==1)
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xl-3">
                                        <a href="{{route('customer')}}">
                                        <div class="card overflow-hidden bg-danger img-card box-info-shadow">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2 text-white">
                                                        <h6 class="">Customers</h6>
                                                        <h2 class="mb-0 number-font">{{ $customerCount }}</h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <i class="fe fe-users fs-40 text-white mt-4"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    @endif
                                    @if(CheckAdminLogged::role_control('feature')==1)
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xl-3">
                                        <a href="{{route('feature')}}">
                                        <div class="card overflow-hidden card bg-primary img-card box-primary-shadow">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2 text-white">
                                                        <h6 class="">Services</h6>
                                                        <h2 class="mb-0 number-font">{{ $featureCount }}</h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <i class=" lnr lnr-briefcase fs-30 text-white mt-4"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                    </div>

                                    @endif
                                    @if(CheckAdminLogged::role_control('package')==1)
                                     <div class="col-lg-6 col-md-12 col-sm-12 col-xl-3">
                                         <a href="{{route('package')}}">
                                        <div class="card overflow-hidden bg-success img-card box-success-shadow">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2 text-white">
                                                        <h6 class="">Packages</h6>
                                                        <h2 class="mb-0 number-font">{{ $packageCount }}</h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <i class="fe fe-align-justify fs-30 text-white mt-4"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         </a>
                                    </div>
                                        @endif
                                </div>
                            </div>
                        </div>
                        <!-- ROW-1 END -->

                        <!-- ROW-2 -->

                        <!-- ROW-2 END -->





        @endsection

    @section('scripts')

    <!-- SPARKLINE JS-->
    <script src="{{asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="{{asset('assets/plugins/circle-progress/circle-progress.min.js')}}"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/select2.js')}}"></script>

    <!-- PIETY CHART JS-->
    <script src="{{asset('assets/plugins/peitychart/jquery.peity.min.js')}}"></script>
    <script src="{{asset('assets/plugins/peitychart/peitychart.init.js')}}"></script>

    <!-- INTERNAL CHARTJS CHART JS-->
    <script src="{{asset('assets/plugins/chart/Chart.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/chart/rounded-barchart.js')}}"></script>
    <script src="{{asset('assets/plugins/chart/utils.js')}}"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>

    <!-- INTERNAL Data tables js-->
    <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>

    <!-- INTERNAL APEXCHART JS -->
    <script src="{{asset('assets/js/apexcharts.js')}}"></script>
    <script src="{{asset('assets/plugins/apexchart/irregular-data-series.js')}}"></script>

    <!-- C3 CHART JS -->
    <script src="{{asset('assets/plugins/charts-c3/d3.v5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/charts-c3/c3-chart.js')}}"></script>

    <!-- CHART-DONUT JS -->
    <script src="{{asset('assets/js/charts.js')}}"></script>

    <!-- INTERNAL Flot JS -->
    <script src="{{asset('assets/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('assets/plugins/flot/jquery.flot.fillbetween.js')}}"></script>
    <script src="{{asset('assets/plugins/flot/chart.flot.sampledata.js')}}"></script>
    <script src="{{asset('assets/plugins/flot/dashboard.sampledata.js')}}"></script>

    <!-- INTERNAL Vector js -->
    <script src="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>

    <!-- INTERNAL INDEX JS -->
    <script src="{{asset('assets/js/index.js')}}"></script>
    <script src="{{asset('assets/js/index1.js')}}"></script>

    @endsection
