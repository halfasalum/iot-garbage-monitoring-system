<!-- Main Container -->
<main id="main-container">
	<!-- Page Content -->
	<div class="content">
		<h2 class="content-heading">Modules - Dashboard</h2>
		<div class="row">

			<?php
			if (in_array(8,$this->session->userdata('controls'))){
			?>
			<div class="col-md-3">
				<div class="block">
					<div class="block-content block-content-full">
						<div class="py-20 text-center">
							<div class="mb-20">
								<i class="fa fa-cogs fa-4x text-secondary"></i>
							</div>
							<div class="font-size-h4 font-w600">Modules</div>
							<div class="pt-20">
								<a class="btn btn-rounded btn-alt-secondary" href="<?php echo site_url('Modules/module') ?>">
									<i class="fa fa-cog mr-5"></i> Manage modules
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			}
			?>

			<?php
			if (in_array(17,$this->session->userdata('controls'))){
			?>
			<div class="col-md-3">
				<div class="block">
					<div class="block-content block-content-full">
						<div class="py-20 text-center">
							<div class="mb-20">
								<i class="fa fa-wrench fa-4x text-info"></i>
							</div>
							<div class="font-size-h4 font-w600">Modules Control</div>
							<div class="pt-20">
								<a class="btn btn-rounded btn-alt-info" href="<?php echo site_url('Modules/control') ?>">
									<i class="fa fa-cog mr-5"></i> Manage control
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			}
			?>

		</div>
		<!-- END Dummy content -->
	</div>
	<!-- END Page Content -->
</main>
<!-- END Main Container -->
