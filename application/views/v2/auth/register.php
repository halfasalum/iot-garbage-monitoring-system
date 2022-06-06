<!-- Main Container -->
<main id="main-container">
	<!-- Page Content -->
	<div class="bg-body-dark bg-pattern" style="background-image: url('assets/media/various/bg-pattern-inverse.png');">
		<div class="row mx-0 justify-content-center">
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


                    </div>
					<!-- END Header -->

					<!-- Reminder Form -->
					<!-- jQuery Validation functionality is initialized with .js-validation-reminder class in js/pages/op_auth_reminder.min.js which was auto compiled from _es6/pages/op_auth_reminder.js -->
					<!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
					<?php echo form_open(); ?>
						<div class="block block-themed block-rounded block-shadow">
							<div class="block-header bg-gd-primary">
								<h3 class="block-title">Member Registration</h3>
								<div class="block-options">
									<button type="button" class="btn-block-option">
										<i class="si si-user"></i>
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
								<?php
								if (isset($verify) && $verify == TRUE){
									?>
									<div class="form-group row">
										<div class="col-12">
											<label for="reminder-credential">Your Registered Email</label>
											<input type="text" class="form-control" id="reminder-credential" name="email">
										</div>
									</div>
								<?php
								}else{
									?>
									<div class="form-group row">
										<div class="col-12">
											<label for="reminder-credential">Full name</label>
											<input type="text" class="form-control" id="reminder-credential" value="<?php if (isset($account)){ echo $account->fullName; } ?>" disabled>
										</div>
										<div class="col-12">
											<label for="reminder-credential">Email address</label>
											<input type="text" class="form-control" id="reminder-credential" name="userId" value="<?php if (isset($account)){ echo $account->email; } ?>" readonly>
										</div>
										<div class="col-12">
											<label for="reminder-credential">Phone</label>
											<input type="text" class="form-control" id="reminder-credential" value="<?php if (isset($account)){ echo $account->phone; } ?>" disabled>
										</div>
										<div class="col-12">
											<label for="reminder-credential">Username</label>
											<input type="text" class="form-control" id="reminder-credential" name="username">
										</div>
										<div class="col-12">
											<label for="reminder-credential">Password</label>
											<input type="password" class="form-control" id="reminder-credential" name="password">
										</div>
										<div class="col-12">
											<label for="reminder-credential">Re-Password</label>
											<input type="password" class="form-control" id="reminder-credential" name="re-password">
										</div>
									</div>
								<?php
								}
								?>

								<div class="form-group text-center">
									<?php echo $button; ?>
								</div>
							</div>
							<div class="block-content bg-body-light">
								<div class="form-group text-center">
									<a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="<?php echo site_url('Auth') ?>">
										<i class="fa fa-user text-muted mr-5"></i> Sign In
									</a>
								</div>
							</div>
						</div>
					<?php echo form_close(); ?>
					<!-- END Reminder Form -->
				</div>
			</div>
		</div>
	</div>
	<!-- END Page Content -->
</main>
<!-- END Main Container -->
