@extends('layouts.app')

@section('styles')
    <style>
        .bootstrap-timepicker-meridian, .meridian-column
        {
            display: none;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
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
                <div class="card-header">
                    <div class="card-title">Update Service</div>
                </div>
                <form action="{{ route('feature.update') }}" method="post" accept-charset="utf-8"
                    enctype="multipart/form-data" id="submitAjaxUpdate">
                    @csrf
                    <div class="card-body">

                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Name :</label>
                            <div class="col-md-9">
                                <select name="feature_name" class="form-control" required>
                                    <option disabled value="">Choose Service Type</option>
                                    @foreach ($washing_types as $washing_type)
                                        @php
                                            $c=0;
                                                $shop_id =Session::get('Shop_ID');
                                                    $washing_type_shops=$washing_type->shops;
                                                    $shops_db = explode(',', $washing_type_shops);
                                                    foreach ($shops_db as $row_db){
                                                       if($row_db==$shop_id){
                                                           $c=1;
                                                       }
                                                }
                                        @endphp
                                        @if($c==1)
                                        <option value="{{$washing_type->name}}" @if($washing_type->name==$feature->feature_name) selected @endif>{{$washing_type->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <input type="hidden" name="featureid"
                                       value="@if (isset($feature->id)) {{ encrypt($feature->id) }} @endif">

                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Brand :</label>
                            <div class="col-md-9">
                                <select name="vehicle_category" class="form-control" id="category">
                                    <option disabled value="">Choose Brand</option>
                                    @foreach ($vehicle_categories as $vehicle_category)
                                        <option value="{{$vehicle_category->id}}" @if($vehicle_category->id==$feature->vehicle_category) selected @endif>{{$vehicle_category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Model :</label>
                            <div class="col-md-9">
                                <select name="brand" class="form-control" id="brand">
                                    @foreach ($vehicle_brands as $vehicle_brand)
                                        <option value="{{$vehicle_brand->id}}" @if($vehicle_brand->id==$feature->brand) selected @endif>{{$vehicle_brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Size :</label>
                            <div class="col-md-9">
                                <select name="model" class="form-control" id="model">
                                    @foreach ($vehicle_models as $vehicle_model)
                                        <option value="{{$vehicle_model->id}}" @if($vehicle_model->id==$feature->model) selected @endif>{{$vehicle_model->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

{{--                        <div class="row mb-4">--}}
{{--                            <label class="col-md-3 form-label">Vehicle Variant :</label>--}}
{{--                            <div class="col-md-9">--}}
{{--                                <select name="variant" class="form-control" id="variant">--}}
{{--                                    @foreach ($variants as $variant)--}}
{{--                                        <option value="{{$variant->id}}" @if($variant->id==$feature->variant) selected @endif>{{$variant->variant}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Actual Price :</label>
                            <div class="col-md-9">
                                <input type="text" name="actual_price" class="form-control"
                                value="@if (isset($feature->actual_price)) {{ $feature->actual_price }} @endif" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Discounted Price :</label>
                            <div class="col-md-9">
                                <input type="text" name="discounted_price" class="form-control"
                                value="@if (isset($feature->discounted_price)) {{ $feature->discounted_price }} @endif" required>
                            </div>
                        </div>



                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Percentage OR Amount:</label>
                            <div class="col-md-9">
                                <select name="perc_or_amount" class="form-control">
                                    <option disabled value="">Choose Percentage OR Amount</option>
                                    <option value="percentage" @if ($feature->perc_or_amount=='percentage') selected @endif>Percentage</option>
                                    <option value="amount" @if ($feature->perc_or_amount=='amount') selected @endif>Amount</option>
                                  </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Coupon :</label>
                            <div class="col-md-9">
                                <select name="coupon" class="form-control" required>
                                    <option disabled>
                                        @if(count($coupons)>0)
                                            Choose a coupon
                                        @else
                                            No coupons
                                        @endif
                                    </option>
                                    @foreach ($coupons as $coupon)
                                        <option value="{{$coupon->id}}" @if($coupon->id==$feature->coupon) selected @endif>{{$coupon->code}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Accessory :</label>
                            <div class="col-md-9">
                                <input type="text" name="accessory" class="form-control"
                                value="@if (isset($feature->accessory)) {{ $feature->accessory }} @endif">
                            </div>
                        </div>

{{--                        <div class="row mb-4">--}}
{{--                            <label class="col-md-3 form-label"> Free Services :</label>--}}
{{--                            <div class="col-md-9">--}}
{{--                                <input type="text" name="free_services" class="form-control"--}}
{{--                                value="@if (isset($feature->free_services)) {{ $feature->free_services }} @endif">--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Duration :</label>
                            <div class="col-md-9">
                                <input id="timepicker" type="text" name="duration" class="form-control" value="@if(isset($feature->duration)){{$feature->duration}}@endif">
                            </div>
                        </div>

                        <!-- Row -->
                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Loyalty Points :</label>
                            <div class="col-md-9">
                                <input type="text" name="loyalty_points" class="form-control" value="@if (isset($feature->loyalty_points)) {{ $feature->loyalty_points }} @endif" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Loyalty Points Validity (Days) :</label>
                            <div class="col-md-9">
                                <input type="text" name="loyalty_points_validity" class="form-control" value="@if (isset($feature->loyalty_points_validity)) {{ $feature->loyalty_points_validity }} @endif" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Slots :</label>
                            <div class="col-md-9">
                                <input type="text" name="slots" class="form-control" value="@if (isset($feature->slots)) {{ $feature->slots }} @endif" required>
                            </div>
                        </div>


                        <!--End Row-->
                        <br>
                        <br>
                        <!--Row-->
                        <br>
                        <br>



                    </div>
                    <div class="card-footer">
                        <!--Row-->
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9 text-end">
{{--                                <button onclick="window.location.reload();" class="btn btn-secondary">Revert</button>--}}
                                <input type="reset" class="btn btn-danger" value="Revert">
                                <button class="btn btn-success">Update Service </button>
                            </div>
                        </div>
                        <!--End Row-->
                    </div>
                </form>
                <div class="alert_show">
                    @if (Session::has('message'))
                        <div class="alert alert-info" role="alert" style="margin-bottom: 25px;">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('message') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /ROW-1 CLOSED -->
@endsection

@section('scripts')
    <script>
        $(function(){
            $('#category').change(function(){
                $('#brand').find('option').remove();
                var id = $(this).val();
                $.ajax({
                    url : '{{ route( 'loadBrands' ) }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function( result )
                    {
                        if (!$.trim(result)){

                            $('#brand').html('<option disabled selected>No model.  Try another</option>');
                        }
                        else{
                            $.each( result, function(k, v) {
                                $('#brand').append($('<option>', {value:k, text:v}));
                            });
                            // get_models();
                        }
                    },
                    error: function()
                    {
                        //handle errors
                        swal('Error');
                    }
                });
            });

            $('#brand').click(function(){
                var id = $(this).val();
                get_models(id);
            })

            $('#model').click(function(){
                var id = $(this).val();
                get_variants(id);
            })
        });

        function get_models(id)
        {
            // alert('get_models');
            $('#model').find('option').remove();
            $.ajax({
                url : '{{ route( 'loadModels' ) }}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                type: 'post',
                dataType: 'json',
                success: function( result )
                {
                    if (!$.trim(result)){

                        $('#model').html('<option disabled selected>No size.  Try with another</option>');
                    }
                    else{
                        $.each( result, function(k, v) {
                            $('#model').append($('<option>', {value:k, text:v}));
                        });
                    }
                },
                error: function()
                {
                    //handle errors
                    swal('Error');
                }
            });
        }

        function get_variants(id)
        {
            // alert('get_models');
            $('#variant').find('option').remove();
            $.ajax({
                url : '{{ route( 'loadVariants' ) }}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                type: 'post',
                dataType: 'json',
                success: function( result )
                {
                    if (!$.trim(result)){

                        $('#variant').html('<option disabled selected>No number.  Try with another </option>');
                    }
                    else{
                        $.each( result, function(k, v) {
                            $('#variant').append($('<option>', {value:k, text:v}));
                        });
                    }
                },
                error: function()
                {
                    //handle errors
                    swal('Error');
                }
            });
        }
    </script>
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function (e) {
      // toggle the type attribute
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      // toggle the eye slash icon
      this.classList.toggle('fa-eye-slash');
  });
</script>
    <script>
        $(document).ready(function() {
            $(".packimg-del").click(function(e) {
                e.preventDefault();
                if (confirm("Are You Sure?")) {
                    $(this).closest("DIV").hide();
                    let idz = $(this).attr("id");
                    let url = "{{ url('delete-shopimg') }}";
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            pkmg: idz,
                        },
                        success: function(response) {
                            alert(response.message);
                        },
                    });
                }
            });
            $(".packvid-del").click(function(e) {
                e.preventDefault();
                if (confirm("Are You Sure?")) {
                    $(this).closest("DIV").hide();
                    let idz = $(this).attr("id");
                    let url = "{{ url('delete-shopvideo') }}";
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            pkvd: idz,
                        },
                        success: function(response) {
                            alert(response.message);
                        },
                    });
                }
            });
        });
    </script>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('#timepicker').timepicker({
                showMeridian: false,
                showInputs: true,
                minuteStep: 1,
                defaultTime: '00:00',
            });
        });
    </script>

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
