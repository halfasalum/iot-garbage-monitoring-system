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

<div class="form-group row gutters-tiny mb-0 items-push">
	<div class="col-md-12">
		<?php if (isset($module)){
			if ($module->module_status == 1){
				?>
				<?php echo form_open(""); ?>
				<h1 class="text-danger text-center"> Are you sure you want to delete <i class="fa fa-question-circle"></i></h1>
				<h3 class="text-center">Module : <?php if (isset($module)){ echo $module->module_desc; } ?></h3>
				<p class="text-center">
					<?php
					if (in_array(16,$this->session->userdata('controls'))){
						?>
						<?php if (isset($button)){ echo $button; } ?>
						<?php
					}
					?>
				</p>
				<?php echo form_close(); ?>
		<?php
			}else{
				echo anchor("Modules/module","<p class='text-center'><button class='btn btn-alt-success'><i class='fa fa-refresh'></i> Click to refresh the page</button></p>");
			}
		} ?>

	</div>

</div>

