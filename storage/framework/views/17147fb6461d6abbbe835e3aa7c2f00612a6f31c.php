<?php
use App\Models\VehicleBrand;
use App\Models\VehicleCategory;
?>


<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- PAGE-HEADER -->
    <?php if(!isset($type)): ?>
    <div class="page-header">
        <h1 class="page-title">Shops</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </div>
    </div>
    <?php endif; ?>

    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <?php if(!isset($type)): ?>
                <div class="card-header">
                    <div class="card-title">Update Shop</div>
                </div>
                <?php endif; ?>
                <form action="<?php echo e(route('shop.update')); ?>" method="post" accept-charset="utf-8"
                    enctype="multipart/form-data" id="submitAjaxUpdate">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Shop Name :</label>
                            <div class="col-md-9">
                                <?php if(isset($type)): ?>
                                    <?php if(isset($shop->name)): ?> <?php echo e($shop->name); ?><?php endif; ?>
                                <?php else: ?>
                                    <input type="text" name="name" class="form-control"
                                           value="<?php if(isset($shop->name)): ?> <?php echo e($shop->name); ?> <?php endif; ?>" required>
                                    <input type="hidden" name="shopid"
                                           value="<?php if(isset($shop->id)): ?> <?php echo e(encrypt($shop->id)); ?> <?php endif; ?>">
                                <?php endif; ?>

                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Shop Licence :</label>
                            <div class="col-md-9">
                                <?php if(isset($type)): ?>
                                    <?php if(isset($shop->detail->licence)): ?> <?php echo e($shop->detail->licence); ?><?php endif; ?>
                                <?php else: ?>
                                <input type="text" name="licence" class="form-control" value="<?php if(isset($shop->detail->licence)): ?> <?php echo e($shop->detail->licence); ?> <?php endif; ?>" placeholder="Shop licence" required>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Shop Location :</label>
                            <div class="col-md-9">
                                <?php if(isset($type)): ?>
                                    <?php if(isset($shop->detail->location)): ?> <?php echo e($shop->detail->location); ?><?php endif; ?>
                                <?php else: ?>
                                    <input type="text" name="location" value="<?php if(isset($shop->detail->location)): ?> <?php echo e($shop->detail->location); ?> <?php endif; ?>" class="form-control" placeholder="Shop location" required>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Shop Contact Number :</label>
                            <div class="col-md-9">
                                <?php if(isset($type)): ?>
                                    <?php if(isset($shop->detail->contact)): ?> <?php echo e($shop->detail->contact); ?><?php endif; ?>
                                <?php else: ?>
                                    <input type="text" name="contact" value="<?php if(isset($shop->detail->contact)): ?> <?php echo e($shop->detail->contact); ?> <?php endif; ?>" class="form-control" placeholder="Shop Contact" required>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Shop Owner Number :</label>
                            <div class="col-md-9">
                                <?php if(isset($type)): ?>
                                    <?php if(isset($shop->detail->owner)): ?> <?php echo e($shop->detail->owner); ?><?php endif; ?>
                                <?php else: ?>
                                    <input type="text" name="ownercontact" value="<?php if(isset($shop->detail->owner)): ?> <?php echo e($shop->detail->owner); ?> <?php endif; ?>" class="form-control" placeholder="Owner Contact">
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Shop WhatsApp :</label>
                            <div class="col-md-9">
                                <?php if(isset($type)): ?>
                                    <?php if(isset($shop->detail->whatsapp)): ?> <?php echo e($shop->detail->whatsapp); ?><?php endif; ?>
                                <?php else: ?>
                                    <input type="text" name="whatsapp" value="<?php if(isset($shop->detail->whatsapp)): ?> <?php echo e($shop->detail->whatsapp); ?> <?php endif; ?>" class="form-control" placeholder="Whatsapp">
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Shop Email :</label>
                            <div class="col-md-9">
                                <?php if(isset($type)): ?>
                                    <?php if(isset($shop->email)): ?> <?php echo e($shop->email); ?><?php endif; ?>
                                <?php else: ?>
                                    <input type="text" name="email" class="form-control" value="<?php if(isset($shop->email)): ?> <?php echo e($shop->email); ?> <?php endif; ?>">
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php if(!isset($type)): ?>
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
                        <?php endif; ?>

                        <!-- Row -->
                        <div class="row">
                            <label class="col-md-3 form-label mb-4">Description :</label>
                            <div class="col-md-9 mb-4">
                                <?php if(isset($type)): ?>
                                    <?php if(isset($shop->detail->desc)): ?> <?php echo e(strip_tags($shop->detail->desc)); ?><?php endif; ?>
                                <?php else: ?>
                                    <textarea class="content" name="desc" placeholder="Description">
                                    <?php if(isset($shop->detail->desc)): ?>
                                    <?php echo $shop->detail->desc ?>
                                    <?php endif; ?>
                                    </textarea>
                                <?php endif; ?>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Software validity :</label>
                            <div class="col-md-9">
                                <?php if(isset($type)): ?>
                                    <?php if(isset($shop->valdity)): ?> <?php echo e($shop->valdity); ?><?php endif; ?>
                                <?php else: ?>
                                    <input type="date" name="validity" value="<?php if(isset($shop->valdity)): ?><?php echo e($shop->valdity); ?><?php endif; ?>" class="form-control" id="validity">
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php if($shop->image!=''): ?>
                            <div class="row">
                                <label class="col-md-3 form-label mb-4">Image:</label>
                                <div class="col-md-9">
                                    <div class="col-md-12">
                                        <ul class="row col-md-12">
                                            <div class="float-left col-md-4">
                                                <img src="<?php echo e('/' . $shop->image); ?>" class="img-responsive col-md-4" id="image_src">
                                                <button class="btn btn-icon  btn-danger" id="delete_image"><i class="fe fe-trash"></i></button>
                                                <input type="hidden" name="verify_file" id="verify_file" value="1">
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <hr>

                        <?php if(!isset($type)): ?>
                        <div class="row">
                            <label class="col-md-3 form-label mb-4"> Image :</label>
                            <div class="col-md-9">
                                <input class="form-control" type="file" name="image" id="image_input">
                            </div>
                        </div>
                        <?php endif; ?>

                        <br><br><br>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Shop Approved :</label>
                            <div class="col-md-9">
                                <?php if(isset($type)): ?>
                                    <?php if(isset($shop->approved)): ?> <?php if($shop->approved == 1): ?> Enabled <?php else: ?> Disabled <?php endif; ?> <?php endif; ?>
                                <?php else: ?>
                                    <input type="checkbox" name="approved" value="1" <?php if($shop->approved == 1): ?> checked <?php endif; ?>>
                                <?php endif; ?>

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
                                <?php if(!isset($type)): ?>

                                    <input type="reset" class="btn btn-danger" value="Revert">
                                <button class="btn btn-success">Update Shop</button>
                                <?php endif; ?>
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
            <?php if(isset($type)): ?>
                <button onclick="history.back()" class="btn btn-success" style="float: right;">Go Back</button>
            <?php endif; ?>
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

<?php echo $__env->make('layouts.app-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tyre_superadmin/resources/views/content/shop/edit.blade.php ENDPATH**/ ?>