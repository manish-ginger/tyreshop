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
                                <h1 class="page-title">Service</h1>
                                <div>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Service</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Add</li>
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
                                        <div class="card-header">
                                            <div class="card-title">Add New Service</div>
                                        </div>
                                        <form action="{{ route('feature.store') }}" method="post"  accept-charset="utf-8" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">

                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label"> Name :</label>
                                                <div class="col-md-9">
                                                    <select name="feature_name" class="form-control" required>
                                                        <option selected disabled value="">Choose Service Type</option>
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
                                                            <option value="{{$washing_type->name}}">{{$washing_type->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Vehicle Category :</label>
                                                <div class="col-md-9">
                                                    <select name="vehicle_category" class="form-control" id="category">
                                                        <option selected disabled value="">Choose Vehicle Category</option>
                                                        @foreach ($vehicle_categories as $vehicle_category)
                                                            <option value="{{$vehicle_category->id}}">{{$vehicle_category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Vehicle Brand :</label>
                                                <div class="col-md-9">
                                                    <select name="brand" class="form-control" id="brand">
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Vehicle Model :</label>
                                                <div class="col-md-9">
                                                    <select name="model" class="form-control" id="model">
                                                    </select>
                                                </div>
                                            </div>

{{--                                            <div class="row mb-4">--}}
{{--                                                <label class="col-md-3 form-label">Vehicle Variant :</label>--}}
{{--                                                <div class="col-md-9">--}}
{{--                                                    <select name="variant" class="form-control" id="variant">--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

                                            <!-- Row -->
                                            <div class="row">
                                                <label class="col-md-3 form-label mb-4"> Actual Price :</label>
                                                <div class="col-md-9 mb-4">
                                                    <input type="text" name="actual_price" class="form-control" placeholder=" Actual Price" required>
                                                </div>
                                            </div>
                                            <!--End Row-->


                                            <!-- Row -->
                                            <div class="row">
                                                <label class="col-md-3 form-label mb-4"> Discounted Price :</label>
                                                <div class="col-md-9 mb-4">
                                                    <input type="text" name="discounted_price" class="form-control" placeholder="Discounted Price" required>
                                                </div>
                                            </div>
                                            <!--End Row-->


                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label"> Percentage OR Amount :</label>
                                                <div class="col-md-9">
                                                    <select name="perc_or_amount" class="form-control" required>
                                                        <option disabled value="" selected>Choose Percentage OR Amount</option>
                                                        <option value="percentage">Percentage</option>
                                                        <option value="amount">Amount</option>
                                                      </select>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label"> Coupon Code:</label>
                                                <div class="col-md-9">
                                                    <select name="coupon" class="form-control" required>
                                                        <option selected disabled>
                                                        @if(count($coupons)>0)
                                                        Choose a coupon
                                                            @else
                                                            No coupons
                                                        @endif
                                                        </option>
                                                        @foreach ($coupons as $coupon)
                                                            <option value="{{$coupon->id}}">{{$coupon->code}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label"> Accessory :</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="accessory" class="form-control" placeholder=" Accessory">
                                                </div>
                                            </div>


{{--                                            <div class="row mb-4">--}}
{{--                                                <label class="col-md-3 form-label"> Free Services :</label>--}}
{{--                                                <div class="col-md-9">--}}
{{--                                                    <input type="text" name="free_services" class="form-control" placeholder=" Free Services">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label"> Duration :</label>
                                                <div class="col-md-9">
{{--                                                    <input type="time" name="duration" class="without_ampm" placeholder=" Duration">--}}
                                                    <input id="timepicker" type="text" name="duration" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label"> Loyalty Points :</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="loyalty_points" class="form-control" placeholder="Loyalty points" required>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label"> Loyalty Points Validity (Days):</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="loyalty_points_validity" class="form-control" placeholder="Loyalty Points Validity" required>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Slots :</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="slots" class="form-control" placeholder="Slots" required>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card-footer">
                                            <!--Row-->
                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-9 text-end">
                                                <button class="btn btn-danger" onclick="window.location.reload();">Discard</button> &nbsp; &nbsp;
                                                <button class="btn btn-success">Add Service</button> &nbsp; &nbsp;

                                                </div>
                                            </div>
                                            <!--End Row-->
                                        </div>
                                        </form>
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

                                    $('#brand').html('<option disabled selected>No brand for this category.  Try another category</option>');
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

                                $('#model').html('<option disabled selected>No model for this brand and category.  Try with another brand and category</option>');
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

                                $('#variant').html('<option disabled selected>No variant for this brand,category and model.  Try with another </option>');
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
