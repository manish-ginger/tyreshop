<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Customer</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Customer</a></li>
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
                            <label class="col-md-3 form-label">Customer Name :</label>
                            <div class="col-md-9">
                                <?php if(isset($customer->name)): ?> <?php echo e($customer->name); ?> <?php endif; ?>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer Email :</label>
                            <div class="col-md-9">
                                <?php if(isset($customer->email)): ?> <?php echo e($customer->email); ?> <?php endif; ?>
                            </div>
                        </div>



                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer Type :</label>
                            <div class="col-md-9">
                                    <?php if(isset($customer->cust_type)): ?> <?php echo e($customer->cust_type); ?> <?php endif; ?>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer Mobile :</label>
                            <div class="col-md-9">
                                <?php if(isset($customer->mobile)): ?> <?php echo e($customer->mobile); ?> <?php endif; ?>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer Whatsapp :</label>
                            <div class="col-md-9">
                                <?php if(isset($customer->whatsapp)): ?> <?php echo e($customer->whatsapp); ?> <?php endif; ?>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer QID :</label>
                            <div class="col-md-9">
                                <?php if(isset($customer->qid)): ?> <?php echo e($customer->qid); ?> <?php endif; ?>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer Tyre Shop Frequency(days) :</label>
                            <div class="col-md-9">
                                    <?php if(isset($customer->wash_frequency)): ?> <?php echo e($customer->wash_frequency); ?> <?php endif; ?>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer DOB :</label>
                            <div class="col-md-9">
                                <?php if(isset($customer->dob)): ?><?php echo e($customer->dob); ?><?php endif; ?>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Notification Type :</label>
                            <div class="col-md-9">
                                <?php
                                if(isset($customer->notification_type)){
                                    if($customer->notification_type==0) {echo 'DISABLED';}
                                    if($customer->notification_type==1) {echo 'DEFAULT';}
                                    if($customer->notification_type==2) {echo 'MANUAL';}
                                }
                                ?>
                            </div>
                        </div>


                        <div id="notification_div" <?php if($customer->notification_type!='2'): ?> style="display:none" <?php endif; ?>>

                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Content :</label>
                                <div class="col-md-9">
                                    <?php if(isset($customer->content)): ?><?php echo e($customer->content); ?><?php endif; ?>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Before Days :</label>
                                <div class="col-md-9">
                                    <?php if(isset($customer->before_days)): ?><?php echo e($customer->before_days); ?><?php endif; ?>
                                </div>
                            </div>

                        </div>

                        <!-- Row -->


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

<?php echo $__env->make('layouts.app-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tyre_shopadmin/resources/views/content/customer/show.blade.php ENDPATH**/ ?>