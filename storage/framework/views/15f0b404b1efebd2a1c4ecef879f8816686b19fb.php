<!doctype html>
<html lang="en" dir="ltr">

    <head>

        <!-- META DATA -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="TyreShop Qatar">
        <meta name="author" content="TyreShop Qatar">
        <meta name="keywords" content="TyreShop Qatar">

        <!-- title -->
        <title>Admin | TyreShop Qatar</title>

        <?php echo $__env->make('layouts.components.custom-styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </head>

    <body class="">

        <?php echo $__env->yieldContent('class'); ?>

            <!-- global-loader -->
            <div id="global-loader">
                <img src="<?php echo e(asset('assets/images/loader.svg')); ?>" class="loader-img" alt="Loader">
            </div>
            <!-- global-loader closed -->

                <!-- PAGE -->
                <div class="page">
                    <div class="">

                        <?php echo $__env->yieldContent('content'); ?>

                    </div>
                </div>
                <!-- End PAGE -->

        </div>
        <!-- BACKGROUND-IMAGE CLOSED -->

        <?php echo $__env->make('layouts.components.custom-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </body>

</html>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

    <?php if(session()->has('message')): ?>
    swal("<?php echo e(session('message')); ?>");
    <?php endif; ?>

</script>

<?php /**PATH /opt/lampp/htdocs/tyre_shopadmin/resources/views/layouts/custom-app.blade.php ENDPATH**/ ?>