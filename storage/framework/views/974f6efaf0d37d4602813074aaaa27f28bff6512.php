<?php
use App\Models\Customer;
use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use App\Models\Vehicle;
use App\Models\VehicleTyre;
use App\Models\VehicleCategory;
use App\Http\Middleware\CheckAdminLogged;
?>


<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Customer Vehicles</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Customer Vehicle</a></li>
            <li class="breadcrumb-item active" aria-current="page">List</li>
        </ol>
    </div>

</div>
<div>
    <?php if(Session::has('message')): ?>
    <div class="alert alert-info" role="alert" style="margin-bottom: 25px;">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
        <?php echo e(Session::get('message')); ?>

    </div>
    <?php endif; ?>
</div>
<!-- PAGE-HEADER END -->

<!-- Row -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Customer Vehicles List</h3>
                <div class="card-options">
                    <?php if(CheckAdminLogged::role_control('customervehicle.create')==1): ?>
                    <a href="<?php echo e(route('customervehicle.create')); ?>" class="btn btn-primary btn-sm">
                        <i class="fe fe-plus"></i>
                        Add New Customer vehicle</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th class="wd-5p border-bottom-0">SL</th>
                                <th class="wd-40p border-bottom-0">Customer</th>
                                <th class="wd-40p border-bottom-0">Brand</th>
                                <th class="wd-40p border-bottom-0">Model</th>
                                <th class="wd-40p border-bottom-0">Size</th>
                                <th class="wd-40p border-bottom-0">Number</th>
                                <th class="wd-40p border-bottom-0">Tyre</th>
                                <?php if((CheckAdminLogged::role_control('customervehicle.edit')==1)||(CheckAdminLogged::role_control('customervehicle.show')==1)||(CheckAdminLogged::role_control('customervehicle.delete')==1)): ?>
                                <th class="wd-15p border-bottom-0">Action</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td>
                                    <?php
                                        $data =Customer::where('id',$row->customer_id)->get();
                                             if(isset($data[0]->name)){echo $data[0]->name; }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        $data =VehicleCategory::where('id',$row->vehicle_category)->get();
                                             if(isset($data[0]->name)){echo $data[0]->name; }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        $data =VehicleBrand::where('id',$row->brand)->get();
                                             if(isset($data[0]->name)){echo $data[0]->name; }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        $data =VehicleModel::where('id',$row->model)->get();
                                             if(isset($data[0]->name)){echo $data[0]->name; }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        $data =Vehicle::where('id',$row->variant)->get();
                                             if(isset($data[0]->variant)){echo $data[0]->variant; }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        $data =VehicleTyre::where('id',$row->tyre)->get();
                                             if(isset($data[0]->vehicle_tyre_year)){echo $data[0]->vehicle_tyre_year; }
                                    ?>
                                </td>
                                <?php if((CheckAdminLogged::role_control('customervehicle.edit')==1)||(CheckAdminLogged::role_control('customervehicle.show')==1)||(CheckAdminLogged::role_control('customervehicle.delete')==1)): ?>
                                <td>
                                    <div class="btn-list">
                                        <?php if(CheckAdminLogged::role_control('customervehicle.edit')==1): ?>
                                        <a href="<?php echo e(route('customervehicle.edit',encrypt($row->id))); ?>" class="btn btn-sm btn-primary">
                                            <span class="fe fe-edit"> </span>
                                        </a>
                                        <?php endif; ?>
                                            <?php if(CheckAdminLogged::role_control('customervehicle.delete')==1): ?>
                                        <a href="<?php echo e(route('customervehicle.delete',encrypt($row->id))); ?>" class="btn  btn-sm btn-danger confirm_delete">
                                            <span class="fe fe-trash-2"> </span>
                                        </a>
                                            <?php endif; ?>
                                    </div>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Row -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<!-- INTERNAL SELECT2 JS -->
<script src="<?php echo e(asset('assets/plugins/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2.js')); ?>"></script>

<!-- DATA TABLE JS-->
<script src="<?php echo e(asset('assets/plugins/datatable/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/js/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/pdfmake/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/pdfmake/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/js/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/js/buttons.colVis.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatable/responsive.bootstrap5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/table-data.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tyre_shopadmin/resources/views/content/customervehicle/index.blade.php ENDPATH**/ ?>