@php
use App\Models\Customer;
use App\Models\Package;
use App\Http\Middleware\CheckAdminLogged;
@endphp
@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Customer Package</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Customer Package</a></li>
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
                <h3 class="card-title">Customer Package</h3>
                <div class="card-options">
                    @if(CheckAdminLogged::role_control('packagerecord.create')==1)
                    <a href="{{route('packagerecord.create')}}" class="btn btn-primary btn-sm">
                        <i class="fe fe-plus"></i>
                        Add New Customer Package</a>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th class="wd-5p border-bottom-0">SL</th>
                                <th class="wd-40p border-bottom-0">Customer</th>
                                <th class="wd-40p border-bottom-0">Package</th>
                                @if((CheckAdminLogged::role_control('packagerecord.edit')==1)||(CheckAdminLogged::role_control('packagerecord.show')==1)||(CheckAdminLogged::role_control('packagerecord.delete')==1))
                                <th class="wd-15p border-bottom-0">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rows as $row)
                                <tr id="{{$row->id}}">
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @php
                                        $data =Customer::where('id',$row->customer_id)->get();
                                             if(isset($data[0]->name)){echo $data[0]->name; }
                                    @endphp
                                </td>
                                <td>
                                    @php
                                        $data =Package::where('id',$row->package_id)->get();
                                             if(isset($data[0]->title)){echo $data[0]->title; }
                                    @endphp
                                </td>
                                @if((CheckAdminLogged::role_control('packagerecord.edit')==1)||(CheckAdminLogged::role_control('packagerecord.show')==1)||(CheckAdminLogged::role_control('packagerecord.delete')==1))
                                <td>
                                    <div class="btn-list">
                                        @if(CheckAdminLogged::role_control('packagerecord.edit')==1)
                                        <a href="{{ route('packagerecord.edit',encrypt($row->id)) }}" class="btn btn-sm btn-primary">
                                            <span class="fe fe-edit"> </span>
                                        </a>
                                        @endif
                                            @if(CheckAdminLogged::role_control('packagerecord.delete')==1)
                                        <a href="{{ route('packagerecord.delete',encrypt($row->id)) }}" class="btn  btn-sm btn-danger confirm_delete" data-id="{{$row->id}}">
                                            <span class="fe fe-trash-2"> </span>
                                        </a>
                                        @endif
                                    </div>
                                </td>
                                @endif
                            </tr>
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
