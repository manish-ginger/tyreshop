            <!--app-sidebar-->
            <div class="sticky">
                <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                <div class="app-sidebar">
                    <div class="side-header">
                        <a class="header-brand1" href="<?php echo e(url('')); ?>">
                            
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
                                <a class="side-menu__item" data-bs-toggle="slide" href="<?php echo e(route('dashboard')); ?>"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
                            </li>

                            <li class="sub-category">
                                <h3>Manage</h3>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="<?php echo e(route('banner')); ?>"><i class="side-menu__icon fe fe-image"></i><span class="side-menu__label">Banners</span></a>
                            </li>
                            

                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="<?php echo e(route('shop')); ?>"><i class="side-menu__icon fe fe-box"></i><span class="side-menu__label">Shops</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="<?php echo e(route('vehiclecategory')); ?>"><i class="side-menu__icon fe fe-layers"></i><span class="side-menu__label">Vehicle Category</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="<?php echo e(route('vehiclebrand')); ?>"><i class="side-menu__icon fe fe-hash"></i><span class="side-menu__label">Vehicle Brand</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="<?php echo e(route('brandpershop')); ?>"><i class="side-menu__icon fe fe-book-open"></i><span class="side-menu__label">Brands in Shops</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="<?php echo e(route('vehiclemodel')); ?>"><i class="side-menu__icon fe fe-circle"></i><span class="side-menu__label">Vehicle Model</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="<?php echo e(route('vehicle')); ?>"><i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Vehicle Variant</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="<?php echo e(route('washingtype')); ?>"><i class="side-menu__icon fe fe-droplet"></i><span class="side-menu__label">Washing Category</span></a>
                            </li>
                            <li class="slide"> <a class="side-menu__item" data-bs-toggle="slide" href="<?php echo e(route('notification')); ?>"><i class="side-menu__icon fe fe-alert-triangle"></i><span class="side-menu__label">Notification</span></a></li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="<?php echo e(route('messages')); ?>"><i class="side-menu__icon fe fe-edit-3"></i><span class="side-menu__label">Messages</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="<?php echo e(route('role')); ?>"><i class="side-menu__icon fe fe-shield"></i><span class="side-menu__label">Roles</span></a>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="<?php echo e(route('user')); ?>"><i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Users</span></a>
                            </li>
                        </ul>
                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/></svg></div>
                    </div>
                </div>
                <!--/APP-SIDEBAR-->
            </div>
            <!--app-sidebar-->
<?php /**PATH /opt/lampp/htdocs/carwash_superadmin/resources/views/layouts/components/app-sidebar.blade.php ENDPATH**/ ?>