
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3>Monthly Profit And Loss Report</h3>
        <div id="delete_msg"><?php
          if ($this->session->flashdata('success')) {
            echo $this->session->flashdata('success');
          }
        ?>
        </div>
        <div class="row mb" style="padding:10px;">
          <!-- page start-->
          <div class="content-panel" >
            <div class="adv-table">
              <table class="table table-bordered table-striped table-hover">
                <thead class="text-center" style="font-size:16px; font-weight:900;">
                    <tr>
                      <td class="text-center" rowspan="3">S.No</td>
                      <td class="text-center" rowspan="3">Description</td>
                      <td class="text-center" colspan="10">Department</td>
                      <td class="text-center" rowspan="3">Tools</td>
                      <td class="text-center" rowspan="3">Total</td>
                    </tr>
                    <tr>
                      <td class="text-center" colspan="2">Service</td>
                      <td class="text-center" colspan="2">Mechanic</td>
                      <td class="text-center" colspan="2">Painting</td>
                      <td class="text-center" colspan="2">Thinkering</td>
                      <td class="text-center" colspan="2">Admin</td>
                    </tr>
                    <tr>
                        
                        <td class="text-center" colspan="2">Amount</td>
                        <td class="text-center" colspan="2">Amount</td>
                        <td class="text-center" colspan="2">Amount</td>
                        <td class="text-center" colspan="2">Amount</td>
                        <td class="text-center" colspan="2">Amount</td>
                    </tr>
                </thead>
                <tbody>
                <?php 
                 $CI =& get_instance();
                 $i=1;
                //  $date = date('Y') . "-" . date('m') . "-" . str_pad($i, 2, '0', STR_PAD_LEFT);
                //  $ser_t = $CI->Report_model->service_dep_total($date,1);
                
                    ?>
                    
                    <tr>
                      <td class="text-center" style="font-weight: bold;">1</td>
                      <td class="text-left" style="font-weight: bold;">Sales</td>
                      <td></td>
                      <td class="text-right"><?php echo $service_dep = $CI->Report_model->total_dep_sales(1); ?>.00</td>
                      <td></td>
                      <td class="text-right"><?php echo $mechanic_dep = $CI->Report_model->total_dep_sales(3); ?>.00</td>
                      <td></td>
                      <td class="text-right"><?php echo $paint_dep = $CI->Report_model->total_dep_sales(6)+$CI->Report_model->total_dep_sales(5); ?>.00</td>
                      <td></td>
                      <td class="text-right"><?php echo $service_dep = $CI->Report_model->total_dep_sales(2); ?>.00</td>
                      <td></td>
                      <td class="text-right"><?php echo $service_dep = $CI->Report_model->total_dep_sales(7); ?>.00</td>
                      <td></td>
                    </tr>

                <tr">
                  <td class="text-center" style="font-weight: bold;">2</td>
                  <td class="text-left" style="font-weight: bold;">cost of Sales</td>
                  <td></td>
                  <td class="text-right">.00</td>
                  <td></td>
                  <td class="text-right">.00</td>
                  <td></td>
                  <td class="text-right">.00</td>
                  <td></td>
                  <td class="text-right">.00</td>
                  <td></td>
                  <td class="text-right">.00</td>
                  <td"></td>
                  <td class="text-right">.00</td>
                </tr>

                <tr>
                  <td class="text-right">b</td>
                  <td class="text-left">Other Income</td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                </tr>

                <tr>
                  <td class="text-center" style="font-weight: bold;">3</td>
                  <td class="text-left" style="font-weight: bold;">Gross Profit</td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                </tr>

                <tr>
                  <td class="text-center" style="font-weight: bold;"></td>
                  <td class="text-left" style="font-weight: bold;">Expenses</td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                </tr>

                <tr>
                  <td></td>
                  <td class="text-left">Department Expenses</td>
                  <td class="text-right">.00</td>
                  <td></td>
                  <td class="text-right">.00</td>
                  <td></td>
                  <td class="text-right">.00</td>
                  <td></td>
                  <td class="text-right">.00</td>
                  <td></td>
                  <td class="text-right">.00</td>
                  <td></td>
                  <td class="text-right">.00</td>
                  <td></td>
                </tr>

                <tr>
                  <td class="text-center" style="font-weight: bold;">4</td>
                  <td class="text-left" style="font-weight: bold;">TotalExpenses</td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                </tr>
                
                <tr>
                  <td class="text-center" style="font-weight: bold;">5</td>
                  <td class="text-left" style="font-weight: bold;">Net Profit</td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                </tr>
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
  