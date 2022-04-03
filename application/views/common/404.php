<main id="main-container">
	<!-- Header Section -->
	<!--<div class="bg-image" style="background-image: url('<?php /*echo base_url("assets/media/photos/photo21@2x.jpg") */?>');">
		<div class="bg-primary-dark-op">
			<div class="content content-full content-top">
				<h1 class="py-50 text-white text-center">Welcome <?php /*echo $this->session->userdata('fullName'); */?></h1>
				<h6 class="text-white text-center">Last Login : <?php /*echo date('D d M, Y H:i',strtotime($this->session->userdata('lastLogin'))); */?></h6>
			</div>
		</div>
	</div>-->
	<!-- END Header Section -->

	<!-- Page Content -->
	<div class="content">
        <div class="py-30 text-center">
            <div class="display-3 text-danger">
                <i class="fa fa-warning"></i> 404
            </div>
            <h1 class="h2 font-w700 mt-30 mb-10">Oops.. You just found an error page..</h1>
            <h2 class="h3 font-w400 text-muted mb-50">We are sorry but the page you are looking for was not found..</h2>
            <a class="btn btn-hero btn-rounded btn-alt-secondary" href="<?php echo site_url('Home'); ?>">
                <i class="fa fa-arrow-left mr-10"></i> Back to home page
            </a>
        </div>
	</div>
	<!-- END Page Content -->
</main>
