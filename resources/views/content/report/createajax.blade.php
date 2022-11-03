@php
use App\Models\Customervehicle;
use App\Models\Customer;
use App\Models\VehicleCategory;
use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use App\Models\Package;
use App\Models\Feature;
use App\Models\Coupon;
use Carbon\Carbon;

$actual_price_sum=0;
@endphp
@extends('layouts.app-modal')

        @section('styles')

        @endsection

        @section('content')

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <h1 class="page-title">Report</h1>
                                <div>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Report</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                                    </ol>
                                </div>
                            </div>
                    <div>
                    @if(Session::has('message'))
                    <div class="alert alert-info" role="alert" style="margin-bottom: 25px;">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                    {{ Session::get('message') }}
                    </div>
                    @endif
                    </div>
                            <!-- PAGE-HEADER END -->

                            <!-- ROW-1 OPEN -->


                @if(isset($rows_services))
                    @if(count($rows_services)>0)
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Booking Report</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route("servicereport.excelExport") }}" method="post">
                                        @csrf
                                        <input type="hidden" name="type" value="booking">
                                        <input type="hidden" name="from" value="{{$request->from}}">
                                        <input type="hidden" name="to" value="{{$request->to}}">
                                        <input type="hidden" name="vehicle_category" value="{{$request->vehicle_category}}">
                                        <input type="hidden" name="customer_id" value="{{$request->customer_id}}">
                                        <input type="hidden" name="vehicle_number" value="{{$request->vehicle_number}}">
                                        <input type="hidden" name="booking_status" value="{{$request->booking_status}}">
                                        <input type="hidden" name="booking_type" value="{{$request->booking_type}}">
                                        <input type="hidden" name="coupon" value="{{$request->coupon}}">
                                        <input type="hidden" name="package" value="{{$request->package}}">

                                        <button class="btn btn-primary" style="float:right;">Export Excel</button>
                                    </form>

                                    <form action="{{ route("servicereport.createPDF") }}" method="post">
                                        @csrf
                                        <input type="hidden" name="from" value="{{$request->from}}">
                                        <input type="hidden" name="to" value="{{$request->to}}">
                                        <input type="hidden" name="vehicle_category" value="{{$request->vehicle_category}}">
                                        <input type="hidden" name="customer_id" value="{{$request->customer_id}}">
                                        <input type="hidden" name="vehicle_number" value="{{$request->vehicle_number}}">
                                        <input type="hidden" name="booking_status" value="{{$request->booking_status}}">
                                        <input type="hidden" name="booking_type" value="{{$request->booking_type}}">
                                        <input type="hidden" name="coupon" value="{{$request->coupon}}">
                                        <input type="hidden" name="package" value="{{$request->package}}">

                                        <button class="btn btn-warning" style="float:right;">Export PDF</button>
                                    </form>


                                    <br><br><br>
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                            <thead>
                                            <tr>
                                                <th class="wd-5p border-bottom-0">SL</th>
                                                <th class="wd-40p border-bottom-0">Customer</th>
                                                <th class="wd-40p border-bottom-0">Number</th>
                                                <th class="wd-40p border-bottom-0">Brand</th>
                                                <th class="wd-40p border-bottom-0">Model</th>
                                                <th class="wd-40p border-bottom-0">Size</th>
                                                <th class="wd-40p border-bottom-0">Current Odometer</th>
                                                <th class="wd-40p border-bottom-0">Next Odometer</th>
                                                <th class="wd-40p border-bottom-0">Status</th>
                                                <th class="wd-40p border-bottom-0">Type</th>
                                                <th class="wd-40p border-bottom-0">Time</th>
                                                <th class="wd-40p border-bottom-0">Date</th>
                                                <th class="wd-40p border-bottom-0">Coupon</th>
                                                <th class="wd-40p border-bottom-0">Service</th>
                                                <th class="wd-40p border-bottom-0">Price</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($rows_services as $row)
                                                @php
                                                    $customervehicle_data=Customervehicle::where('vehicle_number','=',$row->vehicle_number)->get();
                                                @endphp
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        @php
                                                            $data =Customer::where('id',$customervehicle_data[0]->customer_id)->get();
                                                                 if(isset($data[0]->name)){echo $data[0]->name; }
                                                        @endphp
                                                    </td>
                                                    <td>{{ $row->vehicle_number }}</td>
                                                    <td>
                                                        @php
                                                            $data =VehicleCategory::where('id',$customervehicle_data[0]->vehicle_category)->get();
                                                                 if(isset($data[0]->name)){echo $data[0]->name; }
                                                        @endphp
                                                    </td>
                                                    <td>
                                                        @php
                                                            $data =VehicleBrand::where('id',$customervehicle_data[0]->brand)->get();
                                                                 if(isset($data[0]->name)){echo $data[0]->name; }
                                                        @endphp
                                                    </td>
                                                    <td>
                                                        @php
                                                            $data =VehicleModel::where('id',$customervehicle_data[0]->model)->get();
                                                                 if(isset($data[0]->name)){echo $data[0]->name; }
                                                        @endphp
                                                    </td>
                                                    <td>{{ $row->curr_odo_reading }}</td>
                                                    <td>{{ $row->next_odo_reading }}</td>
                                                    <td>
                                                        @if($row->status==0) Waiting @endif
                                                        @if($row->status==1) Vehicle Received @endif
                                                        @if($row->status==2) Processing @endif
                                                        @if($row->status==3) Finished @endif
                                                    </td>
                                                    <td>
                                                        @if($row->booking_type==0) Pre Booked @endif
                                                        @if($row->booking_type==1) Direct @endif
                                                    </td>
                                                    <td>{{ $row->time }}</td>
                                                    <td>{{ $row->date }}</td>
                                                    <td>
                                                        @php
                                                            $data =Feature::where('id',$row->service_id)->get();
                                                                 if(isset($data[0]->coupon)){
                                                                     $coupon_data =Coupon::where('id',$data[0]->coupon)->get();
                                                                     if(isset($coupon_data[0]->code)){echo $coupon_data[0]->code; }
                                                                  }
                                                        @endphp
                                                    </td>
                                                    <td>
                                                        @php
                                                            $data =Feature::where('id',$row->service_id)->get();
                                                                 if(isset($data[0]->feature_name)){echo $data[0]->feature_name; }
                                                        @endphp
                                                    </td>
                                                    <td>
                                                        @php
                                                            $data =Feature::where('id',$row->service_id)->get();
                                                                 if(isset($data[0]->actual_price)){echo $data[0]->discounted_price;
                                                                 $actual_price_sum+=$data[0]->discounted_price;
                                                                 }
                                                        @endphp
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <span style="float: right;"><b>Total Invoice Actual Amount : {{$actual_price_sum}}</b></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if((count($rows_services))==0&&($show_empty==1))
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Empty Service Record</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                 @endif


                            @if(isset($rows_packages))
                                @if(count($rows_packages)>0)
                                    <div class="row row-sm">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Package Report</h3>
                                                </div>
                                                <div class="card-body">

                                                    <form action="{{ route("packagereport.excelExport") }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="type" value="package">
                                                        <input type="hidden" name="from" value="{{$request->from}}">
                                                        <input type="hidden" name="to" value="{{$request->to}}">
                                                        <input type="hidden" name="vehicle_category" value="{{$request->vehicle_category}}">
                                                        <input type="hidden" name="customer_id" value="{{$request->customer_id}}">
                                                        <input type="hidden" name="vehicle_number" value="{{$request->vehicle_number}}">
                                                        <input type="hidden" name="booking_status" value="{{$request->booking_status}}">
                                                        <input type="hidden" name="coupon" value="{{$request->coupon}}">
                                                        <input type="hidden" name="package" value="{{$request->package}}">

                                                        <button class="btn btn-primary" style="float:right;">Export Excel</button>
                                                    </form>

                                                    <form action="{{ route("packagereport.createPDF") }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="from" value="{{$request->from}}">
                                                        <input type="hidden" name="to" value="{{$request->to}}">
                                                        <input type="hidden" name="vehicle_category" value="{{$request->vehicle_category}}">
                                                        <input type="hidden" name="customer_id" value="{{$request->customer_id}}">
                                                        <input type="hidden" name="vehicle_number" value="{{$request->vehicle_number}}">
                                                        <input type="hidden" name="booking_status" value="{{$request->booking_status}}">
                                                        <input type="hidden" name="coupon" value="{{$request->coupon}}">
                                                        <input type="hidden" name="package" value="{{$request->package}}">

                                                        <button class="btn btn-warning" style="float:right;">Export PDF</button>
                                                    </form>
                                                    <br><br><br>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                                            <thead>
                                                            <tr>
                                                                <th class="wd-5p border-bottom-0">SL</th>
                                                                <th class="wd-40p border-bottom-0">Customer</th>
                                                                <th class="wd-40p border-bottom-0">Name</th>
                                                                <th class="wd-40p border-bottom-0">Validity</th>
                                                                <th class="wd-40p border-bottom-0">Date</th>
                                                                <th class="wd-40p border-bottom-0">Expiry Date</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($rows_packages as $row)
                                                                @php
                                                                    $customervehicle_data=Customervehicle::where('customer_id','=',$row->customer_id)->get();
                                                                @endphp
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>
                                                                        @php
                                                                            $data =Customer::where('id',$customervehicle_data[0]->customer_id)->get();
                                                                                 if(isset($data[0]->name)){echo $data[0]->name; }
                                                                        @endphp
                                                                    </td>
                                                                    <td>
                                                                        @php
                                                                            $data =Package::where('id',$row->package_id)->get();
                                                                                 if(isset($data[0]->title)){echo $data[0]->title;}
                                                                        @endphp
                                                                    </td>
                                                                    <td>{{ $row->validity }}</td>
                                                                    <td>{{ $row->created_at }}</td>
                                                                    @php
                                                                        $package_purchase_date=$row->created_at;
                                                                        $package_validity_date = Carbon::parse($package_purchase_date)->addDays($row->validity);
                                                                    @endphp
                                                                    <td>{{ $package_validity_date }}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if((count($rows_packages))==0&&($show_empty==1))
                                    <div class="row row-sm">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Empty Package Record</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif


            @endsection
