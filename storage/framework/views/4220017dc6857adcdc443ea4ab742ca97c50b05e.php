<?php
use App\Models\VehicleCategory;
use App\Models\VehicleModel;
use App\Models\VehicleBrand;
?>


<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Tyre Number</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Tyre Number</a></li>
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
                <h3 class="card-title">Tyre Numbers List</h3>
                <div class="card-options">
                    <a href="<?php echo e(route('vehicle.create')); ?>" class="btn btn-primary btn-sm">
                        <i class="fe fe-plus"></i>
                        Add New Tyre Number</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th class="wd-5p border-bottom-0">SL</th>
                                <th class="wd-40p border-bottom-0">Tyre Number</th>
                                <th class="wd-40p border-bottom-0">Size</th>
                                <th class="wd-40p border-bottom-0">Model</th>
                                <th class="wd-40p border-bottom-0">Brand</th>
                                <th class="wd-15p border-bottom-0">Approved</th>
                                <th class="wd-15p border-bottom-0">Image</th>
                                <th class="wd-15p border-bottom-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($vehicle->variant); ?></td>
                                <td>
                                    <?php $vehicle_models = VehicleModel::where('id',$vehicle->vehicle_model_id)->get();
                                    if(isset($vehicle_models[0]->name)){echo $vehicle_models[0]->name; }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $vehicle_brands = VehicleBrand::where('id',$vehicle->vehicle_brand_id)->get();
                                     if(isset($vehicle_brands[0]->name)){echo $vehicle_brands[0]->name; }
                                    ?>
                                </td>
                                <td>
                                    <?php $vehicle_categories = VehicleCategory::where('id',$vehicle->vehicle_category_id)->get();
                                    if(isset($vehicle_categories[0]->name)){echo $vehicle_categories[0]->name;}
                                    ?>
                                </td>
				<td><?php if($vehicle->approved==0): ?>INACTIVE  <?php else: ?> ACTIVE <?php endif; ?></td>
                                <td>
                                    <?php if($vehicle->image!=''): ?>
                                        <img src="<?php echo e('/' . $vehicle->image); ?>" style="max-height: 100px; max-width: 100px;" >
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="btn-list">
                                        <a href="<?php echo e(route('vehicle.edit',encrypt($vehicle->id))); ?>" class="btn btn-sm btn-primary">
                                            <span class="fe fe-edit"> </span>
                                        </a>
                                        <a href="<?php echo e(route('vehicle.delete',encrypt($vehicle->id))); ?>" class="btn  btn-sm btn-danger confirm_delete">
                                            <span class="fe fe-trash-2"> </span>
                                        </a>
                                    </div>
                                </td>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tyre_superadmin/resources/views/content/vehicle/index.blade.php ENDPATH**/ ?>