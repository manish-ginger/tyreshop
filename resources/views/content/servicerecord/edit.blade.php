@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Booking</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Booking</a></li>
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
                    <div class="card-title">Update Booking</div>
                </div>
                <form action="{{ route('servicerecord.update') }}" method="post" accept-charset="utf-8"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Vehicle Number :</label>
                            <div class="col-md-9">
                                <select name="vehicle_number" class="form-control" id="vehicle_number" required>
                                    <option disabled value="">Choose Vehicle Number</option>
                                    @foreach ($customervehicles as $customervehicle)
                                        <option value="{{$customervehicle->vehicle_number}}" @if($customervehicle->vehicle_number==$row->vehicle_number) selected @endif>{{$customervehicle->vehicle_number}}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="id"
                                       value="@if (isset($row->id)) {{ encrypt($row->id) }} @endif">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Date :</label>
                            <div class="col-md-9">
                                <input type="date" name="date" class="form-control"
                                       value="@if(isset($row->date)){{$row->date}}@endif" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Time :</label>
                            <div class="col-md-9">
                                <input type="time" name="time" class="form-control"
                                       value="@if(isset($row->time)){{$row->time}}@endif" required>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Service :</label>
                            <div class="col-md-9">
                                <select name="service_id" class="form-control" required>
                                    <option disabled value="">Choose Service</option>
                                    @foreach ($features as $feature)
                                        <option value="{{$feature->id}}" @if($feature->id==$row->service_id) selected @endif>{{$feature->feature_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Booking Type :</label>
                            <div class="col-md-9">
                                <select name="booking_type" class="form-control" required>
                                    <option disabled value="">Choose Booking Type</option>
                                    <option value="0" @if($row->booking_type==0) selected @endif>Pre Booked</option>
                                    <option value="1" @if($row->booking_type==1) selected @endif>Direct</option>
                                </select>
                            </div>
                        </div>




                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Service Status :</label>
                            <div class="col-md-9">
                                <select name="status" class="form-control" required>
                                    <option disabled value="">Choose Service Status</option>
                                    <option value="0" @if($row->status==0) selected @endif>Booked</option>
                                    <option value="1" @if($row->status==1) selected @endif>Waiting</option>
                                    <option value="2" @if($row->status==2) selected @endif>Vehicle Received</option>
                                    <option value="3" @if($row->status==3) selected @endif>Processing</option>
                                    <option value="4" @if($row->status==4) selected @endif>Finished</option>
                                </select>
                            </div>
                        </div>


                        <br>
                        <br>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Current odometer reading :</label>
                            <div class="col-md-9">
                                <input type="text" name="curr_odo_reading" class="form-control"
                                       value="@if(isset($row->curr_odo_reading)){{$row->curr_odo_reading}}@endif">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Next booking odometer reading :</label>
                            <div class="col-md-9">
                                <input type="text" name="next_odo_reading" class="form-control"
                                       value="@if(isset($row->next_odo_reading)){{$row->next_odo_reading}}@endif">
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
                                <button onclick="window.location.reload();" class="btn btn-secondary">Revert</button>
                                <button class="btn btn-success">Book Service</button>
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
