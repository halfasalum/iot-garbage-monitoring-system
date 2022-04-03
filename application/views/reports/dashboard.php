<!-- Main Container -->
<main id="main-container">
	<!-- Page Content -->
	<div class="content">
		<h2 class="content-heading">Reports - Dashboard</h2>

			<div class="row gutters-tiny">
				<!-- Row #1 -->
				<div class="col-md-12 col-xl-12">
					<div class="block-content" data-toggle="slimscroll" data-height="600px" data-color="#9ccc65" >

						<div id="accordion2" role="tablist" aria-multiselectable="true">

						<div class="block block-bordered block-rounded mb-2">
							<div class="block-header" role="tab" id="accordion2_h1">
								<a class="font-w600 text-muted text-decoration-none" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_q1" aria-expanded="true" aria-controls="accordion2_q1">Inventory</a>
							</div>
							<div id="accordion2_q1" class="collapse show" role="tabpanel" aria-labelledby="accordion2_h1">
								<div class="block-content">
									<div class="row">

										<div class="col-md-6">
											<table class="table table-hover table-vcenter table-sm text-muted">
												<tbody>
                                                <?php if (in_array(84,$this->session->userdata('controls'))){
                                                ?>
												<tr>
													<td><a href="javascript:void(0)" id="actionModal" d="" o="1" f="inventory" c="Reports">Inventory in hand</a> </td>
												</tr>
                                                <?php } ?>
												</tbody>
											</table>
										</div>
										<div class="col-md-6">
											<table class="table table-hover table-vcenter table-sm text-muted">
												<tbody>
                                                <?php if (in_array(85,$this->session->userdata('controls'))){
                                                ?>
                                                <tr>
                                                    <td><a href="javascript:void(0)" id="actionModal" d="" o="1" f="lowStock" c="Reports">Low Stock</a> </td>
                                                </tr>
                                                <?php } ?>
												</tbody>
											</table>
										</div>

									</div>
								</div>
							</div>
						</div>
						<div class="block block-bordered block-rounded mb-2">
							<div class="block-header" role="tab" id="accordion2_h2">
								<a class="font-w600 text-muted text-decoration-none" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_q2" aria-expanded="true" aria-controls="accordion2_q2">Sales</a>
							</div>
							<div id="accordion2_q2" class="collapse show" role="tabpanel" aria-labelledby="accordion2_h2">
								<div class="block-content">
									<div class="row">

										<div class="col-md-6">
											<table class="table table-hover table-vcenter table-sm text-muted">
												<tbody>
                                                <?php if (in_array(86,$this->session->userdata('controls'))){
                                                ?>
												<tr>
													<td><a href="javascript:void(0)" id="actionModal" d="" o="1" f="saleSummary" c="Reports">Sales Summary</a> </td>
												</tr>
                                                <?php } ?>
                                                <?php if (in_array(87,$this->session->userdata('controls'))){
                                                ?>
                                                <tr>
													<td><a href="javascript:void(0)" id="actionModal" d="0" o="0" f="salesPerCustomer" c="Reports">Sales Per Customer</a> </td>
												</tr>
                                                <?php } ?>
												</tbody>
											</table>
										</div>
										<div class="col-md-6">
											<table class="table table-hover table-vcenter table-sm text-muted">
												<tbody>
                                                <?php if (in_array(88,$this->session->userdata('controls'))){
                                                ?>
												<tr>
													<td><a href="javascript:void(0)" id="actionModal" d="" o="1" f="salesPerProduct" c="Reports">Sales Per Product</a> </td>
												</tr>
                                                <?php } ?>
												</tbody>
											</table>
										</div>

									</div>
								</div>
							</div>
						</div>

							<div class="block block-bordered block-rounded mb-2">
								<div class="block-header" role="tab" id="accordion2_h3">
									<a class="font-w600 text-muted text-decoration-none" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_q3" aria-expanded="true" aria-controls="accordion2_q3">Expenses</a>
								</div>
								<div id="accordion2_q3" class="collapse show" role="tabpanel" aria-labelledby="accordion2_h3">
									<div class="block-content">
										<div class="row">

											<div class="col-md-6">
												<table class="table table-hover table-vcenter table-sm text-muted">
													<tbody>
                                                    <?php if (in_array(89,$this->session->userdata('controls'))){
                                                    ?>
													<tr>
														<td><a href="javascript:void(0)" id="actionModal" d="" o="1" f="expenseDetail" c="Reports">Expenses Detail</a> </td>
													</tr>
                                                    <?php } ?>
													</tbody>
												</table>
											</div>
											<div class="col-md-6">
												<table class="table table-hover table-vcenter table-sm text-muted">
													<tbody>
													<tr>
														<!--<td><a href="javascript:void(0)" id="actionModal" d="" o="1" f="under" c="Reports">Expenses Summary</a> </td>-->
													</tr>
													</tbody>
												</table>
											</div>

										</div>
									</div>
								</div>
							</div>




						</div>

					</div>
				</div>
			</div>

	</div>
	<!-- END Page Content -->
</main>
<!-- END Main Container -->
