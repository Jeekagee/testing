
<style type="text/css">
  .li-style{
    border-bottom: medium;
    background-color:#f4f9f9;
    padding: 8px;
    color: #314e52;
  }
  .li-style:hover{
    background-color:#e7e6e1;
    color: #f2a154;
  }
</style>
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">  
        <h3>Add New Order</h3>
        <div class="row mt">
          <div class="col-lg-8">
            <form action="<?php echo base_url(); //300?>Orders/validation" method="post" enctype="multipart/form-data">
            <div class="form-panel">
              <h4 class="mb"></i> Order Profile
              </h4>
              <div class="form-horizontal style-form">

                <div id="validation">
                  <?php
                  if ($this->session->flashdata('addordersuccess')) {
                    echo $this->session->flashdata('addordersuccess');
                  }
                  ?>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">Vehicle No <span style="color: red;"> *</span></label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="vehicle_no" id="vehicle_no" value="<?php echo set_value('vehicle_no'); ?>">
                      <div id="vehicle_no_list"></div>
                      <span class="text-danger"><?php echo form_error('vehicle_no'); ?></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">Customer Name <span style="color: red;"> *</span></label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="customer_name" id="customer_name" value="<?php echo set_value('customer_name'); ?>">
                      <span class="text-danger"><?php echo form_error('customer_name'); ?></span>
                  </div>
                </div>

                <div class="form-group" id="c_no">
                  <label class="col-sm-4 control-label">Contact No<span style="color: red;"> *</span></label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="contact_no" id="contact_no" value="<?php echo set_value('contact_no'); ?>">
                      <span class="text-danger"><?php echo form_error('contact_no'); ?></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">Bill No <span style="color: red;"> *</span></label>
                  <div class="col-sm-8">
                    <input disabled type="text" class="form-control" name="bill_no" id="bill_no" value="<?php echo $bill_no; ?>">
                    <span class="text-danger"><?php echo form_error('bill_no'); ?></span>
                  </div>
                </div>

                <?php
                  $month = date('m');
                  $day = date('d');
                  $year = date('Y');
                  
                  $today = $year . '-' . $month . '-' . $day;
                ?>

                <div class="form-group">
                  <label class="col-sm-4 control-label">Bill Date <span style="color: red;"> *</span></label>
                  <div class="col-sm-8">
                    <input type="date" value="<?php echo $today; ?>" class="form-control" name="bill_date" id="bill_date">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Type</label>
                  <div class="col-md-7">
                    <select class="form-control" name="type" id="type">
                      <?php
                        foreach($vehicle_types as $types){
                          $type = $types->type;
                          echo "<option value='$type'>$type</option>";
                        }
                      ?>
                    </select>
                  </div>

                  <div class="col-sm-1" style="padding-right: 0px; padding-left: 0px;">
                      <!-- Trigger the modal with a button -->
                      <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#addType">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                      </button>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-md-4 control-label">Make</label>
                  <div class="col-md-7">
                    <select class="form-control" name="make" id="make">
                      <?php
                        foreach($vehicle_makes as $makes){
                          $make = $makes->make;
                          echo "<option value='$make'>$make</option>";
                        }
                      ?>
                    </select>
                  </div>
                  
                  <div class="col-sm-1" style="padding-right: 0px; padding-left: 0px;">
                      <!-- Trigger the modal with a button -->
                      <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#addMake">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                      </button>
                  </div>
                  
                </div>

                <div class="form-group">
                  <label class=" col-sm-4 control-label">Select Bay</label>
                  <div class="form-check-inline col-sm-8">
                      <?php
                        foreach($bays as $bay){
                          ?>
                            <label class="checkbox-inline">
                              <input checked type="checkbox" id="inlineCheckbox1" value="<?php echo $bay->bay_name; ?>" name="bay[]">
                              <?php echo $bay->bay_name; ?>
                            </label>
                          <?php
                        }
                      ?>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class=" col-sm-4 control-label">SMS Reminder</label>
                    <div class="form-check-inline col-sm-8">
                      <label class="form-check-label" style="margin:10px;">
                        <input type="radio" class="form-check-input" name="reminder" checked value="7">   7 Days
                      </label>
                      <label class="form-check-label" style="margin:10px;">
                        <input value="15" type="radio" class="form-check-input" name="reminder">   15 Days
                      </label>
                      <label class="form-check-label" style="margin:10px;">
                        <input value="30" type="radio" class="form-check-input" name="reminder">   30 Days
                      </label>
                      <label class="form-check-label" style="margin:10px;">
                        <input value="45" type="radio" class="form-check-input" name="reminder"> 45 Days
                      </label>
                      <label class="form-check-label" style="margin:10px;">
                        <input value="60" type="radio" class="form-check-input" name="reminder"> 60 Days
                      </label>
                      <label class="form-check-label" style="margin:10px;">
                        <input value="90" type="radio" class="form-check-input" name="reminder"> 90 Days
                      </label>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Service</label>
                  <div class="col-md-3">
                    <select class="form-control" name="service" id="service">
                      <option value="">Select Service</option>
                      <?php
                        foreach($services as $ser){
                          $service = $ser->service;
                          $id = $ser->service_id;
                          echo "<option value='$id'>$service</option>";
                        }
                      ?>
                    </select>
                    <span class="text-danger" id="service_error"></span>
                  </div>
                  <div class="col-md-3" style="padding: 0px 8px;">
                    <select type="text" class="form-control" name="department" id="department">
                    <span class="text-danger"><?php echo form_error('department'); ?></span>
                    <!-- <select class="form-control" name="department" id="department"> -->
                      <option value="">Select Department</option>
                      <?php
                              foreach ($departments as $dep) {
                                echo "<option value='$dep->department_id'>$dep->department</option>";
                              }
                            ?>
                    </select>
                    <span class="text-danger" id="service_error"></span>
                  </div>
                  <div class="col-md-2" style="padding: 0px 16px;">
                    <input type="text" class="form-control" name="ser_amount" id="ser_amount">
                    <span class="text-danger"><?php echo form_error('ser_amount'); ?></span>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-8">
                      <a id="add_service" class="btn btn-success">Add Service</a>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-4"></div>
                    <div class="col-sm-8" id="service_tbl">
                          
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Other Service</label>
                  <div class="col-md-3">
                    <input type="text" class="form-control" id="oservice" name="oservice" placeholder="Type Other Service here">
                    <span class="text-danger" id="oservice_error"></span>
                  </div>
                  <div class="col-md-3">
                    <select class="form-control" name="odepartment" id="odepartment">
                      <option value="">Select Department</option>
                      <?php
                              foreach ($departments as $dep) {
                                echo "<option value='$dep->department_id'>$dep->department</option>";
                              }
                            ?>
                    </select>
                    <span class="text-danger"><?php echo form_error('department'); ?></span>
                  </div>
                  <div class="col-md-2">
                    <input type="text" class="form-control" name="oser_amount" id="oser_amount" placeholder="Amount">
                    <span class="text-danger"><?php echo form_error('ser_amount'); ?></span>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-8">
                      <a id="add_oservice" class="btn btn-success">Add</a>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-4"></div>
                    <div class="col-sm-8" id="oservice_tbl">
                          
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Order Items</label>
                  <div class="col-md-4">
                    <select class="form-control" name="items" id="items">
                      <option value="">Select Item</option>
                      <?php
                        foreach($items as $item){
                          $id = $item->item_id;
                          $name = $item->item_name;
                          $qty = $item->quantity;
                          $p_id = $item->id; // Auto id of purchase

                          if ($qty == 0) {
                            $disabled = "disabled";
                          }
                          else{
                            $disabled = "";
                          }

                          if ($qty > 5) {
                            $clr = "";
                          }
                          else{
                            $clr = "#FF9966";
                          }
                          echo "<option style='background-color:$clr;' $disabled value='$p_id'>$name - $id($qty)</option>";
                        }
                      ?>
                    </select>
                    <span class="text-danger" id="item_error"></span>
                  </div>

                  <div class="col-md-2">
                    <input type="text" placeholder="Quantity" class="form-control" name="qty" id="qty">
                    
                  </div>

                  <div class="col-md-2">
                    <input type="text" class="form-control" name="item_amount" id="item_amount">
                    
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-8">
                      <a id="add_item" class="btn btn-success">Add Item</a>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-4"></div>
                    <div class="col-sm-8" id="item_tbl">
                          
                    </div>
                </div>

                <div class="form-group">
                <div class="col-sm-4"></div>
                  <label class="col-sm-2 control-label">Current km</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="ckm" id="ckm">
                    <span class="text-danger"><?php echo form_error('ckm'); ?></span>
                  </div>

                  <label class="col-sm-2 control-label text-right">Next km</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="nkm" id="nkm">
                    <span class="text-danger"><?php echo form_error('nkm'); ?></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">Discount <span style="color: red;"> *</span></label>
                  <div class="col-sm-8">
                    <input type="text" value="0" class="form-control" name="discount" id="discount">
                    <span class="text-danger"><?php echo form_error('discount'); ?></span>
                  </div>
                </div>


                <div class="form-group" style="display:none;">
                  <label class="col-sm-4 control-label">Image <span style="color: red;"> *</span></label>
                  <div class="col-sm-8">
                    <input type="file" class="form-control" name="img">
                    <span class="text-danger"><?php echo form_error('img'); ?></span>
                  </div>
                </div>
                

                <div class="form-group" style="display:none" id="submit_btn">
                  <div class="col-sm-12 ">
                    <input type="submit" class="btn btn-primary pull-right mr-5" value="Add Order" name="submit">
                    <a style="margin-right: 15px;" href="" class="pull-right btn btn-danger">Cancel</a>
                  </div>
                </div>

              </div>
            </div>
              </form>
          </div>
        </div>

         <!-- Add Type Modal -->
         <div id="addType" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Add Vehicle Type</h4>
                </div>
                <form method="post" action="<?php echo base_url(); ?>Orders/add_vehicle_type">
                <div class="modal-body">
                    <div>
                      <label>Vehicle Type</label>
                    </div>
                    <div>
                      <input class="form-control" type="text" name="v_type">
                    </div>
                  
                </div>
                <div class="modal-footer">
                  <input type="submit" name="save_type" value="Add" class="btn btn-success">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                </form>
              </div>

            </div>
          </div>

          <!-- Add make Modal -->
         <div id="addMake" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Add Vehicle Make</h4>
                </div>
                <form method="post" action="<?php echo base_url(); ?>Orders/add_vehicle_make">
                <div class="modal-body">
                    <div>
                      <label>Vehicle Make</label>
                    </div>
                    <div>
                      <input class="form-control" type="text" name="v_make">
                    </div>
                  
                </div>
                <div class="modal-footer">
                  <input type="submit" name="save_make" value="Add" class="btn btn-success">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                </form>
              </div>

            </div>
          </div>
    </section>
</section>
    <!-- /MAIN CONTENT -->

