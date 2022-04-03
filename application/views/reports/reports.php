<!-- Main Container -->
<main id="main-container">
	<!-- Page Content -->
	<div class="content">
		<h2 class="content-heading">Dashboard - Reports</h2>
		<p>This is the default Header style, transparent but with equal top/bottom padding (now that it is fixed - screen width greater than 991px).</p>
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

			<div class="row gutters-tiny">
				<!-- Row #1 -->
				<div class="col-md-12 col-xl-12">
					<div class="block-content" data-toggle="slimscroll" data-height="600px" data-color="#9ccc65" >

						<div id="accordion2" role="tablist" aria-multiselectable="true">

                            <?php if (in_array(104,$this->session->userdata('controls'))) { ?>
						<div class="block block-bordered block-rounded mb-2">
							<div class="block-header" role="tab" id="accordion2_h1">
								<a class="font-w600 text-muted text-decoration-none" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_q1" aria-expanded="true" aria-controls="accordion2_q1">Business Overview</a>
							</div>
							<div id="accordion2_q1" class="collapse show" role="tabpanel" aria-labelledby="accordion2_h1">
								<div class="block-content">
									<div class="row">

										<div class="col-md-6">
											<table class="table table-hover table-vcenter table-sm text-muted">
												<tbody>
												<tr>
													<td><a href="javascript:void(0)" id="actionModal" d="" o="1" f="journal" c="Reports">Overall Collections Summary</a> </td>
												</tr>
												<tr>
													<td><a href="javascript:void(0)" id="actionModal" d="" o="1" f="journal" c="Reports">Branch Collections Summary</a> </td>
												</tr>
												<tr>
													<td><a href="javascript:void(0)" id="actionModal" d="" o="1" f="journal" c="Reports">Zone Collections Summary</a> </td>
												</tr>
												<tr>
													<td><a href="javascript:void(0)" id="actionModal" d="" o="1" f="journal" c="Reports">Officer Collections Summary</a> </td>
												</tr>
                                                <tr>
                                                    <td><a href="javascript:void(0)" id="actionModal" d="" o="1" f="journal" c="Reports">Overall Loans Issued</a> </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="javascript:void(0)" id="actionModal" d="" o="1" f="journal" c="Reports">Branch Loans Issued</a> </td>
                                                </tr>
												</tbody>
											</table>
										</div>
										<div class="col-md-6">
											<table class="table table-hover table-vcenter table-sm text-muted">
												<tbody>
                                                <tr>
                                                    <td><a href="javascript:void(0)" id="actionModal" d="" o="1" f="journal" c="Reports">Overall Collections Detailed</a> </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="javascript:void(0)" id="actionModal" d="" o="1" f="journal" c="Reports">Branch Collections Detailed</a> </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="javascript:void(0)" id="actionModal" d="" o="1" f="journal" c="Reports">Zone Collections Detailed</a> </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="javascript:void(0)" id="actionModal" d="" o="1" f="journal" c="Reports">Officer Collections Detailed</a> </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="javascript:void(0)" id="actionModal" d="" o="1" f="journal" c="Reports">Zone Loans Issued</a> </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="javascript:void(0)" id="actionModal" d="" o="1" f="journal" c="Reports">Customer Loans Issued</a> </td>
                                                </tr>
												</tbody>
											</table>
										</div>

									</div>
								</div>
							</div>
						</div>
                            <?php } ?>

                            <?php if (in_array(103,$this->session->userdata('controls'))) { ?>
						<div class="block block-bordered block-rounded mb-2">
							<div class="block-header" role="tab" id="accordion2_h2">
								<a class="font-w600 text-muted text-decoration-none" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_q2" aria-expanded="true" aria-controls="accordion2_q2">Manager</a>
							</div>
							<div id="accordion2_q2" class="collapse show" role="tabpanel" aria-labelledby="accordion2_h2">
								<div class="block-content">
									<div class="row">

										<div class="col-md-6">
											<table class="table table-hover table-vcenter table-sm text-muted">
												<tbody>
                                                <tr>
                                                    <td><a href="javascript:void(0)" id="actionModal" d="" o="1" f="journal" c="Reports">Branch Collections Summary</a> </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="javascript:void(0)" id="actionModal" d="" o="1" f="journal" c="Reports">Zone Collections Summary</a> </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="javascript:void(0)" id="actionModal" d="" o="1" f="journal" c="Reports">Officer Collections Summary</a> </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="javascript:void(0)" id="actionModal" d="" o="1" f="journal" c="Reports">Branch Loans Issued</a> </td>
                                                </tr>
												</tbody>
											</table>
										</div>
										<div class="col-md-6">
											<table class="table table-hover table-vcenter table-sm text-muted">
												<tbody>
                                                <tr>
                                                    <td><a href="javascript:void(0)" id="actionModal" d="" o="1" f="journal" c="Reports">Branch Collections Detailed</a> </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="javascript:void(0)" id="actionModal" d="" o="1" f="journal" c="Reports">Zone Collections Detailed</a> </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="javascript:void(0)" id="actionModal" d="" o="1" f="journal" c="Reports">Officer Collections Detailed</a> </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="javascript:void(0)" id="actionModal" d="" o="1" f="journal" c="Reports">Zone Loans Issued</a> </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="javascript:void(0)" id="actionModal" d="" o="1" f="journal" c="Reports">Customer Loans Issued</a> </td>
                                                </tr>

												</tbody>
											</table>
										</div>

									</div>
								</div>
							</div>
						</div>
                            <?php } ?>

                            <?php if (in_array(102,$this->session->userdata('controls'))) { ?>
							<div class="block block-bordered block-rounded mb-2">
								<div class="block-header" role="tab" id="accordion2_h3">
									<a class="font-w600 text-muted text-decoration-none" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_q3" aria-expanded="true" aria-controls="accordion2_q3">Officer</a>
								</div>
								<div id="accordion2_q3" class="collapse show" role="tabpanel" aria-labelledby="accordion2_h3">
									<div class="block-content">
										<div class="row">

											<div class="col-md-6">
												<table class="table table-hover table-vcenter table-sm text-muted">
													<tbody>
                                                    <tr>
                                                        <td><a href="<?php echo site_url('Reports/zoneCollection'); ?>" >Zone Collections Summary</a> </td>
                                                    </tr>
													</tbody>
												</table>
											</div>
											<div class="col-md-6">
												<table class="table table-hover table-vcenter table-sm text-muted">
													<tbody>
                                                    <tr>
                                                        <td><a href="javascript:void(0)" id="actionModal" d="" o="1" f="journal" c="Reports">Customer Loans Issued</a> </td>
                                                    </tr>
													</tbody>
												</table>
											</div>

										</div>
									</div>
								</div>
							</div>
                            <?php } ?>

						</div>

					</div>
				</div>
			</div>

	</div>
	<!-- END Page Content -->
</main>
<!-- END Main Container -->
