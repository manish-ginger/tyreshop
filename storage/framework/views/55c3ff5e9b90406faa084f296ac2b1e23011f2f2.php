<?php
use App\Models\VehicleCategory;
use App\Models\Shop;
?>


<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

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
                            <?php $__currentLoopData = $vehicleBrands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehiclebrand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>

                                <td>
                                    <form action="<?php echo e(route('vehiclebrand.update_brandpershop')); ?>" method="post" accept-charset="utf-8"
                                          enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                    <input type="hidden" name="vehicle_brand_id" value="<?php echo e($vehiclebrand->id); ?>">
                                    <?php echo e($loop->iteration); ?>

                                </td>
                                <td><?php echo e($vehiclebrand->name); ?></td>
                                <td>
                                    <?php
                                    $vehicle_categories = VehicleCategory::where('id',$vehiclebrand->vehicle_category_id)->get();
                                    if(isset($vehicle_categories[0]->name)){echo $vehicle_categories[0]->name; }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        $shops_db = explode(',', $vehiclebrand->shops);
                                        $c=0;
                                        foreach ($shops as $row)
                                      {
                                    ?>
                                    <?php if($c!=0): ?>
                                        <hr>
                                    <?php endif; ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp;<label><input type="checkbox" name="shops[]" value="<?php echo e($row->id); ?>" <?php if(in_array($row->id,$shops_db)): ?> checked <?php endif; ?>><?php echo e($row->name); ?></label>
                                    <?php
                                        $c++;
                                      }
                                    ?>
                                </td>
                                <td>
                                    <div class="btn-list">
                                        <button class="btn btn-success">Update</button>
                                    </div>
                                    </form>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tyre_superadmin/resources/views/content/brandpershop/index.blade.php ENDPATH**/ ?>