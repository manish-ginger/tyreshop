<?php
use App\Models\Customervehicle;
use App\Models\Customer;
use App\Models\VehicleCategory;
use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use App\Models\Package;
use App\Models\Feature;
use App\Models\Coupon;
use Carbon\Carbon;

$actual_price_sum=0;
?>


        <?php $__env->startSection('styles'); ?>

        <?php $__env->stopSection(); ?>

        <?php $__env->startSection('content'); ?>

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <h1 class="page-title">Report</h1>
                                <div>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">Report</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                                        <form action="<?php echo e(route('report.store')); ?>" method="post"  accept-charset="utf-8" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>

                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                                        <thead>
                                                        <tr>
                                                            <th class="wd-40p border-bottom-0">From</th>
                                                            <th class="wd-40p border-bottom-0">To</th>
                                                            <th class="wd-40p border-bottom-0">Brand</th>
                                                            <th class="wd-40p border-bottom-0">Customer Name</th>
                                                            <th class="wd-15p border-bottom-0">Vehicle Number</th>
                                                            <th class="wd-15p border-bottom-0">Coupon</th>
                                                            <th class="wd-15p border-bottom-0">Package</th>
                                                            <th class="wd-15p border-bottom-0">Booking Type</th>
                                                            <th class="wd-15p border-bottom-0">Booking Status</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                            <tr>

                                                                <td>
                                                                    <input type="date" name="from" class="form-control" placeholder="From" value="<?php if($show_empty==1): ?><?php echo e($request->from); ?><?php endif; ?>">
                                                                </td>

                                                                <td>
                                                                    <input type="date" name="to" class="form-control" placeholder="To" value="<?php if($show_empty==1): ?><?php echo e($request->to); ?><?php endif; ?>">
                                                                </td>

                                                                <td>
                                                                    <select name="vehicle_category" class="form-control">
                                                                        <option <?php if(($show_empty!=1)||($request->vehicle_category=='')): ?> selected <?php endif; ?> value="">Choose Vehicle category</option>
                                                                        <?php $__currentLoopData = $vehicle_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($vehicle_category->id); ?>" <?php if(($show_empty==1)&&($vehicle_category->id==$request->vehicle_category)): ?> selected <?php endif; ?>><?php echo e($vehicle_category->name); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </td>

                                                                <td>
                                                                    <select name="customer_id" class="form-control">
                                                                        <option <?php if(($show_empty!=1)||($request->customer_id=='')): ?> selected <?php endif; ?> value="">Choose Customer</option>
                                                                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($customer->id); ?>" <?php if(($show_empty==1)&&($customer->id==$request->customer_id)): ?> selected <?php endif; ?>><?php echo e($customer->name); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </td>

                                                                <td>
                                                                    <select name="vehicle_number" class="form-control" id="vehicle_number">
                                                                        <option <?php if(($show_empty!=1)||($request->vehicle_number=='')): ?> selected <?php endif; ?> value="">Choose Vehicle Number</option>
                                                                        <?php $__currentLoopData = $customervehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customervehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($customervehicle->vehicle_number); ?>" <?php if(($show_empty==1)&&($customervehicle->vehicle_number==$request->vehicle_number)): ?> selected <?php endif; ?>><?php echo e($customervehicle->vehicle_number); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </td>

                                                                <td>
                                                                    <select name="coupon" class="form-control">
                                                                        <option <?php if(($show_empty!=1)||($request->coupon=='')): ?> selected <?php endif; ?> value="">Choose Coupon</option>
                                                                        <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($coupon->id); ?>" <?php if(($show_empty==1)&&($coupon->id==$request->coupon)): ?> selected <?php endif; ?>><?php echo e($coupon->code); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </td>

                                                                <td>
                                                                    <select name="package" class="form-control">
                                                                        <option <?php if(($show_empty!=1)||($request->package=='')): ?> selected <?php endif; ?> value="">Choose Package</option>
                                                                        <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($package->id); ?>" <?php if(($show_empty==1)&&($package->id==$request->package)): ?> selected <?php endif; ?>><?php echo e($package->title); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </td>

                                                                <td>
                                                                    <select name="booking_type" class="form-control">
                                                                        <option <?php if(($show_empty!=1)||($request->booking_type=='')): ?> selected <?php endif; ?> value="">Choose Booking Type</option>
                                                                        <option value="0" <?php if(($show_empty==1)&&($request->booking_type==0)): ?> selected <?php endif; ?>>Pre Booked</option>
                                                                        <option value="1" <?php if(($show_empty==1)&&($request->booking_type==1)): ?> selected <?php endif; ?>>Direct</option>
                                                                    </select>
                                                                </td>


                                                                <td>
                                                                    <select name="booking_status" class="form-control">
                                                                        <option <?php if(($show_empty!=1)||($request->booking_status=='')): ?> selected <?php endif; ?> value="">Choose Booking Status</option>
                                                                            <option value="0" <?php if(($show_empty==1)&&($request->booking_status==0)): ?> selected <?php endif; ?>>Waiting</option>
                                                                            <option value="1" <?php if(($show_empty==1)&&($request->booking_status==1)): ?> selected <?php endif; ?>>Vehicle Received</option>
                                                                            <option value="2" <?php if(($show_empty==1)&&($request->booking_status==2)): ?> selected <?php endif; ?>>Processing</option>
                                                                            <option value="3" <?php if(($show_empty==1)&&($request->booking_status==3)): ?> selected <?php endif; ?>>Finished</option>
                                                                    </select>
                                                                </td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <button class="btn btn-success" style="float:right;">Create Report</button> &nbsp; &nbsp;
                                        </form>
                                    </div>
                                </div>
                            </div>

                <?php if(isset($rows_services)): ?>
                    <?php if(count($rows_services)>0): ?>
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Booking Report</h3>
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo e(route("servicereport.excelExport")); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="type" value="booking">
                                        <input type="hidden" name="from" value="<?php echo e($request->from); ?>">
                                        <input type="hidden" name="to" value="<?php echo e($request->to); ?>">
                                        <input type="hidden" name="vehicle_category" value="<?php echo e($request->vehicle_category); ?>">
                                        <input type="hidden" name="customer_id" value="<?php echo e($request->customer_id); ?>">
                                        <input type="hidden" name="vehicle_number" value="<?php echo e($request->vehicle_number); ?>">
                                        <input type="hidden" name="booking_status" value="<?php echo e($request->booking_status); ?>">
                                        <input type="hidden" name="booking_type" value="<?php echo e($request->booking_type); ?>">
                                        <input type="hidden" name="coupon" value="<?php echo e($request->coupon); ?>">
                                        <input type="hidden" name="package" value="<?php echo e($request->package); ?>">

                                        <button class="btn btn-primary" style="float:right;">Export Excel</button>
                                    </form>

                                    <form action="<?php echo e(route("servicereport.createPDF")); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="from" value="<?php echo e($request->from); ?>">
                                        <input type="hidden" name="to" value="<?php echo e($request->to); ?>">
                                        <input type="hidden" name="vehicle_category" value="<?php echo e($request->vehicle_category); ?>">
                                        <input type="hidden" name="customer_id" value="<?php echo e($request->customer_id); ?>">
                                        <input type="hidden" name="vehicle_number" value="<?php echo e($request->vehicle_number); ?>">
                                        <input type="hidden" name="booking_status" value="<?php echo e($request->booking_status); ?>">
                                        <input type="hidden" name="booking_type" value="<?php echo e($request->booking_type); ?>">
                                        <input type="hidden" name="coupon" value="<?php echo e($request->coupon); ?>">
                                        <input type="hidden" name="package" value="<?php echo e($request->package); ?>">

                                        <button class="btn btn-warning" style="float:right;">Export PDF</button>
                                    </form>


                                    <br><br><br>
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                            <thead>
                                            <tr>
                                                <th class="wd-5p border-bottom-0">SL</th>
                                                <th class="wd-40p border-bottom-0">Customer</th>
                                                <th class="wd-40p border-bottom-0">Number</th>
                                                <th class="wd-40p border-bottom-0">Brand</th>
                                                <th class="wd-40p border-bottom-0">Model</th>
                                                <th class="wd-40p border-bottom-0">Size</th>
                                                <th class="wd-40p border-bottom-0">Current Odometer</th>
                                                <th class="wd-40p border-bottom-0">Next Odometer</th>
                                                <th class="wd-40p border-bottom-0">Status</th>
                                                <th class="wd-40p border-bottom-0">Type</th>
                                                <th class="wd-40p border-bottom-0">Time</th>
                                                <th class="wd-40p border-bottom-0">Date</th>
                                                <th class="wd-40p border-bottom-0">Coupon</th>
                                                <th class="wd-40p border-bottom-0">Service</th>
                                                <th class="wd-40p border-bottom-0">Price</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $rows_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $customervehicle_data=Customervehicle::where('vehicle_number','=',$row->vehicle_number)->get();
                                                ?>
                                                <tr>
                                                    <td><?php echo e($loop->iteration); ?></td>
                                                    <td>
                                                        <?php
                                                            $data =Customer::where('id',$customervehicle_data[0]->customer_id)->get();
                                                                 if(isset($data[0]->name)){echo $data[0]->name; }
                                                        ?>
                                                    </td>
                                                    <td><?php echo e($row->vehicle_number); ?></td>
                                                    <td>
                                                        <?php
                                                            $data =VehicleCategory::where('id',$customervehicle_data[0]->vehicle_category)->get();
                                                                 if(isset($data[0]->name)){echo $data[0]->name; }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $data =VehicleBrand::where('id',$customervehicle_data[0]->brand)->get();
                                                                 if(isset($data[0]->name)){echo $data[0]->name; }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $data =VehicleModel::where('id',$customervehicle_data[0]->model)->get();
                                                                 if(isset($data[0]->name)){echo $data[0]->name; }
                                                        ?>
                                                    </td>
                                                    <td><?php echo e($row->curr_odo_reading); ?></td>
                                                    <td><?php echo e($row->next_odo_reading); ?></td>
                                                    <td>
                                                        <?php if($row->status==0): ?> Waiting <?php endif; ?>
                                                        <?php if($row->status==1): ?> Vehicle Received <?php endif; ?>
                                                        <?php if($row->status==2): ?> Processing <?php endif; ?>
                                                        <?php if($row->status==3): ?> Finished <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if($row->booking_type==0): ?> Pre Booked <?php endif; ?>
                                                        <?php if($row->booking_type==1): ?> Direct <?php endif; ?>
                                                    </td>
                                                    <td><?php echo e($row->time); ?></td>
                                                    <td><?php echo e($row->date); ?></td>
                                                    <td>
                                                        <?php
                                                            $data =Feature::where('id',$row->service_id)->get();
                                                                 if(isset($data[0]->coupon)){
                                                                     $coupon_data =Coupon::where('id',$data[0]->coupon)->get();
                                                                     if(isset($coupon_data[0]->code)){echo $coupon_data[0]->code; }
                                                                  }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $data =Feature::where('id',$row->service_id)->get();
                                                                 if(isset($data[0]->feature_name)){echo $data[0]->feature_name; }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $data =Feature::where('id',$row->service_id)->get();
                                                                 if(isset($data[0]->actual_price)){echo $data[0]->discounted_price;
                                                                 $actual_price_sum+=$data[0]->discounted_price;
                                                                 }
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                        <span style="float: right;"><b>Total Invoice Actual Amount : <?php echo e($actual_price_sum); ?></b></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if((count($rows_services))==0&&($show_empty==1)): ?>
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Empty Service Record</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                 <?php endif; ?>


                            <?php if(isset($rows_packages)): ?>
                                <?php if(count($rows_packages)>0): ?>
                                    <div class="row row-sm">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Package Report</h3>
                                                </div>
                                                <div class="card-body">

                                                    <form action="<?php echo e(route("packagereport.excelExport")); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="type" value="package">
                                                        <input type="hidden" name="from" value="<?php echo e($request->from); ?>">
                                                        <input type="hidden" name="to" value="<?php echo e($request->to); ?>">
                                                        <input type="hidden" name="vehicle_category" value="<?php echo e($request->vehicle_category); ?>">
                                                        <input type="hidden" name="customer_id" value="<?php echo e($request->customer_id); ?>">
                                                        <input type="hidden" name="vehicle_number" value="<?php echo e($request->vehicle_number); ?>">
                                                        <input type="hidden" name="booking_status" value="<?php echo e($request->booking_status); ?>">
                                                        <input type="hidden" name="coupon" value="<?php echo e($request->coupon); ?>">
                                                        <input type="hidden" name="package" value="<?php echo e($request->package); ?>">

                                                        <button class="btn btn-primary" style="float:right;">Export Excel</button>
                                                    </form>

                                                    <form action="<?php echo e(route("packagereport.createPDF")); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="from" value="<?php echo e($request->from); ?>">
                                                        <input type="hidden" name="to" value="<?php echo e($request->to); ?>">
                                                        <input type="hidden" name="vehicle_category" value="<?php echo e($request->vehicle_category); ?>">
                                                        <input type="hidden" name="customer_id" value="<?php echo e($request->customer_id); ?>">
                                                        <input type="hidden" name="vehicle_number" value="<?php echo e($request->vehicle_number); ?>">
                                                        <input type="hidden" name="booking_status" value="<?php echo e($request->booking_status); ?>">
                                                        <input type="hidden" name="coupon" value="<?php echo e($request->coupon); ?>">
                                                        <input type="hidden" name="package" value="<?php echo e($request->package); ?>">

                                                        <button class="btn btn-warning" style="float:right;">Export PDF</button>
                                                    </form>
                                                    <br><br><br>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                                            <thead>
                                                            <tr>
                                                                <th class="wd-5p border-bottom-0">SL</th>
                                                                <th class="wd-40p border-bottom-0">Customer</th>
                                                                <th class="wd-40p border-bottom-0">Name</th>
                                                                <th class="wd-40p border-bottom-0">Validity</th>
                                                                <th class="wd-40p border-bottom-0">Date</th>
                                                                <th class="wd-40p border-bottom-0">Expiry Date</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php $__currentLoopData = $rows_packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    $customervehicle_data=Customervehicle::where('customer_id','=',$row->customer_id)->get();
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo e($loop->iteration); ?></td>
                                                                    <td>
                                                                        <?php
                                                                            $data =Customer::where('id',$customervehicle_data[0]->customer_id)->get();
                                                                                 if(isset($data[0]->name)){echo $data[0]->name; }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                            $data =Package::where('id',$row->package_id)->get();
                                                                                 if(isset($data[0]->title)){echo $data[0]->title;}
                                                                        ?>
                                                                    </td>
                                                                    <td><?php echo e($row->validity); ?></td>
                                                                    <td><?php echo e($row->created_at); ?></td>
                                                                    <?php
                                                                        $package_purchase_date=$row->created_at;
                                                                        $package_validity_date = Carbon::parse($package_purchase_date)->addDays($row->validity);
                                                                    ?>
                                                                    <td><?php echo e($package_validity_date); ?></td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if((count($rows_packages))==0&&($show_empty==1)): ?>
                                    <div class="row row-sm">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Empty Package Record</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>


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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tyre_shopadmin/resources/views/content/report/create.blade.php ENDPATH**/ ?>