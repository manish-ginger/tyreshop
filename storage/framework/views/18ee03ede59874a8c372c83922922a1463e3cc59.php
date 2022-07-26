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


<h3 class="card-title">Package Report <?php echo e($file_name); ?> </h3>
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
<?php /**PATH /opt/lampp/htdocs/carwash_shopadmin/resources/views/content/report/pdf_package.blade.php ENDPATH**/ ?>