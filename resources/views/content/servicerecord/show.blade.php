@php
    use App\Models\Customer;
    use App\Models\VehicleBrand;
    use App\Models\VehicleModel;
    use App\Models\Vehicle;
    use App\Models\VehicleCategory;
    use App\Models\Feature;
@endphp
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
                </div>
                    <div class="card-body">

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Vehicle Number :</label>
                            <div class="col-md-9">
                                {{$customervehicle[0]->vehicle_number}}
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Owner :</label>
                            <div class="col-md-9">
                                    @php
                                        $data =Customer::where('id',$customervehicle[0]->customer_id)->get();
                                             if(isset($data[0]->name)){echo $data[0]->name; }
                                    @endphp
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Category :</label>
                            <div class="col-md-9">
                                    @php
                                        $data =VehicleCategory::where('id',$customervehicle[0]->vehicle_category)->get();
                                             if(isset($data[0]->name)){echo $data[0]->name; }
                                    @endphp
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Brand :</label>
                            <div class="col-md-9">
                                    @php
                                        $data =VehicleBrand::where('id',$customervehicle[0]->brand)->get();
                                             if(isset($data[0]->name)){echo $data[0]->name; }
                                    @endphp
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Model :</label>
                            <div class="col-md-9">
                                @php
                                    $data =VehicleModel::where('id',$customervehicle[0]->model)->get();
                                             if(isset($data[0]->name)){echo $data[0]->name; }
                                @endphp
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Variant :</label>
                            <div class="col-md-9">
                                @php
                                    $data =Vehicle::where('id',$customervehicle[0]->variant)->get();
                                             if(isset($data[0]->variant)){echo $data[0]->variant; }
                                @endphp
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Date :</label>
                            <div class="col-md-9">
                                @if(isset($row->date)){{$row->date}}@endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Time :</label>
                            <div class="col-md-9">
                                @if(isset($row->time)){{$row->time}}@endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Service :</label>
                            <div class="col-md-9">
                                @php
                                if(isset($row->service_id)){
                                    $data = Feature::where('id',$row->service_id)->get();
                                    if(isset($data[0]->feature_name)){echo $data[0]->feature_name;}
                                }
                                @endphp
                            </div>
                        </div>



                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Booking Type :</label>
                            <div class="col-md-9">
                                @if($row->booking_type==0) Pre Booked @endif
                                @if($row->booking_type==1) Direct @endif
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Service Status :</label>
                            <div class="col-md-9">
                                @if($row->status==0) Booked @endif
                                @if($row->status==1) Waiting @endif
                                @if($row->status==2) Vehicle Received @endif
                                @if($row->status==3) Processing @endif
                                @if($row->status==4) Finished @endif
                            </div>
                        </div>


                        <br>
                        <br>
                        <!--Row-->
                        <br>
                        <br>



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
