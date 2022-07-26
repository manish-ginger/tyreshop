<!doctype html>
<html lang="en" dir="ltr">

    <head>

        <!-- META DATA -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="TyreShop Qatar">
        <meta name="author" content="TyreShop Qatar">
        <meta name="keywords" content="TyreShop Qatar">

        <!-- title -->
        <title>Admin | TyreShop Qatar</title>

        @include('layouts.components.custom-styles')

    </head>

    <body class="">

        @yield('class')

            <!-- global-loader -->
            <div id="global-loader">
                <img src="{{asset('assets/images/loader.svg')}}" class="loader-img" alt="Loader">
            </div>
            <!-- global-loader closed -->

                <!-- PAGE -->
                <div class="page">
                    <div class="">

                        @yield('content')

                    </div>
                </div>
                <!-- End PAGE -->

        </div>
        <!-- BACKGROUND-IMAGE CLOSED -->

        @include('layouts.components.custom-scripts')

    </body>

</html>
{{-- swal js --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

    @if (session()->has('message'))
    swal("{{ session('message') }}");
    @endif

</script>

