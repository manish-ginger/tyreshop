   @extends('layouts.app-modal')

@section('styles')
@endsection

@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Users</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
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
                    <div class="card-title">Update User</div>
                </div>
                <form action="{{ route('user.update') }}" method="post" accept-charset="utf-8"
                    enctype="multipart/form-data" id="submitAjaxUpdate">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Name :</label>
                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control"
                                    value="@if (isset($user->name)) {{ $user->name }} @endif" required>
                                <input type="hidden" name="userid"
                                    value="@if (isset($user->id)) {{ encrypt($user->id) }} @endif">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Email :</label>
                            <div class="col-md-9">
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                       value="@if (isset($user->email)) {{ $user->email }} @endif" required>
                            </div>
                        </div>

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

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Role :</label>
                        <div class="col-md-9">
                            <label class="col-md-3 form-label">Role :</label>
                            <select name="role_id" class="form-control"  required>
                                <option disabled value="">Choose Role</option>
                                @foreach($roles as $row)
                                    <option value="{{$row->id}}" @if($row->id==$user->role_id)selected @endif>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Shop :</label>
                            <div class="col-md-9">
                                <label class="col-md-3 form-label">Shop :</label>
                                <select name="shop_id" class="form-control"  required>
                                    <option disabled value="">Choose Shop</option>
                                    @foreach($shops as $row)
                                        <option value="{{$row->id}}" @if($row->id==$user->shop_id)selected @endif>{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>




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
{{--                                <button onclick="window.location.reload();" class="btn btn-secondary">Revert</button>--}}
                                <input type="reset" class="btn btn-danger" value="Revert">
                                <button class="btn btn-success">Update User</button>
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
