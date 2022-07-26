@php
    use App\Http\Middleware\CheckAdminLogged;
@endphp
@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Notification</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Notification</a></li>
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

<!-- Row -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Default Notification</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom">
                        <thead>
                            <tr>
                                <th class="wd-40p border-bottom-0">Content</th>
                                <th class="wd-40p border-bottom-0">Before Days</th>
                                <th class="wd-40p border-bottom-0">Status</th>
                                <th class="wd-40p border-bottom-0">Shop Status</th>
                                @if(CheckAdminLogged::role_control('notification.store')==1)
                                <th class="wd-15p border-bottom-0">Action</th>
                                    @endif
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <form action="{{ route('notification.store') }}" method="post" accept-charset="utf-8"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <textarea class="content" name="content" placeholder="Description">@if (isset($row->content)) {{ $row->content }} @endif</textarea>
{{--                                    <input type="text" name="content" class="form-control"--}}
{{--                                           value="@if (isset($row->content)) {{ $row->content }} @endif" required>--}}
                                    <input type="hidden" name="id"
                                           value="@if (isset($row->id)) {{ encrypt($row->id) }} @endif">
                                </td>
                                <td>
                                    <input type="text" name="before_days" class="form-control"
                                           value="@if (isset($row->before_days)) {{ $row->before_days }} @endif" required>
                                </td>
                                <td>
                                    <select name="status" class="form-control" required>
                                        <option @php if(isset($row->status)){if($row->status=='') {echo 'selected';} } @endphp value="">Choose Status</option>
                                        <option value="1" @php if(isset($row->status)){if($row->status==1) {echo 'selected';}} @endphp>Enabled</option>
                                        <option value="0" @php if(isset($row->status)){if($row->status==0){echo 'selected';}} @endphp>Disabled</option>
                                    </select>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;On/Off notifications for customers with default notification setting </p>
                                </td>
                                <td>
                                    <select name="shop_status" class="form-control" required>
                                        <option @php if(isset($row->shop_status)){if($row->shop_status=='') {echo 'selected';} } @endphp value="">Choose Shop Status</option>
                                        <option value="1" @php if(isset($row->shop_status)){if($row->shop_status==1) {echo 'selected';}} @endphp>Enabled</option>
                                        <option value="0" @php if(isset($row->shop_status)){if($row->shop_status==0){echo 'selected';}} @endphp>Disabled</option>
                                    </select>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;On/Off full shop notifications</p>
                                </td>
                                @if(CheckAdminLogged::role_control('notification.store')==1)
                                <td>
                                    <button class="btn btn-success">Save</button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Row -->
@endsection

@section('scripts')

<!-- INTERNAL SELECT2 JS -->
<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2.js')}}"></script>

<!-- DATA TABLE JS-->
<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/js/table-data.js')}}"></script>



@endsection
