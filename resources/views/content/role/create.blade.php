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
                    @if(Session::has('message'))
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
                                            <div class="card-title">Add New Role</div>
                                        </div>
                                        <form action="{{ route('role.store') }}" method="post"  accept-charset="utf-8" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Name :</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                                                </div>
                                            </div>

                                            <!-- Row -->
                                            <div class="row">
                                                <label class="col-md-3 form-label mb-4">Permission :</label>

                                                <div class="col-md-9 mb-4">

                                                    <input type="checkbox" onClick="toggle()" id="all_checkbox">
                                                    <label for="">Toggle All</label><br>
                                                    <br><hr>

{{--                                                    @foreach($permission_array as $row)--}}
{{--                                                    <h5>{{ucwords(str_replace('_', ' ', $row))}}</h5>--}}
{{--                                                        @foreach($permission_type_array as $row_type)--}}
{{--                                                        <input type="checkbox" name="permission['{{$row}}'][]" value="{{$row_type}}" class="p_div">--}}
{{--                                                        <label for="">{{ucwords($row_type)}}</label><br>--}}
{{--                                                         @endforeach--}}
{{--                                                        <hr>--}}
{{--                                                    @endforeach--}}



                                                    <h5>Dashboard</h5>
                                                    <input type="checkbox" name="permission['dashboard'][]" value="index" class="p_div">
                                                    <label for="">List</label><br><hr>

                                                    <h5>Machines</h5>
                                                    <input type="checkbox" name="permission['machine'][]" value="index" class="p_div">
                                                    <label for="">List</label><br>
                                                    <input type="checkbox" name="permission['machine'][]" value="create" class="p_div">
                                                    <label for="">Create</label><br>
                                                    <input type="checkbox" name="permission['machine'][]" value="edit" class="p_div">
                                                    <label for="">Edit</label><br>
                                                    <input type="checkbox" name="permission['machine'][]" value="show" class="p_div">
                                                    <label for="">View</label><br>
                                                    <input type="checkbox" name="permission['machine'][]" value="delete" class="p_div">
                                                    <label for="">Delete</label><br><hr>

                                                    <h5>Working Days</h5>
                                                    <input type="checkbox" name="permission['workingdays'][]" value="index" class="p_div">
                                                    <label for="">List</label><br>
                                                    <input type="checkbox" name="permission['workingdays'][]" value="edit" class="p_div">
                                                    <label for="">Edit</label><br><hr>


                                                    <h5>Coupons</h5>
                                                    <input type="checkbox" name="permission['coupon'][]" value="index" class="p_div">
                                                    <label for="">List</label><br>
                                                    <input type="checkbox" name="permission['coupon'][]" value="create" class="p_div">
                                                    <label for="">Create</label><br>
                                                    <input type="checkbox" name="permission['coupon'][]" value="edit" class="p_div">
                                                    <label for="">Edit</label><br>
                                                    <input type="checkbox" name="permission['coupon'][]" value="show" class="p_div">
                                                    <label for="">View</label><br>
                                                    <input type="checkbox" name="permission['coupon'][]" value="delete" class="p_div">
                                                    <label for="">Delete</label><br><hr>

                                                    <h5>Services</h5>
                                                    <input type="checkbox" name="permission['feature'][]" value="index" class="p_div">
                                                    <label for="">List</label><br>
                                                    <input type="checkbox" name="permission['feature'][]" value="create" class="p_div">
                                                    <label for="">Create</label><br>
                                                    <input type="checkbox" name="permission['feature'][]" value="edit" class="p_div">
                                                    <label for="">Edit</label><br>
                                                    <input type="checkbox" name="permission['feature'][]" value="show" class="p_div">
                                                    <label for="">View</label><br>
                                                    <input type="checkbox" name="permission['feature'][]" value="delete" class="p_div">
                                                    <label for="">Delete</label><br><hr>

                                                    <h5>Bookings</h5>
                                                    <input type="checkbox" name="permission['servicerecord'][]" value="index" class="p_div">
                                                    <label for="">List</label><br>
                                                    <input type="checkbox" name="permission['servicerecord'][]" value="create" class="p_div">
                                                    <label for="">Create</label><br>
                                                    <input type="checkbox" name="permission['servicerecord'][]" value="edit" class="p_div">
                                                    <label for="">Edit</label><br>
                                                    <input type="checkbox" name="permission['servicerecord'][]" value="show" class="p_div">
                                                    <label for="">View</label><br>
                                                    <input type="checkbox" name="permission['servicerecord'][]" value="delete" class="p_div">
                                                    <label for="">Delete</label><br><hr>

                                                    <h5>Packages</h5>
                                                    <input type="checkbox" name="permission['package'][]" value="index" class="p_div">
                                                    <label for="">List</label><br>
                                                    <input type="checkbox" name="permission['package'][]" value="create" class="p_div">
                                                    <label for="">Create</label><br>
                                                    <input type="checkbox" name="permission['package'][]" value="edit" class="p_div">
                                                    <label for="">Edit</label><br>
                                                    <input type="checkbox" name="permission['package'][]" value="show" class="p_div">
                                                    <label for="">View</label><br>
                                                    <input type="checkbox" name="permission['package'][]" value="delete" class="p_div">
                                                    <label for="">Delete</label><br><hr>

                                                    <h5>Customer Packages</h5>
                                                    <input type="checkbox" name="permission['packagerecord'][]" value="index" class="p_div">
                                                    <label for="">List</label><br>
                                                    <input type="checkbox" name="permission['packagerecord'][]" value="create" class="p_div">
                                                    <label for="">Create</label><br>
                                                    <input type="checkbox" name="permission['packagerecord'][]" value="edit" class="p_div">
                                                    <label for="">Edit</label><br>
                                                    <input type="checkbox" name="permission['packagerecord'][]" value="show" class="p_div">
                                                    <label for="">View</label><br>
                                                    <input type="checkbox" name="permission['packagerecord'][]" value="delete" class="p_div">
                                                    <label for="">Delete</label><br><hr>

                                                    <h5>Loyalty Rewards</h5>
                                                    <input type="checkbox" name="permission['loyaltypoint'][]" value="index" class="p_div">
                                                    <label for="">List</label><br>
                                                    <input type="checkbox" name="permission['loyaltypoint'][]" value="create" class="p_div">
                                                    <label for="">Create</label><br>
                                                    <input type="checkbox" name="permission['loyaltypoint'][]" value="edit" class="p_div">
                                                    <label for="">Edit</label><br>
                                                    <input type="checkbox" name="permission['loyaltypoint'][]" value="show" class="p_div">
                                                    <label for="">View</label><br>
                                                    <input type="checkbox" name="permission['loyaltypoint'][]" value="delete" class="p_div">
                                                    <label for="">Delete</label><br><hr>

                                                    <h5>Notifications</h5>
                                                    <input type="checkbox" name="permission['notification'][]" value="index" class="p_div">
                                                    <label for="">List</label><br>
                                                    <input type="checkbox" name="permission['notification'][]" value="store" class="p_div">
                                                    <label for="">Create</label><br>

                                                    <h5>Customers</h5>
                                                    <input type="checkbox" name="permission['customer'][]" value="index" class="p_div">
                                                    <label for="">List</label><br>
                                                    <input type="checkbox" name="permission['customer'][]" value="create" class="p_div">
                                                    <label for="">Create</label><br>
                                                    <input type="checkbox" name="permission['customer'][]" value="edit" class="p_div">
                                                    <label for="">Edit</label><br>
                                                    <input type="checkbox" name="permission['customer'][]" value="show" class="p_div">
                                                    <label for="">View</label><br>
                                                    <input type="checkbox" name="permission['customer'][]" value="delete" class="p_div">
                                                    <label for="">Delete</label><br><hr>

                                                    <h5>Customer Vehicles</h5>
                                                    <input type="checkbox" name="permission['customervehicle'][]" value="index" class="p_div">
                                                    <label for="">List</label><br>
                                                    <input type="checkbox" name="permission['customervehicle'][]" value="create" class="p_div">
                                                    <label for="">Create</label><br>
                                                    <input type="checkbox" name="permission['customervehicle'][]" value="edit" class="p_div">
                                                    <label for="">Edit</label><br>
                                                    <input type="checkbox" name="permission['customervehicle'][]" value="show" class="p_div">
                                                    <label for="">View</label><br>
                                                    <input type="checkbox" name="permission['customervehicle'][]" value="delete" class="p_div">
                                                    <label for="">Delete</label><br><hr>

                                                    <h5>Messages</h5>
                                                    <input type="checkbox" name="permission['message'][]" value="create" class="p_div">
                                                    <label for="">Create</label><br><hr>

                                                    <h5>Reports</h5>
                                                    <input type="checkbox" name="permission['report'][]" value="create" class="p_div">
                                                    <label for="">Create</label><br><hr>



                                                </div>
                                            </div>
                                            <!--End Row-->

                                        </div>
                                        <div class="card-footer">
                                            <!--Row-->
                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-9 text-end">
                                                <button class="btn btn-danger" onclick="window.location.reload();">Discard</button> &nbsp; &nbsp;
                                                <button class="btn btn-success">Add Role</button> &nbsp; &nbsp;

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
                function toggle() {
                    if($('#all_checkbox').is(':checked')) {
                        $(".p_div").prop('checked', true);
                    }
                    else{
                        $(".p_div").prop('checked', false);
                    }
                }
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
