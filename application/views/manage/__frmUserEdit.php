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
<?php echo form_open_multipart(""); ?>
	<div class="form-group row gutters-tiny mb-0 items-push">
		<div class="col-md-4">
            <div class="input-group">
                <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    Full name
                                                </span>
                </div>
                <input type="text" class="form-control" id="example-hosting-name" name="name" value="<?php if (isset($user)){ echo $user->user_fullname; } ?>" >
            </div>
		</div>
		<div class="col-md-4">
            <div class="input-group">
                <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    Email
                                                </span>
                </div>
                <input type="email" class="form-control" id="example-hosting-name" name="email" value="<?php if (isset($user)){ echo $user->user_email; } ?>" >
            </div>
		</div>
		<div class="col-md-4">
            <div class="input-group">
                <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    Phone
                                                </span>
                </div>
                <input type="text" class="form-control" id="example-hosting-name" name="phone" placeholder="2557XXXXXXXX" value="<?php if (isset($user)){ echo $user->user_phone; } ?>" >
            </div>
		</div>
	</div>
	<div class="form-group row gutters-tiny mb-0 items-push">
		<div class="col-md-4">
            <div class="input-group">
                <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    Username
                                                </span>
                </div>
                <input type="text" class="form-control" id="example-hosting-name" name="username" value="<?php if (isset($user)){ echo $user->username; } ?>" <?php if (!is_null($user->username)){ echo 'readonly'; } ?> >
            </div>
		</div>
		<div class="col-md-4">
            <div class="input-group">
                <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    Password
                                                </span>
                </div>
                <input type="password" class="form-control" id="example-hosting-name" name="pass"  >
            </div>
		</div>
		<div class="col-md-4">
            <div class="input-group">
                <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    Re-Password
                                                </span>
                </div>
                <input type="password" class="form-control" id="example-hosting-name" name="repass"  >
            </div>
		</div>
	</div>
<div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-3">
        <?php if (isset($username)){ echo $username; } ?>
    </div>
    <div class="col-md-3">
        <?php if (isset($password)){ echo $password; } ?>
    </div>
    <div class="col-md-3">
        <?php if (isset($info)){ echo $info; } ?>
    </div>
</div>
<?php echo form_close(); ?>
