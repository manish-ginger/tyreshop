@extends('layouts.app-modal')

@section('styles')
@endsection

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Tyre Model</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Tyre Model</a></li>
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
                    <div class="card-title">Update Tyre Model</div>
                </div>
                <form action="{{ route('vehiclebrand.update') }}" method="post" accept-charset="utf-8"
                    enctype="multipart/form-data" id="submitAjaxUpdate">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Tyre Brand :</label>
                            <div class="col-md-9">
                                <select name="vehicle_category_id" class="form-control"  required>
                                    <option disabled value="">Choose Tyre Brand</option>
                                    @foreach($vehicle_categories as $vehicle_category)
                                        <option value="{{$vehicle_category->id}}" @if($vehicle_category->id==$vehicleBrand->vehicle_category_id)selected @endif >{{$vehicle_category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Tyre Model Name :</label>
                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control"
                                    value="@if (isset($vehicleBrand->name)) {{ $vehicleBrand->name }} @endif" required>
                                <input type="hidden" name="vehicle_brand_id"
                                    value="@if (isset($vehicleBrand->id)) {{ encrypt($vehicleBrand->id) }} @endif">
                            </div>
                        </div>


                        <!-- Row -->
                        <div class="row">
                            <label class="col-md-3 form-label mb-4">Description :</label>
                            <div class="col-md-9 mb-4">
                                <textarea class="content" name="desc" placeholder="Description">
                                                    @if (isset($vehicleBrand->desc))
                                    @php echo $vehicleBrand->desc @endphp
                                    @endif
                                                    </textarea>
                            </div>
                        </div>
                        <!--End Row-->

                        @if($vehicleBrand->image!='')
                        <div class="row">
                            <label class="col-md-3 form-label mb-4">Icon:</label>
                            <div class="col-md-9">
                                <div class="col-md-12">
                                    <ul class="row col-md-12">
                                            <div class="float-left col-md-4">
                                                <img src="{{ '/' . $vehicleBrand->image }}" class="img-responsive col-md-4" id="image_src">
                                                <button class="btn btn-icon  btn-danger" id="delete_image"><i class="fe fe-trash"></i></button>
                                                <input type="hidden" name="verify_file" id="verify_file" value="1">
                                            </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif

                        <br><br>

                        <div class="row">
                            <label class="col-md-3 form-label mb-4"> Icon :</label>
                            <div class="col-md-9">
                                <input class="form-control" type="file" name="image" id="image_input">
                            </div>
                        </div>


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
                                <button class="btn btn-success">Update Tyre Model</button>
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
        $(document).ready(function() {
            $("#delete_image").click(function(e) {
                e.preventDefault();
                $("#verify_file").val("0");
                $("#image_input").val("");
                $('#image_src').attr('src','');

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
