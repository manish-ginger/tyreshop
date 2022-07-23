@php
use App\Models\VehicleCategory;
use App\Models\Shop;
@endphp
@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Brand per Shop</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Brand per Shop</a></li>
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
                <h3 class="card-title">Brand per Shop List</h3>
                <div class="card-options">
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th class="wd-5p border-bottom-0">SL</th>
                                <th class="wd-40p border-bottom-0">Tyre Brand</th>
                                <th class="wd-40p border-bottom-0">Tyre Size</th>
                                <th class="wd-40p border-bottom-0">Shops</th>
                                <th class="wd-15p border-bottom-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vehicleBrands as $vehiclebrand)
                            <tr>

                                <td>
                                    <form action="{{ route('vehiclebrand.update_brandpershop') }}" method="post" accept-charset="utf-8"
                                          enctype="multipart/form-data">
                                        @csrf
                                    <input type="hidden" name="vehicle_brand_id" value="{{$vehiclebrand->id}}">
                                    {{ $loop->iteration }}
                                </td>
                                <td>{{ $vehiclebrand->name }}</td>
                                <td>
                                    @php
                                    $vehicle_categories = VehicleCategory::where('id',$vehiclebrand->vehicle_category_id)->get();
                                    if(isset($vehicle_categories[0]->name)){echo $vehicle_categories[0]->name; }
                                    @endphp
                                </td>
                                <td>
                                    @php
                                        $shops_db = explode(',', $vehiclebrand->shops);
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
                                </td>
                                <td>
                                    <div class="btn-list">
                                        <button class="btn btn-success">Update</button>
                                    </div>
                                    </form>
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
