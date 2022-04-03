<!-- Main Container -->
<main id="main-container">
	<!-- Page Content -->
	<div class="content">
		<h2 class="content-heading">Audit - Audit trial</h2>
		<p>This is a security-relevant chronological record, set of records, and/or destination and source of records that provide documentary evidence of the sequence of activities that have affected at any time a specific operation, procedure, or event.</p>
		<div class="row">
			<div class="col-md-12">
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
				<!-- VPS -->
				<div class="d-flex justify-content-between align-items-center mt-50 mb-20">
					<h2 class="h4 font-w300 mb-0">Report</h2>
					<button type="button" class="btn btn-primary btn-sm btn-alt-primary btn-rounded" onclick="Codebase.blocks('#cb-add-server', 'open');">
						<i class="fa fa-plus mr-1"></i> Report Parameter
					</button>
				</div>
				<div id="cb-add-server" class="block bg-body-light animated fadeIn d-none">
					<div class="block-header">
						<h3 class="block-title">Customize report</h3>
						<div class="block-options">
							<button type="button" class="btn-block-option">
								<i class="si si-question"></i>
							</button>
							<button type="button" class="btn-block-option" data-toggle="block-option" data-action="close">
								<i class="si si-close"></i>
							</button>
						</div>
					</div>
					<div class="block-content">
						<?php echo form_open(""); ?>
							<div class="form-group row gutters-tiny mb-0 items-push">
								<div class="col-md-3">
									<div class="input-group">
										<div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            Starting Date
                                                        </span>
										</div>
										<input type="date" class="form-control" value="<?php if (isset($start)){ echo $start; } ?>"  id="example-hosting-name" name="start" placeholder="Server Name">
									</div>
								</div>
								<div class="col-md-3">
									<div class="input-group">
										<div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                           Ending Date
                                                        </span>
										</div>
										<input type="date" class="form-control" value="<?php if (isset($end)){ echo $end; } ?>" id="example-hosting-name" name="end" placeholder="Server Name">
									</div>
								</div>
								<div class="col-md-3">
									<?php
									if (in_array(14,$this->session->userdata('controls'))){
										?>
										<button type="submit" name="run" class="btn btn-alt-success btn-block">
											<i class="fa fa-refresh mr-1"></i> Run report
										</button>
										<?php
									}
									?>

								</div>
								<div class="col-md-3">
									<?php
									if (in_array(13,$this->session->userdata('controls'))){
										?>
										<button type="submit" class="btn btn-alt-secondary btn-block">
											<i class="fa fa-download mr-1"></i> Download report
										</button>
										<?php
									}
									?>
								</div>
							</div>
						<?php echo form_close(); ?>
					</div>
				</div>

				<div class="block">
					<div class="block-content">
						<?php
						if (in_array(12,$this->session->userdata('controls'))){
							?>
							<table class="table table-bordered table-striped table-vcenter js-dataTable-full" style="font-size: 11px !important;">
								<thead>
								<tr>
									<th class="text-center">S/N</th>
									<th>Activity</th>
									<th >Description</th>
									<th >Other Info</th>
									<th class="text-center" >Date</th>
								</tr>
								</thead>
								<tbody>
								<?php
								if (isset($logs)){
									$id = 1;
									foreach ($logs as $log){
										?>
										<tr>
											<td class="text-center"><?php echo $id; ?></td>
											<td class="font-w600"><?php echo $log->log_action; ?></td>
											<td class=""><?php echo $log->log_description; ?></td>
											<td class="">
												<?php echo $log->log_browser.' | '.$log->log_platform.' | '.$log->log_ip; ?>
											</td>
											<td class="text-center">
												<?php echo date('D d, M Y H:i:s',strtotime($log->log_time)); ?>
											</td>
										</tr>
										<?php
										$id++;
									}
								}
								?>
								</tbody>
							</table>
						<?php
						}
						?>
					</div>
				</div>

				<!-- END VPS -->

			</div>

		</div>
	</div>
	<!-- END Page Content -->
</main>
<!-- END Main Container -->
