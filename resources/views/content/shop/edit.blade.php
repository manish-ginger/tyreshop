@php
use App\Models\VehicleBrand;
use App\Models\VehicleCategory;
@endphp
@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- PAGE-HEADER -->
    @if (!isset($type))
    <div class="page-header">
        <h1 class="page-title">Shops</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </div>
    </div>
    @endif

    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @if (!isset($type))
                <div class="card-header">
                    <div class="card-title">Update Shop</div>
                </div>
                @endif
                <form action="{{ route('shop.update') }}" method="post" accept-charset="utf-8"
                    enctype="multipart/form-data" id="submitAjaxUpdate">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Shop Name :</label>
                            <div class="col-md-9">
                                @if (isset($type))
                                    @if (isset($shop->name)) {{ $shop->name }}@endif
                                @else
                                    <input type="text" name="name" class="form-control"
                                           value="@if (isset($shop->name)) {{ $shop->name }} @endif" required>
                                    <input type="hidden" name="shopid"
                                           value="@if (isset($shop->id)) {{ encrypt($shop->id) }} @endif">
                                @endif

                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Shop Licence :</label>
                            <div class="col-md-9">
                                @if (isset($type))
                                    @if (isset($shop->detail->licence)) {{ $shop->detail->licence }}@endif
                                @else
                                <input type="text" name="licence" class="form-control" value="@if (isset($shop->detail->licence)) {{ $shop->detail->licence }} @endif" placeholder="Shop licence" required>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Shop Location :</label>
                            <div class="col-md-9">
                                @if (isset($type))
                                    @if (isset($shop->detail->location)) {{ $shop->detail->location }}@endif
                                @else
                                    <input type="text" name="location" value="@if (isset($shop->detail->location)) {{ $shop->detail->location }} @endif" class="form-control" placeholder="Shop location" required>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Shop Contact Number :</label>
                            <div class="col-md-9">
                                @if (isset($type))
                                    @if (isset($shop->detail->contact)) {{ $shop->detail->contact }}@endif
                                @else
                                    <input type="text" name="contact" value="@if (isset($shop->detail->contact)) {{ $shop->detail->contact }} @endif" class="form-control" placeholder="Shop Contact" required>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Shop Owner Number :</label>
                            <div class="col-md-9">
                                @if (isset($type))
                                    @if (isset($shop->detail->owner)) {{ $shop->detail->owner }}@endif
                                @else
                                    <input type="text" name="ownercontact" value="@if (isset($shop->detail->owner)) {{ $shop->detail->owner }} @endif" class="form-control" placeholder="Owner Contact">
                                @endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Shop WhatsApp :</label>
                            <div class="col-md-9">
                                @if (isset($type))
                                    @if (isset($shop->detail->whatsapp)) {{ $shop->detail->whatsapp }}@endif
                                @else
                                    <input type="text" name="whatsapp" value="@if (isset($shop->detail->whatsapp)) {{ $shop->detail->whatsapp }} @endif" class="form-control" placeholder="Whatsapp">
                                @endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Shop Email :</label>
                            <div class="col-md-9">
                                @if (isset($type))
                                    @if (isset($shop->email)) {{ $shop->email }}@endif
                                @else
                                    <input type="text" name="email" class="form-control" value="@if (isset($shop->email)) {{ $shop->email }} @endif">
                                @endif
                            </div>
                        </div>

                        @if (!isset($type))
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Shop Admin Password :</label>
                            <div class="col-md-9">
                                <span class="input-group-text">
                                    <i class="fa fa-eye" id="togglePassword" ></i>
                                <input type="password" name="password" class="form-control"
                                    value="" id="password" >
                                </span>
                                <p>Leave this field empty,if there is no update needed in password.<br>
                                    Type new password in this field,if there is update needed in password.
                                 </p>
                            </div>
                        </div>
                        @endif

                        <!-- Row -->
                        <div class="row">
                            <label class="col-md-3 form-label mb-4">Description :</label>
                            <div class="col-md-9 mb-4">
                                @if (isset($type))
                                    @if (isset($shop->detail->desc)) {{ strip_tags($shop->detail->desc) }}@endif
                                @else
                                    <textarea class="content" name="desc" placeholder="Description">
                                    @if (isset($shop->detail->desc))
                                    @php echo $shop->detail->desc @endphp
                                    @endif
                                    </textarea>
                                @endif
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Software validity :</label>
                            <div class="col-md-9">
                                @if (isset($type))
                                    @if (isset($shop->valdity)) {{ $shop->valdity }}@endif
                                @else
                                    <input type="date" name="validity" value="@if(isset($shop->valdity)){{$shop->valdity}}@endif" class="form-control" id="validity">
                                @endif
                            </div>
                        </div>

                        @if($shop->image!='')
                            <div class="row">
                                <label class="col-md-3 form-label mb-4">Image:</label>
                                <div class="col-md-9">
                                    <div class="col-md-12">
                                        <ul class="row col-md-12">
                                            <div class="float-left col-md-4">
                                                <img src="{{ '/' . $shop->image }}" class="img-responsive col-md-4" id="image_src">
                                                <button class="btn btn-icon  btn-danger" id="delete_image"><i class="fe fe-trash"></i></button>
                                                <input type="hidden" name="verify_file" id="verify_file" value="1">
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <hr>

                        @if (!isset($type))
                        <div class="row">
                            <label class="col-md-3 form-label mb-4"> Image :</label>
                            <div class="col-md-9">
                                <input class="form-control" type="file" name="image" id="image_input">
                            </div>
                        </div>
                        @endif

                        <br><br><br>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Shop Approved :</label>
                            <div class="col-md-9">
                                @if (isset($type))
                                    @if (isset($shop->approved)) @if($shop->approved == 1) Enabled @else Disabled @endif @endif
                                @else
                                    <input type="checkbox" name="approved" value="1" @if($shop->approved == 1) checked @endif>
                                @endif

                            </div>
                        </div>

                        <!--End Row-->
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
                                @if (!isset($type))
{{--                                <button onclick="window.location.reload();" class="btn btn-secondary">Revert</button>--}}
                                    <input type="reset" class="btn btn-danger" value="Revert">
                                <button class="btn btn-success">Update Shop</button>
                                @endif
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
            @if (isset($type))
                <button onclick="history.back()" class="btn btn-success" style="float: right;">Go Back</button>
            @endif
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
