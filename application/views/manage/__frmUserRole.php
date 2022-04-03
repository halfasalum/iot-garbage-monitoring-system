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
			<div class="form-group row">
				<h4 class="col-12" >Application Roles</h4>
				<?php
				if (isset($roles)){
					foreach ($roles as $role){
						$selected			= '';
						if (isset($userRoles)){
							if (in_array($role->role_id,$userRoles)){
								$selected = 'checked';
							}
						}
						?>
						<label class="col-6" for="ecom-product-name"><?php echo $role->role_name; ?></label>
						<div class="col-6">
							<input type="checkbox" value="<?php echo $role->role_id; ?>" class="form-control" id="ecom-product-name" name="role[]" <?php echo $selected; ?>>
						</div>
				<?php
					}
				}
				?>
			</div>
			<!-- END With Icons -->
		</div>
		<div class="col-md-3">
			<?php if (isset($button)){ echo $button; } ?>
		</div>
		<div class="col-md-4">

		</div>
	</div>
<?php echo form_close(); ?>
