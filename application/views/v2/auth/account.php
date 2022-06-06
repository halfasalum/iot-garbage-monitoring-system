<!-- Main Container -->
<main id="main-container">
    <div class="bg-body-light hero-bubbles">
        <span class="hero-bubble wh-40 pos-t-20 pos-l-10 bg-primary"></span>
        <span class="hero-bubble wh-30 pos-t-20 pos-l-80 bg-success"></span>
        <span class="hero-bubble wh-20 pos-t-40 pos-l-25 bg-corporate"></span>
        <span class="hero-bubble wh-40 pos-t-30 pos-l-90 bg-pulse"></span>
        <span class="hero-bubble wh-30 pos-t-40 pos-l-20 bg-danger"></span>
        <span class="hero-bubble wh-30 pos-t-60 pos-l-25 bg-warning"></span>
        <span class="hero-bubble wh-30 pos-t-60 pos-l-80 bg-info"></span>
        <span class="hero-bubble wh-40 pos-t-75 pos-l-70 bg-flat"></span>
        <span class="hero-bubble wh-40 pos-t-75 pos-l-10 bg-earth"></span>
        <span class="hero-bubble wh-30 pos-t-90 pos-l-90 bg-elegance"></span>
        <div class="row no-gutters justify-content-center">
            <div class="hero-static col-lg-7">
                <div class="content content-full overflow-hidden">
                    <!-- Header -->
                    <div class="py-50 text-center">
                        <a class="link-effect font-w700" href="">
                            <i class="si si-fire"></i>
                            <span class="font-size-xl text-primary-dark">Quick</span><span class="font-size-xl">Loans</span>
                        </a>
                        <h1 class="h4 font-w700 mt-30 mb-10">Welcome to create your new account</h1>
                        <h2 class="h5 font-w400 text-muted mb-0">Let's get started, it will only take a few seconds!</h2>
                    </div>
                    <!-- END Header -->
                    <!-- Installation form -->
                    <!-- jQuery Validation functionality is initialized with .js-validation-installation class in js/pages/op_installation.min.js which was auto compiled from _es6/pages/op_installation.js -->
                    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                    <?php echo form_open("",array("id"=>"account")); ?>
                        <div class="block block-rounded block-shadow">
                            <?php if(isset($message) && $message['description'] != null):  ?>
                                <!-- Alert -->
                                <div class="alert alert-<?php echo $message['class']; ?> alert-dismissable" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h3 class="alert-heading font-size-h4 font-w400"><?php echo $message['header']; ?></h3>
                                    <p class="mb-0"><?php echo $message['description']; ?></p>
                                </div>
                                <!-- END Alert -->
                            <?php endif; ?>
                            <!-- Database section -->
                            <div class="block-content block-content-full">
                                <h2 class="content-heading text-black pt-5">Company</h2>
                                <div class="row items-push">
                                    <div class="col-lg-4">
                                        <p class="text-muted">
                                            Please fill all required fields by providing correct information
                                        </p>
                                    </div>
                                    <div class="col-lg-6 offset-lg-1">
                                        <div class="form-group">
                                            <label for="install-db-name">Company Name</label>
                                            <input type="text" class="form-control form-control-sm" id="company" value="<?= set_value('c_name') ?>"   name="c_name" required>
                                            <small class="text-danger"><strong><div class="_feedback" id="company_feedback"></div> </strong></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="install-db-host">Company Address</label>
                                            <input type="text" class="form-control form-control-sm" value="<?= set_value('c_address') ?>" id="address" name="c_address" >
                                        </div>
                                        <div class="form-group">
                                            <label for="install-db-prefix">Company Phone</label>
                                            <input type="text" class="js-masked-phone form-control form-control-sm" value="<?= set_value('c_phone') ?>" id="phone" name="c_phone" placeholder="255711111111" >
                                        </div>
                                        <div class="form-group">
                                            <label for="install-db-username">Company Email</label>
                                            <input type="email" class="form-control form-control-sm" value="<?= set_value('c_email') ?>" id="email" name="c_email" required>
                                            <small class="text-danger"><strong><div class="_feedback" id="email_feedback"></div> </strong></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Database section -->
                            <!-- Administrator section -->
                            <div class="block-content block-content-full">
                                <h2 class="content-heading text-black pt-5">Administrator Account</h2>
                                <div class="row items-push">
                                    <div class="col-lg-4">
                                        <p class="text-muted">
                                            Please add your email, username and a strong password to create the administrator account.
                                        </p>
                                    </div>
                                    <div class="col-lg-6 offset-lg-1">
                                        <div class="form-group">
                                            <label for="install-admin-email">Email</label>
                                            <input type="text" class="form-control form-control-sm" value="<?= set_value('a_email') ?>" id="a_email" name="a_email" required>
                                            <small class="text-danger"><strong><div class="_feedback" id="a_email_feedback"></div> </strong></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="install-admin-email">Username</label>
                                            <input type="text" class="form-control form-control-sm" value="<?= set_value('a_username') ?>" name="a_username" id="a_username" required>
                                            <small class="text-danger"><strong><div class="_feedback" id="a_username_feedback"></div> </strong></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="install-admin-password">Password</label>
                                            <input type="password" class="form-control form-control-sm" name="a_password" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="install-admin-password-confirm">Password Confirmation</label>
                                            <input type="password" class="form-control form-control-sm" name="re_password" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Administrator section -->
                            <!-- Administrator section -->
                            <div class="block-content block-content-full">
                                <h2 class="content-heading text-black pt-5">Package Subscription</h2>
                                <div class="row items-push">
                                    <div class="col-lg-4">
                                        <p class="text-muted">
                                            Please your subscription package to start with, feel free to start a trial version for 1 month.
                                        </p>
                                    </div>
                                    <div class="col-lg-6 offset-lg-1">
                                        <div class="form-group">
                                            <label for="install-admin-password-confirm">Package</label>
                                            <select class="js-select2 form-control form-control-sm" id="package" name="package" data-placeholder="Choose one.." required>
                                                <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                <option selected disabled>Please select</option>
                                                <option value="1">Trial Version</option>
                                                <option value="2">Ruby</option>
                                                <option value="3">Gold</option>
                                                <option value="4">Diamond</option>
                                            </select>
                                            <small class="text-danger"><strong><div class="_feedback" id="package_feedback"></div> </strong></small>
                                        </div>
                                        <div id="selected_package" class="_feedback"></div>
                                        <!-- Developer Plan -->

                                        <!-- END Developer Plan -->
                                    </div>
                                </div>
                            </div>
                            <!-- END Administrator section -->
                            <div class="block-content">
                                <div class="form-group row">
                                    <div class="col-lg-6 offset-lg-5">
                                        <button type="submit" class="btn btn-hero btn-alt-success btn-sm mb-10 " name="submit">
                                            <i class="fa fa-plus mr-10"></i> Create Account
                                        </button>
                                        <?php echo anchor("Auth",'
                                        <button type="button" class="btn btn-hero btn-alt-secondary btn-sm mb-10">
                                            <i class="fa fa-repeat mr-10"></i> Go Back
                                        </button>
                                        ') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                    <!-- END Installation Form -->
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->

</main>
<!-- END Main Container -->