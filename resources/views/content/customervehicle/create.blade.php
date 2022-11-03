@extends('layouts.app-modal')

@section('styles')

@endsection

@section('content')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Customer vehicle</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Customer vehicle</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </div>
    </div>

    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Add New Customer vehicle</div>
                </div>
                <form action="{{ route('customervehicle.store') }}" method="post"  accept-charset="utf-8" enctype="multipart/form-data" id="submitAjaxAdd">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer Name :</label>
                            <div class="col-md-9">
                                <select name="customer_id" class="form-control" required>
                                    <option selected disabled value="">Choose Customer</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Vehicle Number :</label>
                            <div class="col-md-9">
                                <input type="text" name="vehicle_number" class="form-control" placeholder="Vehicle number" required>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Tyre Brand :</label>
                            <div class="col-md-9">
                                <select name="vehicle_category" class="form-control" id="category" required>
                                    <option selected disabled value="">Choose Tyre Brand</option>
                                    @foreach ($vehicle_categories as $vehicle_category)
                                        `@php
                                            $c=0;
                                                $shop_id =Session::get('Shop_ID');
                                                    $vehicle_category_shops=$vehicle_category->shops;
                                                    $shops_db = explode(',', $vehicle_category_shops);
                                                    foreach ($shops_db as $row_db){
                                                       if($row_db==$shop_id){
                                                           $c=1;
                                                       }
                                                }
                                        @endphp`
                                    @if($c==1)
                                        <option value="{{$vehicle_category->id}}">{{$vehicle_category->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Tyre Model :</label>
                            <div class="col-md-9">
                                <select name="brand" class="form-control" id="brand">
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Tyre Size :</label>
                            <div class="col-md-9">

                                <select name="model" class="form-control" id="model">
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Tyre Number :</label>
                            <div class="col-md-9">
                                <select name="variant" class="form-control" id="variant">
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Tyre :</label>
                            <div class="col-md-9">
                                <select name="tyre" class="form-control" id="tyre">
                                </select>
                            </div>
                        </div>



                    </div>
                    <div class="card-footer">
                        <!--Row-->
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9 text-end">
{{--                                <button class="btn btn-danger" onclick="window.location.reload();">Discard</button> &nbsp; &nbsp;--}}
                                <input type="reset" class="btn btn-danger" value="Discard">
                                <button class="btn btn-success">Add Customer Vehicle</button> &nbsp; &nbsp;

                            </div>
                        </div>
                        <!--End Row-->
                    </div>
                </form>
                <div class="alert_show">
                    @if(Session::has('message'))
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

                            $('#brand').html('<option disabled selected>No model for this brand.  Try another brand</option>');
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

            $('#variant').click(function(){
                var id = $(this).val();
                get_tyres(id);
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

                        $('#model').html('<option disabled selected>No size for this model and brand.  Try with another model and brand</option>');
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

                        $('#variant').html('<option disabled selected>No tyre number for this model,brand and size.  Try with another </option>');
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

        function get_tyres(id)
        {
            // alert('get_models');
            $('#tyre').find('option').remove();
            $.ajax({
                url : '{{ route( 'loadTyres' ) }}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                type: 'post',
                dataType: 'json',
                success: function( result )
                {
                    if (!$.trim(result)){

                        $('#tyre').html('<option disabled selected>No tyre available.  Try with another </option>');
                    }
                    else{
                        $.each( result, function(k, v) {
                            $('#tyre').append($('<option>', {value:k, text:v}));
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
