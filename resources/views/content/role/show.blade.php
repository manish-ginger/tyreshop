   @extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Roles</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Role</a></li>
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
                      <div class="card-title">View Role</div>
                </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Name :</label>
                            <div class="col-md-9">
                                @if (isset($role->name)) {{ $role->name }} @endif
                            </div>
                        </div>

                        <!-- Row -->
                        <div class="row">
                            <label class="col-md-3 form-label mb-4">Permission :</label>
                            <div class="col-md-9 mb-4">
                                <div class="col-md-9 mb-4">
                                    <br><hr>

                                    @php
                                        $dashboard=$machines=$working_days=$coupons=$services=$bookings=$packages=$customer_packages=$loyalty_rewards=$notifications=$customers=$customer_vehicles=$messages=$reports=array();
                                            $permission_data=json_decode($role->permission);
                                            if (is_array($permission_data) || is_object($permission_data))
                                                {
                                                    foreach ($permission_data as $key => $value)
                                                        {
                                                            if($key=="'dashboard'"){$dashboard=$value;}
                                                            if($key=="'machine'"){$machines=$value;}
                                                            if($key=="'workingdays'"){$working_days=$value;}
                                                            if($key=="'coupon'"){$coupons=$value;}
                                                            if($key=="'feature'"){$services=$value;}
                                                            if($key=="'servicerecord'"){$bookings=$value;}
                                                            if($key=="'package'"){$packages=$value;}
                                                            if($key=="'packagerecord'"){$customer_packages=$value;}
                                                            if($key=="'loyaltypoint'"){$loyalty_rewards=$value;}
                                                            if($key=="'notification'"){$notifications=$value;}
                                                            if($key=="'customer'"){$customers=$value;}
                                                            if($key=="'customervehicle'"){$customer_vehicles=$value;}
                                                            if($key=="'message'"){$messages=$value;}
                                                            if($key=="'report'"){$reports=$value;}
                                                        }
                                                }
                                    @endphp


                                    <p>Dashboard:
                                    @foreach($dashboard as $row)
                                     {{$row}}
                                    @endforeach
                                    </p><hr>


                                    <p>Machines:
                                    @foreach($machines as $row)
                                        {{$row}}
                                    @endforeach
                                    </p><hr>

                                    <p>Working Days:
                                    @foreach($working_days as $row)
                                        {{$row}}
                                    @endforeach
                                    </p><hr>

                                    <p>Coupons:
                                    @foreach($coupons as $row)
                                        {{$row}}
                                    @endforeach
                                    </p><hr>

                                    <p>Services:
                                    @foreach($services as $row)
                                        {{$row}}
                                    @endforeach
                                    </p><hr>

                                    <p>Bookings:
                                    @foreach($bookings as $row)
                                        {{$row}}
                                    @endforeach
                                    </p><hr>

                                    <p>Packages:
                                    @foreach($packages as $row)
                                        {{$row}}
                                    @endforeach
                                    </p><hr>

                                    <p>Customer Packages:
                                    @foreach($customer_packages as $row)
                                        {{$row}}
                                    @endforeach
                                    </p><hr>

                                    <p>Loyalty Rewards:
                                    @foreach($loyalty_rewards as $row)
                                        {{$row}}
                                    @endforeach
                                    </p><hr>

                                    <p>Notifications:
                                    @foreach($notifications as $row)
                                        {{$row}}
                                    @endforeach
                                    </p><hr>

                                    <p>Customers:
                                    @foreach($customers as $row)
                                        {{$row}}
                                    @endforeach
                                    </p><hr>

                                    <p>Customer Vehicles:
                                    @foreach($customer_vehicles as $row)
                                        {{$row}}
                                    @endforeach
                                    </p><hr>

                                    <p>Messages:
                                    @foreach($messages as $row)
                                        {{$row}}
                                    @endforeach
                                    </p><hr>

                                    <p>Reports:
                                    @foreach($reports as $row)
                                        {{$row}}
                                    @endforeach
                                    </p><hr>

                                </div>
                            </div>
                        </div>


                        <!--End Row-->
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
