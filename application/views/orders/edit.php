
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
        <h3>Edit Order</h3>
        <div class="row mt">
          <div class="col-lg-8">
            <form action="<?php echo base_url(); ?>Orders/Update" method="post" enctype="multipart/form-data">
            <div class="form-panel">
              <h4 class="mb"></i> Order Profile
              </h4>
              <div class="form-horizontal style-form">

                <div id="validation">
                  <?php
                  if ($this->session->flashdata('editsuccess')) {
                    echo $this->session->flashdata('editsuccess');
                  }
                  ?>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Vehicle No <span style="color: red;"> *</span></label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="vehicle_no" id="vehicle_no" value="<?php echo $order->vehicle_no; ?>">
                      <div id="vehicle_no_list"></div>
                      <span style="color:red;"><?php echo form_error('vehicle_no'); ?></span>
                  </div>
                </div>

                <div class="form-group" id="c_no">
                  <label class="col-sm-4 control-label">Contact No<span style="color: red;"> *</span></label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="contact_no" id="contact_no" value="<?php echo $order->contact_no; ?>">
                      <span style="color:red;"><?php echo form_error('contact_no'); ?></span>
                  </div>
                </div>

                <div class="form-group" id="c_no">
                  <label class="col-sm-4 control-label">Customer Name<span style="color: red;"> *</span></label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="cus_name" id="cus_name" value="<?php echo $order->customer_name; ?>">
                      <span style="color:red;"><?php echo form_error('cus_name'); ?></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">Bill No <span style="color: red;"> *</span></label>
                  <div class="col-sm-8">
                    <input type="text" readonly class="form-control" name="bill_no" id="bill_no" value="<?php echo $order->bill_no; ?>">
                    <span style="color:red;"><?php echo form_error('bill_no'); ?></span>
                  </div>
                </div>
                
                <?php
                    $originalDate = $order->bill_date;
                    $newDate = date("Y-m-d", strtotime($originalDate));
                ?>
                
                <div class="form-group">
                  <label class="col-sm-4 control-label">Bill Date<span style="color: red;"> *</span></label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control" name="bill_date" id="bill_date" value="<?php echo $newDate; ?>">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-md-4 control-label">Type</label>
                  <div class="col-md-8">
                    <select class="form-control" name="type" id="type">
                      <?php
                        foreach($vehicle_types as $types){
                          $type = $types->type;
                            if ($type == $order->type) {
                                $stl = "selected";
                            }
                            else{
                                $stl = "";
                            }
                          echo "<option $stl value='$type'>$type</option>";
                        }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Make</label>
                  <div class="col-md-8">
                    <select class="form-control" name="make" id="make">
                      <?php
                        foreach($vehicle_makes as $makes){
                          $make = $makes->make;
                            if ($make == $order->make) {
                                $stl = "selected";
                            }
                            else{
                                $stl = "";
                            }
                          echo "<option $stl value='$make'>$make</option>";
                        }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class=" col-sm-4 control-label">Bays</label>
                  <div class="form-check-inline col-sm-8">
                        <?php echo $order->bay; ?>
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
                                echo "<option value='$dep->department'>$dep->department</option>";
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
                                echo "<option value='$dep->department'>$dep->department</option>";
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
                      <a id="add_oservice" class="btn btn-success">Add Other Service</a>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-4"></div>
                    <div class="col-sm-8" id="oservice_tbl">
                          
                    </div>
                </div>

            
                <?php $CI =& get_instance(); ?>

                <div class="form-group">
                  <label class="col-md-4 control-label">Order Items</label>
                  <div class="col-md-6">
                    <select class="form-control" name="items" id="items">
                      <option value="">Select Item</option>
                      <?php
                        foreach($items as $item){
                          $id = $item->item_id;
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
                          echo "<option style='background-color:$clr;' $disabled value='$p_id'>$id - ($qty)</option>";
                        }
                      ?>
                    </select>
                    <span class="text-danger" id="item_error"></span>
                  </div>

                  <div class="col-md-2">
                    <input type="text" placeholder="Quantity" class="form-control" name="qty" id="qty">
                    
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
                  <label class="col-sm-2 control-label">Discount</label>
                  <div class="col-md-4">
                    <input type="text" class="form-control" name="discount" id="discount" value="<?php echo $order->discount; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12 ">
                    <input type="submit" class="btn btn-primary pull-right mr-5" value="Update Order" name="submit">
                    <a href="<?php echo base_url(); ?>Orders" class="btn btn-danger pull-right" style="margin-right:5px">Back</a>
                  </div>

                </div>

              </div>
            </div>
              </form>
          </div>
        </div>
    </section>
</section>
    <!-- /MAIN CONTENT -->

