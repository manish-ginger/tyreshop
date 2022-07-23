@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Machine</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Machine</a></li>
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
                    <div class="card-title">Update Machine</div>
                </div>
                <form action="{{ route('machine.update') }}" method="post" accept-charset="utf-8"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Machine Name :</label>
                            <div class="col-md-9">
                                <input type="text" name="title" class="form-control"
                                    value="@if (isset($machine->title)) {{ $machine->title }} @endif" required>
                                <input type="hidden" name="machineid"
                                    value="@if (isset($machine->id)) {{ encrypt($machine->id) }} @endif">
                            </div>
                        </div>

                        <!-- Row -->
                        <div class="row">
                            <label class="col-md-3 form-label mb-4">Description :</label>
                            <div class="col-md-9 mb-4">
                                <textarea class="content" name="desc" placeholder="Description">@if (isset($machine->desc)) {{ $machine->desc }} @endif</textarea>
                            </div>
                        </div>
                        <!--End Row-->

                        <hr>
                        <hr>
                        <!--Row-->
                        <div class="row">
                            <label class="col-md-3 form-label mb-4">Machine Images:</label>
                            <div class="col-md-9">
                                <div class="col-md-12">
                                    <ul class="row col-md-12">

                                            <div class="float-left col-md-4">
                                                <img src="{{ '/' .$machine->image }}" class="img-responsive col-md-4">
                                            </div>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--End Row-->
                        <!--Row-->
                        <div class="row">
                            <label class="col-md-3 form-label mb-4"> Image :</label>
                            <div class="col-md-9">
                                <input class="" type="file" id="formFileMultiple" name="files[]">
                            </div>
                        </div>
                        <!--End Row-->
                        <hr>
                        <hr>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Machine Status :</label>
                            <div class="col-md-9">
                                <input type="checkbox" name="approved" value="1" @if($machine->status == 1) checked @endif>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <!--Row-->
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9 text-end">
                                <button onclick="window.location.reload();" class="btn btn-secondary">Revert</button>
                                <button class="btn btn-success">Update Machine</button>
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
