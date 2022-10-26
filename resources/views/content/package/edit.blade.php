@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Package</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Package</a></li>
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
                    <div class="card-title">Update Package</div>
                </div>
                <form action="{{ route('package.update') }}" method="post" accept-charset="utf-8"
                    enctype="multipart/form-data" id="submitAjaxUpdate">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Package Name :</label>
                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control"
                                    value="@if (isset($package->title)) {{ $package->title }} @endif" required>
                                <input type="hidden" name="packid"
                                    value="@if (isset($package->id)) {{ encrypt($package->id) }} @endif">
                            </div>
                        </div>


                        <!-- Row -->
                        <div class="row">
                            <label class="col-md-3 form-label mb-4">Description :</label>
                            <div class="col-md-9 mb-4">
                                <textarea class="content" name="desc" placeholder="Description" required>
                                                    @if (isset($package->desc))
@php echo $package->desc @endphp
@endif
                                                    </textarea>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Package Loyalty Points :</label>
                            <div class="col-md-9">
                                <input type="text" name="loyalty_points" class="form-control" value="@if (isset($package->loyalty_points)) {{ $package->loyalty_points }} @endif" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Validity(Days):</label>
                            <div class="col-md-9">
                                <input type="text" name="validity" class="form-control" value="@if (isset($package->validity)) {{ $package->validity }} @endif" required>
                            </div>
                        </div>


                        <!--End Row-->
                        <br>
                        <br>
                        <!--Row-->
                        @if(count($packimages))
                        <div class="row">
                            <label class="col-md-3 form-label mb-4">Package Images:</label>
                            <div class="col-md-9">
                                <div class="col-md-12">
                                    <ul class="row col-md-12">
                                        @foreach ($packimages as $img)
                                            <div class="float-left col-md-4">
                                                <img src="{{ '/' . $img->path }}" class="img-responsive col-md-4 zoom">
                                                <button class="btn btn-icon  btn-danger packimg-del"
                                                    id="packimg-{{ $img->id }}"><i class="fe fe-trash"></i></button>
                                            </div>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        <!--End Row-->
                        <!--Row-->

                        <br>
                        <br>

                        <div class="row">
                            <label class="col-md-3 form-label mb-4"> Image :</label>
                            <div class="col-md-9">
                                <input class="form-control" type="file" id="formFileMultiple" name="files[]" multiple>
                            </div>
                        </div>
                        <!--End Row-->
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
                                <button class="btn btn-success">Update Package</button>
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
            $(".packimg-del").click(function(e) {
                e.preventDefault();
                if (confirm("Are You Sure?")) {
                    $(this).closest("DIV").hide();
                    let idz = $(this).attr("id");
                    let url = "{{ url('delete-packageimg') }}";
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
                    let url = "{{ url('delete-packagevideo') }}";
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
