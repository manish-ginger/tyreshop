@extends('layouts.app')

        @section('styles')

        @endsection

        @section('content')

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <h1 class="page-title">Tyre Numbers</h1>
                                <div>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Tyre Number</a></li>
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
                                            <div class="card-title">Add New Tyre Number</div>
                                        </div>
                                        <form action="{{ route('vehicle.store') }}" method="post"  accept-charset="utf-8" enctype="multipart/form-data" id="submitAjaxAdd">
                                        @csrf
                                        <div class="card-body">

                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Tyre Size :</label>
                                                <div class="col-md-9">
                                                    <select name="vehicle_category_id" class="form-control"  required id="category">
                                                        <option selected disabled value="">Choose Tyre Size</option>
                                                        @foreach($vehicleCategories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Tyre Model :</label>
                                                <div class="col-md-9">
                                                    <select name="vehicle_brand_id" class="form-control"  required id="brand">
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Tyre Size :</label>
                                                <div class="col-md-9">
                                                    <select name="vehicle_model_id" class="form-control"  required id="model">
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Width :</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="width" class="form-control" placeholder="Width">
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Ratio :</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="ratio" class="form-control" placeholder="Ratio">
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Construction :</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="construction" class="form-control" placeholder="Construction">
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Diameter :</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="diameter" class="form-control" placeholder="Diameter">
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Load :</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="loadrating" class="form-control" placeholder="Load">
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Speed :</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="speed" class="form-control" placeholder="Speed">
                                                </div>
                                            </div>

                                            <!-- Row -->
                                            <div class="row">
                                                <label class="col-md-3 form-label mb-4">Description :</label>
                                                <div class="col-md-9 mb-4">
                                                    <textarea class="content" name="desc" placeholder="Description"></textarea>
                                                </div>
                                            </div>
                                            <!--End Row-->

                                            <div class="row">
                                                <label class="col-md-3 form-label mb-4">Image : </label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="file" name="image">
                                                </div>
                                            </div>


                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Approved :</label>
                                                <div class="col-md-9">
                                                        <input type="checkbox" name="approved" value="1" class="checked_approved" checked>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="card-footer">
                                            <!--Row-->
                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-9 text-end">
{{--                                                <button class="btn btn-danger" onclick="window.location.reload();">Discard</button> &nbsp; &nbsp;--}}
                                                    <input type="reset" class="btn btn-danger" value="Discard">
                                                <button class="btn btn-success">Add Tyre Number</button> &nbsp; &nbsp;
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

                                $('#model').html('<option disabled selected>No size for this brand and model.  Try with another brand and model</option>');
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
