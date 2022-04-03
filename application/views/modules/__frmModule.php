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
<?php echo form_open(""); ?>
<div class="form-group row gutters-tiny mb-0 items-push">
	<div class="col-md-2">
		<label>Module name</label>
		<input type="text" class="form-control" id="example-hosting-name" name="name" value="<?php if (isset($module)){ echo $module->module_desc;} ?>" placeholder="Module name" required>
	</div>
	<div class="col-md-2">
		<label>Module icon</label>
		<input type="text" class="form-control" id="example-hosting-name" name="icon" value="<?php if (isset($module)){ echo $module->module_icon;} ?>" placeholder="Module icon. Eg si-wrench" required>
	</div>
	<div class="col-md-2">
		<label>Module url</label>
		<input type="text" class="form-control" id="example-hosting-name" name="url" value="<?php if (isset($module)){ echo $module->module_class;} ?>" placeholder="Module url" required>
	</div>
    <div class="col-md-2">
        <label>Access Key</label>
        <select class="custom-select" id="example-hosting-vps" name="access">
            <option value="0" selected>No access key</option>
            <?php
            if (isset($controls)){
                foreach ($controls as $control){
                    ?>
                    <option value="<?php echo $control->control_id ?>" <?php if($control->control_id == $module->module_access_key){ echo 'selected'; } ?>><?php echo $control->control_name; ?></option>
                    <?php
                }
            }
            ?>
        </select>
    </div>
    <div class="col-md-4">
        <label>Module description</label>
        <textarea class="form-control"  name="description" placeholder="Module descriiption"  rows="8" required><?php if (isset($module)){ echo $module->module_tooltip;} ?></textarea>
    </div>
    <div class="col-md-3"></div>
    <div class="col-md-3"></div>
    <div class="col-md-3"></div>
	<div class="col-md-3">
		<?php
		if (in_array(16,$this->session->userdata('controls'))){
			?>
			<?php if (isset($button)){ echo $button; } ?>
			<?php
		}
		?>
	</div>
</div>
<?php echo form_close(); ?>
