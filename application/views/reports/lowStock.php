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
<h2 class="content-heading">Low Stock Report</h2>
<?php echo form_open(""); ?>
<div class="form-group row gutters-tiny mb-0 items-push">
    <div class="col-md-3">

    </div>
	<div class="col-md-3">
		<label  for="exampleInputPassword2"> </label>
		<button type="submit" class="btn btn-primary btn-sm btn-block" id="saveModal" c="Reports" f="lowStock" d="1" o="2" name="run">Run</button>
	</div>
	<div class="col-md-3">
		<label  for="exampleInputPassword2"> </label>
		<!--<button type="submit" class="btn btn-success btn-sm btn-block" name="journal">Download</button>-->
	</div>
    <div class="col-md-3">

    </div>
</div>
<?php echo form_close(); ?>
<hr>
<div class="form-group row gutters-tiny mb-0 items-push">
	<div class="col-md-12">
		<table style="font-size: 11px;!important;" class="table  table-hovertable table-sm">
			<thead>
			<tr >
				<th>S/N</th>
				<th class="text-center">PRODUCT</th>
				<th class="text-center">BRAND</th>
				<th class="text-center">CATEGORY</th>
				<th class="text-center">UNIT</th>
				<th class="text-center">QUANTITY</th>
				<th class="text-center">PRICER PER UNIT</th>
				<th class="text-center">TOTAL</th>
				<th class="text-center">REMARK</th>
			</tr>
			</thead>
			<tbody>

            <?php
            if (isset($products)){
                $sn = 1;
                $sum            = 0;
                foreach ($products as $product){
                    if ($product->product_alert >= $product->product_quantity){
                    ?>
                    <tr>
                        <td class="text-center" >
                            <?php echo $sn; ?>
                        </td>
                        <td class="text-center" >
                            <?php echo $product->product_name; ?>
                        </td>
                        <td  class="text-center" >
                            <?php echo $product->brand_name; ?>
                        </td>
                        <td class="text-center" >
                            <?php echo $product->category_name; ?>
                        </td>
                        <td class="text-center" >
                            <?php echo $product->unit_name; ?>
                        </td>
                        <td  class="text-center"  >
                            <?php echo $product->product_quantity; ?>
                        </td>
                        <td class="text-center">
                            <?php echo number_format($product->selling_price,2); ?>
                        </td>
                        <td class="text-center">
                            <?php echo number_format($product->selling_price * $product->product_quantity,2); ?>
                        </td>
                        <td class="text-center">
                            <?php if ($product->product_status == 5){ echo '<span class="badge badge-success">Available</span>'; }else{ echo '<span class="badge badge-danger">Out of stock</span>'; }  ?>
                        </td>

                    </tr>
                    <?php
                    $sn++;
                    $sum += $product->selling_price * $product->product_quantity;
                    }
                }
            }
            ?>
            <tr>
                <th colspan="7" class="text-right">Total Amount</th>
                <th class="text-center"><strong><?php echo number_format($sum,2) ?></strong></th>
                <td></td>
            </tr>

			</tbody>
		</table>
	</div>
</div>

