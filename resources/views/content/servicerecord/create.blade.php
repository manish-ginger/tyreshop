@extends('layouts.app-modal')

@section('styles')

@endsection

@section('content')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Booking</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Booking</a></li>
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
                    <div class="card-title">Add New Booking</div>
                </div>
                <form action="{{ route('servicerecord.store') }}" method="post"  accept-charset="utf-8" enctype="multipart/form-data" id="submitAjaxAdd">
                    @csrf
                    <div class="card-body">

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Vehicle Number :</label>
                            <div class="col-md-9">
                                <select name="vehicle_number" class="form-control" id="vehicle_number" required>
                                    <option selected disabled value="">Choose Vehicle Number</option>
                                    @foreach ($customervehicles as $customervehicle)
                                        <option value="{{$customervehicle->vehicle_number}}">{{$customervehicle->vehicle_number}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Date</label>
                            <div class="col-md-9">
                                <input type="date" name="date" class="form-control" placeholder="Date" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Time</label>
                            <div class="col-md-9">
                                <input type="time" name="time" class="form-control" placeholder="Time" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Service :</label>
                            <div class="col-md-9">
                                <select name="service_id" class="form-control" required>
                                    <option selected disabled value="">Choose Service</option>
                                    @foreach ($features as $feature)
                                        <option value="{{$feature->id}}">{{$feature->feature_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Booking Type :</label>
                            <div class="col-md-9">
                                <select name="booking_type" class="form-control" required>
                                    <option selected disabled value="">Choose Booking Type</option>
                                    <option value="0">Pre Booked</option>
                                    <option value="1">Direct</option>
                                    <option value="2">Special Request</option>
                                </select>
                            </div>
                        </div>



                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Service Status :</label>
                            <div class="col-md-9">
                                <select name="status" class="form-control" required>
                                    <option selected disabled value="">Choose Service Status</option>
                                        <option value="0">Booked</option>
                                        <option value="1">Waiting</option>
                                        <option value="2">Vehicle Received</option>
                                        <option value="3">Processing</option>
                                        <option value=4>Finished</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Current odometer reading</label>
                            <div class="col-md-9">
                                <input type="text" name="curr_odo_reading" class="form-control" placeholder="Current odometer reading">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Next booking odometer reading</label>
                            <div class="col-md-9">
                                <input type="text" name="next_odo_reading" class="form-control" placeholder="Next booking odometer reading">
                            </div>
                        </div>





                    </div>
                    <div class="card-footer">
                        <!--Row-->
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9 text-end">
{{--                                <button class="btn btn-danger" onclick="window.location.reload();">Discard</button> &nbsp; &nbsp;--}}
                                <input type="reset" class="btn btn-danger" value="Discard">
                                <button class="btn btn-success">Book Service</button> &nbsp; &nbsp;

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
