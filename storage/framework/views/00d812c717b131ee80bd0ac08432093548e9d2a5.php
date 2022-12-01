<?php $__env->startSection('styles'); ?>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- PAGE-HEADER -->
<div class="page-header">
                            <h1 class="page-title"></h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo e(url('admin')); ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Reset Password</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- ROW-1 -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                                <div class="row">
                                    <div>
                                    <div class="container-login100">
                                        <div class="wrap-login100 p-6">
                                            <form class="login100-form validate-form" method="POST" action="<?php echo e(route('login.resetadmin')); ?>">
                                            <?php echo csrf_field(); ?>
                                                <span class="login100-form-title pb-5">
                                                    <i class="dropdown-icon fe   fe-lock"></i>
                                                    Reset Password
                                                </span>
                                                <div class="panel panel-primary">
                                                    <div class="tab-menu-heading">
                                                        <div class="tabs-menu1">
                                                            <!-- Tabs -->
                                                        </div>
                                                    </div>
                                                                <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                                        <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                                    </a>
                                                                    <input class="input100 form-control" type="password" placeholder="Enter current password" name="password" id="password"  required>
                                                                </div>

                                                                <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                                        <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                                    </a>
                                                                    <input class="input100 form-control" type="password" placeholder="Enter new password" name="new_pw" id="new_password"  required>
                                                                </div>

                                                                </div>
                                                                <div class="text-end pt-4">
                                                                    <!--<p class="mb-0"><a href="<?php echo e(url('forgot-password')); ?>" class="text-primary ms-1">Forgot Password?</a></p>-->
                                                                </div>
                                                                <div class="container-login100-form-btn">
                                                                    <button class="login100-form-btn btn-primary" name="submit" value="submit">Reset</button>
                                                                    <!-- <a href="<?php echo e(url('login')); ?>" >
                                                                            Login
                                                                    </a> -->
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                    <!-- CONTAINER CLOSED -->
                                </div>

                                </div>
                            </div>
                        </div>
                        <!-- ROW-1 END -->

                        <!-- ROW-2 -->

                        <!-- ROW-2 END -->





        <?php $__env->stopSection(); ?>

    <?php $__env->startSection('scripts'); ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>

        <?php if(session()->has('message')): ?>
        swal("<?php echo e(session('message')); ?>");
        <?php endif; ?>

    </script>


    <!-- SPARKLINE JS-->
    <script src="<?php echo e(asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')); ?>"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="<?php echo e(asset('assets/plugins/circle-progress/circle-progress.min.js')); ?>"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="<?php echo e(asset('assets/plugins/select2/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/select2.js')); ?>"></script>

    <!-- PIETY CHART JS-->
    <script src="<?php echo e(asset('assets/plugins/peitychart/jquery.peity.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/peitychart/peitychart.init.js')); ?>"></script>

    <!-- INTERNAL CHARTJS CHART JS-->
    <script src="<?php echo e(asset('assets/plugins/chart/Chart.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/chart/rounded-barchart.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/chart/utils.js')); ?>"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="<?php echo e(asset('assets/plugins/select2/select2.full.min.js')); ?>"></script>

    <!-- INTERNAL Data tables js-->
    <script src="<?php echo e(asset('assets/plugins/datatable/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/datatable/dataTables.responsive.min.js')); ?>"></script>

    <!-- INTERNAL APEXCHART JS -->
    <script src="<?php echo e(asset('assets/js/apexcharts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/apexchart/irregular-data-series.js')); ?>"></script>

    <!-- C3 CHART JS -->
    <script src="<?php echo e(asset('assets/plugins/charts-c3/d3.v5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/charts-c3/c3-chart.js')); ?>"></script>

    <!-- CHART-DONUT JS -->
    <script src="<?php echo e(asset('assets/js/charts.js')); ?>"></script>

    <!-- INTERNAL Flot JS -->
    <script src="<?php echo e(asset('assets/plugins/flot/jquery.flot.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/flot/jquery.flot.fillbetween.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/flot/chart.flot.sampledata.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/flot/dashboard.sampledata.js')); ?>"></script>

    <!-- INTERNAL Vector js -->
    <script src="<?php echo e(asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>

    <!-- INTERNAL INDEX JS -->
    <script src="<?php echo e(asset('assets/js/index.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/index1.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/plugins/show-password/show-password.min.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tyre_shopadmin/resources/views/content/reset/index.blade.php ENDPATH**/ ?>