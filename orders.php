
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3>Orders</h3>
        <div id="delete_msg"><?php
          if ($this->session->flashdata('delete')) {
            echo $this->session->flashdata('delete');
          }
        ?>
        </div>
            <div style="margin-bottom: 10px;" >
                <a href="<?php echo base_url(); ?>Orders/insert" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <div style="margin-bottom: 10px;" >
                <div class="row">
                    <!--<div class="col-md-2">
                        <select id="main_catogery" onchange="location = this.value;" class="form-control" style="width:150px;">
                        <option value='<?php echo base_url(); ?>Orders/All/Now'>This Month</option>
                            <?php
                            foreach ($bill_years as $bill_year) {
                              echo "<option value='".base_url()."Orders/All/$bill_year->bill_year'>$bill_year->bill_year</option>";
                            }
                            echo "<option value='".base_url()."Orders/All'>All</option>";
                            ?>
                        </select>
                    </div>-->
                </div>
            </div>
        <div class="row mb" style="padding:10px;">
          <!-- page start-->
          <div class="content-panel" >
            <div class="adv-table">
              <table class="table table-hover table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th>Date</th>
                    <th>Sales ID</th>
                    <th>Vehicle No</th>
                    <th>Customer Name</th>
                    <th>Contact No</th>
                    <th>Amount</th>
                    <th>Discount</th>
                    <th class="text-right">Net Amount</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $CI =& get_instance();
                  $i =1;
                  foreach ($orders as $order){
                    ?>
                      <tr>
                        <td class="text-center"><?php echo $i; ?></td>
                        <td><?php echo $order->bill_date; ?></td>
                        <td><?php echo $bill_no = $order->bill_no; ?></td>
                        <td><?php echo $order->vehicle_no; ?></td>
                        <td><?php echo $order->customer_name; ?></td>
                        <td><?php echo $order->contact_no; ?></td>
                        
                        <!--<td>
                          <?php
                           
                           foreach ($services as $ser) {
                             echo $ser->service.",";
                           }
                          ?>
                        </td>-->
                        <td class="text-right">
                          <?php
                            $services =  $CI->Orders_model->order_service($bill_no); //486
                            $items =  $CI->Orders_model->order_item($bill_no); //530
                            
                            $service_total = 0;
                            foreach ($services as $ser) {
                              $service_total = $service_total+$ser->amount;
                            }

                            $item_total = 0;
                            foreach ($items as $itm) {
                              
                              $item_total = $item_total+($itm->amount*$itm->qty);
                            }
                            echo $total = $service_total+$item_total;
                          ?>
                        .00</td>
                        <td class="text-right"><?php echo $discount = $order->discount; ?>.00</td>
                        <td class="text-right"><?php echo $total-$discount; ?>.00</td>
                        <td class="text-center">
                          <a href="<?php echo base_url(); ?>Orders/view/<?php echo $bill_no = $order->bill_no; ?>" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>
                          <a href="<?php echo base_url(); ?>Orders/edit/<?php echo $bill_no; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
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
          <!-- page end-->
        </div>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
  </section>
  