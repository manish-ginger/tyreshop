<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Tyre Numbers</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Tyre Number</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
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
                <div class="card-header">
                    <div class="card-title">Update Tyre Number</div>
                </div>
                <form action="<?php echo e(route('vehicle.update')); ?>" method="post" accept-charset="utf-8"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">

                        <input type="hidden" name="vehicleid"
                               value="<?php if(isset($vehicle->id)): ?> <?php echo e(encrypt($vehicle->id)); ?> <?php endif; ?>">

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Tyre Brand :</label>
                            <div class="col-md-9">
                                <select name="vehicle_category_id" class="form-control"  required id="category">
                                    <option selected disabled value="">Choose Tyre Brand</option>
                                    <?php $__currentLoopData = $vehicleCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>" <?php if($category->id==$vehicle->vehicle_category_id): ?>selected <?php endif; ?>><?php echo e($category->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Tyre Model :</label>
                            <div class="col-md-9">
                                <select name="vehicle_brand_id" class="form-control"  required id="brand">
                                    <option disabled value="">Choose Tyre Model</option>
                                    <?php $__currentLoopData = $vehicleBrands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($brand->id); ?>" <?php if($brand->id==$vehicle->vehicle_brand_id): ?>selected <?php endif; ?>><?php echo e($brand->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>



                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Tyre Size :</label>
                            <div class="col-md-9">
                                <select name="vehicle_model_id" class="form-control"  required id="model">
                                    <option disabled value="">Choose Tyre Size</option>
                                    <?php $__currentLoopData = $vehicleModels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($model->id); ?>" <?php if($model->id==$vehicle->vehicle_model_id): ?> <?php endif; ?>><?php echo e($model->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Width :</label>
                            <div class="col-md-9">
                                <input type="text" name="width" class="form-control"
                                    value="<?php if(isset($vehicle->width)): ?> <?php echo e($vehicle->width); ?> <?php endif; ?>">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Ratio :</label>
                            <div class="col-md-9">
                                <input type="text" name="ratio" class="form-control"
                                       value="<?php if(isset($vehicle->ratio)): ?> <?php echo e($vehicle->ratio); ?> <?php endif; ?>">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Ratio :</label>
                            <div class="col-md-9">
                                <input type="text" name="ratio" class="form-control"
                                       value="<?php if(isset($vehicle->ratio)): ?> <?php echo e($vehicle->ratio); ?> <?php endif; ?>">
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Construction :</label>
                            <div class="col-md-9">
                                <input type="text" name="construction" class="form-control"
                                       value="<?php if(isset($vehicle->construction)): ?> <?php echo e($vehicle->construction); ?> <?php endif; ?>">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Diameter :</label>
                            <div class="col-md-9">
                                <input type="text" name="diameter" class="form-control"
                                       value="<?php if(isset($vehicle->diameter)): ?> <?php echo e($vehicle->diameter); ?> <?php endif; ?>">
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Load :</label>
                            <div class="col-md-9">
                                <input type="text" name="loadrating" class="form-control"
                                       value="<?php if(isset($vehicle->loadrating)): ?> <?php echo e($vehicle->loadrating); ?> <?php endif; ?>">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Speed :</label>
                            <div class="col-md-9">
                                <input type="text" name="speed" class="form-control"
                                       value="<?php if(isset($vehicle->speed)): ?> <?php echo e($vehicle->speed); ?> <?php endif; ?>">
                            </div>
                        </div>


                        <!-- Row -->
                        <div class="row">
                            <label class="col-md-3 form-label mb-4">Description :</label>
                            <div class="col-md-9 mb-4">
                                <textarea class="content" name="desc" placeholder="Description">
                                                    <?php if(isset($vehicle->desc)): ?>
                                    <?php echo $vehicle->desc ?>
                                    <?php endif; ?>
                                                    </textarea>
                            </div>
                        </div>
                        <!--End Row-->
                        <br>
                        <br>
                        <!--Row-->
                        <br>
                        <br>

                        <?php if($vehicle->image!=''): ?>
                            <div class="row">
                                <label class="col-md-3 form-label mb-4">Icon:</label>
                                <div class="col-md-9">
                                    <div class="col-md-12">
                                        <ul class="row col-md-12">
                                            <div class="float-left col-md-4">
                                                <img src="<?php echo e('/' . $vehicle->image); ?>" class="img-responsive col-md-4" id="image_src">
                                                <button class="btn btn-icon  btn-danger" id="delete_image"><i class="fe fe-trash"></i></button>
                                                <input type="hidden" name="verify_file" id="verify_file" value="1">
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="row">
                            <label class="col-md-3 form-label mb-4"> Image :</label>
                            <div class="col-md-9">
                                <input class="" type="file" name="image" id="image_input">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Approved :</label>
                            <div class="col-md-9">
                                    <input type="checkbox" name="approved" value="1" <?php if($vehicle->approved=='1'): ?>checked <?php endif; ?>>
                            </div>
                        </div>


                    </div>
                    <div class="card-footer">
                        <!--Row-->
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9 text-end">
                                <button onclick="window.location.reload();" class="btn btn-secondary">Revert</button>
                                <button class="btn btn-success">Update Tyre Number</button>
                            </div>
                        </div>
                        <!--End Row-->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /ROW-1 CLOSED -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script>
        $(function(){
            $('#category').change(function(){
                $('#brand').find('option').remove();
                var id = $(this).val();
                $.ajax({
                    url : '<?php echo e(route( 'loadBrands' )); ?>',
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        "id": id
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function( result )
                    {
                        if (!$.trim(result)){

                            $('#brand').html('<option disabled selected>No model for this brand.  Try another brand</option>');
                        }
                        else{
                            $.each( result, function(k, v) {
                                $('#brand').append($('<option>', {value:k, text:v}));
                            });
                            // get_models();
                        }
                    },
                    error: function()
                    {
                        //handle errors
                        swal('Error');
                    }
                });
            });

            $('#brand').click(function(){
                var id = $(this).val();
                get_models(id);
            })
        });

        function get_models(id)
        {
            // alert('get_models');
            $('#model').find('option').remove();
            $.ajax({
                url : '<?php echo e(route( 'loadModels' )); ?>',
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "id": id
                },
                type: 'post',
                dataType: 'json',
                success: function( result )
                {
                    if (!$.trim(result)){

                        $('#model').html('<option disabled selected>No size for this brand and model.  Try with another brand and model</option>');
                    }
                    else{
                        $.each( result, function(k, v) {
                            $('#model').append($('<option>', {value:k, text:v}));
                        });
                    }
                },
                error: function()
                {
                    //handle errors
                    swal('Error');
                }
            });
        }
    </script>

<script>
    $(document).ready(function() {
        $("#delete_image").click(function(e) {
            e.preventDefault();
            $("#verify_file").val("0");
            $("#image_input").val("");
            $('#image_src').attr('src','');

        });
    });
</script>
    <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function (e) {
      // toggle the type attribute
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      // toggle the eye slash icon
      this.classList.toggle('fa-eye-slash');
  });
</script>
    <script>
        $(document).ready(function() {
            $(".packimg-del").click(function(e) {
                e.preventDefault();
                if (confirm("Are You Sure?")) {
                    $(this).closest("DIV").hide();
                    let idz = $(this).attr("id");
                    let url = "<?php echo e(url('delete-shopimg')); ?>";
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            "_token": "<?php echo e(csrf_token()); ?>",
                            pkmg: idz,
                        },
                        success: function(response) {
                            alert(response.message);
                        },
                    });
                }
            });
            $(".packvid-del").click(function(e) {
                e.preventDefault();
                if (confirm("Are You Sure?")) {
                    $(this).closest("DIV").hide();
                    let idz = $(this).attr("id");
                    let url = "<?php echo e(url('delete-shopvideo')); ?>";
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            "_token": "<?php echo e(csrf_token()); ?>",
                            pkvd: idz,
                        },
                        success: function(response) {
                            alert(response.message);
                        },
                    });
                }
            });
        });
    </script>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/tyre_superadmin/resources/views/content/vehicle/edit.blade.php ENDPATH**/ ?>