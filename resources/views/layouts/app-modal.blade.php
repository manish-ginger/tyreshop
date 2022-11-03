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
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.png')}}" />
    <!-- title -->
    <title>Admin | TyreShop Qatar</title>



@include('layouts.components.styles')

<style>
.zoom:hover {
-ms-transform: scale(5.0); /* IE 9 */
-webkit-transform: scale(5.0); /* Safari 3-8 */
transform: scale(5.0);
z-index: 2147483647;
}
</style>


</head>

<body class="app sidebar-mini ltr">
        <!-- global-loader -->
{{--        <div id="global-loader">--}}
{{--            <img src="{{asset('assets/images/loader.svg')}}" class="loader-img" alt="Loader">--}}
{{--        </div>--}}
        <!-- global-loader closed -->

        <!-- page -->
        <div class="page">
            <div class="page-main">

{{--                @include('layouts.components.app-header')--}}

{{--                @include('layouts.components.app-sidebar')--}}

                    <!--app-content open-->
                    <div class="main-content mt-0">
                        <div class="side-app">

                            <!-- container -->
                            <div class="main-container container-fluid">

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div><br />
                                @endif

                                @yield('content')

                            </div>
                            <!-- container-closed -->
                        </div>
                    </div>
                    <!--app-content closed-->
                </div>
                <!-- page-main closed -->

{{--            @include('layouts.components.sidebar-right')--}}

            @include('layouts.components.modal')

            @yield('modal')

{{--            @include('layouts.components.footer')--}}

        </div>
        <!-- page -->

        @include('layouts.components.scripts')

    </body>

</html>
