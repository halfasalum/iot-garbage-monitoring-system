<!doctype html>
<html lang="en" class="no-focus">
   <?php include $header; ?>
    <body>
		<div id="page-container" class="main-content-boxed">

         <?php require_once $page; ?>
        </div>


    <?php include $footer; ?>
	<script type = "text/javascript" >
        jQuery(function(){ Codebase.helpers(['slimscroll','table-tools','ckeditor', 'maxlength', 'select2', 'tags-inputs','notify']); });
        var base_url  = "<?php echo base_url(); ?>";
		<?php $method = $this->router->fetch_method(); $class = $this->router->fetch_class(); if ($method == 'lock'){  ?>
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
				window.location.assign("<?php echo site_url('Auth/signOut') ?>");

			}
		}

		<?php  } ?>
	</script>
    </body>
</html>
