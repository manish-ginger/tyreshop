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

                            <!-- PAGE-HEADER END -->

                            <!-- ROW-1 OPEN -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Add New Coupon</div>
                                        </div>
                                        <form action="<?php echo e(route('coupon.store')); ?>" method="post"  accept-charset="utf-8" enctype="multipart/form-data" id="submitAjaxAdd">
                                        <?php echo csrf_field(); ?>
                                        <div class="card-body">
                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Coupon Name :</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="title" class="form-control" placeholder="Coupon Name"  required>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Coupon Code :</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="code" class="form-control" placeholder="Coupon Code"  required>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label"> Percentage OR Amount :</label>
                                                <div class="col-md-9">
                                                    <select name="perc_or_amount" class="form-control" required>
                                                        <option value="" disabled selected>Choose type</option>
                                                        <option value="percentage">Percentage</option>
                                                        <option value="amount">Amount</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Value(percentage/amount) :</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="coupon_value" class="form-control" placeholder="Value"  required>
                                                </div>
                                            </div>




                                            <!-- Row -->
                                            <div class="row">
                                                <label class="col-md-3 form-label mb-4">Description :</label>
                                                <div class="col-md-9 mb-4">
                                                    <textarea class="content" name="desc" placeholder="Description"></textarea>
                                                </div>
                                            </div>
                                            <!--End Row-->

                                            <!--Row-->
                                            <div class="row">
                                                <label class="col-md-3 form-label mb-4">Image :</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="file" id="formFileMultiple" name="files[]">
                                                </div>
                                            </div>
                                            <!--End Row-->

                                            <br>

                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Coupon Validity :</label>
                                                <div class="col-md-9">
                                                    <input type="date" name="validity" class="form-control" placeholder="Coupon Validity"  required>
                                                </div>
                                            </div>


                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Coupon Status :</label>
                                                <div class="col-md-9">
                                                    <input type="checkbox" name="approved" value="1" checked>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="card-footer">
                                            <!--Row-->
                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-9 text-end">

                                                    <input type="reset" class="btn btn-danger" value="Discard">
                                                <button class="btn btn-success">Add Coupon</button> &nbsp; &nbsp;

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

<?php echo $__env->make('layouts.app-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tyre_shopadmin/resources/views/content/coupon/create.blade.php ENDPATH**/ ?>