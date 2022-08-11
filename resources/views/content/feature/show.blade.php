@php
use App\Models\Coupon;
@endphp
@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Service </h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Service </a></li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                    <div class="card-body">

                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Name :</label>
                            <div class="col-md-9">
                                    @foreach ($washing_types as $washing_type)
                                        @if($washing_type->name==$feature->feature_name) {{$washing_type->name}} @endif
                                    @endforeach
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Brand :</label>
                            <div class="col-md-9">
                                    @foreach ($vehicle_categories as $vehicle_category)
                                        @if($vehicle_category->id==$feature->vehicle_category) {{$vehicle_category->name}} @endif
                                    @endforeach
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Model :</label>
                            <div class="col-md-9">
                                    @foreach ($vehicle_brands as $vehicle_brand)
                                        @if($vehicle_brand->id==$feature->brand) {{$vehicle_brand->name}} @endif
                                    @endforeach
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Size :</label>
                            <div class="col-md-9">
                                    @foreach ($vehicle_models as $vehicle_model)
                                        @if($vehicle_model->id==$feature->model) {{$vehicle_model->name}} @endif
                                    @endforeach
                            </div>
                        </div>

{{--                        <div class="row mb-4">--}}
{{--                            <label class="col-md-3 form-label">Vehicle Variant :</label>--}}
{{--                            <div class="col-md-9">--}}
{{--                                    @foreach ($variants as $variant)--}}
{{--                                        @if($variant->id==$feature->variant) {{$variant->variant}} @endif--}}
{{--                                    @endforeach--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Actual Price :</label>
                            <div class="col-md-9">
                                @if (isset($feature->actual_price)) {{ $feature->actual_price }} @endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Discounted Price :</label>
                            <div class="col-md-9">
                                @if (isset($feature->discounted_price)) {{ $feature->discounted_price }} @endif
                            </div>
                        </div>



                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Percentage OR Amount:</label>
                            <div class="col-md-9">
                                @if (isset($feature->perc_or_amount)) {{ $feature->perc_or_amount }} @endif
                            </div>
                        </div>

{{--                        <div class="row mb-4">--}}
{{--                            <label class="col-md-3 form-label"> Coupon :</label>--}}
{{--                            <div class="col-md-9">--}}
{{--                                        @if(count($coupons)>0)--}}
{{--                                    @foreach ($coupons as $coupon)--}}
{{--                                        @if($coupon->id==$feature->coupon) {{$coupon->code}} @endif--}}
{{--                                    @endforeach--}}
{{--                                        @else--}}
{{--                                            No coupons--}}
{{--                                        @endif--}}

{{--                            </div>--}}
{{--                        </div>--}}


                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Accessory :</label>
                            <div class="col-md-9">
                                @if (isset($feature->accessory)) {{ $feature->accessory }} @endif
                            </div>
                        </div>

{{--                        <div class="row mb-4">--}}
{{--                            <label class="col-md-3 form-label"> Free Services :</label>--}}
{{--                            <div class="col-md-9">--}}
{{--                                @if (isset($feature->free_services)) {{ $feature->free_services }} @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Duration :</label>
                            <div class="col-md-9">
                                @if(isset($feature->duration)){{$feature->duration}}@endif
                            </div>
                        </div>

                        <!-- Row -->
                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Loyalty Points :</label>
                            <div class="col-md-9">
                                @if (isset($feature->loyalty_points)) {{ $feature->loyalty_points }} @endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Loyalty Points Validity (Days) :</label>
                            <div class="col-md-9">
                                @if (isset($feature->loyalty_points_validity)) {{ $feature->loyalty_points_validity }} @endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Slots :</label>
                            <div class="col-md-9">
                                @php
                                if(isset($feature->coupon))
                                     $data = Coupon::where('id',$feature->coupon)->get();
                                    if(isset($data[0]->code)){echo $data[0]->code;}
                                    @endphp
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Slots :</label>
                            <div class="col-md-9">
                                @if (isset($feature->slots)) {{ $feature->slots }} @endif
                            </div>
                        </div>


                    </div>
            </div>
        </div>
    </div>
    <!-- /ROW-1 CLOSED -->
@endsection

@section('scripts')
    <!-- INPUT MASK JS-->
    <script src="{{ asset('assets/plugins/input-mask/jquery.mask.min.js') }}"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>

    <!-- INTERNAL WYSIWYG Editor JS -->
    <script src="{{ asset('assets/plugins/wysiwyag/jquery.richtext.js') }} "></script>
    <script src="{{ asset('assets/plugins/wysiwyag/wysiwyag.js') }} "></script>

    <!-- INTERNAL File-Uploads Js-->
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/p-scroll/pscroll.js') }}"></script>
    <script src="{{ asset('assets/plugins/p-scroll/pscroll-1.js') }}"></script>
@endsection
