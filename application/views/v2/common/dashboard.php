<main id="main-container">
	<!-- Page Content -->
	<div class="content">
		<h2 class="content-heading">Assigned Modules</h2>
		<div class="row">
			<?php echo $this->session->userdata('modules'); ?>
		</div>

        <?php include $content; ?>
	</div>
	<!-- END Page Content -->
</main>
