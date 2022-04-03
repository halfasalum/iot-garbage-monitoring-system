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
		<div class="col-md-5">
			<!-- With Icons -->
			<div class="js-nestable-connected-icons dd">
				<ol class="dd-list">
					<?php echo $list; ?>
				</ol>
			</div>
			<!-- END With Icons -->
		</div>
		<div class="col-md-4">
			<input type="text" class="form-control" name="name" value="<?php if (isset($role)){ echo $role->role_name; } ?>" placeholder="Role name" required>
			<hr>
			<label class="m-5">Default role for new user</label>
			<select class="js-select2 form-control" id="example-select3" name="default" style="width: 100%;" data-placeholder="Choose one.." required>
				<option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
				<option value="0" <?php if (isset($role)){ if ($role->is_default == 0){ echo 'selected'; } } ?> > No</option>
				<option value="1" <?php if (isset($role)){ if ($role->is_default == 1){ echo 'selected'; } } ?> > Yes</option>
			</select>
		</div>
		<div class="col-md-3">
			<?php if (isset($button)){ echo $button; } ?>
		</div>
	</div>
<?php echo form_close(); ?>
