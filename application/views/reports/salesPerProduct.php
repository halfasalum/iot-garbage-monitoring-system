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
<h2 class="content-heading">Sales Per Product Report</h2>
<?php echo form_open(""); ?>
<div class="form-group row gutters-tiny mb-0 items-push">
	<div class="col-md-3">
            <label class="col-12" for="example-select2">Products</label>
                <!-- Select2 (.js-select2 class is initialized in Helpers.select2()) -->
                <!-- For more info and examples you can check out https://github.com/select2/select2 -->
                <select class="js-select2 form-control" id="example-select2" name="product" style="width: 100%;" data-placeholder="Choose one.." required>
                    <option value="0" selected>All products</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                    <?php
                    if (isset($products)){
                        foreach ($products as $product){
                            ?>
                            <option value="<?php echo $product->product_id; ?>" <?php if ($product->product_id == $lastPro){ echo 'selected'; } ?> > <?php echo $product->product_name; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
	</div>
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
		<button type="submit" class="btn btn-primary btn-sm btn-block" id="saveModal" c="Reports" f="salesPerProduct" d="1" o="1" name="run">Run</button>
	</div>
	<div class="col-md-3">
		<label  for="exampleInputPassword2"> </label>
		<!--<button type="submit" class="btn btn-success btn-sm btn-block" name="download">Download</button>-->
	</div>
</div>
<?php echo form_close(); ?>
<hr>
<div class="form-group row gutters-tiny mb-0 items-push">
	<div class="col-md-12">
		<table style="font-size: 11px;!important;" class="table  table-hovertable-sm">
			<thead>
			<tr>
                <th class="text-center">PRODUCT</th>
				<th class="text-center">DATE</th>
				<th class="text-center">SALE NUMBER</th>
				<th class="text-center">SELLING PRICE</th>
				<th class="text-center">PRODUCT QUANTITY</th>
				<th class="text-center">TOTAL SALE</th>
			</tr>
			</thead>
			<tbody>
			<?php echo $transaction; ?>
			</tbody>
		</table>
	</div>
</div>

