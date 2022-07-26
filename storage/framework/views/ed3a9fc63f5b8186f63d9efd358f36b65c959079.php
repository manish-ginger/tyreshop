<?php
    use App\Models\Feature;
?>

<table>
    <thead>
    <tr>
        <th class="wd-5p border-bottom-0">SL</th>
        <th class="wd-40p border-bottom-0">Vehicle Number</th>
        <th class="wd-40p border-bottom-0">Status</th>
        <th class="wd-40p border-bottom-0">Service</th>
        <th class="wd-40p border-bottom-0">Time</th>
        <th class="wd-40p border-bottom-0">Date</th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td><?php echo e($row->vehicle_number); ?></td>
            <td>
                <?php if($row->status==0): ?> Waiting <?php endif; ?>
                <?php if($row->status==1): ?> Vehicle Received <?php endif; ?>
                <?php if($row->status==2): ?> Processing <?php endif; ?>
                <?php if($row->status==3): ?> Finished <?php endif; ?>
            </td>
            <td>
                <?php $data = Feature::where('id',$row->service_id)->get();
                                    if(isset($data[0]->feature_name)){echo $data[0]->feature_name;}
                ?>
            </td>
            <td><?php echo e($row->time); ?></td>
            <td><?php echo e($row->date); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH /opt/lampp/htdocs/carwash_shopadmin/resources/views/content/servicerecord/pdf.blade.php ENDPATH**/ ?>