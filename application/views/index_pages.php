<!doctype html>
<html lang="en" class="no-focus">
<?php include $header; ?>
<body>

<!-- Page Container -->
<!--
	Available classes for #page-container:

GENERIC

	'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Template._uiHandleTheme())

SIDEBAR & SIDE OVERLAY

	'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
	'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
	'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
	'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
	'sidebar-inverse'                           Dark themed sidebar

	'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
	'side-overlay-o'                            Visible Side Overlay by default

	'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

	'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

HEADER

	''                                          Static Header if no class is added
	'page-header-fixed'                         Fixed Header

HEADER STYLE

	''                                          Classic Header style if no class is added
	'page-header-modern'                        Modern Header style
	'page-header-inverse'                       Dark themed Header (works only with classic Header style)
	'page-header-glass'                         Light themed Header with transparency by default
												(absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
	'page-header-glass page-header-inverse'     Dark themed Header with transparency by default
												(absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

MAIN CONTENT LAYOUT

	''                                          Full width Main Content if no class is added
	'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
	'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
-->
<div id="page-container" class=" <?php if ($this->router->fetch_class() == 'Home1'){ echo 'sidebar-o enable-page-overlay side-scroll page-header-fixed page-header-glass page-header-inverse main-content-boxed'; }else{ echo 'sidebar-o enable-page-overlay side-scroll page-header-modern main-content-narrow'; } ?> page-header-fixed">

	<!-- Sidebar -->
	<!--
		Helper classes

		Adding .sidebar-mini-hide to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
		Adding .sidebar-mini-show to an element will make it visible (opacity: 1) when the sidebar is in mini mode
			If you would like to disable the transition, just add the .sidebar-mini-notrans along with one of the previous 2 classes

		Adding .sidebar-mini-hidden to an element will hide it when the sidebar is in mini mode
		Adding .sidebar-mini-visible to an element will show it only when the sidebar is in mini mode
			- use .sidebar-mini-visible-b if you would like to be a block when visible (display: block)
	-->
	<nav id="sidebar">
		<!-- Sidebar Content -->
		<div class="sidebar-content">
			<!-- Side Header -->
			<div class="content-header content-header-fullrow px-15">
				<!-- Mini Mode -->
				<div class="content-header-section sidebar-mini-visible-b">
					<!-- Logo -->
					<span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                            </span>
					<!-- END Logo -->
				</div>
				<!-- END Mini Mode -->

				<!-- Normal Mode -->
				<div class="content-header-section text-center align-parent sidebar-mini-hidden">
					<!-- Close Sidebar, Visible only on mobile screens -->
					<!-- Layout API, functionality initialized in Template._uiApiLayout() -->
					<button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
						<i class="fa fa-times text-danger"></i>
					</button>
					<!-- END Close Sidebar -->

					<!-- Logo -->
					<div class="content-header-item">
						<a class="link-effect font-w700" href="index.html">
							<i class="si si-layers text-primary"></i>
							<span class="font-size-xl text-dual-primary-dark">IGMS</span>
						</a>
					</div>
					<!-- END Logo -->
				</div>
				<!-- END Normal Mode -->
			</div>
			<!-- END Side Header -->

			<!-- Side User -->
			<div class="content-side content-side-full content-side-user px-10 align-parent">
				<!-- Visible only in mini mode -->
				<div class="sidebar-mini-visible-b align-v animated fadeIn">
					<img class="img-avatar img-avatar32" src="<?php echo base_url("assets/media/avatars/").$this->session->userdata('image'); ?>" alt="">
				</div>
				<!-- END Visible only in mini mode -->

				<!-- Visible only in normal mode -->
				<div class="sidebar-mini-hidden-b text-center">
					<a class="img-link" href="">
						<img class="img-avatar" src="<?php echo base_url("assets/media/avatars/").$this->session->userdata('image'); ?>" alt="">
					</a>
					<ul class="list-inline mt-10">
						<li class="list-inline-item">
							<!-- Layout API, functionality initialized in Template._uiApiLayout() -->
							<a class="link-effect text-dual-primary-dark" href="<?php echo site_url('Home/account') ?>">
								<i class="si si-user"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<!-- Layout API, functionality initialized in Template._uiApiLayout() -->
							<a class="link-effect text-dual-primary-dark" href="<?php echo site_url('Auth/lock'); ?>">
								<i class="si si-lock"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a class="link-effect text-dual-primary-dark" href="<?php echo site_url('Auth/signOut') ?>">
								<i class="si si-logout"></i>
							</a>
						</li>
					</ul>
				</div>
				<!-- END Visible only in normal mode -->
			</div>
			<!-- END Side User -->

			<!-- Side Navigation -->
			<div class="content-side content-side-full">
				<ul class="nav-main">
					<li>
						<a href="<?php echo site_url('Home') ?>"><i class="si si-home"></i><span class="sidebar-mini-hide">Main Menu</span></a>
					</li>
					<?php if (isset($module_nav)) include $module_nav; ?>
				</ul>
			</div>
			<!-- END Side Navigation -->
		</div>
		<!-- Sidebar Content -->
	</nav>
	<!-- END Sidebar -->

	<!-- Header -->
	<header id="page-header">
		<!-- Header Content -->
		<div class="content-header">
			<!-- Left Section -->
			<div class="content-header-section">
				<!-- Toggle Sidebar -->
				<!-- Layout API, functionality initialized in Template._uiApiLayout() -->
				<button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
					<i class="fa fa-navicon"></i>
				</button>
				<!-- END Toggle Sidebar -->

				<!-- Open Search Section -->
				<!-- Layout API, functionality initialized in Template._uiApiLayout() -->
				<button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="header_search_on">
					<i class="fa fa-search"></i>
				</button>
				<!-- END Open Search Section -->
			</div>
			<!-- END Left Section -->

			<!-- Right Section -->
			<div class="content-header-section">
				<!-- User Dropdown -->
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-user d-sm-none"></i>
						<span class="d-none d-sm-inline-block">Account</span>
						<i class="fa fa-angle-down ml-5"></i>
					</button>
					<div class="dropdown-menu dropdown-menu-right min-width-200" aria-labelledby="page-header-user-dropdown">
						<h5 class="h6 text-center py-10 mb-5 border-b text-uppercase">User</h5>
						<a class="dropdown-item" href="<?php echo site_url('Home/account') ?>">
							<i class="si si-user mr-5"></i> Profile
						</a>
						<div class="dropdown-divider"></div>

						<!-- Toggle Side Overlay -->
						<!-- Layout API, functionality initialized in Template._uiApiLayout() -->
						<a class="dropdown-item" href="<?php echo site_url('Home/account#password') ?>" data-toggle="layout" data-action="side_overlay_toggle">
							<i class="si si-key"></i> Password
						</a>
						<!-- END Side Overlay -->

						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?php echo site_url('Auth/signOut') ?>">
							<i class="si si-logout mr-5"></i> Sign Out
						</a>
					</div>
				</div>
				<!-- END User Dropdown -->
			</div>
			<!-- END Right Section -->
		</div>
		<!-- END Header Content -->

		<!-- Header Search -->
		<div id="page-header-search" class="overlay-header">
			<div class="content-header content-header-fullrow">
				<form action="be_pages_generic_search.html" method="post">
					<div class="input-group">
						<div class="input-group-prepend">
							<!-- Close Search Section -->
							<!-- Layout API, functionality initialized in Template._uiApiLayout() -->
							<button type="button" class="btn btn-secondary" data-toggle="layout" data-action="header_search_off">
								<i class="fa fa-times"></i>
							</button>
							<!-- END Close Search Section -->
						</div>
						<input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
						<div class="input-group-append">
							<button type="submit" class="btn btn-secondary">
								<i class="fa fa-search"></i>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- END Header Search -->

		<!-- Header Loader -->
		<!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
		<div id="page-header-loader" class="overlay-header bg-primary">
			<div class="content-header content-header-fullrow text-center">
				<div class="content-header-item">
					<i class="fa fa-sun-o fa-spin text-white"></i>
				</div>
			</div>
		</div>
		<!-- END Header Loader -->
	</header>
	<!-- END Header -->

	<!-- Main Container -->
	<?php include $page; ?>
	<!-- END Main Container -->

	<!-- Slide Up Modal -->
	<div class="modal fade actionModal"  tabindex="-1" role="dialog" aria-labelledby="modal-slideup" aria-hidden="true">
		<div class="modal-dialog modal-dialog-slideup modal-xl" role="document">
			<div class="modal-content">
				<div class="block block-themed block-transparent mb-0">
					<div class="block-header bg-primary-dark">
						<h3 class="block-title">Action Modal</h3>
						<div class="block-options">
							<button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
								<i class="si si-close"></i>
							</button>
						</div>
					</div>
					<div class="block-content">

						<div id="contents"></div>

					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>

				</div>
			</div>
		</div>
	</div>
	<!-- END Slide Up Modal -->

	<!-- Footer -->
	<footer id="page-footer" class="opacity-0">
		<div class="content py-20 font-size-sm clearfix">
			<div class="float-right">
				APP VERSION  <a class="font-w600" href="" target="_blank">1.0</a> | Loading <strong>{elapsed_time} s</strong>
			</div>
			<div class="float-left">
				<a class="font-w600" href="" target="_blank">IGMS</a> &copy; <span><?php echo date('Y'); ?></span>
			</div>
		</div>
	</footer>
	<!-- END Footer -->
</div>
<!-- END Page Container -->

<!-- Onboarding Modal functionality is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _es6/pages/be_pages_dashboard.js -->
<div class="modal fade" id="modal-onboarding" tabindex="-1" role="dialog" aria-labelledby="modal-onboarding" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-popout" role="document">
        <div class="modal-content rounded">
            <div class="block block-rounded block-transparent mb-0 bg-pattern" style="background-image: url('assets/media/various/bg-pattern-inverse.png');">
                <div class="block-header justify-content-end">
                    <div class="block-options">
                        <a class="font-w600 text-danger" href="#" data-dismiss="modal" aria-label="Close">
                            Skip Intro
                        </a>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <div class="js-slider slick-dotted-inner" data-dots="true" data-arrows="false" data-infinite="false">
                        <div class="pb-50">
                            <div class="row justify-content-center text-center">
                                <div class="col-md-10 col-lg-8">
                                    <i class="si si-fire fa-4x text-primary"></i>
                                    <h3 class="font-size-h2 font-w300 mt-20">Welcome to Codebase!</h3>
                                    <p class="text-muted">
                                        This is a modal you can show to your users when they first sign in to their dashboard. It is a great place to welcome and introduce them to your application and its functionality.
                                    </p>
                                    <button type="button" class="btn btn-sm btn-hero btn-noborder btn-primary mb-10 mx-5" onclick="jQuery('.js-slider').slick('slickGoTo', 1);">
                                        Key features <i class="fa fa-arrow-right ml-5"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="slick-slide pb-50">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-8">
                                    <h3 class="font-size-h2 font-w300 mb-5">Backup</h3>
                                    <p class="text-muted">
                                        Backups are taken with every new change to ensure complete piece of mind. They are kept safe for immediate restores.
                                    </p>
                                    <h3 class="font-size-h2 font-w300 mb-5">Invoices</h3>
                                    <p class="text-muted">
                                        They are sent automatically to your clients with the completion of every project, so you don't have to worry about getting paid.
                                    </p>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-sm btn-hero btn-noborder btn-primary mb-10 mx-5" onclick="jQuery('.js-slider').slick('slickGoTo', 2);">
                                            Complete Profile <i class="fa fa-arrow-right ml-5"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slick-slide pb-50">
                            <div class="row justify-content-center text-center">
                                <div class="col-md-10 col-lg-8">
                                    <i class="si si-note fa-4x text-primary"></i>
                                    <h3 class="font-size-h2 font-w300 mt-20">Finally, let us know your name</h3>
                                    <form class="push">
                                        <input type="text" class="form-control form-control-lg py-20 border-2x" id="onboard-first-name" name="onboard-first-name" placeholder="Enter your first name..">
                                    </form>
                                    <button type="button" class="btn btn-sm btn-hero btn-noborder btn-success mb-10 mx-5" data-dismiss="modal" aria-label="Close">
                                        Get Started <i class="fa fa-check ml-5"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Onboarding Modal -->



<?php include $footer; ?>

<script>
	jQuery(function(){ Codebase.helpers(['slimscroll','table-tools','ckeditor', 'maxlength', 'select2', 'tags-inputs','notify']); });
    //jQuery("#modal-onboarding").modal("show");
	$(document).on('click','#actionModal',function (e) {
		Codebase.layout('header_loader_on')
		//$('.az-content-body').LoadingOverlay("show");
		e.preventDefault();
		let c = ($(this).attr('c'));
		let f = ($(this).attr('f'));
		let d = ($(this).attr('d'));
		let o = ($(this).attr('o'));
		$.ajax({
			type : 'GET',
			url : '<?php echo site_url(); ?>'+ c +'/' + f + '/' + d + '/' + o,
			success:function (data) {
				//$('.az-content-body').LoadingOverlay("hide");
				$('#contents').html(data);
				$('.actionModal').modal("show");
				Codebase.layout('header_loader_off')
			}
		});
	});

	$(document).on('click','#saveModal',function (e) {
		Codebase.layout('header_loader_on')
		e.preventDefault();
		let c = ($(this).attr('c'));
		let f = ($(this).attr('f'));
		let d = ($(this).attr('d'));
		let o = ($(this).attr('o'));
		var form = $('form').get(0);
		var formData  = new FormData(form);
		$.ajax({
			type : 'POST',
			data : $('form').serialize(),
			//data : formData,
			//processData: false,
			//contentType: false,
			url : '<?php echo site_url(); ?>'+ c +'/' + f + '/' + d + '/'+ o,
			success:function (data) {
				$('#contents').html(data);
				Codebase.layout('header_loader_off')
			}
		});
	});

	$(document).on('change','#returnType',function (e){
        e.preventDefault();
        let returnType      = $(this).val();
        $('[name="startingDate"]').val(null);
        $('[name="endingDate"]').val(null);
        $('#schedule').html(null);
        if (returnType == 1){
            $('#startingDate').removeAttr('readonly');
            $('#loanPeriod').attr('readonly',true);
            $('[name="loanPeriod"]').val(0);
            Codebase.layout('header_loader_on');
            $.ajax({
                url : "<?php echo site_url('Base/loanInterest') ?>",
                type: "POST",
                data: $('form').serialize(),
                dataType : "JSON",
                success: function(data)
                {
                    let html    = '';
                    $('#error').html(html);
                    if (data.error !== null){
                        html	= '<div class="alert alert-danger  text-center" role="alert"><p class="m-none text-semibold h6">'+data.error+'</p></div>';
                        $('#error').html(html);
                        Codebase.layout('header_loader_off')
                    }
                    else{
                        $('[name="loanInterest"]').val(data.interest);
                        $('[name="totalLoan"]').val(data.total);
                        $('[name="return"]').val(data.returns);
                        Codebase.layout('header_loader_off')
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                    Codebase.layout('header_loader_off')
                }
            });
        }else {
            $('#loanPeriod').removeAttr('readonly');
            $('#startingDate').removeAttr('readonly');
            $('#loanPeriod').attr('required',true);
            Codebase.layout('header_loader_on');
            $.ajax({
                url : "<?php echo site_url('Base/loanInterest') ?>",
                type: "POST",
                data: $('form').serialize(),
                dataType : "JSON",
                success: function(data)
                {
                    let html    = '';
                    $('#error').html(html);
                    if (data.error !== null){
                        html	= '<div class="alert alert-danger  text-center" role="alert"><p class="m-none text-semibold h6">'+data.error+'</p></div>';
                        $('#error').html(html);
                        Codebase.layout('header_loader_off')
                    }
                    else{
                        $('[name="loanInterest"]').val(data.interest);
                        $('[name="totalLoan"]').val(data.total);
                        $('[name="return"]').val(data.returns);
                        Codebase.layout('header_loader_off')
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                    Codebase.layout('header_loader_off')
                }
            });
        }
    });

    $(document).on('change','#loanPeriod',function (e){
        e.preventDefault();
        $.ajax({
            url : "<?php echo site_url('Base/loanInterest') ?>",
            type: "POST",
            data: $('form').serialize(),
            dataType : "JSON",
            success: function(data)
            {
                let html    = '';
                $('#error').html(html);
                if (data.error !== null){
                    html	= '<div class="alert alert-danger  text-center" role="alert"><p class="m-none text-semibold h6">'+data.error+'</p></div>';
                    $('#error').html(html);
                    Codebase.layout('header_loader_off')
                }
                else{
                    $('[name="loanInterest"]').val(data.interest);
                    $('[name="totalLoan"]').val(data.total);
                    $('[name="return"]').val(data.returns);
                    Codebase.layout('header_loader_off')
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                Codebase.layout('header_loader_off')
            }
        });
    });

    $(document).on('change','#startingDate',function () {
        let html = '';
        Codebase.layout('header_loader_on');
        $.ajax({
            url : "<?php echo site_url('Base/loanEnd') ?>",
            type: "POST",
            data: $('form').serialize(),
            dataType : "JSON",
            success: function(data)
            {
                $('#error').html(html);
                if (data.error != null){
                    html	= '<div class="alert alert-danger  text-center" role="alert"><p class="m-none text-semibold h6">'+data.error+'</p></div>';
                    $('#error').html(html);
                    $('[name="endingDate"]').val(null);

                    Codebase.layout('header_loader_off')
                }
                else{
                    $('[name="endingDate"]').val(data.endingDate);
                    $('#schedule').html(data.schedule);
                    Codebase.layout('header_loader_off')
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                Codebase.layout('header_loader_off')
            }
        });
    });

    $(document).on('change','.return',function () {
        let html = '';
        let return_id = ($(this).attr('return_id'));
        let amount 	= $(this).val();
        let idValue	=  (this.id);
        Codebase.layout('header_loader_on');
        $.ajax({
            url : "<?php echo site_url('Loans/loanReturn/') ?>"+amount+"/"+idValue,
            type: "POST",
            //data: $('form').serialize(),
            dataType : "JSON",
            success: function(data)
            {
                $('#error').html(html);
                if (data.error != null){
                    html	= '<div class="alert alert-danger  text-center" role="alert"><p class="m-none text-semibold h6">'+data.error+'</p></div>';
                    $('#error').html(html);
                    Codebase.layout('header_loader_off')
                }
                else{
                    returnCalculation(return_id);
                    Codebase.layout('header_loader_off')
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                Codebase.layout('header_loader_off')
            }
        });
    });

    function returnCalculation(return_id = null){
        $.ajax({
            url : "<?php echo site_url('Base/returnCalculation/') ?>"+return_id,
            type: "POST",
            //data: $('form').serialize(),
            dataType : "JSON",
            success: function(data)
            {
                $('#target').html(data.target);
                $('#collected').html(data.collected);
                $('#balance').html(data.balance);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                Codebase.layout('header_loader_off')
            }
        });
    }

    $(document).on('click','#processLoan',function (e) {
        e.preventDefault();
        let process = $(this).val();
        $.confirm({
            theme: 'supervan',
            title: 'Process Loan',
            content: 'You are about to process loan. Are you sure ?',
            autoClose: 'cancel|10000',
            buttons: {
                confirm: function () {
                    html	= '';
                    $('#error').html(html);
                    var jc =     $.dialog({
                        icon: 'fa fa-spinner fa-spin',
                        title: 'Processing loan',
                        content: 'Loan processing. Please wait',
                        closeIcon: false,
                    });
                    jc.open();
                    $.ajax({
                        url : '<?php echo site_url("Base/loanEnd/"); ?>'+process,
                        type: "POST",
                        data : $('form').serialize(),
                        dataType : "JSON",
                        success: function(data)
                        {
                            if (data.error == null){
                                $.confirm({
                                    icon: 'fa fa-check-circle',
                                    title: 'Process Complete',
                                    content: 'Loan processing is successfully complete.',
                                    type: 'green',
                                    buttons: {
                                        btn1: {
                                            text: 'New loan',
                                            btnClass: 'btn-green',
                                            action	: function () {
                                                window.location.assign("<?php echo site_url('Loans/request') ?>");
                                            }
                                        },
                                        btn2: {
                                            text: 'Exit',
                                            btnClass: 'btn-red',
                                            action	: function () {
                                                window.location.assign("<?php echo site_url('Loans') ?>");
                                            }
                                        }
                                    }
                                });
                            }else{
                                $('#error').html(data.error);
                            }
                            jc.close();

                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            alert('Error adding / update data');
                        }
                    });
                },
                cancel: function () {
                    $.alert('You have canceled!');
                },
            }
        });
    });

    $(document).on('click','#saveReturns',function (e) {
        e.preventDefault();
        //let process = $(this).val();
        let process = ($(this).attr('return_id'));
        $.confirm({
            theme: 'supervan',
            title: 'Process Returns',
            content: 'You are about to process returns. Are you sure ?',
            autoClose: 'cancel|10000',
            buttons: {
                confirm: function () {
                    html	= '';
                    $('#error').html(html);
                    var jc =     $.dialog({
                        icon: 'fa fa-spinner fa-spin',
                        title: 'Processing return',
                        content: 'Returns processing. Please wait',
                        closeIcon: false,
                    });
                    jc.open();
                    $.ajax({
                        url : '<?php echo site_url("Loans/processReturns/"); ?>'+process,
                        type: "POST",
                        data : $('form').serialize(),
                        dataType : "JSON",
                        success: function(data)
                        {
                            if (data.error == null){
                                $.confirm({
                                    icon: 'fa fa-check-circle',
                                    title: 'Process Complete',
                                    content: 'Returns processing is successfully complete.',
                                    type: 'green',
                                    buttons: {
                                        btn1: {
                                            text: 'New returns',
                                            btnClass: 'btn-green',
                                            action	: function () {
                                                window.location.assign("<?php echo site_url('Loans/returns') ?>");
                                            }
                                        },
                                        btn2: {
                                            text: 'Exit',
                                            btnClass: 'btn-red',
                                            action	: function () {
                                                window.location.assign("<?php echo site_url('Loans') ?>");
                                            }
                                        }
                                    }
                                });
                            }else{
                                $('#error').html(data.error);
                            }
                            jc.close();

                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            alert('Error adding / update data');
                        }
                    });
                },
                cancel: function () {
                    $.alert('You have canceled!');
                },
            }
        });
    });

    $(document).on('click','#initialLoanReject',function (e) {
        e.preventDefault();
        //let process = $(this).val();
        let process = ($(this).attr('d'));
        $.confirm({
            theme: 'supervan',
            title: 'Reject Loan',
            content: 'You are about to reject loan. Are you sure ?',
            autoClose: 'cancel|10000',
            buttons: {
                confirm: function () {
                    html	= '';
                    $('#error').html(html);
                    var jc =     $.dialog({
                        icon: 'fa fa-spinner fa-spin',
                        title: 'Processing rejection',
                        content: 'Rejection processing. Please wait',
                        closeIcon: false,
                    });
                    jc.open();
                    $.ajax({
                        url : '<?php echo site_url("Loans/initialLoanReject/"); ?>'+process,
                        type: "POST",
                        data : $('form').serialize(),
                        dataType : "JSON",
                        success: function(data)
                        {
                            if (data.error == null){
                                $.confirm({
                                    icon: 'fa fa-check-circle',
                                    title: 'Process Complete',
                                    content: 'Loan rejection is successfully complete.',
                                    type: 'green',
                                    buttons: {
                                        btn1: {
                                            text: 'Refresh',
                                            btnClass: 'btn-green',
                                            action	: function () {
                                                window.location.assign("<?php echo site_url('Loans') ?>");
                                            }
                                        },
                                        /*btn2: {
                                            text: 'Exit',
                                            btnClass: 'btn-red',
                                            action	: function () {
                                                window.location.assign("<?php //echo site_url('Loans') ?>");
                                            }
                                        }*/
                                    }
                                });
                            }else{
                                $('#error').html(data.error);
                            }
                            jc.close();

                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            alert('Error adding / update data');
                        }
                    });
                },
                cancel: function () {
                    $.alert('You have canceled!');
                },
            }
        });
    });

    $(document).on('click','#initialLoanApprove',function (e) {
        e.preventDefault();
        //let process = $(this).val();
        let process = ($(this).attr('d'));
        $.confirm({
            theme: 'supervan',
            title: 'Approve Loan',
            content: 'You are about to approve loan. Are you sure ?',
            autoClose: 'cancel|10000',
            buttons: {
                confirm: function () {
                    html	= '';
                    $('#error').html(html);
                    var jc =     $.dialog({
                        icon: 'fa fa-spinner fa-spin',
                        title: 'Processing approval',
                        content: 'Approval processing. Please wait',
                        closeIcon: false,
                    });
                    jc.open();
                    $.ajax({
                        url : '<?php echo site_url("Loans/initialLoanApprove/"); ?>'+process,
                        type: "POST",
                        data : $('form').serialize(),
                        dataType : "JSON",
                        success: function(data)
                        {
                            if (data.error == null){
                                $.confirm({
                                    icon: 'fa fa-check-circle',
                                    title: 'Process Complete',
                                    content: 'Loan approval is successfully complete.',
                                    type: 'green',
                                    buttons: {
                                        btn1: {
                                            text: 'Refresh',
                                            btnClass: 'btn-green',
                                            action	: function () {
                                                window.location.assign("<?php echo site_url('Loans') ?>");
                                            }
                                        },
                                        /*btn2: {
                                            text: 'Exit',
                                            btnClass: 'btn-red',
                                            action	: function () {
                                                window.location.assign("<?php //echo site_url('Loans') ?>");
                                            }
                                        }*/
                                    }
                                });
                            }else{
                                $('#error').html(data.error);
                            }
                            jc.close();

                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            alert('Error adding / update data');
                        }
                    });
                },
                cancel: function () {
                    $.alert('You have canceled!');
                },
            }
        });
    });

    $(document).on('click','#initialReturnsReject',function (e) {
        e.preventDefault();
        //let process = $(this).val();
        let process = ($(this).attr('d'));
        $.confirm({
            theme: 'supervan',
            title: 'Reject Return',
            content: 'You are about to reject returns. Are you sure ?',
            autoClose: 'cancel|10000',
            buttons: {
                confirm: function () {
                    html	= '';
                    $('#error').html(html);
                    var jc =     $.dialog({
                        icon: 'fa fa-spinner fa-spin',
                        title: 'Processing rejection',
                        content: 'Rejection processing. Please wait',
                        closeIcon: false,
                    });
                    jc.open();
                    $.ajax({
                        url : '<?php echo site_url("Loans/initialReturnReject/"); ?>'+process,
                        type: "POST",
                        data : $('form').serialize(),
                        dataType : "JSON",
                        success: function(data)
                        {
                            if (data.error == null){
                                $.confirm({
                                    icon: 'fa fa-check-circle',
                                    title: 'Process Complete',
                                    content: 'Loan rejection is successfully complete.',
                                    type: 'green',
                                    buttons: {
                                        btn1: {
                                            text: 'Refresh',
                                            btnClass: 'btn-green',
                                            action	: function () {
                                                window.location.assign("<?php echo site_url('Loans/returns') ?>");
                                            }
                                        },
                                        /*btn2: {
                                            text: 'Exit',
                                            btnClass: 'btn-red',
                                            action	: function () {
                                                window.location.assign("<?php //echo site_url('Loans') ?>");
                                            }
                                        }*/
                                    }
                                });
                            }else{
                                $('#error').html(data.error);
                            }
                            jc.close();

                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            alert('Error adding / update data');
                        }
                    });
                },
                cancel: function () {
                    $.alert('You have canceled!');
                },
            }
        });
    });

    $(document).on('click','#initialReturnsApprove',function (e) {
        e.preventDefault();
        //let process = $(this).val();
        let process = ($(this).attr('d'));
        $.confirm({
            theme: 'supervan',
            title: 'Approve Return',
            content: 'You are about to approve loan. Are you sure ?',
            autoClose: 'cancel|10000',
            buttons: {
                confirm: function () {
                    html	= '';
                    $('#error').html(html);
                    var jc =     $.dialog({
                        icon: 'fa fa-spinner fa-spin',
                        title: 'Processing approval',
                        content: 'Approval processing. Please wait',
                        closeIcon: false,
                    });
                    jc.open();
                    $.ajax({
                        url : '<?php echo site_url("Loans/initialLoanApprove/"); ?>'+process,
                        type: "POST",
                        data : $('form').serialize(),
                        dataType : "JSON",
                        success: function(data)
                        {
                            if (data.error == null){
                                $.confirm({
                                    icon: 'fa fa-check-circle',
                                    title: 'Process Complete',
                                    content: 'Loan approval is successfully complete.',
                                    type: 'green',
                                    buttons: {
                                        btn1: {
                                            text: 'Refresh',
                                            btnClass: 'btn-green',
                                            action	: function () {
                                                window.location.assign("<?php echo site_url('Loans') ?>");
                                            }
                                        },
                                        /*btn2: {
                                            text: 'Exit',
                                            btnClass: 'btn-red',
                                            action	: function () {
                                                window.location.assign("<?php //echo site_url('Loans') ?>");
                                            }
                                        }*/
                                    }
                                });
                            }else{
                                $('#error').html(data.error);
                            }
                            jc.close();

                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            alert('Error adding / update data');
                        }
                    });
                },
                cancel: function () {
                    $.alert('You have canceled!');
                },
            }
        });
    });

	//Increment the idle time counter every minute.
	var idleInterval = setInterval(timerIncrement, 60000); // 1 minute
	idleTime = 0;
	//Zero the idle timer on mouse movement.
	$(this).mousemove(function (e) {
		idleTime = 0;
	});

	$(this).keypress(function (e) {
		idleTime = 0;
	});

	function timerIncrement() {
		idleTime = idleTime + 1;
		if (idleTime > 4) {
			window.location.assign("<?php echo site_url('Auth/lock') ?>");
		}
	}

</script>
</body>
</html>
