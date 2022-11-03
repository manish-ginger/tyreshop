@extends('layouts.app-modal')

@section('styles')
@endsection

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Customer</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Customer</a></li>
            </ol>
        </div>
    </div>

    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Update Customer</div>
                </div>
                <form action="{{ route('customer.update') }}" method="post" accept-charset="utf-8"
                    enctype="multipart/form-data" id="submitAjaxUpdate">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer Name :</label>
                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control"
                                    value="@if (isset($customer->name)) {{ $customer->name }} @endif" required>
                                <input type="hidden" name="customerid"
                                    value="@if (isset($customer->id)) {{ encrypt($customer->id) }} @endif">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer Email :</label>
                            <div class="col-md-9">
                                <input type="text" name="email" class="form-control"
                                value="@if (isset($customer->email)) {{ $customer->email }} @endif" required>
                            </div>
                        </div>



                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer Type :</label>
                            <div class="col-md-9">
                                <select name="cust_type" class="form-control">
                                    <option disabled value="">Choose Customer Type</option>
                                    <option value="owner" @if ($customer->cust_type=='owner') selected @endif>Owner</option>
                                    <option value="driver" @if ($customer->cust_type=='driver') selected @endif>Driver</option>
                                    <option value="manager" @if ($customer->cust_type=='manager') selected @endif>Manager</option>
                                    <option value="friend" @if ($customer->cust_type=='friend') selected @endif>Friend</option>
                                  </select>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer Mobile :</label>
                            <div class="col-md-9">
                                <input type="text" name="mobile" class="form-control"
                                value="@if (isset($customer->mobile)) {{ $customer->mobile }} @endif" required>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer Whatsapp :</label>
                            <div class="col-md-9">
                                <input type="text" name="whatsapp" class="form-control"
                                value="@if (isset($customer->whatsapp)) {{ $customer->whatsapp }} @endif" required>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer QID :</label>
                            <div class="col-md-9">
                                <input type="text" name="qid" class="form-control"
                                value="@if (isset($customer->qid)) {{ $customer->qid }} @endif" required>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer Tyre Shop Frequency(days) :</label>
                            <div class="col-md-9">
                                <input type="text" name="wash_frequency" class="form-control"
                                       value="@if (isset($customer->wash_frequency)) {{ $customer->wash_frequency }} @endif" required>
                            </div>
                        </div>



                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer DOB :</label>
                            <div class="col-md-9">
                                <input type="date" name="dob" class="form-control"
                                value="@if(isset($customer->dob)){{$customer->dob}}@endif">
                            </div>
                        </div>

                        <!-- Row -->




                        <!--End Row-->
                        <br>
                        <br>
                        <!--Row-->


                    <div class="row mb-4">
                        <label class="col-md-3 form-label">Notification Type :</label>
                        <div class="col-md-9">
                            <select name="notification_type" class="form-control" id="notification_type" required>
                                <option disabled value="">Choose Notification Type</option>
                                <option value="0" @if ($customer->notification_type=='0') selected @endif>Disable</option>
                                <option value="1" @if ($customer->notification_type=='1') selected @endif>Default</option>
                                <option value="2" @if ($customer->notification_type=='2') selected @endif>Manual</option>
                            </select>
                        </div>
                    </div>

                    <div id="notification_div" @if ($customer->notification_type!='2') style="display:none" @endif>
                        <hr>
                        <h4 style="text-align: center">
                            Notification :
                        </h4>
                        <hr>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Content :</label>
                            <div class="col-md-9">
                                <input type="text" name="content" class="form-control" value="@if (isset($customer->content)) {{ $customer->content }} @endif">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Before Days :</label>
                            <div class="col-md-9">
                                <input type="text" name="before_days" class="form-control" value="@if (isset($customer->before_days)) {{ $customer->before_days }} @endif">
                            </div>
                        </div>

                    </div>

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
                                <button class="btn btn-success">Update Customer </button>
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

    $(document).on('change', '#notification_type', function() {
        var option_val=$(this).val();
        if(option_val==2)
        {
            $("#notification_div").show();
        }
        else
        {
            $("#notification_div").hide();
        }
    })

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
