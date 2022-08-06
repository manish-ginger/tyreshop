<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Coupon</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Coupon</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
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

    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Update Coupon</div>
                </div>
                <form action="<?php echo e(route('coupon.update')); ?>" method="post" accept-charset="utf-8"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Coupon Name :</label>
                            <div class="col-md-9">
                                <input type="text" name="title" class="form-control"
                                    value="<?php if(isset($coupon->title)): ?> <?php echo e($coupon->title); ?> <?php endif; ?>" required>
                                <input type="hidden" name="couponid"
                                    value="<?php if(isset($coupon->id)): ?> <?php echo e(encrypt($coupon->id)); ?> <?php endif; ?>">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Coupon Code :</label>
                            <div class="col-md-9">
                                <input type="text" name="code" class="form-control"
                                       value="<?php if(isset($coupon->code)): ?> <?php echo e($coupon->code); ?> <?php endif; ?>" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Percentage OR Amount:</label>
                            <div class="col-md-9">
                                <select name="perc_or_amount" class="form-control">
                                    <option value="" disabled>Choose type</option>
                                    <option value="percentage" <?php if($coupon->perc_or_amount=='percentage'): ?> selected <?php endif; ?>>Percentage</option>
                                    <option value="amount" <?php if($coupon->perc_or_amount=='amount'): ?> selected <?php endif; ?>>Amount</option>
                                </select>
                            </div>
                        </div>




                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Value(percentage/amount) :</label>
                            <div class="col-md-9">
                                <input type="text" name="coupon_value" class="form-control"
                                       value="<?php if(isset($coupon->coupon_value)): ?> <?php echo e($coupon->coupon_value); ?> <?php endif; ?>" required>
                            </div>
                        </div>

                        <!-- Row -->
                        <div class="row">
                            <label class="col-md-3 form-label mb-4">Description :</label>
                            <div class="col-md-9 mb-4">
                                <textarea class="content" name="desc" placeholder="Description"><?php if(isset($coupon->desc)): ?> <?php echo e($coupon->desc); ?> <?php endif; ?></textarea>
                            </div>
                        </div>
                        <!--End Row-->

                        <br>
                        <br>
                        <!--Row-->

                        <?php if($coupon->image!=''): ?>
                            <div class="row">
                                <label class="col-md-3 form-label mb-4">Image:</label>
                                <div class="col-md-9">
                                    <div class="col-md-12">
                                        <ul class="row col-md-12">
                                            <div class="float-left col-md-4">
                                                <img src="<?php echo e('/' . $coupon->image); ?>" class="img-responsive col-md-4 zoom" id="image_src">
                                                <button class="btn btn-icon  btn-danger" id="delete_image"><i class="fe fe-trash"></i></button>
                                                <input type="hidden" name="verify_file" id="verify_file" value="1">
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <br>

                        <!--End Row-->
                        <!--Row-->
                        <div class="row">
                            <label class="col-md-3 form-label mb-4"> Image :</label>
                            <div class="col-md-9">
                                <input class="form-control" type="file" id="formFileMultiple" name="files[]">
                            </div>
                        </div>
                        <!--End Row-->
                        <br>
                        <br>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Coupon Validity :</label>
                            <div class="col-md-9">
                                <input type="date" name="validity" class="form-control"
                                       value="<?php if(isset($coupon->validity)): ?><?php echo e($coupon->validity); ?><?php endif; ?>" required>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Coupon Status :</label>
                            <div class="col-md-9">
                                <input type="checkbox" name="approved" value="1" <?php if($coupon->status == 1): ?> checked <?php endif; ?>>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <!--Row-->
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9 text-end">
                                <button onclick="window.location.reload();" class="btn btn-secondary">Revert</button>
                                <button class="btn btn-success">Update Coupon</button>
                            </div>
                        </div>
                        <!--End Row-->
                    </div>
                </form>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tyre_shopadmin/resources/views/content/coupon/edit.blade.php ENDPATH**/ ?>