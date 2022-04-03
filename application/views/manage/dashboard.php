<!-- Main Container -->
<main id="main-container">
	<!-- Page Content -->
	<div class="content">
		<h2 class="content-heading">Management - Dashboard</h2>
		<div class="row">
            <?php if (in_array(61,$this->session->userdata('controls'))){ ?>
			<div class="col-md-3">
				<div class="block">
					<div class="block-content block-content-full">
						<div class="py-20 text-center">
							<div class="mb-20">
								<i class="fa fa-users fa-4x text-primary"></i>
							</div>
							<div class="font-size-h4 font-w600"> System Users</div>
							<div class="pt-20">
								<a class="btn btn-rounded btn-alt-primary" href="<?php echo site_url('Manage/users') ?>">
									<i class="fa fa-cog mr-5"></i> Manage users
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
            <?php } ?>

			<!--<div class="col-md-3">
				<div class="block">
					<div class="block-content block-content-full">
						<div class="py-20 text-center">
							<div class="mb-20">
								<i class="fa fa-folder-open-o fa-4x text-success"></i>
							</div>
							<div class="font-size-h4 font-w600">9.25k Reports</div>
							<div class="pt-20">
								<a class="btn btn-rounded btn-alt-success" href="<?php /*echo site_url('Manage/reports') */?>">
									<i class="fa fa-cog mr-5"></i> Manage list
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>-->

            <?php if (in_array(62,$this->session->userdata('controls'))){ ?>
			<div class="col-md-3">
				<div class="block">
					<div class="block-content block-content-full">
						<div class="py-20 text-center">
							<div class="mb-20">
								<i class="fa fa-cogs fa-4x text-secondary"></i>
							</div>
							<div class="font-size-h4 font-w600">Application Roles</div>
							<div class="pt-20">
								<a class="btn btn-rounded btn-alt-secondary" href="<?php echo site_url('Manage/roles') ?>">
									<i class="fa fa-cog mr-5"></i> Manage roles
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
            <?php } ?>
			<!--<div class="col-md-3">
				<div class="block">
					<div class="block-content block-content-full">
						<div class="py-20 text-center">
							<div class="mb-20">
								<i class="fa fa-wrench fa-4x text-info"></i>
							</div>
							<div class="font-size-h4 font-w600">Application Settings</div>
							<div class="pt-20">
								<a class="btn btn-rounded btn-alt-info" href="<?php /*echo site_url('Manage/configuration') */?>">
									<i class="fa fa-cog mr-5"></i> Manage list
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>-->

		</div>
		<!-- END Dummy content -->
	</div>
	<!-- END Page Content -->
</main>
<!-- END Main Container -->
