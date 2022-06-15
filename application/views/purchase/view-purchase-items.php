

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
  .sec-container{
    background-color:white;
    padding:50px;
  }
  
</style>
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">  
        <h3>View</h3>
        <form action="<?php echo base_url(); ?>Expense/update" method="post">
        <div class="sec-container col-md-8">
            
            <div class="mb-5">
            <div id="delete_msg">
              <?php
                if ($this->session->flashdata('success')) {
                  echo $this->session->flashdata('success');
                }
              ?>
            </div>
                <h4>Purchase Item List</h4>
            </div>
            <hr>
            <?php 
            $CI =& get_instance(); 
            $CI->load->model('Purchase_model');
            $purchase_id = $purchase_item->purchase_id;
            $purchase_data = $CI->Purchase_model->purchase_data($purchase_id); //84
            ?>
           <div class="table-responsive">
           <table id="example" class="display nowrap" style="width:100%">
			<thead>
                  <tr>
                   
                    <th class="text-center">Purchase Date</th>
                    <th class="text-center">Location</th>
                    <th class="text-center">Notes</th>
                    <th class="text-center">Ref_No</th>
                    <th class="text-center">Item</th>
                    <th class="text-center">Purchase Price</th>
                    <th class="text-center">Selling Price</th>
					<th class="text-center">Quantity</th>
                    <th class="text-center">Total</th>
                    
                  </tr>
                </thead>
                <tbody>
					<tr>
            
                   
                    <td><?php echo $purchase_data->rec_date; ?></td>
                    <td><?php echo $purchase_data->location; ?></td>
                    <td><?php echo $purchase_data->notes; ?></td>
                    <td><?php echo $purchase_data->ref_no; ?></td>
                    <td><?php echo $purchase_item->item_id; ?></td> 
                    <td>LKR <?php echo $price = $purchase_item->purchase_price; ?>.00</td>
                    <td>LKR <?php echo $purchase_item->selling_price; ?>.00</td>
                    <td><?php echo $purchase_item->quantity; ?></td>
                    <td>LKR <?php echo $price*$purchase_item->quantity; ?>.00</td>
                </tr>
                </tbody>
            </table>
           </div>

            <a href="<?php echo base_url(); ?>Purchase/summery" class="btn btn-primary">Back</a>
           <!-- <a href="<?php echo base_url(); ?>Purchase/createexcel" class="btn btn-warning">Export</a>-->
        </div>
        
    </section>
</section>
<script>
  $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
           'excel'
        ]
    } );
} );
</script>
    <!-- /MAIN CONTENT -->

