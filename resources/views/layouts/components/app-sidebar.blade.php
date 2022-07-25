            <!--app-sidebar-->
            <div class="sticky">
                <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                <div class="app-sidebar">
                    <div class="side-header">
                        <a class="header-brand1" href="{{url('')}}">
                            {{-- <img src="{{asset('images/logo2.png')}}" class="header-brand-img desktop-logo" alt="logo">
                            <img src="{{asset('images/logo2.png')}}" class="header-brand-img toggle-logo" alt="logo">
                            <img src="{{asset('images/logo2.png')}}" class="header-brand-img light-logo" alt="logo">
                            <img src="{{asset('images/logo2.png')}}" class="header-brand-img light-logo1" alt="logo"> --}}
                        </a>
                        <!-- LOGO -->
                    </div>
                    <div class="main-sidemenu">
                        <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"/></svg></div>
                        <ul class="side-menu">
                            <li class="sub-category">
                                <h3>Main</h3>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{route('dashboard')}}"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
                            </li>

                            <li class="sub-category">
                                <h3>Manage</h3>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{route('banner')}}"><i class="side-menu__icon fe fe-image"></i><span class="side-menu__label">Banners</span></a>
                            </li>
                            {{-- <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{route('category')}}"><i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Categories</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{route('comfort')}}"><i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Comforts</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{route('vehicle')}}"><i class="side-menu__icon fe fe-truck"></i><span class="side-menu__label">Vehicles</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{route('specialvehicle')}}"><i class="side-menu__icon fe fe-award"></i><span class="side-menu__label">Special Rental Vehicles</span></a>

                            </li> --}}

                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{route('shop')}}"><i class="side-menu__icon fe fe-box"></i><span class="side-menu__label">Shops</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{route('vehiclecategory')}}"><i class="side-menu__icon fe fe-layers"></i><span class="side-menu__label">Tyre Brand</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{route('vehiclebrand')}}"><i class="side-menu__icon fe fe-hash"></i><span class="side-menu__label">Tyre Model</span></a>
                            </li>
{{--                            <li class="slide">--}}
{{--                                <a class="side-menu__item" data-bs-toggle="slide" href="{{route('brandpershop')}}"><i class="side-menu__icon fe fe-book-open"></i><span class="side-menu__label">Brands in Shops</span></a>--}}
{{--                            </li>--}}
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{route('vehiclemodel')}}"><i class="side-menu__icon fe fe-circle"></i><span class="side-menu__label">Tyre Size</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{route('vehicle')}}"><i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Tyre Number</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{route('vehicletyre')}}"><i class="side-menu__icon fe fe-aperture"></i><span class="side-menu__label">Tyre</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{route('washingtype')}}"><i class="side-menu__icon fe fe-droplet"></i><span class="side-menu__label">Washing Category</span></a>
                            </li>
                            <li class="slide"> <a class="side-menu__item" data-bs-toggle="slide" href="{{route('notification')}}"><i class="side-menu__icon fe fe-alert-triangle"></i><span class="side-menu__label">Notification</span></a></li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{route('messages')}}"><i class="side-menu__icon fe fe-edit-3"></i><span class="side-menu__label">Messages</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{route('role')}}"><i class="side-menu__icon fe fe-shield"></i><span class="side-menu__label">Roles</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="{{route('user')}}"><i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Users</span></a>
                            </li>
                        </ul>
                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/></svg></div>
                    </div>
                </div>
                <!--/APP-SIDEBAR-->
            </div>
            <!--app-sidebar-->
