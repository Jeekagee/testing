
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
    <section class="wrapper site-min-height">
        <h3></i>View Order</h3>
        <div class="row mt">
            <div class="col-lg-8">
            <div style="margin-bottom: 10px;" >
                <p>
                                <div id="validation">
                                  <?php
                                  if ($this->session->flashdata('digital')) {
                                    echo $this->session->flashdata('digital');
                                  }
                                  ?>
                                </div>
                                </p>
                <a href="<?php echo base_url(); ?>Orders/insert" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <!-- page start-->
            <div class="content-panel" style="padding-left: 15px; padding-right: 15px;">
              <div class="adv-table">
                <?php $CI =& get_instance(); ?>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-hover">
                  <thead style="background: #4ECDC4; font-size:16px;">
                    <tr>
                        <th>Order Details</th>
                        <th></th>
                    </tr>
                  </thead>
                  <tbody style="font-size:15px;">
                    <tr>
                        <td>Vehicle No</td>
                        <td><?php echo $order->vehicle_no; ?></td>
                    </tr>
                    <tr>
                        <td>Contact No</td>
                        <td><?php echo $order->contact_no; ?></td>
                    </tr>
                    <tr>
                        <td>Bill No</td>
                        <td><?php echo $bill_no = $order->bill_no; ?></td>
                    </tr>
                    <tr>
                        <td>Bill Date</td>
                        <?php 
                            $dt = strtotime($order->bill_date);
                            $day = date("D",$dt);
                        ?>
                        <td><?php echo $order->bill_date; ?> (<?php echo $day; ?>)</td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td><?php echo $order->type; ?></td>
                    </tr>
                    <tr>
                        <td>Make</td>
                        <td><?php echo $order->make; ?></td>
                    </tr>
                    <?php $order_id = $order->order_id; ?>
                    <tr>
                        <td>Bays</td>
                        <td><?php echo $order->bay; ?></td>
                    </tr>
                    <tr>
                        <td>Service</td>
                        <td>
                                  <table class="table table-striped">
                                    <thead>
                                      <th>Service</th>
                                      <th>Department</th>
                                      <th>Price</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $services = $CI->Orders_model->order_service($bill_no); //530
                                          $ser_total = 0;
                                          foreach ($services as $ser) {
                                            ?>
                                            <tr>
                                              <td><?php echo $ser->service; ?></td>
                                              <td><?php echo $ser->department; ?></td>
                                              <td>LKR <?php echo $ser->amount; ?>.00</td>
                                            </tr>
                                            <?php
                                            $ser_total = $ser_total+($ser->amount);
                                          }
                                        ?>
                                    </tbody>
                                  </table>
                        </td>
                    </tr>

                    <tr>
                        <td>Other Service</td>
                        <td>
                                  <table class="table table-striped">
                                    <thead>
                                      <th>Other Service</th>
                                      <th>Department</th>
                                      <th>Price</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $oservices = $CI->Orders_model->other_service($bill_no); //530
                                          $oser_total = 0;
                                          foreach ($oservices as $oser) {
                                            ?>
                                            <tr>
                                              <td><?php echo $oser->service; ?></td>
                                              <td><?php echo $oser->department; ?></td>
                                              <td>LKR <?php echo $oser->amount; ?>.00</td>
                                            </tr>
                                            <?php
                                            $oser_total = $oser_total+($oser->amount);
                                          }
                                        ?>
                                    </tbody>
                                  </table>
                        </td>
                    </tr>

                    <tr>
                        <td>Items</td>
                        <td>
                                  <table class="table table-striped">
                                    <thead>
                                      <th>Item</th>
                                      <th>Price</th>
                                      <th>Quantity</th>
                                      <th>Total</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $items = $CI->Orders_model->order_item($bill_no); //530
                                          $itm_total = 0;
                                          foreach ($items as $itm) {
                                            ?>
                                            <tr>
                                              <td><?php echo $itm->item_name; ?></td>
                                              <td><?php echo $itm->amount; ?>.00</td>
                                              <td><?php echo $itm->qty; ?></td>
                                              <td>LKR <?php echo $to = $itm->qty*$itm->amount; ?>.00</td>
                                            </tr>
                                            <?php
                                            $itm_total = $itm_total+$to;
                                          }
                                        ?>
                                    </tbody>
                                  </table>
                        </td>
                    </tr>
                  
                    <tr>
                        <td>Discount</td>
                        <td>LKR <?php echo $order->discount; ?></td>
                    </tr>
                  
                    <tr>
                        <td>Total</td>
                        <td>LKR <?php echo $total =  $ser_total+$itm_total+$oser_total; ?>.00</td>
                    </tr>

                    <tr>
                        <td>Paid</td>
                        <td>
                          LKR <span id="paid"><?php echo $paid = $order->paid; ?></span>.00
                        </td>
                    </tr>

                    <tr>
                        <td>Remain</td>
                        <td>
                          LKR <span id="paid"><?php echo $total - $paid; ?></span>.00
                        </td>
                    </tr>

                    <tr>
                        <td>Payment</td>
                        <td>
                            <div class="row">
                              <div class="col-md-8">
                                <input class="form-control" type="text" id="bill_no" value="<?php echo $bill_no; ?>" name="bill_no" style="display: none;">
                                <input class="form-control" type="text" id="total" value="<?php echo $total; ?>" name="total" style="display: none;">
                                <input class="form-control" type="text" id="paid_" value="<?php echo $paid; ?>" name="paid" style="display: none;">
                                <input class="form-control" type="text" id="payment" name="payment">
                              </div>
                              <div class="col-md-4">
                                <a id="paybtn" style="width: 100%;" class="btn btn-primary">Pay</a>
                              </div>
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>Balance</td>
                        <td>
                          LKR <span id="balance"></span>
                        </td>
                    </tr> 
                    <tr>
                        <td>Created On</td>
                        <td>
                          <?php 
                          $create_tym = $order->created;
                          $sortcretym = strtotime($create_tym);

                          echo date('d/m/Y g:i A', $sortcretym);
                          ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Updated On</td>
                        <td>
                        <?php 
                          $create_tym = $order->updated;
                          $sortcretym = strtotime($create_tym);

                          echo date('d/m/Y g:i A', $sortcretym);
                          ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="<?php echo base_url(); ?>Orders" class="btn btn-primary">Back</a>
                            <span id="btns" style="display: none;">
                              <a target="_blank" href="<?php echo base_url();?>Orders/viewprintBill/<?php echo $bill_no;?>" class="btn btn-success">Print</a>
                              <a href="<?php echo base_url();?>Orders/trakeeApi/<?php echo $bill_no;?>" class="btn btn-info">Digital</a>
                            </span>
                            
                        </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- page end-->
            </div>
          </div>
        </div>
      </section>
    </section>
  