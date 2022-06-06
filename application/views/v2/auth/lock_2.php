<!-- Main Container -->
<main id="main-container">
	<!-- Page Content -->
	<div class="bg-image bg-pattern" style="background-image: url('assets/media/photos/photo34@2x.jpg');">
		<div class="row mx-0 justify-content-center bg-white-op-95">
			<div class="hero-static col-lg-6 col-xl-4">
				<div class="content content-full overflow-hidden">
					<!-- Header -->
					<div class="py-10 text-center">
                       <!-- <h1>
                            <img class="" src="<?php /*echo base_url('assets/media/logo/sales-robot-manager.png') */?>" alt="SR MANAGER LOGO">
                        </h1>-->

                        <a class="link-effect font-w700" href="">
                            <span class="font-size-xl text-primary-dark">QUICK </span><span class="font-size-xl"> LOANS</span>
                        </a>
						<h1 class="h4 font-w700 mt-30 mb-10">Welcome back, <?php echo $this->session->userdata('fullName'); ?></h1>
						<h2 class="h5 font-w400 text-muted mb-0">Please enter your password</h2>
					</div>
					<!-- END Header -->

					<!-- Unlock Form -->
					<!-- jQuery Validation functionality is initialized with .js-validation-lock class in js/pages/op_auth_lock.min.js which was auto compiled from _es6/pages/op_auth_lock.js -->
					<!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
					<?php echo form_open(""); ?>
						<div class="block block-themed block-rounded block-shadow">
							<div class="block-header bg-gd-pulse">
								<h3 class="block-title">Unlock Account</h3>
								<div class="block-options">
									<button type="button" class="btn-block-option">
										<i class="si si-wrench"></i>
									</button>
								</div>
							</div>
							<div class="block-content">
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
								<div class="form-group text-center">
									<img class="img-avatar img-avatar96" src="<?php echo base_url('assets/media/avatars/').$this->session->userdata('image'); ?>" alt="">
								</div>
								<div class="form-group row">
									<div class="col-12">
										<label for="lock-password">Password</label>
										<input type="password" class="form-control" name="password">
									</div>
								</div>
								<div class="form-group text-center">
									<button type="submit" class="btn btn-alt-danger" name="unLock">
										<i class="si si-lock-open mr-10"></i> Unlock
									</button>
								</div>
							</div>
							<div class="block-content bg-body-light">
								<div class="form-group text-center">
									<a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="<?php echo site_url('Auth/signOut') ?>">
										<i class="fa fa-user text-muted mr-5"></i> Not you? Sign In
									</a>
								</div>
							</div>
						</div>
					<?php echo form_close(); ?>
					<!-- END Unlock Form -->
				</div>
			</div>
		</div>
	</div>
	<!-- END Page Content -->
</main>
<!-- END Main Container -->
