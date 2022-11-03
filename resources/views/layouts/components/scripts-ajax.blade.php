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
