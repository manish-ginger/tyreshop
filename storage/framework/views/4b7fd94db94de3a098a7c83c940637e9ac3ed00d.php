

<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Customer Profile</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Customer Profile</a></li>
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
                    <div class="card-title">Update Customer</div>
                </div>
                <form action="<?php echo e(route('customer.update')); ?>" method="post" accept-charset="utf-8"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer Name :</label>
                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control"
                                    value="<?php if(isset($customer->name)): ?> <?php echo e($customer->name); ?> <?php endif; ?>" required>
                                <input type="hidden" name="customerid"
                                    value="<?php if(isset($customer->id)): ?> <?php echo e(encrypt($customer->id)); ?> <?php endif; ?>">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer Email :</label>
                            <div class="col-md-9">
                                <input type="text" name="email" class="form-control"
                                value="<?php if(isset($customer->email)): ?> <?php echo e($customer->email); ?> <?php endif; ?>" required>
                            </div>
                        </div>


                        
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer Type :</label>
                            <div class="col-md-9">
                                <select name="cust_type" id="cars">
                                    <option value="owner" <?php if($customer->cust_type=='owner'): ?> selected <?php endif; ?>>Owner</option>
                                    <option value="driver" <?php if($customer->cust_type=='driver'): ?> selected <?php endif; ?>>Driver</option>
                                    <option value="manager" <?php if($customer->cust_type=='manager'): ?> selected <?php endif; ?>>Manager</option>
                                    <option value="manager" <?php if($customer->cust_type=='manager'): ?> selected <?php endif; ?>>Manager</option>
                                    <option value="friend" <?php if($customer->cust_type=='friend'): ?> selected <?php endif; ?>>Friend</option>
                                  </select>
                            </div>
                        </div>

                        
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer Mobile :</label>
                            <div class="col-md-9">
                                <input type="text" name="mobile" class="form-control"
                                value="<?php if(isset($customer->mobile)): ?> <?php echo e($customer->mobile); ?> <?php endif; ?>" required>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer Whatsapp :</label>
                            <div class="col-md-9">
                                <input type="text" name="whatsapp" class="form-control"
                                value="<?php if(isset($customer->whatsapp)): ?> <?php echo e($customer->whatsapp); ?> <?php endif; ?>" required>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer QID :</label>
                            <div class="col-md-9">
                                <input type="text" name="qid" class="form-control"
                                value="<?php if(isset($customer->qid)): ?> <?php echo e($customer->qid); ?> <?php endif; ?>" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Vehicle Brand :</label>
                            <div class="col-md-9">
                                <input type="text" name="brand" class="form-control"
                                value="<?php if(isset($customer->brand)): ?> <?php echo e($customer->brand); ?> <?php endif; ?>" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Vehicle Model :</label>
                            <div class="col-md-9">
                                <input type="text" name="model" class="form-control"
                                value="<?php if(isset($customer->model)): ?> <?php echo e($customer->model); ?> <?php endif; ?>" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Vehicle Variant :</label>
                            <div class="col-md-9">
                                <input type="text" name="variant" class="form-control"
                                value="<?php if(isset($customer->variant)): ?> <?php echo e($customer->variant); ?> <?php endif; ?>" required>
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
                                <input type="text" name="wash_frequency" class="form-control"
                                value="<?php if(isset($customer->wash_frequency)): ?> <?php echo e($customer->wash_frequency); ?> <?php endif; ?>" required>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer DOB :</label>
                            <div class="col-md-9">
                                <input type="date" name="dob" class="form-control"
                                value="<?php if(isset($customer->dob)): ?><?php echo e($customer->dob); ?><?php endif; ?>" required>
                            </div>
                        </div>

                        <!-- Row -->
                        

                        

                        <!--End Row-->
                        <hr>
                        <hr>
                        <!--Row-->
                        <hr>
                        <hr>
                        
                        
                        
                    </div>
                    <div class="card-footer">
                        <!--Row-->
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9 text-end">
                                <button onclick="window.location.reload();" class="btn btn-secondary">Revert</button>
                                <button class="btn btn-success">Update Customer Profile</button>
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
    <script>
        $(document).ready(function() {
            $(".packimg-del").click(function(e) {
                e.preventDefault();
                if (confirm("Are You Sure?")) {
                    $(this).closest("DIV").hide();
                    let idz = $(this).attr("id");
                    let url = "<?php echo e(url('delete-shopimg')); ?>";
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            "_token": "<?php echo e(csrf_token()); ?>",
                            pkmg: idz,
                        },
                        success: function(response) {
                            alert(response.message);
                        },
                    });
                }
            });
            $(".packvid-del").click(function(e) {
                e.preventDefault();
                if (confirm("Are You Sure?")) {
                    $(this).closest("DIV").hide();
                    let idz = $(this).attr("id");
                    let url = "<?php echo e(url('delete-shopvideo')); ?>";
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            "_token": "<?php echo e(csrf_token()); ?>",
                            pkvd: idz,
                        },
                        success: function(response) {
                            alert(response.message);
                        },
                    });
                }
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/carwash_superadmin/resources/views/content/customer/edit.blade.php ENDPATH**/ ?>