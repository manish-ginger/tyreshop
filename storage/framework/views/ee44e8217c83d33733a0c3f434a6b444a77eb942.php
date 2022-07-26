<?php
    use App\Models\Customervehicle;
    use App\Models\Customer;
    use App\Models\VehicleCategory;
    use App\Models\VehicleBrand;
    use App\Models\VehicleModel;
    use App\Models\Package;
    use App\Models\Feature;
    use App\Models\Coupon;
?>


<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 1px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>


<h3 class="card-title">Booking Report <?php echo e($file_name); ?> </h3>
<table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
    <thead>
    <tr>
        <th class="wd-5p border-bottom-0">SL</th>
        <th class="wd-40p border-bottom-0">Customer</th>
        <th class="wd-40p border-bottom-0">Number</th>
        <th class="wd-40p border-bottom-0">Category</th>
        <th class="wd-40p border-bottom-0">Brand</th>
        <th class="wd-40p border-bottom-0">Model</th>
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
                         }
                ?>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH /opt/lampp/htdocs/carwash_shopadmin/resources/views/content/report/pdf_booking.blade.php ENDPATH**/ ?>