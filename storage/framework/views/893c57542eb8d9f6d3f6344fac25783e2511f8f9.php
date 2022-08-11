<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- PAGE-HEADER -->

    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                    <div class="card-body">
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Coupon Name :</label>
                            <?php if(isset($coupon->title)): ?> <?php echo e($coupon->title); ?> <?php endif; ?>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Coupon Code :</label>
                            <div class="col-md-9">
                                <?php if(isset($coupon->code)): ?> <?php echo e($coupon->code); ?> <?php endif; ?>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Percentage OR Amount:</label>
                            <div class="col-md-9">
                                    <?php if($coupon->perc_or_amount=='percentage'): ?> Percentage <?php endif; ?>
                                    <?php if($coupon->perc_or_amount=='amount'): ?> Amount <?php endif; ?>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Value(percentage/amount) :</label>
                            <div class="col-md-9">
                                <?php if(isset($coupon->coupon_value)): ?> <?php echo e($coupon->coupon_value); ?> <?php endif; ?>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Coupon Validity :</label>
                            <div class="col-md-9">
                                <?php if(isset($coupon->validity)): ?> <?php echo e($coupon->validity); ?> <?php endif; ?>
                            </div>
                        </div>

                        <!-- Row -->
                        <div class="row">
                            <label class="col-md-3 form-label mb-4">Description :</label>
                            <?php if(isset($coupon->desc)): ?> <?php echo e(strip_tags($coupon->desc)); ?> <?php endif; ?>
                        </div>
                        <!--End Row-->

                        <?php if($coupon->image!=''): ?>
                            <div class="row">
                                <label class="col-md-3 form-label mb-4">Image:</label>
                                <div class="col-md-9">
                                    <div class="col-md-12">
                                        <ul class="row col-md-12">
                                            <div class="float-left col-md-4">
                                                <img src="<?php echo e('/' . $coupon->image); ?>" class="img-responsive col-md-4 zoom" id="image_src">
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <br>

                        <!--End Row-->
                        <!--Row-->

                        <!--End Row-->
                        <br>
                        <br>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Coupon Status :</label>
                            <div class="col-md-9">
                                <?php if($coupon->status==0): ?>NO  <?php else: ?> YES <?php endif; ?>
                            </div>
                        </div>

                    </div>
            </div>
        </div>
    </div>
    <!-- /ROW-1 CLOSED -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function() {
            $("#delete_image").click(function(e) {
                e.preventDefault();
                $("#verify_file").val("0");
                $("#image_input").val("");
                $('#image_src').attr('src','');

            });
        });
    </script>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tyre_shopadmin/resources/views/content/coupon/show.blade.php ENDPATH**/ ?>