@extends('layouts.app-modal')

@section('styles')
@endsection

@section('content')
    <!-- PAGE-HEADER -->

    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                    <div class="card-body">
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Coupon Name :</label>
                            @if (isset($coupon->title)) {{ $coupon->title }} @endif
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Coupon Code :</label>
                            <div class="col-md-9">
                                @if (isset($coupon->code)) {{ $coupon->code }} @endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Percentage OR Amount:</label>
                            <div class="col-md-9">
                                    @if ($coupon->perc_or_amount=='percentage') Percentage @endif
                                    @if ($coupon->perc_or_amount=='amount') Amount @endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Value(percentage/amount) :</label>
                            <div class="col-md-9">
                                @if (isset($coupon->coupon_value)) {{ $coupon->coupon_value }} @endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Coupon Validity :</label>
                            <div class="col-md-9">
                                @if (isset($coupon->validity)) {{ $coupon->validity }} @endif
                            </div>
                        </div>

                        <!-- Row -->
                        <div class="row">
                            <label class="col-md-3 form-label mb-4">Description :</label>
                            @if (isset($coupon->desc)) {{ strip_tags($coupon->desc) }} @endif
                        </div>
                        <!--End Row-->

                        @if($coupon->image!='')
                            <div class="row">
                                <label class="col-md-3 form-label mb-4">Image:</label>
                                <div class="col-md-9">
                                    <div class="col-md-12">
                                        <ul class="row col-md-12">
                                            <div class="float-left col-md-4">
                                                <img src="{{ '/' . $coupon->image }}" class="img-responsive col-md-4 zoom" id="image_src">
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <br>

                        <!--End Row-->
                        <!--Row-->

                        <!--End Row-->
                        <br>
                        <br>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Coupon Status :</label>
                            <div class="col-md-9">
                                @if($coupon->status==0)NO  @else YES @endif
                            </div>
                        </div>

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
