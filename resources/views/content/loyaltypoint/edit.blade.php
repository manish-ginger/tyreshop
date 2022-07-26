@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Loyalty Point Reward</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Loyalty Point Reward</a></li>
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
                    <div class="card-title">Update Loyalty Point Reward</div>
                </div>
                <form action="{{ route('loyaltypoint.update') }}" method="post" accept-charset="utf-8"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Loyalty Money :</label>
                            <div class="col-md-9">
                                <input type="text" name="money" class="form-control"
                                       value="@if (isset($loyalty->money)) {{ $loyalty->money }} @endif" required>
                                <input type="hidden" name="loyaltyid"
                                       value="@if (isset($loyalty->id)) {{ encrypt($loyalty->id) }} @endif">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Loyalty Points :</label>
                            <div class="col-md-9">
                                <input type="text" name="points" class="form-control"
                                       value="@if (isset($loyalty->points)) {{ $loyalty->points }} @endif" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Minimum Points For Redeem :</label>
                            <div class="col-md-9">
                                <input type="text" name="minimum_points_redeem" class="form-control"
                                       value="@if (isset($loyalty->minimum_points_redeem)) {{ $loyalty->minimum_points_redeem }} @endif" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Status :</label>
                            <div class="col-md-9">
                            <select name="status" class="form-control">
                                <option @if($loyalty->status=='') selected @endif disabled value="">Choose Status</option>
                                    <option value="1" @if($loyalty->status==1) selected @endif>Enabled</option>
                                    <option value="0" @if($loyalty->status==0) selected @endif>Disabled</option>
                            </select>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <!--Row-->
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9 text-end">
                                <button onclick="window.location.reload();" class="btn btn-secondary">Revert</button>
                                <button class="btn btn-success">Update Loyalty Point Reward</button>
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
