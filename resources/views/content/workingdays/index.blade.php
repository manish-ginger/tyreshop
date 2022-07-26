@php
use App\Models\Workingdays;
use App\Http\Middleware\CheckAdminLogged;
@endphp
@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Working Days</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Working Days</a></li>
            <li class="breadcrumb-item active" aria-current="page">List</li>
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
                <h3 class="card-title">Working Days List</h3>
                <div class="card-options">

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom">
                        <thead>
                            <tr>
                                <th class="wd-5p border-bottom-0">SL</th>
                                <th class="wd-40p border-bottom-0">Day</th>
                                <th class="wd-40p border-bottom-0">Status</th>
                                <th class="wd-40p border-bottom-0">From</th>
                                <th class="wd-40p border-bottom-0">To</th>
                                @if((CheckAdminLogged::role_control('workingdays.edit')==1)||(CheckAdminLogged::role_control('workingdays.show')==1)||(CheckAdminLogged::role_control('workingdays.delete')==1))
                                <th class="wd-15p border-bottom-0">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($days as $day)
                            @php
                               $data_update = Workingdays::where('days','=',$day)->where('shop_id','=',$shop_id)->first();
                               if (is_null($data_update)) {$status='Not added timings';$from='--';$to='--';}else{
                                if($data_update->status==0){$status='Not Working';$from='--';$to='--';}
                                if($data_update->status==1){$status='Working';$from=$data_update->from;$to=$data_update->to;}
                            }
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ucwords($day)}}</td>
                                <td>{{$status}}</td>
                                <td>{{$from}}</td>
                                <td>{{$to}}</td>
                                @if((CheckAdminLogged::role_control('workingdays.edit')==1)||(CheckAdminLogged::role_control('workingdays.show')==1)||(CheckAdminLogged::role_control('workingdays.delete')==1))
                                <td>
                                    <div class="btn-list">
                                        @if(CheckAdminLogged::role_control('workingdays.edit')==1)
                                        <a href="{{ route('workingdays.edit',encrypt($day)) }}" class="btn btn-sm btn-primary">
                                            <span class="fe fe-edit"> </span>
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
