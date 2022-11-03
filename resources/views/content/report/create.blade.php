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
@extends('layouts.app')

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
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
{{--                                        <form action="{{ route('report.store') }}" method="post"  accept-charset="utf-8" enctype="multipart/form-data" id="form_report_ajax">--}}
                                        <form action="{{ route('report.store') }}" method="post"  accept-charset="utf-8" enctype="multipart/form-data">
                                        @csrf

                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                                        <thead>
                                                        <tr>
                                                            <th class="wd-40p border-bottom-0">From</th>
                                                            <th class="wd-40p border-bottom-0">To</th>
                                                            <th class="wd-40p border-bottom-0">Brand</th>
                                                            <th class="wd-40p border-bottom-0">Customer Name</th>
                                                            <th class="wd-15p border-bottom-0">Vehicle Number</th>
                                                            <th class="wd-15p border-bottom-0">Coupon</th>
                                                            <th class="wd-15p border-bottom-0">Package</th>
                                                            <th class="wd-15p border-bottom-0">Booking Type</th>
                                                            <th class="wd-15p border-bottom-0">Booking Status</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                            <tr>

                                                                <td>
                                                                    <input type="date" name="from" class="form-control" placeholder="From" value="@if($show_empty==1){{$request->from}}@endif">
                                                                </td>

                                                                <td>
                                                                    <input type="date" name="to" class="form-control" placeholder="To" value="@if($show_empty==1){{$request->to}}@endif">
                                                                </td>

                                                                <td>
                                                                    <select name="vehicle_category" class="form-control">
                                                                        <option @if(($show_empty!=1)||($request->vehicle_category=='')) selected @endif value="">Choose Vehicle category</option>
                                                                        @foreach ($vehicle_categories as $vehicle_category)
                                                                            <option value="{{$vehicle_category->id}}" @if(($show_empty==1)&&($vehicle_category->id==$request->vehicle_category)) selected @endif>{{$vehicle_category->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>

                                                                <td>
                                                                    <select name="customer_id" class="form-control">
                                                                        <option @if(($show_empty!=1)||($request->customer_id=='')) selected @endif value="">Choose Customer</option>
                                                                        @foreach ($customers as $customer)
                                                                            <option value="{{$customer->id}}" @if(($show_empty==1)&&($customer->id==$request->customer_id)) selected @endif>{{$customer->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>

                                                                <td>
                                                                    <select name="vehicle_number" class="form-control" id="vehicle_number">
                                                                        <option @if(($show_empty!=1)||($request->vehicle_number=='')) selected @endif value="">Choose Vehicle Number</option>
                                                                        @foreach ($customervehicles as $customervehicle)
                                                                            <option value="{{$customervehicle->vehicle_number}}" @if(($show_empty==1)&&($customervehicle->vehicle_number==$request->vehicle_number)) selected @endif>{{$customervehicle->vehicle_number}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>

                                                                <td>
                                                                    <select name="coupon" class="form-control">
                                                                        <option @if(($show_empty!=1)||($request->coupon=='')) selected @endif value="">Choose Coupon</option>
                                                                        @foreach ($coupons as $coupon)
                                                                            <option value="{{$coupon->id}}" @if(($show_empty==1)&&($coupon->id==$request->coupon)) selected @endif>{{$coupon->code}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>

                                                                <td>
                                                                    <select name="package" class="form-control">
                                                                        <option @if(($show_empty!=1)||($request->package=='')) selected @endif value="">Choose Package</option>
                                                                        @foreach ($packages as $package)
                                                                            <option value="{{$package->id}}" @if(($show_empty==1)&&($package->id==$request->package)) selected @endif>{{$package->title}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>

                                                                <td>
                                                                    <select name="booking_type" class="form-control">
                                                                        <option @if(($show_empty!=1)||($request->booking_type=='')) selected @endif value="">Choose Booking Type</option>
                                                                        <option value="0" @if(($show_empty==1)&&($request->booking_type==0)) selected @endif>Pre Booked</option>
                                                                        <option value="1" @if(($show_empty==1)&&($request->booking_type==1)) selected @endif>Direct</option>
                                                                    </select>
                                                                </td>


                                                                <td>
                                                                    <select name="booking_status" class="form-control">
                                                                        <option @if(($show_empty!=1)||($request->booking_status=='')) selected @endif value="">Choose Booking Status</option>
                                                                            <option value="0" @if(($show_empty==1)&&($request->booking_status==0)) selected @endif>Waiting</option>
                                                                            <option value="1" @if(($show_empty==1)&&($request->booking_status==1)) selected @endif>Vehicle Received</option>
                                                                            <option value="2" @if(($show_empty==1)&&($request->booking_status==2)) selected @endif>Processing</option>
                                                                            <option value="3" @if(($show_empty==1)&&($request->booking_status==3)) selected @endif>Finished</option>
                                                                    </select>
                                                                </td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <button class="btn btn-success" style="float:right;">Create Report</button> &nbsp; &nbsp;
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="report_ajax_content">
                            </div>

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

        @section('scripts')

        <!-- INPUT MASK JS-->
        <script src="{{asset('assets/plugins/input-mask/jquery.mask.min.js')}}"></script>

        <!-- INTERNAL SELECT2 JS -->
        <script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
        <script src="{{asset('assets/js/select2.js')}}"></script>

        <!-- INTERNAL WYSIWYG Editor JS -->
        <script src="{{asset('assets/plugins/wysiwyag/jquery.richtext.js')}} "></script>
        <script src="{{asset('assets/plugins/wysiwyag/wysiwyag.js')}} "></script>

        <!-- INTERNAL File-Uploads Js-->
        <script src="{{asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
        <script src="{{asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
        <script src="{{asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
        <script src="{{asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
        <script src="{{asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>

        <!-- Perfect SCROLLBAR JS-->
        <script src="{{asset('assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>
        <script src="{{asset('assets/plugins/p-scroll/pscroll.js')}}"></script>
        <script src="{{asset('assets/plugins/p-scroll/pscroll-1.js')}}"></script>

        @endsection
