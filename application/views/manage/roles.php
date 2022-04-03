<!-- Main Container -->
<main id="main-container">
	<!-- Page Content -->
	<div class="content">
		<h2 class="content-heading">Management - Roles</h2>
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
                <?php if (in_array(2,$this->session->userdata('controls'))){ ?>
				<!-- VPS -->
				<div class="d-flex justify-content-between align-items-center mt-50 mb-20">
					<h2 class="h4 font-w300 mb-0">Roles (<?php echo $total; ?>)</h2>
					<button type="button" class="btn btn-primary btn-sm btn-alt-primary btn-rounded" onclick="Codebase.blocks('#cb-add-server', 'open');">
						<i class="fa fa-plus mr-1"></i> Add Role
					</button>
				</div>
                <?php } ?>
				<div id="cb-add-server" class="block bg-body-light animated fadeIn d-none">
					<div class="block-header">
						<h3 class="block-title">Add a new role</h3>
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
									<input type="text" class="form-control" name="name" placeholder="Role name" required>
									<hr>
									<label class="m-5">Default role for new user</label>
									<select class="js-select2 form-control" id="example-select3" name="default" style="width: 100%;" data-placeholder="Choose one.." required>
										<option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
										<option value="0" selected> No</option>
										<option value="1" > Yes</option>
									</select>
								</div>
								<div class="col-md-3">
									<?php
									if (in_array(2,$this->session->userdata('controls'))){
									?>
									<button type="submit" class="btn btn-alt-success btn-block" name="save">
										<i class="fa fa-plus mr-1"></i> Save
									</button>
									<?php
									}
									?>
								</div>
							</div>
						<?php echo form_close(); ?>
					</div>
				</div>

				<?php
				//if (in_array(1,$this->session->userdata('controls'))){
				?>
				<!-- Full Table -->
				<div class="table-responsive">
					<table class="table table-striped table-vcenter">
						<thead>
						<tr>
							<th class="text-center" >S/N</th>
							<th>Name</th>
							<th class="text-center">Actions</th>
						</tr>
						</thead>
						<tbody>
						<?php
						if (isset($roles)){
							$id = 1;
							foreach ($roles as $role){
								?>
								<tr>
									<td class="text-center">
										<?= $id; ?>
									</td>
									<td class="font-w600"><?php echo $role->role_name; ?></td>
									<td class="text-center">
								<?php
								//if (in_array(3,$this->session->userdata('controls'))){
									?>
										<a class="btn btn-sm btn-outline-secondary btn-rounded mr-5 my-5" href="javascript:void(0)" id="actionModal" d="<?php echo $role->role_id ?>" o="1" f="roleEdit" c="Manage">
											<i class="fa fa-wrench mr-5"></i> Edit
										</a>
									<?php
								//}
									?>
								<?php
								if (in_array(4,$this->session->userdata('controls'))){
									?>
										<a class="btn btn-sm btn-outline-danger btn-rounded mr-5 my-5" href="javascript:void(0)" data-toggle="modal" data-target="#modal-slideup">
											<i class="fa fa-times mr-5"></i> Delete
										</a>
									<?php
								}
									?>
									</td>
								</tr>
						<?php
								$id++;
							}
						}
						?>
						</tbody>
					</table>
				</div>
				<!-- END Full Table -->
				<?php
				//}
				?>
				<!-- END VPS -->

			</div>

		</div>
	</div>
	<!-- END Page Content -->
</main>
<!-- END Main Container -->
