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
<h2 class="content-heading">Profit & Loss Details Report</h2>
<?php echo form_open(""); ?>
<div class="form-group row gutters-tiny mb-0 items-push">
	<div class="col-md-3">
		<label for="exampleInputUsername2">From</label>
		<input type="date" class="form-control form-control-sm" id="exampleInputUsername2" value="<?php echo $start;   ?>" name="start" >
	</div>
	<div class="col-md-3">
		<label  for="exampleInputPassword2">To</label>
		<input type="date" class="form-control form-control-sm" id="exampleInputPassword2"  value="<?php echo $end; ?>" name="end" >

	</div>
	<div class="col-md-3">
		<label  for="exampleInputPassword2"> </label>
		<button type="submit" class="btn btn-primary btn-sm btn-block" id="saveModal" c="Reports" f="journal" d="1" o="2" name="run">Run</button>
	</div>
	<div class="col-md-3">
		<label  for="exampleInputPassword2"> </label>
		<button type="submit" class="btn btn-success btn-sm btn-block" name="journal">Download</button>
	</div>
</div>
<?php echo form_close(); ?>
<hr>
<div class="form-group row gutters-tiny mb-0 items-push">
	<div class="col-md-12">
		<table style="font-size: 11px;!important;" class="table  table-hovertable-sm">
			<tbody>
			<?php echo $transaction; ?>
			</tbody>
		</table>
	</div>
</div>

