<!-- Main Container -->
<main id="main-container">
	<!-- Page Content -->
	<div class="content">
		<h2 class="content-heading">Management - Users</h2>
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

                <?php if (in_array(61,$this->session->userdata('controls'))){ ?>
				<!-- VPS -->
				<div class="d-flex justify-content-between align-items-center mt-50 mb-20">
					<h2 class="h4 font-w300 mb-0">Users (1)</h2>
					<button type="button" class="btn btn-primary btn-sm btn-alt-primary btn-rounded" onclick="Codebase.blocks('#cb-add-server', 'open');">
						<i class="fa fa-plus mr-1"></i> Add User
					</button>
				</div>
                <?php } ?>
				<div id="cb-add-server" class="block bg-body-light animated fadeIn d-none">
					<div class="block-header">
						<h3 class="block-title">Add a new user</h3>
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
                                                    Full name
                                                </span>
										</div>
										<input type="text" class="form-control" id="example-hosting-name" name="name" >
									</div>
								</div>
								<div class="col-md-3">
									<div class="input-group">
										<div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    Email
                                                </span>
										</div>
										<input type="email" class="form-control" id="example-hosting-name" name="email" >
									</div>
								</div>
								<div class="col-md-3">
									<div class="input-group">
										<div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    Phone
                                                </span>
										</div>
										<input type="text" class="form-control" id="example-hosting-name" name="phone" placeholder="2557XXXXXXXX">
									</div>
								</div>
                                <?php if (in_array(61,$this->session->userdata('controls'))){ ?>
								<div class="col-md-3">
									<button type="submit" name="save" class="btn btn-alt-success btn-block">
										<i class="fa fa-plus mr-1"></i> Create
									</button>
								</div>
                                <?php } ?>
							</div>
						<?php echo form_close(); ?>
					</div>
				</div>



				<!-- END VPS -->

			</div>

		</div>

        <div class="row">
            <div class="col-md-12">
                <!-- Block Tabs Animated Fade -->
                <div class="block">
                    <div class="block-content tab-content overflow-hidden">
                        <!-- Full Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full" style="font-size: 11px !important;">
                                <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Email & Phone</th>
                                    <th>Username</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (isset($users)){
                                    $sn = 1;
                                    foreach ($users as $user){
                                        ?>
                                        <tr>
                                            <td class="font-w600"><?php echo $sn; ?></td>
                                            <td class="font-w600"><?php echo $user->user_fullname; ?></td>
                                            <td>
                                                <span class="badge badge-primary"><?php echo $user->user_email.' | '.$user->user_phone; ?></span>
                                            </td>
                                            <td>
                                                <span class="badge badge-secondary"><?php echo $user->username; ?></span>
                                            </td>
                                            <td class="text-center">
                                                <?php if (in_array(62,$this->session->userdata('controls'))){ ?>
                                                    <a class="dropdown-item" href="javascript:void(0)" id="actionModal" d="<?php echo $user->user_id; ?>" o="0" f="userEdit" c="Manage">
                                                        <i class="fa fa-edit mr-5"></i>Edit
                                                    </a>
                                                <?php } ?>

                                                <?php if (in_array(64,$this->session->userdata('controls'))){ ?>
                                                    <?php
                                                    if ($this->session->userdata('userId') != $user->user_id){
                                                        ?>
                                                        <a class="dropdown-item text-danger" href="javascript:void(0)" id="actionModal" d="<?php echo $user->user_id; ?>" o="1" f="userDelete" c="Manage">
                                                            <i class="fa fa-trash mr-5"></i>Delete
                                                        </a>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                <a class="dropdown-item text-secondary" href="javascript:void(0)" id="actionModal" d="<?php echo $user->user_id; ?>" o="1" f="userRole" c="Manage">
                                                    <i class="fa fa-fw fa-cogs mr-5"></i>Roles
                                                </a>
                                                <a class="dropdown-item text-secondary" href="javascript:void(0)" id="actionModal" d="<?php echo $user->user_id; ?>" o="1" f="userAssign" c="Manage">
                                                    <i class="fa fa-fw fa-exchange mr-5"></i>Branch & Zone
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                        $sn++;
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- END Full Table -->
                    </div>

                </div>
            </div>
        </div>
	</div>
	<!-- END Page Content -->
</main>
<!-- END Main Container -->
