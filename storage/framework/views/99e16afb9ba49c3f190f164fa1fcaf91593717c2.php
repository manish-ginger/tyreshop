<?php
    use App\Http\Middleware\CheckAdminLogged;
?>


<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Coupons</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Coupon</a></li>
            <li class="breadcrumb-item active" aria-current="page">List</li>
        </ol>
    </div>

</div>
<div class="alert_show">
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
                <h3 class="card-title">Coupons List</h3>
                <div class="card-options">
                    <?php if(CheckAdminLogged::role_control('coupon.create')==1): ?>
                    <a href="<?php echo e(route('coupon.create')); ?>" class="btn btn-primary btn-sm form_box">
                        <i class="fe fe-plus"></i>
                        Add New Coupon</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th class="wd-5p border-bottom-0">SL</th>
                                <th class="wd-40p border-bottom-0">Coupon</th>
                                <th class="wd-40p border-bottom-0">Code</th>
                                <th class="wd-40p border-bottom-0">Type</th>
                                <th class="wd-40p border-bottom-0">Value</th>
                                <th class="wd-40p border-bottom-0">Status</th>
                                <th class="wd-40p border-bottom-0">Validity</th>
                                <th class="wd-40p border-bottom-0">Image</th>
                                <?php if((CheckAdminLogged::role_control('coupon.edit')==1)||(CheckAdminLogged::role_control('coupon.show')==1)||(CheckAdminLogged::role_control('coupon.delete')==1)): ?>
                                <th class="wd-15p border-bottom-0">Action</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr id="<?php echo e($coupon->id); ?>">
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($coupon->title); ?></td>
                                <td><?php echo e($coupon->code); ?></td>
                                <td><?php echo e($coupon->perc_or_amount); ?></td>
                                <td><?php echo e($coupon->coupon_value); ?></td>
                                <td><?php if($coupon->status==0): ?>NO  <?php else: ?> YES <?php endif; ?></td>
                                <td><?php echo e($coupon->validity); ?></td>
                                <td>
                                    <?php if($coupon->image!=''): ?>
                                        <img src="<?php echo e('/' . $coupon->image); ?>" style="max-height: 100px; max-width: 100px;" class="zoom">
                                    <?php endif; ?>
                                </td>
                                <?php if((CheckAdminLogged::role_control('coupon.edit')==1)||(CheckAdminLogged::role_control('coupon.show')==1)||(CheckAdminLogged::role_control('coupon.delete')==1)): ?>
                                <td>
                                    <div class="btn-list">
                                        <?php if(CheckAdminLogged::role_control('coupon.edit')==1): ?>
                                        <a href="<?php echo e(route('coupon.edit',encrypt($coupon->id))); ?>" class="btn btn-sm btn-primary form_box">
                                            <span class="fe fe-edit"> </span>
                                        </a>
                                        <?php endif; ?>
                                        <?php if(CheckAdminLogged::role_control('coupon.delete')==1): ?>
                                        <a href="<?php echo e(route('coupon.delete',encrypt($coupon->id))); ?>" class="btn  btn-sm btn-danger confirm_delete" data-id="<?php echo e($coupon->id); ?>">
                                            <span class="fe fe-trash-2"> </span>
                                        </a>
                                            <?php endif; ?>
                                            <?php if(CheckAdminLogged::role_control('coupon.show')==1): ?>
                                        <a href="<?php echo e(route('coupon.show',encrypt($coupon->id))); ?>" class="btn btn-sm btn-primary form_box">
                                            <span class="fe fe-eye"> </span>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tyre_shopadmin/resources/views/content/coupon/index.blade.php ENDPATH**/ ?>