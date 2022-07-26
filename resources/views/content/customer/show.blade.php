@extends('layouts.app')

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


                    <div class="card-body">
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer Name :</label>
                            <div class="col-md-9">
                                @if (isset($customer->name)) {{ $customer->name }} @endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer Email :</label>
                            <div class="col-md-9">
                                @if (isset($customer->email)) {{ $customer->email }} @endif
                            </div>
                        </div>



                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer Type :</label>
                            <div class="col-md-9">
                                    @if (isset($customer->cust_type)) {{ $customer->cust_type }} @endif
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer Mobile :</label>
                            <div class="col-md-9">
                                @if (isset($customer->mobile)) {{ $customer->mobile }} @endif
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer Whatsapp :</label>
                            <div class="col-md-9">
                                @if (isset($customer->whatsapp)) {{ $customer->whatsapp }} @endif
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer QID :</label>
                            <div class="col-md-9">
                                @if (isset($customer->qid)) {{ $customer->qid }} @endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer Wash Frequency(days) :</label>
                            <div class="col-md-9">
                                    @if (isset($customer->wash_frequency)) {{ $customer->wash_frequency }} @endif
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer DOB :</label>
                            <div class="col-md-9">
                                @if(isset($customer->dob)){{$customer->dob}}@endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Notification Type :</label>
                            <div class="col-md-9">
                                @php
                                if(isset($customer->notification_type)){
                                    if($customer->notification_type==0) {echo 'DISABLED';}
                                    if($customer->notification_type==1) {echo 'DEFAULT';}
                                    if($customer->notification_type==2) {echo 'MANUAL';}
                                }
                                @endphp
                            </div>
                        </div>


                        <div id="notification_div" @if ($customer->notification_type!='2') style="display:none" @endif>

                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Content :</label>
                                <div class="col-md-9">
                                    @if(isset($customer->content)){{$customer->content}}@endif
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Before Days :</label>
                                <div class="col-md-9">
                                    @if(isset($customer->before_days)){{$customer->before_days}}@endif
                                </div>
                            </div>

                        </div>

                        <!-- Row -->


                    </div>
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
