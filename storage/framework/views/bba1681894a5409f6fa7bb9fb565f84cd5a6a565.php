<?php
    use Carbon\Carbon;
?>


<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Customer Package</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Customer Package</a></li>
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
                    <div class="card-title">Add New Customer Package</div>
                </div>
                <form action="<?php echo e(route('packagerecord.store')); ?>" method="post"  accept-charset="utf-8" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer :</label>
                            <div class="col-md-9">
                                <select name="customer_id" class="form-control" required>
                                    <option selected value="">Choose Customer</option>
                                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Package :</label>
                            <div class="col-md-9">
                                <select name="package_id" class="form-control" id="vehicle_number" required>
                                    <?php
                                       $currentDateTime = Carbon::now();
                                    ?>
                                    <option selected value="">Choose Package</option>
                                    <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $package_purchase_date=$package->created_at;
                                            $package_validity_date = $package_purchase_date->addDays($package->validity);
                                        ?>
                                        <option value="<?php echo e($package->id); ?>">Name : <?php echo e($package->title); ?> | Validity : <?php echo e($package->validity); ?> | Expiry : <?php echo e($package_validity_date); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>


                    </div>
                    <div class="card-footer">
                        <!--Row-->
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9 text-end">
                                <button class="btn btn-danger" onclick="window.location.reload();">Discard</button> &nbsp; &nbsp;
                                <button class="btn btn-success">Add Customer Package</button> &nbsp; &nbsp;

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
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/carwash_shopadmin/resources/views/content/packagerecord/create.blade.php ENDPATH**/ ?>