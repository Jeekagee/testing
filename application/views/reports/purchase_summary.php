
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3>Purchase Report</h3>
        <div id="delete_msg"><?php
          if ($this->session->flashdata('delete')) {
            echo $this->session->flashdata('delete');
          }
        ?>
        </div>
        <div class="row mb" style="padding:10px;">
          <!-- page start-->
          <div class="content-panel" >
            <div class="adv-table">
                <table id="example" class="display nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th>#</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Ref No</th>
                    <th class="text-center">Item</th>
                    <th class="text-center">Supplier</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Purchase Price</th>
                    <th class="text-center">Selling Price</th>
                    <th class="text-center">Total</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $CI =& get_instance();
                
                  $i =1;
                  foreach ($purchase_summary as $pur){
                    $item_id=$pur->item_id;
                    $puritem_id = $pur->purchase_id;
                    $item_name =  $CI->Report_model->item_name($item_id);
                    $purchase_data = $CI->Report_model->purchase_data($puritem_id);
                    ?>
                      <tr id="pur<?php echo $pur->id; ?>">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $purchase_data->rec_date; ?></td>
                        <td><?php echo $purchase_data->ref_no; ?></td>
                        <td><?php echo $pur->item_id; ?></td>
                        <td><?php echo $purchase_data->supplier;  ?></td>
                        <td class="text-center"><?php echo $qty = $pur->quantity; ?></td>
                        <td class="text-right"><?php echo $price = $pur->purchase_price; ?>.00</td>
                        <td class="text-right"><?php echo $pur->selling_price; ?>.00</td>
                        <td class="text-right"><?php echo $qty*$price; ?>.00</td>
                      </tr>
                    <?php
                    $i++;
                  }
                ?>
                </tbody>
              </table>
            </div>
             <script>$(document).ready(function() {
                $('#example').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                    'excel'
                    ]
                } );
            } );</script>
            
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
  