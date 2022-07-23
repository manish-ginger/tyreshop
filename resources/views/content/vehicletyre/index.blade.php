@php
use App\Models\VehicleCategory;
use App\Models\VehicleModel;
use App\Models\VehicleBrand;
use App\Models\Vehicle;
@endphp
@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Tyre Make Year</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Tyre Year Make</a></li>
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
                <h3 class="card-title">Tyre Year Make List</h3>
                <div class="card-options">
                    <a href="{{route('vehicletyre.create')}}" class="btn btn-primary btn-sm">
                        <i class="fe fe-plus"></i>
                        Add New Tyre Year</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th class="wd-5p border-bottom-0">SL</th>
                                <th class="wd-40p border-bottom-0">Tyre Make Year</th>
                                <th class="wd-40p border-bottom-0">Variant</th>
                                <th class="wd-40p border-bottom-0">Model</th>
                                <th class="wd-40p border-bottom-0">Brand</th>
                                <th class="wd-40p border-bottom-0">Category</th>
                                <th class="wd-15p border-bottom-0">Approved</th>
                                <th class="wd-15p border-bottom-0">Image</th>
                                <th class="wd-15p border-bottom-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rows as $vehicle)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $vehicle->vehicle_tyre_year }}</td>
                                <td>
                                    @php $vehicle_variants = Vehicle::where('id',$vehicle->vehicle_variant_id)->get();
                                    if(isset($vehicle_variants[0]->variant)){echo $vehicle_variants[0]->variant; }
                                    @endphp
                                </td>
                                <td>
                                    @php $vehicle_models = VehicleModel::where('id',$vehicle->vehicle_model_id)->get();
                                    if(isset($vehicle_models[0]->name)){echo $vehicle_models[0]->name; }
                                    @endphp
                                </td>
                                <td>
                                    @php
                                    $vehicle_brands = VehicleBrand::where('id',$vehicle->vehicle_brand_id)->get();
                                     if(isset($vehicle_brands[0]->name)){echo $vehicle_brands[0]->name; }
                                    @endphp
                                </td>
                                <td>
                                    @php $vehicle_categories = VehicleCategory::where('id',$vehicle->vehicle_category_id)->get();
                                    if(isset($vehicle_categories[0]->name)){echo $vehicle_categories[0]->name;}
                                    @endphp
                                </td>
				<td>@if($vehicle->approved==0)INACTIVE  @else ACTIVE @endif</td>
                                <td>
                                    @if($vehicle->image!='')
                                        <img src="{{ '/' . $vehicle->image }}" style="max-height: 100px; max-width: 100px;" >
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-list">
                                        <a href="{{ route('vehicletyre.edit',encrypt($vehicle->id)) }}" class="btn btn-sm btn-primary">
                                            <span class="fe fe-edit"> </span>
                                        </a>
                                        <a href="{{ route('vehicletyre.delete',encrypt($vehicle->id)) }}" class="btn  btn-sm btn-danger confirm_delete">
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
