<?php $__env->startSection('styles'); ?>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Dashboard</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xl-3">
                    <a href="<?php echo e(route('banner')); ?>">
                        <div class="card overflow-hidden bg-success img-card box-success-shadow">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="mt-2 text-white">
                                        <h6 class="">Banner</h6>
                                        <h2 class="mb-0 number-font"><?php echo e($bannerCount); ?></h2>
                                    </div>
                                    <div class="ms-auto">
                                        <i class="lnr lnr-align-justify fs-30 text-white mt-4"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xl-3">
                    <a href="<?php echo e(route('shop')); ?>">
                        <div class="card overflow-hidden bg-success img-card box-success-shadow">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="mt-2 text-white">
                                        <h6 class="">Shops</h6>
                                        <h2 class="mb-0 number-font"><?php echo e($shopCount); ?></h2>
                                    </div>
                                    <div class="ms-auto">
                                        <i class="lnr lnr-box fs-30 text-white mt-4"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xl-3">
                    <a href="<?php echo e(route('vehicle')); ?>">
                        <div class="card overflow-hidden bg-danger img-card box-info-shadow">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="mt-2 text-white">
                                        <h6 class="">Vehicles</h6>
                                        <h2 class="mb-0 number-font"><?php echo e($vehicleCount); ?></h2>
                                    </div>
                                    <div class="ms-auto">
                                        <i class=" lnr lnr-car fs-30 text-white mt-4"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xl-3">
                    <a href="<?php echo e(route('vehiclecategory')); ?>">
                        <div class="card overflow-hidden bg-danger img-card box-info-shadow">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="mt-2 text-white">
                                        <h6 class="">Vehicles Category</h6>
                                        <h2 class="mb-0 number-font"><?php echo e($vehicleCategoryCount); ?></h2>
                                    </div>
                                    <div class="ms-auto">
                                        <i class=" lnr lnr-car fs-30 text-white mt-4"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xl-3">
                    <a href="<?php echo e(route('washingtype')); ?>">
                        <div class="card overflow-hidden bg-danger img-card box-info-shadow">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="mt-2 text-white">
                                        <h6 class="">Washing Type</h6>
                                        <h2 class="mb-0 number-font"><?php echo e($washingTypeCount); ?></h2>
                                    </div>
                                    <div class="ms-auto">
                                        <i class="fe fe-droplet fs-40 text-white mt-4"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>




            </div>
        </div>
    </div>
    <!-- ROW-1 END -->

    <!-- ROW-2 -->

    <!-- ROW-2 END -->





<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/carwash_superadmin/resources/views/content/dashboard/index.blade.php ENDPATH**/ ?>