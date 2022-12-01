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
                <div class="card-header">
                    <div class="card-title">Update Customer</div>
                </div>
                <form action="<?php echo e(route('customer.update')); ?>" method="post" accept-charset="utf-8"
                    enctype="multipart/form-data" id="submitAjaxUpdate">
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
                                <select name="cust_type" class="form-control">
                                    <option disabled value="">Choose Customer Type</option>
                                    <option value="owner" <?php if($customer->cust_type=='owner'): ?> selected <?php endif; ?>>Owner</option>
                                    <option value="driver" <?php if($customer->cust_type=='driver'): ?> selected <?php endif; ?>>Driver</option>
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
                            <label class="col-md-3 form-label">Customer Tyre Shop Frequency(days) :</label>
                            <div class="col-md-9">
                                <input type="text" name="wash_frequency" class="form-control"
                                       value="<?php if(isset($customer->wash_frequency)): ?> <?php echo e($customer->wash_frequency); ?> <?php endif; ?>" required>
                            </div>
                        </div>



                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Customer DOB :</label>
                            <div class="col-md-9">
                                <input type="date" name="dob" class="form-control"
                                value="<?php if(isset($customer->dob)): ?><?php echo e($customer->dob); ?><?php endif; ?>">
                            </div>
                        </div>

                        <!-- Row -->




                        <!--End Row-->
                        <br>
                        <br>
                        <!--Row-->


                    <div class="row mb-4">
                        <label class="col-md-3 form-label">Notification Type :</label>
                        <div class="col-md-9">
                            <select name="notification_type" class="form-control" id="notification_type" required>
                                <option disabled value="">Choose Notification Type</option>
                                <option value="0" <?php if($customer->notification_type=='0'): ?> selected <?php endif; ?>>Disable</option>
                                <option value="1" <?php if($customer->notification_type=='1'): ?> selected <?php endif; ?>>Default</option>
                                <option value="2" <?php if($customer->notification_type=='2'): ?> selected <?php endif; ?>>Manual</option>
                            </select>
                        </div>
                    </div>

                    <div id="notification_div" <?php if($customer->notification_type!='2'): ?> style="display:none" <?php endif; ?>>
                        <hr>
                        <h4 style="text-align: center">
                            Notification :
                        </h4>
                        <hr>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Content :</label>
                            <div class="col-md-9">
                                <input type="text" name="content" class="form-control" value="<?php if(isset($customer->content)): ?> <?php echo e($customer->content); ?> <?php endif; ?>">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Before Days :</label>
                            <div class="col-md-9">
                                <input type="text" name="before_days" class="form-control" value="<?php if(isset($customer->before_days)): ?> <?php echo e($customer->before_days); ?> <?php endif; ?>">
                            </div>
                        </div>

                    </div>

                        <br>
                        <br>



                    </div>


                    <div class="card-footer">
                        <!--Row-->
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9 text-end">

                                <input type="reset" class="btn btn-danger" value="Revert">
                                <button class="btn btn-success">Update Customer </button>
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

    $(document).on('change', '#notification_type', function() {
        var option_val=$(this).val();
        if(option_val==2)
        {
            $("#notification_div").show();
        }
        else
        {
            $("#notification_div").hide();
        }
    })

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

<?php echo $__env->make('layouts.app-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tyre_shopadmin/resources/views/content/customer/edit.blade.php ENDPATH**/ ?>