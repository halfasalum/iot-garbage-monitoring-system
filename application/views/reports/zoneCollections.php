<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Report - Zone Collections </h2>
        <!--<p>This is the default Header style, transparent but with equal top/bottom padding (now that it is fixed - screen width greater than 991px).</p>-->
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <div class="block-content block-content-full">

                        <?php if (isset($message) && $message['description'] != null): ?>
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
                        <h2 class="content-heading">Report parameters</h2>
                        <?php echo form_open(""); ?>
                        <div class="form-group row gutters-tiny mb-0 items-push">
                            <div class="col-md-2">
                                <label for="exampleInputUsername2">From</label>
                                <input type="date" class="form-control form-control-sm" id="exampleInputUsername2" value="<?php echo $start; ?>"
                                       name="start" required>
                            </div>
                            <div class="col-md-2">
                                <label for="exampleInputPassword2">To</label>
                                <input type="date" class="form-control form-control-sm" id="exampleInputPassword2" value="<?php echo $end; ?>"
                                       name="end" required>
                            </div>
                            <div class="col-md-2">
                                <label for="exampleInputPassword2"> </label>
                                <select class="form-control" id="example-select" name="zone" required>
                                    <option selected disabled>Please select zone</option>
                                    <?php
                                    if (isset($zones) && sizeof($zones) > 0){
                                        if (sizeof($zones) > 1){
                                            ?>
                                            <option value="0" >All zones</option>
                                                <?php
                                        }
                                        foreach ($zones as $zone){
                                            ?>
                                            <option value="<?php echo $zone->zone_id; ?>" > <?php echo $zone->zone_name; ?> </option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                                </button>
                            </div>
                            <div class="col-md-2">
                                <label for="exampleInputPassword2"> </label>
                                <select class="form-control" id="example-select" name="mode" required>
                                    <option selected disabled>Please select mode</option>
                                    <option value="1">Detailed Report</option>
                                    <option value="2">Summary Report</option>
                                </select>
                                </button>
                            </div>
                            <div class="col-md-2">
                                <label for="exampleInputPassword2"> </label>
                                <button type="submit" class="btn btn-primary btn-sm btn-block" name="run">Run
                                </button>
                            </div>
                            <div class="col-md-2">
                                <label for="exampleInputPassword2"> </label>
                                <button type="submit" class="btn btn-success btn-sm btn-block" name="download" disabled>Download
                                </button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                        <hr>
                        <div class="form-group row gutters-tiny mb-0 items-push">
                            <div class="col-md-12">
                                <?php if (isset($data)){ echo $data; } ?>
                            </div>
                        </div>



                    </div>
                </div>
            </div>

        </div>
        <!-- END Dummy content -->
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->
