<!--
           Codebase JS Core

           Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
           to handle those dependencies through webpack. Please check out assets/_es6/main/bootstrap.js for more info.

           If you like, you could also include them separately directly from the assets/js/core folder in the following
           order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

           assets/js/core/jquery.min.js
           assets/js/core/bootstrap.bundle.min.js
           assets/js/core/simplebar.min.js
           assets/js/core/jquery-scrollLock.min.js
           assets/js/core/jquery.appear.min.js
           assets/js/core/jquery.countTo.min.js
           assets/js/core/js.cookie.min.js
       -->
<script src="<?php echo base_url("assets/js/codebase.core.min.js") ?>"></script>
<!--
Codebase JS

Custom functionality including Blocks/Layout API as well as other vital and optional helpers
webpack is putting everything together at assets/_es6/main/app.js
-->
<script src="<?php echo base_url("assets/js/codebase.app.min.js"); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>
<script src="<?php echo base_url("assets/js/plugins/masked-inputs/jquery.maskedinput.min.js"); ?>"></script>


<!-- Page JS Plugins -->
<script src="<?php echo base_url("assets/js/plugins/nestable2/jquery.nestable.min.js"); ?>"></script>

<!-- Page JS Code -->
<script src="<?php echo base_url("assets/js/pages/be_comp_nestable.min.js"); ?>"></script>

<!-- Page JS Plugins -->
<script src="<?php echo base_url("assets/js/plugins/datatables/jquery.dataTables.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/plugins/datatables/dataTables.bootstrap4.min.js"); ?>"></script>

<!-- Page JS Code -->
<script src="<?php echo base_url("assets/js/pages/be_tables_datatables.min.js"); ?> "></script>

<script src="<?php echo base_url("assets/js/plugins/jquery-slimscroll/jquery.slimscroll.min.js") ?>"></script>

<script src="<?php echo base_url("assets/js/plugins/select2/js/select2.full.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/plugins/ckeditor/ckeditor.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/customs/auth.js"); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>


