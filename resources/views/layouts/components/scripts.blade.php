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
    <script src="{{asset('colorbox/jquery.colorbox.js')}}"></script>

    @include('layouts.components.scripts-ajax')
    @include('layouts.components.scripts-modal')
    @include('layouts.components.scripts-theme')










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

