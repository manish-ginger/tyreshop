@php
use App\Models\Role;
use App\Models\Shop;
@endphp
@extends('layouts.app')

@section('styles')

@endsection

@section('content')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">User</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">List</li>
            </ol>
        </div>

    </div>
    <div class="alert_show">
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
                    <h3 class="card-title">Users List</h3>
                    <div class="card-options">
                        <a href="{{route('user.create')}}" class="btn btn-primary btn-sm form_box">
                            <i class="fe fe-plus"></i>
                            Add New User</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                            <tr>
                                <th class="wd-5p border-bottom-0">SL</th>
                                <th class="wd-40p border-bottom-0">Name</th>
                                <th class="wd-40p border-bottom-0">Email</th>
                                <th class="wd-40p border-bottom-0">Role</th>
                                <th class="wd-40p border-bottom-0">Shop</th>
                                <th class="wd-15p border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            @if($user->name!='Admin')
                                <tr id="{{$user->id}}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @php
                                            $data = Role::where('id',$user->role_id)->get();
                                            if(isset($data[0]->name)){echo $data[0]->name; }
                                        @endphp
                                    </td>
                                    <td>
                                        @php
                                            $data = Shop::where('id',$user->shop_id)->get();
                                            if(isset($data[0]->name)){echo $data[0]->name; }
                                        @endphp
                                    </td>
                                    <td>
                                        <div class="btn-list">
                                            <a href="{{ route('user.edit',encrypt($user->id)) }}" class="btn btn-sm btn-primary form_box">
                                                <span class="fe fe-edit"> </span>
                                            </a>
                                            <a href="{{ route('user.delete',encrypt($user->id)) }}" class="btn  btn-sm btn-danger confirm_delete" data-id="{{$user->id}}">
                                                <span class="fe fe-trash-2"> </span>
                                            </a>
                                            <a href="{{ route('user.show',encrypt($user->id)) }}" class="btn btn-sm btn-warning form_box">
                                                <span class="fe fe-eye"> </span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
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
