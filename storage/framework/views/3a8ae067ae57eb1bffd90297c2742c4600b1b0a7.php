   

<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Users</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
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
                    <div class="card-title">Update User</div>
                </div>
                <form action="<?php echo e(route('user.update')); ?>" method="post" accept-charset="utf-8"
                    enctype="multipart/form-data" id="submitAjaxUpdate">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Name :</label>
                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control"
                                    value="<?php if(isset($user->name)): ?> <?php echo e($user->name); ?> <?php endif; ?>" required>
                                <input type="hidden" name="userid"
                                    value="<?php if(isset($user->id)): ?> <?php echo e(encrypt($user->id)); ?> <?php endif; ?>">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Email :</label>
                            <div class="col-md-9">
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                       value="<?php if(isset($user->email)): ?> <?php echo e($user->email); ?> <?php endif; ?>" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Shop Admin Password :</label>
                            <div class="col-md-9">
                                <span class="input-group-text">
                                    <i class="fa fa-eye" id="togglePassword" ></i>
                                <input type="password" name="password" class="form-control"
                                       value="" id="password" >
                                </span>
                                <p>Leave this field empty,if there is no update needed in password.<br>
                                    Type new password in this field,if there is update needed in password.
                                </p>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Role :</label>
                        <div class="col-md-9">
                            <label class="col-md-3 form-label">Role :</label>
                            <select name="role_id" class="form-control"  required>
                                <option disabled value="">Choose Role</option>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->id); ?>" <?php if($row->id==$user->role_id): ?>selected <?php endif; ?>><?php echo e($row->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Shop :</label>
                            <div class="col-md-9">
                                <label class="col-md-3 form-label">Shop :</label>
                                <select name="shop_id" class="form-control"  required>
                                    <option disabled value="">Choose Shop</option>
                                    <?php $__currentLoopData = $shops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($row->id); ?>" <?php if($row->id==$user->shop_id): ?>selected <?php endif; ?>><?php echo e($row->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>




                        <br>
                        <br>
                        <!--Row-->
                        <br>
                        <br>



                    </div>
                    <div class="card-footer">
                        <!--Row-->
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9 text-end">

                                <input type="reset" class="btn btn-danger" value="Revert">
                                <button class="btn btn-success">Update User</button>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tyre_superadmin/resources/views/content/user/edit.blade.php ENDPATH**/ ?>