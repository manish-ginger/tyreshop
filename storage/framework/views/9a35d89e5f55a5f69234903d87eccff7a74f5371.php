    <?php $__env->startSection('styles'); ?>



    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('class'); ?>

    <!-- BACKGROUND-IMAGE -->
    <div class="login-img">

    <?php $__env->stopSection(); ?>

        <?php $__env->startSection('content'); ?>


                <!-- CONTAINER OPEN -->
                <div class="col-login mx-auto mt-7">
                    <div class="text-center">
                        <img src="<?php echo e(asset('images/logo2.png')); ?>" class="header-brand-img" alt="">
                    </div>
                </div>

                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                        <form class="login100-form validate-form" method="POST" action="<?php echo e(route('login.signup_join')); ?>">
                        <?php echo csrf_field(); ?>
                            <span class="login100-form-title pb-5">
                                Sign Up
                            </span>
                            <div class="panel panel-primary">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body p-0 pt-5">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab5">
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 form-control" type="email" placeholder="Email" name="email" required
                                    autofocus>
                                    <?php if($errors->has('email')): ?>
                                <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                                <?php endif; ?>
                                            </div>
                                            
                                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 form-control" type="password" placeholder="Password" name="password" id="password"  required>
                                                <?php if($errors->has('password')): ?>
                                <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                                <?php endif; ?>
                                            </div>
                                            <div class="text-end pt-4">
                                                <p class="mb-0"><a href="<?php echo e(url('admin')); ?>" class="text-primary ms-1">Login</a></p>
                                            </div>
                                            <div class="container-login100-form-btn">
                                                <button class="login100-form-btn btn-primary" name="submit" value="submit">Sign Up</button>
                                                <!-- <a href="<?php echo e(url('login')); ?>" >
                                                        Login
                                                </a> -->
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->

        <?php $__env->stopSection(); ?>

    <?php $__env->startSection('scripts'); ?>

    <!-- GENERATE OTP JS -->
    <script src="<?php echo e(asset('assets/js/generate-otp.js')); ?>"></script>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.custom-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/carwash_shopadmin/resources/views/livewire/signup.blade.php ENDPATH**/ ?>