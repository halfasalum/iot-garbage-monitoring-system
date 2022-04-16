<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Modules & Controls </h2>
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

                <!-- VPS -->


                <?php if (in_array(17,$this->session->userdata('controls'))){ ?>
                <div class="d-flex justify-content-between align-items-center mt-50 mb-20">
                    <h2 class="h4 font-w300 mb-0">Modules Controls (<?php echo $total_control; ?>)</h2>
                    <button type="button" class="btn btn-primary btn-sm btn-alt-primary btn-rounded" onclick="Codebase.blocks('#cb-add-server1', 'open');">
                        <i class="fa fa-plus mr-1"></i> Add Module Control
                    </button>
                </div>
                <?php } ?>
                <div id="cb-add-server1" class="block bg-body-light animated fadeIn d-none">
                    <div class="block-header">
                        <h3 class="block-title">Add a new module control</h3>
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
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="example-hosting-name" name="name" placeholder="Control name" required>
                            </div>
                            <div class="col-md-4">
                                <select class="custom-select" id="example-hosting-vps" name="module">
                                    <option value="" selected disabled>Select a module</option>
                                    <?php
                                    if (isset($modules)){
                                        foreach ($modules as $module){
                                            ?>
                                            <option value="<?php echo $module->module_id ?>"><?php echo $module->module_desc; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <?php
                                if (in_array(17,$this->session->userdata('controls'))){
                                    ?>
                                    <button type="submit" name="control" class="btn btn-alt-success btn-block">
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
                if (in_array(15,$this->session->userdata('controls'))){
                    ?>

                    <!-- Full Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-vcenter" style="font-size: 11px !important;">
                            <thead>
                            <tr>
                                <th class="text-center" >S/N</th>
                                <th class="text-center" >ACCESS KEY</th>
                                <th>Control</th>
                                <th>Module</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($controls)){
                                $sn = 1;
                                foreach ($controls as $control){
                                    ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo $sn; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $control->control_id; ?>
                                        </td>
                                        <td class="font-w600"><?php echo $control->control_name; ?></td>
                                        <td>
                                            <?php echo $control->module_desc; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                            if (in_array(18,$this->session->userdata('controls'))){
                                                ?>
                                                <a class="btn btn-sm btn-outline-secondary btn-rounded mr-5 my-5" href="javascript:void(0)" data-toggle="modal" data-target="#modal-slideup">
                                                    <i class="fa fa-wrench mr-5"></i> Edit
                                                </a>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if (in_array(19,$this->session->userdata('controls'))){
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
                                    $sn++;
                                }
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- END Full Table -->
                    <?php
                }
                ?>
                <!-- END VPS -->

            </div>

        </div>
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->
