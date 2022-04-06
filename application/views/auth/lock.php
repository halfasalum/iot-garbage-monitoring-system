
            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="bg-image" style="background-image: url('assets/media/photos/garbage.jpg');">
                    <div class="row mx-0 bg-black-op">
                        <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
                            <div class="p-30 invisible" data-toggle="appear">
                                <p class="font-size-h3 font-w600 text-white">
                                    Lets technology leads us to free our street from garbage.
                                </p>
                                <p class="font-italic text-white-op">
                                    APP VERSION  <a class="font-w600" href="" target="_blank">1.0</a> | Loading <strong>{elapsed_time} s</strong>
                                </p>
                                <p class="font-italic text-white-op">
                                    <a class="font-w600" href="" target="_blank">IGMS</a> &copy; <span><?php echo date('Y'); ?></span>
                                </p>
                            </div>
                        </div>
                        <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight">
                            <div class="content content-full">
                                <!-- Header -->
                                <div class="px-30 py-10">
                                    <a class="link-effect font-w700" href="<?php echo site_url('Auth'); ?>" >
                                        <i class="si si-fire"></i>
                                        <span class="font-size-xl text-primary-dark">IOT GARBAGE</span><span class="font-size-xl"> MONITORING SYSTEM</span>
                                    </a>
                                    <h1 class="h4 font-w700 mt-30 mb-10">Welcome back, <?php echo $this->session->userdata('fullName'); ?></h1>
                                    <h2 class="h5 font-w400 text-muted mb-0">Please enter your password</h2>
                                </div>

                                <?php if(isset($message) && $message['description'] != null):  ?>
                                <div class="px-30 py-10">
                                    <!-- Alert -->
                                    <div class="alert alert-<?php echo $message['class']; ?> alert-dismissable" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h3 class="alert-heading font-size-h4 font-w400"><?php echo $message['header']; ?></h3>
                                        <p class="mb-0"><?php echo $message['description']; ?></p>
                                    </div>
                                    <!-- END Alert -->
                                </div>
                                <?php endif; ?>

                                <!-- END Header -->

                                <!-- Sign In Form -->
                                <!-- jQuery Validation functionality is initialized with .js-validation-signin class in js/pages/op_auth_signin.min.js which was auto compiled from _es6/pages/op_auth_signin.js -->
                                <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <?php echo form_open("", array('class'=>'px-30')); ?>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <input type="password" class="form-control" id="login-username" name="password" required>
                                                <label for="login-username">Password</label>
                                            </div>
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-hero btn-alt-danger" name="unLock">
                                        <i class="si si-lock-open mr-10"></i> Unlock
                                    </button>
                                    <div class="mt-30">
                                        <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="<?php echo site_url('Auth/signOut') ?>">
                                            <i class="fa fa-user text-muted mr-5"></i> Not you? Sign In
                                        </a>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                                <!-- END Sign In Form -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
