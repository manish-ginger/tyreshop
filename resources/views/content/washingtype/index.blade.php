@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Service Type</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Service Type</a></li>
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
                <h3 class="card-title">Service Types List</h3>
                <div class="card-options">
                    <a href="{{route('washingtype.create')}}" class="btn btn-primary btn-sm form_box">
                        <i class="fe fe-plus"></i>
                        Add New Service Type</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th class="wd-5p border-bottom-0">SL</th>
                                <th class="wd-40p border-bottom-0">Service Type</th>
                                <th class="wd-15p border-bottom-0">Icon</th>
                                <th class="wd-40p border-bottom-0">Shops</th>
                                <th class="wd-15p border-bottom-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($washingtypes as $washingtype)
                                <tr id="{{$washingtype->id}}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $washingtype->name }}</td>
                                <td>
                                    @if($washingtype->image!='')
                                        <img src="{{ '/' . $washingtype->image }}" style="max-height: 100px; max-width: 100px;" >
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('washingtype.update_washingtypepershop') }}" method="post" accept-charset="utf-8"
                                          enctype="multipart/form-data" class="AjaxUpdateForms">
                                        @csrf
                                        <input type="hidden" name="washingtype_id" value="{{$washingtype->id}}">
                                    @php
                                        $shops_db = explode(',', $washingtype->shops);
                                        $c=0;
                                        foreach ($shops as $row)
                                      {
                                    @endphp
                                    @if($c!=0)
                                        <hr>
                                    @endif
                                    &nbsp;&nbsp;&nbsp;&nbsp;<label><input type="checkbox" name="shops[]" value="{{$row->id}}" @if(in_array($row->id,$shops_db)) checked @endif>{{$row->name}}</label>
                                    @php
                                        $c++;
                                      }
                                    @endphp
                                        <hr>
                                        <div class="btn-list">
                                            <button class="btn btn-success">Update</button>
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    <div class="btn-list">
                                        <a href="{{ route('washingtype.edit',encrypt($washingtype->id)) }}" class="btn btn-sm btn-primary form_box">
                                            <span class="fe fe-edit"> </span>
                                        </a>
                                        <a href="{{ route('washingtype.delete',encrypt($washingtype->id)) }}" class="btn  btn-sm btn-danger confirm_delete" data-id="{{$washingtype->id}}">
                                            <span class="fe fe-trash-2"> </span>
                                        </a>
                                    </div>
                                </td>
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
