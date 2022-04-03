<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Application Services </h2>
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


                <?php //if (in_array(17,$this->session->userdata('controls'))){ ?>
                <div class="d-flex justify-content-between align-items-center mt-50 mb-20">
                    <h2 class="h4 font-w300 mb-0">Services </h2>
                    <button type="button" class="btn btn-primary btn-sm btn-alt-primary btn-rounded" onclick="Codebase.blocks('#cb-add-server1', 'open');">
                        <i class="fa fa-plus mr-1"></i> Add Service
                    </button>
                </div>
                <?php //} ?>
                <div id="cb-add-server1" class="block bg-body-light animated fadeIn d-none">
                    <div class="block-header">
                        <h3 class="block-title">Add a new application service</h3>
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
                                <input type="time" class="form-control" id="example-hosting-name" name="time" placeholder="Run at" required>
                            </div>
                            <div class="col-md-4">
                                <select class="custom-select" id="example-hosting-vps" name="type">
                                    <option value="" selected disabled>Select a core service</option>
                                    <?php
                                    if (isset($types)){
                                        foreach ($types as $type){
                                            ?>
                                            <option value="<?php echo $type->type_id ?>"><?php echo $type->type_name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <?php
                                //if (in_array(17,$this->session->userdata('controls'))){
                                    ?>
                                    <button type="submit" name="save" class="btn btn-alt-success btn-block">
                                        <i class="fa fa-plus mr-1"></i> Save
                                    </button>
                                    <?php
                                //}
                                ?>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>


                <?php
                //if (in_array(15,$this->session->userdata('controls'))){
                    ?>

                    <!-- Full Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-vcenter" style="font-size: 11px !important;">
                            <thead>
                            <tr>
                                <th class="text-center" >S/N</th>
                                <th class="text-center" >Service Name</th>
                                <th class="text-center" >Run At</th>
                                <th class="text-center">Last Run</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($services)){
                                $sn = 1;
                                foreach ($services as $service){
                                    ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo $sn; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $service->type_name; ?>
                                        </td>
                                        <td class="font-w600 text-center "><?php echo date('h:i A', strtotime($service->service_run)); ?></td>
                                        <td class="font-w600 text-center"><?php echo date('Y-m-d h:i A', strtotime($service->service_last_run)); ?></td>
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
                //}
                ?>
                <!-- END VPS -->

            </div>

        </div>
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->
