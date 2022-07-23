

        <?php $__env->startSection('styles'); ?>

        <?php $__env->stopSection(); ?>

        <?php $__env->startSection('content'); ?>

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <h1 class="page-title">Customers</h1>
                                <div>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Customer</a></li>
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
                                            <div class="card-title">Add New Customer</div>
                                        </div>
                                        <form action="<?php echo e(route('customer.store')); ?>" method="post"  accept-charset="utf-8" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="card-body">
                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Customer Name :</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="name" class="form-control" placeholder="Customer Name"  required>
                                                </div>
                                            </div>

                                            <!-- Row -->
                                            <div class="row">
                                                <label class="col-md-3 form-label mb-4">Customer Email :</label>
                                                <div class="col-md-9 mb-4">
                                                    <input type="email" name="email" class="form-control" placeholder="Customer email"  required>
                                                </div>
                                            </div>
                                            <!--End Row-->

                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Customer Type :</label>
                                                <div class="col-md-9">
                                                    <select name="cust_type" id="cars">
                                                        <option value="owner">Owner</option>
                                                        <option value="driver">Driver</option>
                                                        <option value="manager">Manager</option>
                                                        <option value="friend">Friend</option>
                                                      </select>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Customer Mobile :</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="mobile" class="form-control" placeholder="Customer Mobile"  required>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Customer Whatsapp :</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="whatsapp" class="form-control" placeholder="Customer Whatsapp"  required>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Customer QID :</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="qid" class="form-control" placeholder="Customer QID"  required>
                                                </div>
                                            </div>


                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Vehicle Brand :</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="brand" class="form-control" placeholder="Vehicle Brand"  required>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Vehicle Model :</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="model" class="form-control" placeholder="Vehicle Model"  required>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Vehicle Variant :</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="variant" class="form-control" placeholder="Vehicle Variant"  required>
                                                </div>
                                            </div>
                                            
                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Vehicle Category :</label>
                                                <div class="col-md-9">
                                                    <select name="vehicle_category">
                                                        <?php $__currentLoopData = $vehicle_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($vehicle_category->id); ?>"><?php echo e($vehicle_category->name); ?></option>    
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                      </select>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Customer Wash Frequency :</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="wash_frequency" class="form-control" placeholder="Customer Wash Frequency"  required>
                                                </div>
                                            </div>


                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label">Customer DOB :</label>
                                                <div class="col-md-9">
                                                    <input type="date" name="dob" class="form-control" placeholder="Customer DOB"  required>
                                                </div>
                                            </div>
                                            
                                           
                                        </div>
                                        <div class="card-footer">
                                            <!--Row-->
                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-9 text-end">
                                                <button class="btn btn-danger" onclick="window.location.reload();">Discard</button> &nbsp; &nbsp;
                                                <button class="btn btn-success">Add Customer</button> &nbsp; &nbsp;
                                                
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/carwashf/resources/views/content/customer/create.blade.php ENDPATH**/ ?>