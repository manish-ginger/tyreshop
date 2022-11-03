    <!-- BACK-TO-TOP -->
    <!--<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>-->

    <!-- JQUERY JS -->
    <script src="<?php echo e(asset('assets/plugins/jquery/jquery.min.js')); ?>"></script>

    <!-- BOOTSTRAP JS -->
    <script src="<?php echo e(asset('assets/plugins/bootstrap/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>

    <!-- INPUT MASK JS-->
    <script src="<?php echo e(asset('assets/plugins/input-mask/jquery.mask.min.js')); ?>"></script>

    <!-- SIDE-MENU JS -->
    <script src="<?php echo e(asset('assets/plugins/sidemenu/sidemenu.js')); ?>"></script>

    <!-- SIDEBAR JS -->
    <script src="<?php echo e(asset('assets/plugins/sidebar/sidebar.js')); ?>"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="<?php echo e(asset('assets/plugins/p-scroll/perfect-scrollbar.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/p-scroll/pscroll.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/p-scroll/pscroll-1.js')); ?>"></script>

    <?php echo $__env->yieldContent('scripts'); ?>

    <!-- Color Theme js -->
    <script src="<?php echo e(asset('assets/js/themeColors.js')); ?>"></script>

    <!-- Sticky js -->
    <script src="<?php echo e(asset('assets/js/sticky.js')); ?>"></script>
    <!-- CONFIRM JS FOR DELETE -->
    <script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo e(asset('colorbox/jquery.colorbox.js')); ?>"></script>
    <?php echo $__env->make('layouts.components.scripts-ajax', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.components.scripts-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.components.scripts-theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>








    
<?php /**PATH /opt/lampp/htdocs/tyre_superadmin/resources/views/layouts/components/scripts.blade.php ENDPATH**/ ?>