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
    <script type="text/javascript">
        $('.confirm_delete').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            var url = $(this).attr('href');
            event.preventDefault();
            swal({
                    title: `Are you sure ?`,
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = url;
                    }
                });
        });
    </script>


<script>
$(".layout-setting").click(function(){
if ($("body").hasClass("dark-mode")) {
localStorage.setItem("dark_mode", "yes");
}
else
{
localStorage.setItem("dark_mode", "no");
}
});

var body_dark_mode = localStorage.getItem("dark_mode");
if(body_dark_mode=='yes')
{
    $('#global-loader').css("background-color","#000000");
    $('body').addClass('dark-mode');
}
else
{
    $('body').removeClass('dark-mode');
}
</script>


<?php /**PATH /opt/lampp/htdocs/carwash_shopadmin/resources/views/layouts/components/scripts.blade.php ENDPATH**/ ?>