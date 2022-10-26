@php
    use App\Http\Middleware\CheckAdminLogged;
@endphp
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

                            @if(CheckAdminLogged::role_control('dashboard')==1)
                            <li class="sub-category"><h3>Main</h3></li>
                            <li class="slide"><a class="side-menu__item" data-bs-toggle="slide" href="{{route('dashboard')}}"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a></li>
                            @endif

                            <li class="sub-category">
                                <h3>Manage</h3>
                            </li>
                            <li class="slide">
                            </li>
                            @if(CheckAdminLogged::role_control('servicerecord')==1)
                                <li class="slide"> <a class="side-menu__item" data-bs-toggle="slide" href="{{route('servicerecord')}}"><i class="side-menu__icon fe fe-activity"></i><span class="side-menu__label">Bookings</span></a></li>
                            @endif


                                @if((CheckAdminLogged::role_control('customer')==1)||(CheckAdminLogged::role_control('customervehicle')==1)||(CheckAdminLogged::role_control('packagerecord')==1))
                                <li class="slide">
                                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Customers</span><i class="angle fe fe-chevron-right"></i></a>
                                    <ul class="slide-menu">
                                        <li class="side-menu-label1"><a href="javascript:void(0)">Customers</a></li>
                                        @if(CheckAdminLogged::role_control('customer')==1)
                                            <li class="slide"> <a class="slide-item" data-bs-toggle="slide" href="{{route('customer')}}"><i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Customers</span></a></li>
                                        @endif
                                        @if(CheckAdminLogged::role_control('customervehicle')==1)
                                            <li class="slide"> <a class="slide-item" data-bs-toggle="slide" href="{{route('customervehicle')}}"><i class="side-menu__icon fe fe-corner-down-left"></i><span class="side-menu__label">Customer Vehicles</span></a></li>
                                        @endif
                                        @if(CheckAdminLogged::role_control('packagerecord')==1)
                                            <li class="slide"> <a class="slide-item" data-bs-toggle="slide" href="{{route('packagerecord')}}"><i class="side-menu__icon fe fe-anchor"></i><span class="side-menu__label">Customer Packages</span></a></li>
                                        @endif
                                    </ul>
                                </li>
                                @endif


                                @if((CheckAdminLogged::role_control('machine')==1)||(CheckAdminLogged::role_control('feature')==1)||(CheckAdminLogged::role_control('package')==1)||(CheckAdminLogged::role_control('coupon')==1)||(CheckAdminLogged::role_control('loyaltypoint')==1)||(CheckAdminLogged::role_control('workingdays')==1))
                                <li class="slide">
                                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fe fe-settings"></i><span class="side-menu__label">Settings</span><i class="angle fe fe-chevron-right"></i></a>
                                    <ul class="slide-menu">
                                        <li class="side-menu-label1"><a href="javascript:void(0)">Settings</a></li>
                                        @if(CheckAdminLogged::role_control('machine')==1)
                                            <li class="slide"> <a class="slide-item" data-bs-toggle="slide" href="{{route('machine')}}"><i class="side-menu__icon fe fe-settings"></i><span class="side-menu__label">Machines</span></a></li>
                                        @endif
                                        @if(CheckAdminLogged::role_control('feature')==1)
                                            <li class="slide"> <a class="slide-item" data-bs-toggle="slide" href="{{route('feature')}}"><i class="side-menu__icon fe fe-briefcase"></i><span class="side-menu__label">Services</span></a></li>
                                        @endif
                                        @if(CheckAdminLogged::role_control('package')==1)
                                            <li class="slide"> <a class="slide-item" data-bs-toggle="slide" href="{{route('package')}}"><i class="side-menu__icon fe fe-align-justify"></i><span class="side-menu__label">Packages</span></a></li>
                                        @endif
                                        @if(CheckAdminLogged::role_control('coupon')==1)
                                            <li class="slide"> <a class="slide-item" data-bs-toggle="slide" href="{{route('coupon')}}"><i class="side-menu__icon fe fe-award"></i><span class="side-menu__label">Coupons</span></a></li>
                                        @endif
                                        @if(CheckAdminLogged::role_control('loyaltypoint')==1)
                                            <li class="slide"> <a class="slide-item" data-bs-toggle="slide" href="{{route('loyaltypoint')}}"><i class="side-menu__icon fe fe-star"></i><span class="side-menu__label">Loyalty Reward</span></a></li>
                                        @endif
                                        @if(CheckAdminLogged::role_control('workingdays')==1)
                                            <li class="slide"> <a class="slide-item" data-bs-toggle="slide" href="{{route('workingdays')}}"><i class="side-menu__icon fe fe-sunrise"></i><span class="side-menu__label">Working Days</span></a></li>
                                        @endif
                                    </ul>
                                </li>
                                @endif

                                @if(CheckAdminLogged::role_control('servicerecord')==1)
                                    <li class="slide"> <a class="side-menu__item" data-bs-toggle="slide" href="{{route('servicerecord.specialrequest')}}"><i class="side-menu__icon fe fe-activity"></i><span class="side-menu__label">Special Requests</span></a></li>
                                @endif

                            @if(CheckAdminLogged::role_control('report.create')==1)
                                <li class="slide"> <a class="side-menu__item" data-bs-toggle="slide" href="{{route('report.create')}}"><i class="side-menu__icon fe fe-database"></i><span class="side-menu__label">Reports</span></a></li>
                            @endif

                            @if(CheckAdminLogged::role_control('notification')==1)
                            <li class="slide"> <a class="side-menu__item" data-bs-toggle="slide" href="{{route('notification')}}"><i class="side-menu__icon fe fe-alert-triangle"></i><span class="side-menu__label">Notification</span></a></li>
                            @endif

                            @if(CheckAdminLogged::role_control('message.create')==1)
                            <li class="slide"> <a class="side-menu__item" data-bs-toggle="slide" href="{{route('message.create')}}"><i class="side-menu__icon fe fe-edit-3"></i><span class="side-menu__label">Messages</span></a></li>
                            @endif

                        </ul>
                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/></svg></div>
                    </div>
                </div>
                <!--/APP-SIDEBAR-->
            </div>
            <!--app-sidebar-->
