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
