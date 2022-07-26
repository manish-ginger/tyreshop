<?php
use App\Models\Coupon;
?>


<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Service </h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Service </a></li>
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
                            <label class="col-md-3 form-label"> Name :</label>
                            <div class="col-md-9">
                                    <?php $__currentLoopData = $washing_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $washing_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($washing_type->name==$feature->feature_name): ?> <?php echo e($washing_type->name); ?> <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Vehicle Category :</label>
                            <div class="col-md-9">
                                    <?php $__currentLoopData = $vehicle_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($vehicle_category->id==$feature->vehicle_category): ?> <?php echo e($vehicle_category->name); ?> <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Vehicle Brand :</label>
                            <div class="col-md-9">
                                    <?php $__currentLoopData = $vehicle_brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle_brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($vehicle_brand->id==$feature->brand): ?> <?php echo e($vehicle_brand->name); ?> <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Vehicle Model :</label>
                            <div class="col-md-9">
                                    <?php $__currentLoopData = $vehicle_models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle_model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($vehicle_model->id==$feature->model): ?> <?php echo e($vehicle_model->name); ?> <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>










                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Actual Price :</label>
                            <div class="col-md-9">
                                <?php if(isset($feature->actual_price)): ?> <?php echo e($feature->actual_price); ?> <?php endif; ?>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Discounted Price :</label>
                            <div class="col-md-9">
                                <?php if(isset($feature->discounted_price)): ?> <?php echo e($feature->discounted_price); ?> <?php endif; ?>
                            </div>
                        </div>



                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Percentage OR Amount:</label>
                            <div class="col-md-9">
                                <?php if(isset($feature->perc_or_amount)): ?> <?php echo e($feature->perc_or_amount); ?> <?php endif; ?>
                            </div>
                        </div>
















                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Accessory :</label>
                            <div class="col-md-9">
                                <?php if(isset($feature->accessory)): ?> <?php echo e($feature->accessory); ?> <?php endif; ?>
                            </div>
                        </div>








                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Duration :</label>
                            <div class="col-md-9">
                                <?php if(isset($feature->duration)): ?><?php echo e($feature->duration); ?><?php endif; ?>
                            </div>
                        </div>

                        <!-- Row -->
                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Loyalty Points :</label>
                            <div class="col-md-9">
                                <?php if(isset($feature->loyalty_points)): ?> <?php echo e($feature->loyalty_points); ?> <?php endif; ?>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Loyalty Points Validity (Days) :</label>
                            <div class="col-md-9">
                                <?php if(isset($feature->loyalty_points_validity)): ?> <?php echo e($feature->loyalty_points_validity); ?> <?php endif; ?>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Slots :</label>
                            <div class="col-md-9">
                                <?php
                                if(isset($feature->coupon))
                                     $data = Coupon::where('id',$feature->coupon)->get();
                                    if(isset($data[0]->code)){echo $data[0]->code;}
                                    ?>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Slots :</label>
                            <div class="col-md-9">
                                <?php if(isset($feature->slots)): ?> <?php echo e($feature->slots); ?> <?php endif; ?>
                            </div>
                        </div>


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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/carwash_shopadmin/resources/views/content/feature/show.blade.php ENDPATH**/ ?>