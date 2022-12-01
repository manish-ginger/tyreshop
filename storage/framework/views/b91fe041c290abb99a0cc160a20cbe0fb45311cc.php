<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Loyalty Point Reward</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Loyalty Point Reward</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </div>
    </div>

    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Update Loyalty Point Reward</div>
                </div>
                <form action="<?php echo e(route('loyaltypoint.update')); ?>" method="post" accept-charset="utf-8"
                    enctype="multipart/form-data" id="submitAjaxUpdate">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Loyalty Money :</label>
                            <div class="col-md-9">
                                <input type="text" name="money" class="form-control"
                                       value="<?php if(isset($loyalty->money)): ?> <?php echo e($loyalty->money); ?> <?php endif; ?>" required>
                                <input type="hidden" name="loyaltyid"
                                       value="<?php if(isset($loyalty->id)): ?> <?php echo e(encrypt($loyalty->id)); ?> <?php endif; ?>">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Loyalty Points :</label>
                            <div class="col-md-9">
                                <input type="text" name="points" class="form-control"
                                       value="<?php if(isset($loyalty->points)): ?> <?php echo e($loyalty->points); ?> <?php endif; ?>" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Minimum Points For Redeem :</label>
                            <div class="col-md-9">
                                <input type="text" name="minimum_points_redeem" class="form-control"
                                       value="<?php if(isset($loyalty->minimum_points_redeem)): ?> <?php echo e($loyalty->minimum_points_redeem); ?> <?php endif; ?>" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Status :</label>
                            <div class="col-md-9">
                            <select name="status" class="form-control">
                                <option <?php if($loyalty->status==''): ?> selected <?php endif; ?> disabled value="">Choose Status</option>
                                    <option value="1" <?php if($loyalty->status==1): ?> selected <?php endif; ?>>Enabled</option>
                                    <option value="0" <?php if($loyalty->status==0): ?> selected <?php endif; ?>>Disabled</option>
                            </select>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <!--Row-->
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9 text-end">

                                <input type="reset" class="btn btn-danger" value="Revert">
                                <button class="btn btn-success">Update Loyalty Point Reward</button>
                            </div>
                        </div>
                        <!--End Row-->
                    </div>
                </form>
                <div class="alert_show">
                    <?php if(Session::has('message')): ?>
                        <div class="alert alert-info" role="alert" style="margin-bottom: 25px;">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo e(Session::get('message')); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /ROW-1 CLOSED -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <!-- INPUT MASK JS-->
    <script src="<?php echo e(asset('assets/plugins/input-mask/jquery.mask.min.js')); ?>"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="<?php echo e(asset('assets/plugins/select2/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/select2.js')); ?>"></script>

    <!-- INTERNAL WYSIWYG Editor JS -->
    <script src="<?php echo e(asset('assets/plugins/wysiwyag/jquery.richtext.js')); ?> "></script>
    <script src="<?php echo e(asset('assets/plugins/wysiwyag/wysiwyag.js')); ?> "></script>

    <!-- INTERNAL File-Uploads Js-->
    <script src="<?php echo e(asset('assets/plugins/fancyuploder/jquery.ui.widget.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/fancyuploder/jquery.fileupload.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/fancyuploder/fancy-uploader.js')); ?>"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="<?php echo e(asset('assets/plugins/p-scroll/perfect-scrollbar.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/p-scroll/pscroll.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/p-scroll/pscroll-1.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tyre_shopadmin/resources/views/content/loyaltypoint/edit.blade.php ENDPATH**/ ?>