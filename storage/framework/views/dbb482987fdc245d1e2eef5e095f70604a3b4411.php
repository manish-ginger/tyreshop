<?php
    use App\Models\Customer;
    use App\Models\VehicleBrand;
    use App\Models\VehicleModel;
    use App\Models\Vehicle;
    use App\Models\VehicleCategory;
    use App\Models\Feature;
?>


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
                </div>
                    <div class="card-body">

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Vehicle Number :</label>
                            <div class="col-md-9">
                                <?php echo e($customervehicle[0]->vehicle_number); ?>

                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Owner :</label>
                            <div class="col-md-9">
                                    <?php
                                        $data =Customer::where('id',$customervehicle[0]->customer_id)->get();
                                             if(isset($data[0]->name)){echo $data[0]->name; }
                                    ?>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Brand :</label>
                            <div class="col-md-9">
                                    <?php
                                        $data =VehicleCategory::where('id',$customervehicle[0]->vehicle_category)->get();
                                             if(isset($data[0]->name)){echo $data[0]->name; }
                                    ?>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Model :</label>
                            <div class="col-md-9">
                                    <?php
                                        $data =VehicleBrand::where('id',$customervehicle[0]->brand)->get();
                                             if(isset($data[0]->name)){echo $data[0]->name; }
                                    ?>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Size :</label>
                            <div class="col-md-9">
                                <?php
                                    $data =VehicleModel::where('id',$customervehicle[0]->model)->get();
                                             if(isset($data[0]->name)){echo $data[0]->name; }
                                ?>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Number :</label>
                            <div class="col-md-9">
                                <?php
                                    $data =Vehicle::where('id',$customervehicle[0]->variant)->get();
                                             if(isset($data[0]->variant)){echo $data[0]->variant; }
                                ?>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Date :</label>
                            <div class="col-md-9">
                                <?php if(isset($row->date)): ?><?php echo e($row->date); ?><?php endif; ?>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Time :</label>
                            <div class="col-md-9">
                                <?php if(isset($row->time)): ?><?php echo e($row->time); ?><?php endif; ?>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Service :</label>
                            <div class="col-md-9">
                                <?php
                                if(isset($row->service_id)){
                                    $data = Feature::where('id',$row->service_id)->get();
                                    if(isset($data[0]->feature_name)){echo $data[0]->feature_name;}
                                }
                                ?>
                            </div>
                        </div>



                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Booking Type :</label>
                            <div class="col-md-9">
                                <?php if($row->booking_type==0): ?> Pre Booked <?php endif; ?>
                                <?php if($row->booking_type==1): ?> Direct <?php endif; ?>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Service Status :</label>
                            <div class="col-md-9">
                                <?php if($row->status==0): ?> Booked <?php endif; ?>
                                <?php if($row->status==1): ?> Waiting <?php endif; ?>
                                <?php if($row->status==2): ?> Vehicle Received <?php endif; ?>
                                <?php if($row->status==3): ?> Processing <?php endif; ?>
                                <?php if($row->status==4): ?> Finished <?php endif; ?>
                            </div>
                        </div>


                        <br>
                        <br>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Current odometer reading :</label>
                            <div class="col-md-9">
                                <?php if(isset($row->curr_odo_reading)): ?><?php echo e($row->curr_odo_reading); ?><?php endif; ?>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Next booking odometer reading :</label>
                            <div class="col-md-9">
                                <?php if(isset($row->next_odo_reading)): ?><?php echo e($row->next_odo_reading); ?><?php endif; ?>
                            </div>
                        </div>

                        <br>
                        <br>



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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tyre_shopadmin/resources/views/content/servicerecord/show.blade.php ENDPATH**/ ?>