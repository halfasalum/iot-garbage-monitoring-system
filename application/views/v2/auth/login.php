<section class="body-sign">
    <div class="center-sign">
        <a href="<?php echo site_url(''); ?>" class="logo float-left">
            <!-- img src="img/logo.png" height="70" alt="Porto Admin" /-->
        </a>

        <div class="panel card-sign">
            <div class="card-title-sign mt-3 text-end">
                <h2 class="title text-uppercase font-weight-bold m-0"><i class="bx bx-user-circle me-1 text-6 position-relative top-5"></i> Sign In</h2>
            </div>
            <div class="card-body">
                <?php if(isset($message) && $message['description'] != null):  ?>
                    <div class="alert alert-<?php echo $message['class']; ?> alert-dismissible fade show" role="alert">
                        <strong><?php echo $message['header']; ?></strong> <?php echo $message['description']; ?>.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <?php echo form_open(""); ?>
                    <div class="form-group mb-3">
                        <label>Username</label>
                        <div class="input-group">
                            <input name="username" type="text" class="form-control form-control-lg" />
                            <span class="input-group-text">
										<i class="bx bx-user text-4"></i>
									</span>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <div class="clearfix">
                            <label class="float-left">Password</label>
                            <a href="pages-recover-password.html" class="float-end">Lost Password?</a>
                        </div>
                        <div class="input-group">
                            <input name="pwd" type="password" class="form-control form-control-lg" />
                            <span class="input-group-text">
										<i class="bx bx-lock text-4"></i>
									</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">

                        </div>
                        <div class="col-sm-4 text-end">
                            <button type="submit" name="login" class="btn btn-primary mt-2">Sign In</button>
                        </div>
                    </div>

                    <span class="mt-3 mb-3 line-thru text-center text-uppercase">
								<span>or</span>
							</span>
                <?php echo form_close(); ?>
            </div>
        </div>

        <p class="text-center text-muted mt-3 mb-3">Garbage Monitoring System &copy; Copyright <?php echo date('Y') ?>. All Rights Reserved.</p>
    </div>
</section>