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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $("#submitAjaxAdd").submit(function(e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = $(this);
            var actionUrl = form.attr('action');
            var data_form=new FormData(this);
            $.ajax({
                type: "POST",
                url: actionUrl,
                data: data_form,
                processData: false,
                contentType: false,
                success: function(data)
                {
                    form[0].reset();
                    if(data==1){
                        $('.alert_show').html('');
                        toastr.success('Added Successfully');
                        $(".alert_show").html('<div class="alert alert-info" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>Added Successfully</div>');
                        setTimeout(function(){$('.alert_show').html('');}, 3000);

                    }
                    else if(data==2){
                        $('.alert_show').html('');
                        toastr.error('Field values already exist or taken! Adding Failed','Error');
                        $(".alert_show").html('<div class="alert alert-info" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>Field values already exist or taken! Adding Failed</div>');

                    }
                    else if(data==3){
                        $('.alert_show').html('');
                        toastr.error('No slots Available.Choose Special Request as booking type. Adding Failed','Error');
                        $(".alert_show").html('<div class="alert alert-info" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>No slots Available.Choose Special Request as booking type. Adding Failed</div>');

                    }
                    else{
                        $('.alert_show').html('');
                        toastr.error('Adding Failed','Error');
                        $(".alert_show").html('<div class="alert alert-info" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>Adding Failed</div>');

                    }
                },
                error: function(data){
                    var response = JSON.parse(data.responseText);
                    var errorString = '<ul>';
                    $.each( response.errors, function( key, value) {
                        errorString += '<li>' + value + '</li>';
                    });
                    errorString += '</ul>';
                    $('.alert_show').html('');
                    toastr.error(errorString,'Error');
                    $(".alert_show").html('<div class="alert alert-info" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>'+errorString+'</div>');

                }
            });
        });

        $("#submitAjaxUpdate").submit(function(e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = $(this);
            var actionUrl = form.attr('action');
            var data_form=new FormData(this);
            $.ajax({
                type: "POST",
                url: actionUrl,
                data: data_form,
                processData: false,
                contentType: false,
                success: function(data)
                {
                    if(data==1){
                        $('.alert_show').html('');
                        toastr.success('Updated Successfully');
                        $(".alert_show").html('<div class="alert alert-info" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>Updated Successfully</div>');
                        setTimeout(function(){$('.alert_show').html('');}, 3000);

                    }
                    else if(data==2){
                        $('.alert_show').html('');
                        toastr.error('Field values already exist or taken! Updating Failed','Error');
                        $(".alert_show").html('<div class="alert alert-info" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>Field values already exist or taken! Updating Failed</div>');

                    }
                    else if(data==3){
                        $('.alert_show').html('');
                        toastr.error('No slots Available.Choose Special Request as booking type. Updating Failed','Error');
                        $(".alert_show").html('<div class="alert alert-info" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>No slots Available.Choose Special Request as booking type. Updating Failed</div>');

                    }
                    else{
                        $('.alert_show').html('');
                        toastr.error('Updating Failed','Error');
                        $(".alert_show").html('<div class="alert alert-info" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>Update Failed</div>');

                    }

                },
                error: function(data){
                    var response = JSON.parse(data.responseText);
                    var errorString = '<ul>';
                    $.each( response.errors, function( key, value) {
                        errorString += '<li>' + value + '</li>';
                    });
                    errorString += '</ul>';
                    $('.alert_show').html('');
                    toastr.error(errorString,'Error');
                    $(".alert_show").html('<div class="alert alert-info" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>'+errorString+'</div>');

                }
            });
        });

        $(".AjaxUpdateForms").submit(function(e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = $(this);
            var actionUrl = form.attr('action');
            var data_form=new FormData(this);
            $.ajax({
                type: "POST",
                url: actionUrl,
                data: data_form,
                processData: false,
                contentType: false,
                success: function(data)
                {
                    if(data==1){
                        $('.alert_show').html('');
                        toastr.success('Updated Successfully');
                        $(".alert_show").html('<div class="alert alert-info" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>Updated Successfully</div>');
                        setTimeout(function(){$('.alert_show').html('');}, 3000);

                    }
                    else if(data==2){
                        $('.alert_show').html('');
                        toastr.error('Field values already exist or taken! Updating Failed','Error');
                        $(".alert_show").html('<div class="alert alert-info" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>Field values already exist or taken! Updating Failed</div>');

                    }
                    else{
                        $('.alert_show').html('');
                        toastr.error('Updating Failed','Error');
                        $(".alert_show").html('<div class="alert alert-info" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>Updating Failed</div>');

                    }

                },
                error: function(data){
                    var response = JSON.parse(data.responseText);
                    var errorString = '<ul>';
                    $.each( response.errors, function( key, value) {
                        errorString += '<li>' + value + '</li>';
                    });
                    errorString += '</ul>';
                    $('.alert_show').html('');
                    toastr.error(errorString,'Error');
                    $(".alert_show").html('<div class="alert alert-info" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>'+errorString+'</div>');

                }
            });
        });

        $('.confirm_delete').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            var url = $(this).attr('href');
            var urlPart = $(this).attr('data-id');

            event.preventDefault();
            swal({
                title: `Are you sure ?`,
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        // window.location = url;
                        deleteRow(url,urlPart);
                    }
                });
        });
        function deleteRow(url,urlPart){
            $.ajax({
                url: url,
                type: "GET",
                success: function(data){
                    if(data==1){
                        $('#'+urlPart).remove();
                        // $('#basic-datatable').DataTable().rows('#'+urlPart).remove().draw();
                        $('.alert_show').html('');
                        toastr.success('Deleted Successfully');
                        $(".alert_show").html('<div class="alert alert-info" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>Deleted Successfully</div>');
                        setTimeout(function(){$('.alert_show').html('');}, 3000);
                    }
                    else{
                        $('.alert_show').html('');
                        toastr.error('Delete Failed','Error');
                        $(".alert_show").html('<div class="alert alert-info" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>Delete Failed</div>');

                    }

                },
                error: function(data){
                    $('.alert_show').html('');
                    toastr.error('Error');
                }
            });
        }
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


<?php /**PATH /opt/lampp/htdocs/tyre_shopadmin/resources/views/layouts/components/scripts.blade.php ENDPATH**/ ?>