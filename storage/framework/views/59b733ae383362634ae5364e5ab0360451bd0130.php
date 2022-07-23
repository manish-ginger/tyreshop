   

<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Roles</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Role</a></li>
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
                    <div class="card-title">Update Role</div>
                </div>
                <form action="<?php echo e(route('role.update')); ?>" method="post" accept-charset="utf-8"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Name :</label>
                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control"
                                    value="<?php if(isset($role->name)): ?> <?php echo e($role->name); ?> <?php endif; ?>" required>
                                <input type="hidden" name="roleid"
                                    value="<?php if(isset($role->id)): ?> <?php echo e(encrypt($role->id)); ?> <?php endif; ?>">
                            </div>
                        </div>

                        <!-- Row -->
                        <div class="row">
                            <label class="col-md-3 form-label mb-4">Permission :</label>
                            <div class="col-md-9 mb-4">
                                <div class="col-md-9 mb-4">

                                    <input type="checkbox" onClick="toggle()" id="all_checkbox">
                                    <label for="">Toggle All</label><br>
                                    <br><hr>

                                    <?php
                                        $dashboard=$machine=$workingdays=$coupon=$feature=$servicerecord=$package=$packagerecord=$loyaltypoint=$notification=$customer=$customervehicle=$message=$report=array();
                                            $permission_data=json_decode($role->permission);
                                            foreach ($permission_data as $key => $value)
                                                {
                                                    if($key=="'dashboard'"){
                                                        $dashboard=$value;
                                                    }
                                                    if($key=="'machine'"){
                                                        $machine=$value;
                                                    }
                                                    if($key=="'workingdays'"){
                                                        $workingdays=$value;
                                                    }
                                                    if($key=="'coupon'"){
                                                        $coupon=$value;
                                                    }
                                                    if($key=="'feature'"){
                                                        $feature=$value;
                                                    }
                                                    if($key=="'servicerecord'"){
                                                        $servicerecord=$value;
                                                    }
                                                    if($key=="'package'"){
                                                        $package=$value;
                                                    }
                                                    if($key=="'packagerecord'"){
                                                        $packagerecord=$value;
                                                    }
                                                    if($key=="'loyaltypoint'"){
                                                        $loyaltypoint=$value;
                                                    }
                                                    if($key=="'notification'"){
                                                        $notification=$value;
                                                    }
                                                    if($key=="'customer'"){
                                                        $customer=$value;
                                                    }
                                                    if($key=="'customervehicle'"){
                                                        $customervehicle=$value;
                                                    }
                                                    if($key=="'message'"){
                                                        $message=$value;
                                                    }
                                                    if($key=="'report'"){
                                                        $report=$value;
                                                    }
                                                }
                                    ?>











                                    <h5>Dashboard</h5>
                                    <input type="checkbox" name="permission['dashboard'][]" value="index" class="p_div" <?php if(in_array('index',$dashboard)): ?> checked <?php endif; ?>>
                                    <label for="">List</label><br><hr>

                                    <h5>Machines</h5>
                                    <input type="checkbox" name="permission['machine'][]" value="index" class="p_div" <?php if(in_array('index',$machine)): ?> checked <?php endif; ?>>
                                    <label for="">List</label><br>
                                    <input type="checkbox" name="permission['machine'][]" value="create" class="p_div" <?php if(in_array('create',$machine)): ?> checked <?php endif; ?>>
                                    <label for="">Create</label><br>
                                    <input type="checkbox" name="permission['machine'][]" value="edit" class="p_div" <?php if(in_array('edit',$machine)): ?> checked <?php endif; ?>>
                                    <label for="">Edit</label><br>
                                    <input type="checkbox" name="permission['machine'][]" value="show" class="p_div" <?php if(in_array('view',$machine)): ?> checked <?php endif; ?>>
                                    <label for="">View</label><br>
                                    <input type="checkbox" name="permission['machine'][]" value="delete" class="p_div" <?php if(in_array('delete',$machine)): ?> checked <?php endif; ?>>
                                    <label for="">Delete</label><br><hr>

                                    <h5>Working Days</h5>
                                    <input type="checkbox" name="permission['workingdays'][]" value="index" class="p_div" <?php if(in_array('index',$workingdays)): ?> checked <?php endif; ?>>
                                    <label for="">List</label><br>
                                    <input type="checkbox" name="permission['workingdays'][]" value="edit" class="p_div" <?php if(in_array('edit',$workingdays)): ?> checked <?php endif; ?>>
                                    <label for="">Edit</label><br><hr>


                                    <h5>Coupons</h5>
                                    <input type="checkbox" name="permission['coupon'][]" value="index" class="p_div" <?php if(in_array('index',$coupon)): ?> checked <?php endif; ?>>
                                    <label for="">List</label><br>
                                    <input type="checkbox" name="permission['coupon'][]" value="create" class="p_div" <?php if(in_array('create',$coupon)): ?> checked <?php endif; ?>>
                                    <label for="">Create</label><br>
                                    <input type="checkbox" name="permission['coupon'][]" value="edit" class="p_div" <?php if(in_array('edit',$coupon)): ?> checked <?php endif; ?>>
                                    <label for="">Edit</label><br>
                                    <input type="checkbox" name="permission['coupon'][]" value="show" class="p_div" <?php if(in_array('view',$coupon)): ?> checked <?php endif; ?>>
                                    <label for="">View</label><br>
                                    <input type="checkbox" name="permission['coupon'][]" value="delete" class="p_div" <?php if(in_array('delete',$coupon)): ?> checked <?php endif; ?>>
                                    <label for="">Delete</label><br><hr>

                                    <h5>Services</h5>
                                    <input type="checkbox" name="permission['feature'][]" value="index" class="p_div" <?php if(in_array('index',$feature)): ?> checked <?php endif; ?>>
                                    <label for="">List</label><br>
                                    <input type="checkbox" name="permission['feature'][]" value="create" class="p_div" <?php if(in_array('create',$feature)): ?> checked <?php endif; ?>>
                                    <label for="">Create</label><br>
                                    <input type="checkbox" name="permission['feature'][]" value="edit" class="p_div" <?php if(in_array('edit',$feature)): ?> checked <?php endif; ?>>
                                    <label for="">Edit</label><br>
                                    <input type="checkbox" name="permission['feature'][]" value="show" class="p_div" <?php if(in_array('view',$feature)): ?> checked <?php endif; ?>>
                                    <label for="">View</label><br>
                                    <input type="checkbox" name="permission['feature'][]" value="delete" class="p_div" <?php if(in_array('delete',$feature)): ?> checked <?php endif; ?>>
                                    <label for="">Delete</label><br><hr>

                                    <h5>Bookings</h5>
                                    <input type="checkbox" name="permission['servicerecord'][]" value="index" class="p_div" <?php if(in_array('index',$servicerecord)): ?> checked <?php endif; ?>>
                                    <label for="">List</label><br>
                                    <input type="checkbox" name="permission['servicerecord'][]" value="create" class="p_div" <?php if(in_array('create',$servicerecord)): ?> checked <?php endif; ?>>
                                    <label for="">Create</label><br>
                                    <input type="checkbox" name="permission['servicerecord'][]" value="edit" class="p_div" <?php if(in_array('edit',$servicerecord)): ?> checked <?php endif; ?>>
                                    <label for="">Edit</label><br>
                                    <input type="checkbox" name="permission['servicerecord'][]" value="show" class="p_div" <?php if(in_array('view',$servicerecord)): ?> checked <?php endif; ?>>
                                    <label for="">View</label><br>
                                    <input type="checkbox" name="permission['servicerecord'][]" value="delete" class="p_div" <?php if(in_array('delete',$servicerecord)): ?> checked <?php endif; ?>>
                                    <label for="">Delete</label><br><hr>

                                    <h5>Packages</h5>
                                    <input type="checkbox" name="permission['package'][]" value="index" class="p_div" <?php if(in_array('index',$package)): ?> checked <?php endif; ?>>
                                    <label for="">List</label><br>
                                    <input type="checkbox" name="permission['package'][]" value="create" class="p_div" <?php if(in_array('create',$package)): ?> checked <?php endif; ?>>
                                    <label for="">Create</label><br>
                                    <input type="checkbox" name="permission['package'][]" value="edit" class="p_div" <?php if(in_array('edit',$package)): ?> checked <?php endif; ?>>
                                    <label for="">Edit</label><br>
                                    <input type="checkbox" name="permission['package'][]" value="show" class="p_div" <?php if(in_array('view',$package)): ?> checked <?php endif; ?>>
                                    <label for="">View</label><br>
                                    <input type="checkbox" name="permission['package'][]" value="delete" class="p_div" <?php if(in_array('delete',$package)): ?> checked <?php endif; ?>>
                                    <label for="">Delete</label><br><hr>

                                    <h5>Customer Packages</h5>
                                    <input type="checkbox" name="permission['packagerecord'][]" value="index" class="p_div" <?php if(in_array('index',$packagerecord)): ?> checked <?php endif; ?>>
                                    <label for="">List</label><br>
                                    <input type="checkbox" name="permission['packagerecord'][]" value="create" class="p_div" <?php if(in_array('create',$packagerecord)): ?> checked <?php endif; ?>>
                                    <label for="">Create</label><br>
                                    <input type="checkbox" name="permission['packagerecord'][]" value="edit" class="p_div" <?php if(in_array('edit',$packagerecord)): ?> checked <?php endif; ?>>
                                    <label for="">Edit</label><br>
                                    <input type="checkbox" name="permission['packagerecord'][]" value="show" class="p_div" <?php if(in_array('view',$packagerecord)): ?> checked <?php endif; ?>>
                                    <label for="">View</label><br>
                                    <input type="checkbox" name="permission['packagerecord'][]" value="delete" class="p_div" <?php if(in_array('delete',$packagerecord)): ?> checked <?php endif; ?>>
                                    <label for="">Delete</label><br><hr>

                                    <h5>Loyalty Rewards</h5>
                                    <input type="checkbox" name="permission['loyaltypoint'][]" value="index" class="p_div" <?php if(in_array('index',$loyaltypoint)): ?> checked <?php endif; ?>>
                                    <label for="">List</label><br>
                                    <input type="checkbox" name="permission['loyaltypoint'][]" value="create" class="p_div" <?php if(in_array('create',$loyaltypoint)): ?> checked <?php endif; ?>>
                                    <label for="">Create</label><br>
                                    <input type="checkbox" name="permission['loyaltypoint'][]" value="edit" class="p_div" <?php if(in_array('edit',$loyaltypoint)): ?> checked <?php endif; ?>>
                                    <label for="">Edit</label><br>
                                    <input type="checkbox" name="permission['loyaltypoint'][]" value="show" class="p_div" <?php if(in_array('view',$loyaltypoint)): ?> checked <?php endif; ?>>
                                    <label for="">View</label><br>
                                    <input type="checkbox" name="permission['loyaltypoint'][]" value="delete" class="p_div" <?php if(in_array('delete',$loyaltypoint)): ?> checked <?php endif; ?>>
                                    <label for="">Delete</label><br><hr>

                                    <h5>Notifications</h5>
                                    <input type="checkbox" name="permission['notification'][]" value="index" class="p_div" <?php if(in_array('index',$notification)): ?> checked <?php endif; ?>>
                                    <label for="">List</label><br>
                                    <input type="checkbox" name="permission['notification'][]" value="store" class="p_div" <?php if(in_array('store',$notification)): ?> checked <?php endif; ?>>
                                    <label for="">Create</label><br>
                                    <input type="checkbox" name="permission['notification'][]" value="edit" class="p_div" <?php if(in_array('edit',$notification)): ?> checked <?php endif; ?>>
                                    <label for="">Edit</label><br>
                                    <input type="checkbox" name="permission['notification'][]" value="show" class="p_div" <?php if(in_array('view',$notification)): ?> checked <?php endif; ?>>
                                    <label for="">View</label><br>
                                    <input type="checkbox" name="permission['notification'][]" value="delete" class="p_div" <?php if(in_array('delete',$notification)): ?> checked <?php endif; ?>>
                                    <label for="">Delete</label><br><hr>

                                    <h5>Customers</h5>
                                    <input type="checkbox" name="permission['customer'][]" value="index" class="p_div" <?php if(in_array('index',$customer)): ?> checked <?php endif; ?>>
                                    <label for="">List</label><br>
                                    <input type="checkbox" name="permission['customer'][]" value="create" class="p_div" <?php if(in_array('create',$customer)): ?> checked <?php endif; ?>>
                                    <label for="">Create</label><br>
                                    <input type="checkbox" name="permission['customer'][]" value="edit" class="p_div" <?php if(in_array('edit',$customer)): ?> checked <?php endif; ?>>
                                    <label for="">Edit</label><br>
                                    <input type="checkbox" name="permission['customer'][]" value="show" class="p_div" <?php if(in_array('view',$customer)): ?> checked <?php endif; ?>>
                                    <label for="">View</label><br>
                                    <input type="checkbox" name="permission['customer'][]" value="delete" class="p_div" <?php if(in_array('delete',$customer)): ?> checked <?php endif; ?>>
                                    <label for="">Delete</label><br><hr>

                                    <h5>Customer Vehicles</h5>
                                    <input type="checkbox" name="permission['customervehicle'][]" value="index" class="p_div" <?php if(in_array('index',$customervehicle)): ?> checked <?php endif; ?>>
                                    <label for="">List</label><br>
                                    <input type="checkbox" name="permission['customervehicle'][]" value="create" class="p_div" <?php if(in_array('create',$customervehicle)): ?> checked <?php endif; ?>>
                                    <label for="">Create</label><br>
                                    <input type="checkbox" name="permission['customervehicle'][]" value="edit" class="p_div" <?php if(in_array('edit',$customervehicle)): ?> checked <?php endif; ?>>
                                    <label for="">Edit</label><br>
                                    <input type="checkbox" name="permission['customervehicle'][]" value="show" class="p_div" <?php if(in_array('view',$customervehicle)): ?> checked <?php endif; ?>>
                                    <label for="">View</label><br>
                                    <input type="checkbox" name="permission['customervehicle'][]" value="delete" class="p_div" <?php if(in_array('delete',$customervehicle)): ?> checked <?php endif; ?>>
                                    <label for="">Delete</label><br><hr>

                                    <h5>Messages</h5>
                                    <input type="checkbox" name="permission['message'][]" value="create" class="p_div" <?php if(in_array('create',$message)): ?> checked <?php endif; ?>>
                                    <label for="">Create</label><br><hr>


                                    <h5>Reports</h5>
                                    <input type="checkbox" name="permission['report'][]" value="create" class="p_div" <?php if(in_array('create',$report)): ?> checked <?php endif; ?>>
                                    <label for="">Create</label><br><hr>

                                </div>
                            </div>
                        </div>


                        <!--End Row-->
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
                                <button onclick="window.location.reload();" class="btn btn-secondary">Revert</button>
                                <button class="btn btn-success">Update Role</button>
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
        function toggle() {
            if($('#all_checkbox').is(':checked')) {
                $(".p_div").prop('checked', true);
            }
            else{
                $(".p_div").prop('checked', false);
            }
        }
    </script>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/carwash_superadmin/resources/views/content/role/edit.blade.php ENDPATH**/ ?>