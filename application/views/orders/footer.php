<!-- js placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url(); ?>assets/admin/lib/jquery/jquery.min.js"></script>
  <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/admin/lib/advanced-datatable/js/jquery.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="<?php echo base_url(); ?>assets/admin/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/lib/jquery.scrollTo.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/admin/lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <!--common script for all pages-->
  <script src="<?php echo base_url(); ?>assets/admin/lib/common-scripts.js"></script>

  <script src="<?php echo base_url(); ?>assets/admin/lib/jquery-ui-1.9.2.custom.min.js"></script>
  <!--custom switch-->
  <script src="<?php echo base_url(); ?>assets/admin/lib/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="<?php echo base_url(); ?>assets/admin/lib/jquery.tagsinput.js"></script>
  <!--custom checkbox & radio-->
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/lib/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/lib/form-component.js"></script>
  <!--script for this page-->

  
  <script type="text/javascript">
    /* Formating function for row details */
    function fnFormatDetails(oTable, nTr) {
      var aData = oTable.fnGetData(nTr);
      var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
      sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] + '</td></tr>';
      sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
      sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
      sOut += '</table>';

      return sOut;
    }

    $(document).ready(function() {
      var oTable = $('#hidden-table-info').dataTable({
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [0]
        }],
      });


    });
  </script>

<script type="text/javascript">
  $(document).ready(function(){
      $("#vehicle_no").on("keyup", function(){
        var vehicle_no = $(this).val();
        if (vehicle_no !== "") {
          $.ajax({
            url:"<?php echo base_url(); ?>Orders/vehicle_search",
            type:"POST",
            cache:false,
            data:{vehicle_no:vehicle_no},
            success:function(data){
              //alert(data);
              $("#vehicle_no_list").html(data);
              $("#vehicle_no_list").fadeIn();
            }
          });
        }else{
          $("#vehicle_no_list").html("");
          $("#vehicle_no_list").fadeOut();
        }
      });

      // click one particular city name it's fill in textbox
      $(document).on("click","#vehicle_no_list li", function(){

        $('#vehicle_no').val($(this).text());
        $('#vehicle_no_list').fadeOut("fast");
        var v_no = $('#vehicle_no').val();

        //$('#c_no').fadeOut("fast");

         $.ajax({
          url:"<?php echo base_url(); ?>Orders/contact_no",
          type:"POST",
          cache:false,
          data:{v_no:v_no},
          success:function(data){
            $("#contact_no").val(data);
            //alert(data);
          }
        });

        $.ajax({
          url:"<?php echo base_url(); ?>Orders/customername",
          type:"POST",
          cache:false,
          data:{v_no:v_no},
          success:function(data){
            $("#customer_name").val(data);
            //alert(data);
          }
        });
      });
  });
</script>

<script type="text/javascript">
    $(document).ready(function(){
      // Full Service Module
      $( "#method" ).change(function() {
        if ($(this).val() == 'cheque') {
          $("#check_date").show();
        }
        else{
          $("#check_date").hide();
        }
      });
    });

    $(document).ready(function(){
      setTimeout(function() {
        $("#delete_msg").hide('blind', {}, 500)
    }, 3000);
    });

</script>

<script type="text/javascript">
// Load sub cat  and brand for Catogery
    $(document).ready(function(){
      $("#ex_catogery").change(function(){
        var catogery = $(this).val();
        $.ajax({
          url:"<?php echo base_url(); ?>Inventory/show_sub_cat",
          type:"POST",
          cache:false,
          data:{catogery:catogery},
          success:function(data){
            //alert(data);
            $("#ex_sub_catogery").html(data);
          }
        });
      });

      // Load item amount
      $("#items").change(function(){
        var purchase_id = $(this).val();
        $.ajax({
          url:"<?php echo base_url(); ?>Orders/get_item_amount",
          type:"POST",
          cache:false,
          data:{purchase_id:purchase_id},
          success:function(data){
            //alert(data);
            $("#item_amount").val(data);
          }
        });
      }); 

      $("#service").change(function(){
        var ser_id = $(this).val();
        $.ajax({
          url:"<?php echo base_url(); ?>Orders/ser_amount",
          type:"POST",
          cache:false,
          data:{ser_id:ser_id},
          success:function(data){
            //alert(data);
            $("#ser_amount").val(data);
          }
        });
      }); 

      $("#service").change(function(){
        var ser_id = $(this).val();
        $.ajax({
          url:"<?php echo base_url(); ?>Orders/department",
          type:"POST",
          cache:false,
          data:{ser_id:ser_id},
          success:function(data){
            //alert(data);
            $("#department").val(data);
          }
        });
      }); 

    });

    
    // Price for Service
    $(document).ready(function(){
      $("#add_service").click(function(){
        var service = $("#service").val();
        var bill_no = $("#bill_no").val();
        var department = $("#department").val();
        var ser_amount = $("#ser_amount").val();

        if (service == "") {
          $("#service_error").html("Please Select a Service");
        }
        else{
          $("#service_error").html("");
          $.ajax({
            url:"<?php echo base_url(); ?>Orders/Add_Service", //495
            type:"POST",
            cache:false,
            data:{service:service,bill_no:bill_no,department:department,ser_amount:ser_amount},
            success:function(data){
              //alert(data);
              $("#service_tbl").html(data);
              $('#service').val("");
              $("#department").val("");
              $("#ser_amount").val("");
              $('#submit_btn').show();
            }
          });
        }
        
      }); 
    });

    $(document).ready(function(){
        var bill_no = $("#bill_no").val();
          $.ajax({
            url:"<?php echo base_url(); ?>Orders/Add_Service", //495
            type:"POST",
            cache:false,
            data:{bill_no:bill_no},
            success:function(data){
              //alert(data);
              $("#service_tbl").html(data);
              $('#service').val("");
              $('#submit_btn').show();
            }
          });
        
    });

    // Add Other Service
    $(document).ready(function(){
      $("#add_oservice").click(function(){
        var oservice = $("#oservice").val();
        var bill_no = $("#bill_no").val();
        var odepartment = $("#odepartment").val();
        var oser_amount = $("#oser_amount").val();

        if (oservice == "") {
          $("#oservice_error").html("Please type a Service");
        }
        else{
          $.ajax({
            url:"<?php echo base_url(); ?>Orders/Add_Other_Service", //636
            type:"POST",
            cache:false,
            data:{oservice:oservice,bill_no:bill_no,odepartment:odepartment,oser_amount:oser_amount},
            success:function(data){
              //alert(data);
              $("#oservice_tbl").html(data);
              $('#oservice').val("");
              $('#odepartment').val("");
              $("#oser_amount").val("");
            }
          });
        }
      }); 
    });

    $(document).ready(function(){
        var bill_no = $("#bill_no").val();
          $.ajax({
            url:"<?php echo base_url(); ?>Orders/Add_Other_Service", //636
            type:"POST",
            cache:false,
            data:{bill_no:bill_no},
            success:function(data){
              //alert(data);
              $("#oservice_tbl").html(data);
              $('#oservice').val("");
            }
          });
        
    });

    // Add items to Order
    $(document).ready(function(){
      $("#add_item").click(function(){
        var p_id = $("#items").val();
        var qty = $("#qty").val();
        var bill_no = $("#bill_no").val();
        var item_amount = $("#item_amount").val();

        if (p_id == "" || qty == "") {
          $("#item_error").html("Please Select a item and Quantity");
        }
        
        else{
          $("#item_error").html("");
          $.ajax({
            url:"<?php echo base_url(); ?>Orders/Add_item", //565
            type:"POST",
            cache:false,
            data:{p_id:p_id,bill_no:bill_no,qty:qty,item_amount:item_amount},
            success:function(data){
              //alert(data);
              $("#item_tbl").html(data);
              $('#items').val("");
              $('#submit_btn').show();
            }
        });
      }
      }); 
    });

    $(document).ready(function(){
        var bill_no = $("#bill_no").val();
          $.ajax({
            url:"<?php echo base_url(); ?>Orders/Add_item", //495
            type:"POST",
            cache:false,
            data:{bill_no:bill_no},
            success:function(data){
              //alert(data);
              $("#item_tbl").html(data);
              $('#items').val("");
              $('#submit_btn').show();
            }
          });
        
    }); 

    // number only input
    $(function(){
      $("#payment").keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          return false;
        }
      });
    });

    // View Order Get Balance
    $(document).ready(function(){
      $("#payment").keyup(function(){
        var total = $("#total").val();
        var payment = $("#payment").val();
        var paid = $("#paid_").val();
        var balance = payment-(total-paid);
        $("#balance").html(balance);
      });  
    });

    // pay amount
    $(document).ready(function(){
      $("#paybtn").click(function(){

        var bill_no = $("#bill_no").val();
        var total = $("#total").val();
        var payment = $("#payment").val();
        var paid = $("#paid_").val();

        if (payment == "") {
          
        }
        else{
          $.ajax({
            url:"<?php echo base_url(); ?>Orders/add_payment",
            type:"POST",
            cache:false,
            data:{bill_no:bill_no,total:total,payment:payment,paid:paid},
            success:function(data){
              // alert(data);
              $("#paid").html(data);
              $('#payment').val("");
              $('#btns').show();
            }
          });
        }
      });   
    }); 
    
  </script>
</body>

</html>
