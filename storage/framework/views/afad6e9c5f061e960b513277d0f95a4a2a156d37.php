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
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('img/favicon.png')); ?>" />
    <!-- title -->
    <title>Admin | TyreShop Qatar</title>



<?php echo $__env->make('layouts.components.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<style>
.zoom:hover {
-ms-transform: scale(5.0); /* IE 9 */
-webkit-transform: scale(5.0); /* Safari 3-8 */
transform: scale(5.0);
z-index: 2147483647;
}
</style>


</head>

<body class="app sidebar-mini ltr">
        <!-- global-loader -->



        <!-- global-loader closed -->

        <!-- page -->
        <div class="page">
            <div class="page-main">





                    <!--app-content open-->
                    <div class="main-content mt-0">
                        <div class="side-app">

                            <!-- container -->
                            <div class="main-container container-fluid">

                                <?php if($errors->any()): ?>
                                    <div class="alert alert-danger">
                                        <ul>
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div><br />
                                <?php endif; ?>

                                <?php echo $__env->yieldContent('content'); ?>

                            </div>
                            <!-- container-closed -->
                        </div>
                    </div>
                    <!--app-content closed-->
                </div>
                <!-- page-main closed -->



            <?php echo $__env->make('layouts.components.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->yieldContent('modal'); ?>



        </div>
        <!-- page -->

        <?php echo $__env->make('layouts.components.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </body>

</html>
<?php /**PATH /opt/lampp/htdocs/tyre_shopadmin/resources/views/layouts/app-modal.blade.php ENDPATH**/ ?>