<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

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
                <h3 class="card-title">Service Types List</h3>
                <div class="card-options">
                    <a href="<?php echo e(route('washingtype.create')); ?>" class="btn btn-primary btn-sm form_box">
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
                            <?php $__currentLoopData = $washingtypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $washingtype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr id="<?php echo e($washingtype->id); ?>">
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($washingtype->name); ?></td>
                                <td>
                                    <?php if($washingtype->image!=''): ?>
                                        <img src="<?php echo e('/' . $washingtype->image); ?>" style="max-height: 100px; max-width: 100px;" >
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <form action="<?php echo e(route('washingtype.update_washingtypepershop')); ?>" method="post" accept-charset="utf-8"
                                          enctype="multipart/form-data" class="AjaxUpdateForms">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="washingtype_id" value="<?php echo e($washingtype->id); ?>">
                                    <?php
                                        $shops_db = explode(',', $washingtype->shops);
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
                                        <hr>
                                        <div class="btn-list">
                                            <button class="btn btn-success">Update</button>
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    <div class="btn-list">
                                        <a href="<?php echo e(route('washingtype.edit',encrypt($washingtype->id))); ?>" class="btn btn-sm btn-primary form_box">
                                            <span class="fe fe-edit"> </span>
                                        </a>
                                        <a href="<?php echo e(route('washingtype.delete',encrypt($washingtype->id))); ?>" class="btn  btn-sm btn-danger confirm_delete" data-id="<?php echo e($washingtype->id); ?>">
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tyre_superadmin/resources/views/content/washingtype/index.blade.php ENDPATH**/ ?>