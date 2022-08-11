<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Package</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Package</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                    <div class="card-body">
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Package Name :</label>
                            <div class="col-md-9">
                                <?php if(isset($package->title)): ?> <?php echo e($package->title); ?> <?php endif; ?>
                            </div>
                        </div>


                        <!-- Row -->
                        <div class="row">
                            <label class="col-md-3 form-label mb-4">Description :</label>
                            <div class="col-md-9 mb-4">
                                <?php if(isset($package->desc)): ?><?php echo e(strip_tags($package->desc)); ?><?php endif; ?>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Package Loyalty Points :</label>
                            <div class="col-md-9">
                                <?php if(isset($package->loyalty_points)): ?> <?php echo e($package->loyalty_points); ?> <?php endif; ?>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Validity(Days):</label>
                            <div class="col-md-9">
                                <?php if(isset($package->validity)): ?> <?php echo e($package->validity); ?> <?php endif; ?>
                            </div>
                        </div>


                        <div class="row">
                            <label class="col-md-3 form-label mb-4">Package Images:</label>
                            <div class="col-md-9">
                                <div class="col-md-12">
                                    <ul class="row col-md-12">
                                        <?php $__currentLoopData = $packimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="float-left col-md-4">
                                                <img src="<?php echo e('/' . $img->path); ?>" class="img-responsive col-md-4 zoom">
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--End Row-->
                        <!--Row-->


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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tyre_shopadmin/resources/views/content/package/show.blade.php ENDPATH**/ ?>