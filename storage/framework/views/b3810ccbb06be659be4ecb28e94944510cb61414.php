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
<?php /**PATH /opt/lampp/htdocs/tyre_shopadmin/resources/views/layouts/components/scripts-theme.blade.php ENDPATH**/ ?>