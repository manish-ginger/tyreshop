@extends('layouts.app')

        @section('styles')

        @endsection

        @section('content')

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <h1 class="page-title">Service Types</h1>
                                <div>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Service Type</a></li>
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
                                            <div class="card-title">Add New Service Type</div>
                                        </div>
                                        <form action="{{ route('washingtype.store') }}" method="post"  accept-charset="utf-8" enctype="multipart/form-data" id="submitAjaxAdd">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Service Type Name :</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="name" class="form-control" placeholder="Service Type Name"  required>
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

                                        </div>
                                        <div class="card-footer">
                                            <!--Row-->
                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-9 text-end">
{{--                                                <button class="btn btn-danger" onclick="window.location.reload();">Discard</button> &nbsp; &nbsp;--}}
                                                    <input type="reset" class="btn btn-danger" value="Discard">
                                                <button class="btn btn-success">Add Service Type</button> &nbsp; &nbsp;

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
