

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

  .report-cart{
    font-size:20px;
    padding:50px 0px 50px 0px; 
    color:white;
    font-weight:700;
    border-radius: 18px;
    transition: box-shadow .3s;
  }

  .report-cart:hover {
  box-shadow: 0 0 11px rgba(33,33,33,.2); 
    }

</style>
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">  
        <h3>Reports</h3>

        <div class="sec-container">
            <div class="row">
            <div class="col-md-2">
                    <a href="<?php echo base_url(); ?>Report/SalesReport">
                    <div class="text-center report-cart" style="background-color:#6ECB63;">
                        SALES
                    </div>
                    </a>
            </div>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>Report/PurchaseSummary">
                        <div class="text-center report-cart" style="background-color:#F8485E;">
                            PURCHASE
                        </div>
                    </a>
            </div>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>Report/ExpenseReport">
                <div class="text-center report-cart" style="background-color:#1DB9C3;">
                    EXPENSE
                </div>
            </div>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>Report/InvReport">
                <div class="text-center report-cart" style="background-color:#FF865E;">
                    INVENTORY
                </div>
            </div>
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>Report/ProfitlostReport">
                <div class="text-center report-cart" style="background-color:#FF865E;">
                    PROFIT
                </div>
            </div>
            <!-- <div class="col-md-2">
                <a href="<?php echo base_url(); ?>Report/CustomerReport">
                <div class="text-center report-cart" style="background-color:#7027A0;">
                    CUSTOMER
                </div>
            </div> -->
            <div class="col-md-2">
                <a href="<?php echo base_url(); ?>Report/ProfitReport">
                <div class="text-center report-cart" style="background-color:#0F52BA;">
                    PROFIT&LOST
                </div>
            </div>
            </div>
        </div>
    </section>
</section>
    <!-- /MAIN CONTENT -->
