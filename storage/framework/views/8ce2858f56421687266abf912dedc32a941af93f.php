<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Booking</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Booking</a></li>
            </ol>
        </div>
    </div>

    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Update Booking</div>
                </div>
                <form action="<?php echo e(route('servicerecord.update')); ?>" method="post" accept-charset="utf-8"
                      enctype="multipart/form-data" id="submitAjaxUpdate">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Vehicle Number :</label>
                            <div class="col-md-9">
                                <select name="vehicle_number" class="form-control" id="vehicle_number" required>
                                    <option disabled value="">Choose Vehicle Number</option>
                                    <?php $__currentLoopData = $customervehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customervehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($customervehicle->vehicle_number); ?>" <?php if($customervehicle->vehicle_number==$row->vehicle_number): ?> selected <?php endif; ?>><?php echo e($customervehicle->vehicle_number); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <input type="hidden" name="id"
                                       value="<?php if(isset($row->id)): ?> <?php echo e(encrypt($row->id)); ?> <?php endif; ?>">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Date :</label>
                            <div class="col-md-9">
                                <input type="date" name="date" class="form-control"
                                       value="<?php if(isset($row->date)): ?><?php echo e($row->date); ?><?php endif; ?>" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Time :</label>
                            <div class="col-md-9">
                                <input type="time" name="time" class="form-control"
                                       value="<?php if(isset($row->time)): ?><?php echo e($row->time); ?><?php endif; ?>" required>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Service :</label>
                            <div class="col-md-9">
                                <select name="service_id" class="form-control" required>
                                    <option disabled value="">Choose Service</option>
                                    <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($feature->id); ?>" <?php if($feature->id==$row->service_id): ?> selected <?php endif; ?>><?php echo e($feature->feature_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Booking Type :</label>
                            <div class="col-md-9">
                                <select name="booking_type" class="form-control" required>
                                    <option disabled value="">Choose Booking Type</option>
                                    <option value="0" <?php if($row->booking_type==0): ?> selected <?php endif; ?>>Pre Booked</option>
                                    <option value="1" <?php if($row->booking_type==1): ?> selected <?php endif; ?>>Direct</option>
                                    <option value="2" <?php if($row->booking_type==2): ?> selected <?php endif; ?>>Special Request</option>
                                </select>
                            </div>
                        </div>




                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Service Status :</label>
                            <div class="col-md-9">
                                <select name="status" class="form-control" required>
                                    <option disabled value="">Choose Service Status</option>
                                    <option value="0" <?php if($row->status==0): ?> selected <?php endif; ?>>Booked</option>
                                    <option value="1" <?php if($row->status==1): ?> selected <?php endif; ?>>Waiting</option>
                                    <option value="2" <?php if($row->status==2): ?> selected <?php endif; ?>>Vehicle Received</option>
                                    <option value="3" <?php if($row->status==3): ?> selected <?php endif; ?>>Processing</option>
                                    <option value="4" <?php if($row->status==4): ?> selected <?php endif; ?>>Finished</option>
                                </select>
                            </div>
                        </div>


                        <br>
                        <br>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Current odometer reading :</label>
                            <div class="col-md-9">
                                <input type="text" name="curr_odo_reading" class="form-control"
                                       value="<?php if(isset($row->curr_odo_reading)): ?><?php echo e($row->curr_odo_reading); ?><?php endif; ?>">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Next booking odometer reading :</label>
                            <div class="col-md-9">
                                <input type="text" name="next_odo_reading" class="form-control"
                                       value="<?php if(isset($row->next_odo_reading)): ?><?php echo e($row->next_odo_reading); ?><?php endif; ?>">
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
                                <button class="btn btn-success">Book Service</button>
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

<?php echo $__env->make('layouts.app-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tyre_shopadmin/resources/views/content/servicerecord/edit.blade.php ENDPATH**/ ?>