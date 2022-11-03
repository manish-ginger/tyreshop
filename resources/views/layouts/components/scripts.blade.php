    <!-- BACK-TO-TOP -->
    <!--<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>-->

    <!-- JQUERY JS -->
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- INPUT MASK JS-->
    <script src="{{asset('assets/plugins/input-mask/jquery.mask.min.js')}}"></script>

    <!-- SIDE-MENU JS -->
    <script src="{{asset('assets/plugins/sidemenu/sidemenu.js')}}"></script>

    <!-- SIDEBAR JS -->
    <script src="{{asset('assets/plugins/sidebar/sidebar.js')}}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{asset('assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('assets/plugins/p-scroll/pscroll.js')}}"></script>
    <script src="{{asset('assets/plugins/p-scroll/pscroll-1.js')}}"></script>

    @yield('scripts')

    <!-- Color Theme js -->
    <script src="{{asset('assets/js/themeColors.js')}}"></script>

    <!-- Sticky js -->
    <script src="{{asset('assets/js/sticky.js')}}"></script>

    <!-- CONFIRM JS FOR DELETE -->
    <script src="{{asset('assets/js/custom.js')}}"></script>
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
            if (actionUrl.indexOf('save-messages') !== -1) {
                $('#basic-datatable').load(window.location.href + ' #basic-datatable' );
            }
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
            if (actionUrl.indexOf('save-messages') !== -1) {
                $('#basic-datatable').load(window.location.href + ' #basic-datatable' );
            }
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

        $('.table-responsive').on('click', '.confirm_delete', function(){

            // $('.confirm_delete').click(function(event) {
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
                        $('#basic-datatable').load(window.location.href + ' #basic-datatable' );
                        // $('#'+urlPart).remove();
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


    <script src="{{asset('colorbox/jquery.colorbox.js')}}"></script>
    <script>
        // // Get the modal
        // var modal = document.getElementById("show_dailog");
        //
        // // When the user clicks anywhere outside of the modal, close it
        // window.onclick = function(event) {
        //     if (event.target == modal) {
        //         // $('#basic-datatable').load(window.location.href + ' #basic-datatable' );
        //         $('.show_content').empty();
        //         modal.style.display = "none";
        //     }
        // }
        //
        // $(document).keydown(function(event) {
        //     if (event.keyCode == 27) {
        //         $('.show_content').empty();
        //         $('#show_dailog').hide();
        //     }
        // });
        //
        // function form_box(e,this_form_box){
        //     e.preventDefault();
        //     var seclastUrl = '';
        //     var split = '';
        //     var href = this_form_box.attr('href');
        //
        //     if (href.indexOf('edit-') !== -1) {
        //         split = href.split("/");
        //         seclastUrl = split[split.length - 2];
        //     }
        //
        //
        //     var lastUrl = href.substring(href.lastIndexOf('/') + 1);
        //     var fetchUrl='';
        //     if (href.indexOf('edit-') !== -1) {
        //         fetchUrl=seclastUrl+'/'+lastUrl;
        //     }
        //     else{
        //         fetchUrl=seclastUrl+lastUrl;
        //     }
        //     if(fetchUrl!=''){
        //         $('.show_content').load(fetchUrl, function(responseTxt, statusTxt, xhr){
        //             if(statusTxt == "success"){
        //                 modal.style.display = "block";
        //             }
        //         });
        //     }
        // }
        //
        // var this_form_box;
        // $('.table-responsive').on('click', '.form_box', function(e){
        //     this_form_box = $(this);
        //     form_box(e,this_form_box);
        // });
        //
        // $(".form_box").click(function(e){
        //     this_form_box = $(this);
        //     form_box(e,this_form_box);
        // });



        $(document).ready(function(){
            $('.table-responsive').on('click', '.form_box', function(){
                $(this).colorbox({iframe:true, width:"65%", height:"65%",speed:300});
            });
            $('.form_box').colorbox({iframe:true, width:"65%", height:"65%",speed:300,opacity:'0.5'});
        });

        $(document).bind('cbox_open', function(){
            $('#cboxContent').css("background-color", "#000");
            $('#cboxContent').css("opacity", "0.5");
        });

        $(document).bind('cbox_complete', function(){
            $('#cboxContent').css("opacity", "1");
        });

        $(document).bind('cbox_cleanup', function(){
            $('#basic-datatable').load(window.location.href + ' #basic-datatable' );
        });

    </script>
    <script>
        $('.table-responsive').on('submit', '#submitAjaxAdd', function(e){
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
            if (actionUrl.indexOf('save-messages') !== -1) {
                $('#basic-datatable').load(window.location.href + ' #basic-datatable' );
            }
        });

        $('.table-responsive').on('submit', '#submitAjaxUpdate', function(e){
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
            if (actionUrl.indexOf('save-messages') !== -1) {
                $('#basic-datatable').load(window.location.href + ' #basic-datatable' );
            }
        });

        $('.table-responsive').on('submit', '.AjaxUpdateForms', function(e){
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
        })
        </script>
{{--        <script>--}}
{{--            $("#form_report_ajax").submit(function(e) {--}}
{{--                e.preventDefault(); // avoid to execute the actual submit of the form.--}}
{{--                var form = $(this);--}}
{{--                var actionUrl = form.attr('action');--}}
{{--                var data_form=new FormData(this);--}}

{{--                $.ajax({--}}
{{--                    type: "POST",--}}
{{--                    url: actionUrl,--}}
{{--                    data: data_form,--}}
{{--                    processData: false,--}}
{{--                    contentType: false,--}}
{{--                    success: function(data) {--}}
{{--                        $('.report_ajax_content').html(data);--}}
{{--                        // $(".jumps-prevent").remove();--}}
{{--                    }--}}
{{--                });--}}
{{--            })--}}
{{--        </script>--}}

