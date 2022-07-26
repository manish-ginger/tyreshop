<?php
    use App\Http\Middleware\CheckAdminLogged;
?>
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

                            <?php if(CheckAdminLogged::role_control('dashboard')==1): ?>
                            <li class="sub-category"><h3>Main</h3></li>
                            <li class="slide"><a class="side-menu__item" data-bs-toggle="slide" href="<?php echo e(route('dashboard')); ?>"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a></li>
                            <?php endif; ?>

                            <li class="sub-category">
                                <h3>Manage</h3>
                            </li>
                            <li class="slide">
                            </li>
                            <?php if(CheckAdminLogged::role_control('servicerecord')==1): ?>
                                <li class="slide"> <a class="side-menu__item" data-bs-toggle="slide" href="<?php echo e(route('servicerecord')); ?>"><i class="side-menu__icon fe fe-activity"></i><span class="side-menu__label">Bookings</span></a></li>
                            <?php endif; ?>


                                <?php if((CheckAdminLogged::role_control('customer')==1)||(CheckAdminLogged::role_control('customervehicle')==1)||(CheckAdminLogged::role_control('packagerecord')==1)): ?>
                                <li class="slide">
                                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Customers</span><i class="angle fe fe-chevron-right"></i></a>
                                    <ul class="slide-menu">
                                        <li class="side-menu-label1"><a href="javascript:void(0)">Customers</a></li>
                                        <?php if(CheckAdminLogged::role_control('customer')==1): ?>
                                            <li class="slide"> <a class="slide-item" data-bs-toggle="slide" href="<?php echo e(route('customer')); ?>"><i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Customers</span></a></li>
                                        <?php endif; ?>
                                        <?php if(CheckAdminLogged::role_control('customervehicle')==1): ?>
                                            <li class="slide"> <a class="slide-item" data-bs-toggle="slide" href="<?php echo e(route('customervehicle')); ?>"><i class="side-menu__icon fe fe-corner-down-left"></i><span class="side-menu__label">Customer Vehicles</span></a></li>
                                        <?php endif; ?>
                                        <?php if(CheckAdminLogged::role_control('packagerecord')==1): ?>
                                            <li class="slide"> <a class="slide-item" data-bs-toggle="slide" href="<?php echo e(route('packagerecord')); ?>"><i class="side-menu__icon fe fe-anchor"></i><span class="side-menu__label">Customer Packages</span></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </li>
                                <?php endif; ?>


                                <?php if((CheckAdminLogged::role_control('machine')==1)||(CheckAdminLogged::role_control('feature')==1)||(CheckAdminLogged::role_control('package')==1)||(CheckAdminLogged::role_control('coupon')==1)||(CheckAdminLogged::role_control('loyaltypoint')==1)||(CheckAdminLogged::role_control('workingdays')==1)): ?>
                                <li class="slide">
                                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fe fe-settings"></i><span class="side-menu__label">Settings</span><i class="angle fe fe-chevron-right"></i></a>
                                    <ul class="slide-menu">
                                        <li class="side-menu-label1"><a href="javascript:void(0)">Settings</a></li>
                                        <?php if(CheckAdminLogged::role_control('machine')==1): ?>
                                            <li class="slide"> <a class="slide-item" data-bs-toggle="slide" href="<?php echo e(route('machine')); ?>"><i class="side-menu__icon fe fe-settings"></i><span class="side-menu__label">Machines</span></a></li>
                                        <?php endif; ?>
                                        <?php if(CheckAdminLogged::role_control('feature')==1): ?>
                                            <li class="slide"> <a class="slide-item" data-bs-toggle="slide" href="<?php echo e(route('feature')); ?>"><i class="side-menu__icon fe fe-briefcase"></i><span class="side-menu__label">Services</span></a></li>
                                        <?php endif; ?>
                                        <?php if(CheckAdminLogged::role_control('package')==1): ?>
                                            <li class="slide"> <a class="slide-item" data-bs-toggle="slide" href="<?php echo e(route('package')); ?>"><i class="side-menu__icon fe fe-align-justify"></i><span class="side-menu__label">Packages</span></a></li>
                                        <?php endif; ?>
                                        <?php if(CheckAdminLogged::role_control('coupon')==1): ?>
                                            <li class="slide"> <a class="slide-item" data-bs-toggle="slide" href="<?php echo e(route('coupon')); ?>"><i class="side-menu__icon fe fe-award"></i><span class="side-menu__label">Coupons</span></a></li>
                                        <?php endif; ?>
                                        <?php if(CheckAdminLogged::role_control('loyaltypoint')==1): ?>
                                            <li class="slide"> <a class="slide-item" data-bs-toggle="slide" href="<?php echo e(route('loyaltypoint')); ?>"><i class="side-menu__icon fe fe-star"></i><span class="side-menu__label">Loyalty Reward</span></a></li>
                                        <?php endif; ?>
                                        <?php if(CheckAdminLogged::role_control('workingdays')==1): ?>
                                            <li class="slide"> <a class="slide-item" data-bs-toggle="slide" href="<?php echo e(route('workingdays')); ?>"><i class="side-menu__icon fe fe-sunrise"></i><span class="side-menu__label">Working Days</span></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </li>
                                <?php endif; ?>



                            <?php if(CheckAdminLogged::role_control('report.create')==1): ?>
                                <li class="slide"> <a class="side-menu__item" data-bs-toggle="slide" href="<?php echo e(route('report.create')); ?>"><i class="side-menu__icon fe fe-database"></i><span class="side-menu__label">Reports</span></a></li>
                            <?php endif; ?>

                            <?php if(CheckAdminLogged::role_control('notification')==1): ?>
                            <li class="slide"> <a class="side-menu__item" data-bs-toggle="slide" href="<?php echo e(route('notification')); ?>"><i class="side-menu__icon fe fe-alert-triangle"></i><span class="side-menu__label">Notification</span></a></li>
                            <?php endif; ?>

                            <?php if(CheckAdminLogged::role_control('message.create')==1): ?>
                            <li class="slide"> <a class="side-menu__item" data-bs-toggle="slide" href="<?php echo e(route('message.create')); ?>"><i class="side-menu__icon fe fe-edit-3"></i><span class="side-menu__label">Messages</span></a></li>
                            <?php endif; ?>

                        </ul>
                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/></svg></div>
                    </div>
                </div>
                <!--/APP-SIDEBAR-->
            </div>
            <!--app-sidebar-->
<?php /**PATH /opt/lampp/htdocs/tyre_shopadmin/resources/views/layouts/components/app-sidebar.blade.php ENDPATH**/ ?>