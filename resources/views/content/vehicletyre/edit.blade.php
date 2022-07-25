@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Tyre  </h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Tyre  </a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </div>
    </div>
    <div>
        @if (Session::has('message'))
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
                    <div class="card-title">Update Tyre  </div>
                </div>
                <form action="{{ route('vehicletyre.update') }}" method="post" accept-charset="utf-8"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <input type="hidden" name="vehicletyreid"
                               value="@if (isset($vehicleTyre->id)) {{ encrypt($vehicleTyre->id) }} @endif">

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Tyre Brand :</label>
                            <div class="col-md-9">
                                <select name="vehicle_category_id" class="form-control"  required id="category">
                                    <option selected disabled value="">Choose Tyre Brand</option>
                                    @foreach($vehicleCategories as $category)
                                        <option value="{{$category->id}}" @if($category->id==$vehicleTyre->vehicle_category_id)selected @endif>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Tyre Model :</label>
                            <div class="col-md-9">
                                <select name="vehicle_brand_id" class="form-control"  required id="brand">
                                    <option disabled value="">Choose Tyre Model</option>
                                    @foreach($vehicleBrands as $brand)
                                        <option value="{{$brand->id}}" @if($brand->id==$vehicleTyre->vehicle_brand_id)selected @endif>{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Tyre Size :</label>
                            <div class="col-md-9">
                                <select name="vehicle_model_id" class="form-control"  required id="model">
                                    <option disabled value="">Choose Tyre Size</option>
                                    @foreach($vehicleModels as $model)
                                        <option value="{{$model->id}}" @if($model->id==$vehicleTyre->vehicle_model_id) @endif>{{$model->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Tyre Number :</label>
                            <div class="col-md-9">
                                <select name="vehicle_variant_id" class="form-control"  required id="variant">
                                    <option disabled value="">Choose Tyre Number</option>
                                    @foreach($vehicleVariants as $variant)
                                        <option value="{{$variant->id}}" @if($variant->id==$vehicleTyre->vehicle_variant_id) @endif>{{$variant->variant}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Tyre  :</label>
                            <div class="col-md-9">
                                <input type="text" name="vehicle_tyre_year" class="form-control"
                                    value="@if (isset($vehicleTyre->vehicle_tyre_year)) {{ $vehicleTyre->vehicle_tyre_year }} @endif" required>
                            </div>
                        </div>

                        <!-- Row -->
                        <div class="row">
                            <label class="col-md-3 form-label mb-4">Description :</label>
                            <div class="col-md-9 mb-4">
                                <textarea class="content" name="desc" placeholder="Description">
                                                    @if (isset($vehicleTyre->desc))
                                    @php echo $vehicleTyre->desc @endphp
                                    @endif
                                                    </textarea>
                            </div>
                        </div>
                        <!--End Row-->
                        <br>
                        <br>
                        <!--Row-->
                        <br>
                        <br>

                        @if($vehicleTyre->image!='')
                            <div class="row">
                                <label class="col-md-3 form-label mb-4">Icon:</label>
                                <div class="col-md-9">
                                    <div class="col-md-12">
                                        <ul class="row col-md-12">
                                            <div class="float-left col-md-4">
                                                <img src="{{ '/' . $vehicleTyre->image }}" class="img-responsive col-md-4" id="image_src">
                                                <button class="btn btn-icon  btn-danger" id="delete_image"><i class="fe fe-trash"></i></button>
                                                <input type="hidden" name="verify_file" id="verify_file" value="1">
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <label class="col-md-3 form-label mb-4"> Image :</label>
                            <div class="col-md-9">
                                <input class="" type="file" name="image" id="image_input">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Approved :</label>
                            <div class="col-md-9">
                                    <input type="checkbox" name="approved" value="1" @if($vehicleTyre->approved=='1')checked @endif>
                            </div>
                        </div>


                    </div>
                    <div class="card-footer">
                        <!--Row-->
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9 text-end">
                                <button onclick="window.location.reload();" class="btn btn-secondary">Revert</button>
                                <button class="btn btn-success">Update Tyre </button>
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

                        $('#variant').html('<option disabled selected>No variant for this brand , model and size.  Try with another brand ,model and size</option>');
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
    $(document).ready(function() {
        $("#delete_image").click(function(e) {
            e.preventDefault();
            $("#verify_file").val("0");
            $("#image_input").val("");
            $('#image_src').attr('src','');

        });
    });
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
