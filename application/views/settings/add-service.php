
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3>Add Service</h3>
        
        <div class="row mb">
            <div class="col-lg-5">
                <?php echo form_open('Settings/insert_service'); ?>
                <div class="form-panel">
                        <h4 class="mb">Add New Service</h4>
                        <div id="delete_msg">
                        <?php
                            if ($this->session->flashdata('msg')) {
                            echo $this->session->flashdata('msg');
                            }
                        ?>
                        </div>
                        <div class="form-horizontal style-form">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Service<span style="color: red;"> *</span></label>
                                <div class="col-sm-8">
                                <input type="text"  class="form-control" name="service">
                                <span class="text-danger"><?php echo form_error('service'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Amount<span style="color: red;"> *</span></label>
                                <div class="col-sm-8">
                                <input type="number"  class="form-control" name="amount">
                                <span class="text-danger"><?php echo form_error('amount'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12 ">
                                    <input type="submit" class="btn btn-primary pull-right mr-5" value="Add Service" name="submit">
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>

            <div class="col-lg-6">
                <table class="table table-striped table-bordered">
                    <thead class="info">
                        <th class="text-center">#</th>
                        <th class="text-center">Service</th>
                        <th class="text-center" >Amount</th>
                        <th class="text-center" >Action</th>
                    </thead>
                    <tbody>
                        <?php
                        $i= 1;
                        foreach ($services as $ser) {
                            ?>
                                <tr class="text-center" >
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $ser->service; ?></td>
                                    <td><?php echo $ser->amount; ?>.00</td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>Settings/deleteService/<?php echo $ser->service_id; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php
                            $i++;
                        }
                        
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
  </section>
  