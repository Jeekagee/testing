<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Report
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Report extends CI_Controller
{
    
  public function __construct()
  {
      parent::__construct();
        //Load Model
        $this->load->model('Dashboard_model');
        $data['username'] = $this->Dashboard_model->username();
        //Load Model
        $this->load->model('Report_model');
        //Already logged In
        if (!$this->session->has_userdata('user_id')) {
            redirect('/LoginController/logout');
        }
   }


  public function InvReport(){
    $data['page_title'] = 'Inventory Report';
    $data['username'] = $this->Dashboard_model->username();
    $data['pending_count'] = $this->Dashboard_model->pending_count();
    $data['confirm_count'] = $this->Dashboard_model->confirm_count();

    $data['inventory'] = $this->Report_model->inventory();

        $data['nav'] = "Report";
        $data['subnav'] = "AddReport";

    $this->load->view('dashboard/layout/header-items',$data);
    $this->load->view('dashboard/layout/aside-items',$data);
    $this->load->view('reports/inventory_report',$data);
    $this->load->view('reports/footer-view');
  }

  public function delete(){
    $id =  $this->input->post('id');
    $this->Report_model->delete_item($id); //29
  }

  public function edit(){
    $expense_id =  $this->uri->segment('3');
    $data['page_title'] = 'Edit Inventory';
    $data['username'] = $this->Dashboard_model->username();
    $data['pending_count'] = $this->Dashboard_model->pending_count();
    $data['confirm_count'] = $this->Dashboard_model->confirm_count();

    //Total Expenses for this month
    $data['item_id'] = $this->Report_model->item_id(); //16

    //Expense data
    $data['item_name'] = $this->Report_model->item_name(); //35

    //Item Catogiries
    $data['qty'] = $this->Report_model->item_catogories();

    $data['nav'] = "Expense";
  $data['subnav'] = "Expenses";

    $this->load->view('dashboard/layout/header',$data);
    $this->load->view('dashboard/layout/aside',$data);
    $this->load->view('expense/edit-expense',$data);
    $this->load->view('expense/footer',$data);
  }
  public function index()
  {
        $data['page_title'] = 'Reports';
        $data['username'] = $this->Dashboard_model->username();
        //$data['orders'] = $this->Orders_model->orders();
        //$data['bill_years'] = $this->Orders_model->get_bill_years();
        

        $data['pending_count'] = $this->Dashboard_model->pending_count();
        $data['confirm_count'] = $this->Dashboard_model->confirm_count();

        $data['nav'] = "Reports";
        $data['subnav'] = "Reports";

        $this->load->view('dashboard/layout/header',$data);
        $this->load->view('dashboard/layout/aside',$data);
        //$this->load->view('aside',$data);
        $this->load->view('reports/index',$data);
        $this->load->view('orders/footer');
  }

  public function OrderReport()
  {
        $data['page_title'] = 'Order - Report';
        $data['username'] = $this->Dashboard_model->username();
        //$data['bill_years'] = $this->Orders_model->get_bill_years();
        $data['pending_count'] = $this->Dashboard_model->pending_count();
        $data['confirm_count'] = $this->Dashboard_model->confirm_count();

        $data['order_report'] = $this->Report_model->orders();

        $data['nav'] = "Reports";
        $data['subnav'] = "Reports";

        $this->load->view('dashboard/layout/header-items',$data);
        $this->load->view('dashboard/layout/aside-items',$data);
        //$this->load->view('aside',$data);
        $this->load->view('reports/order_report',$data);
        $this->load->view('reports/footer-view');
  }

  public function PurchaseSummary(){
    $data['page_title'] = 'Purchase Summary';
    $data['username'] = $this->Dashboard_model->username();
    $data['pending_count'] = $this->Dashboard_model->pending_count();
    $data['confirm_count'] = $this->Dashboard_model->confirm_count();

    $data['purchase_summary'] = $this->Report_model->purchase_summary();

        $data['nav'] = "Report";
        $data['subnav'] = "AddReport";

    $this->load->view('dashboard/layout/header-items',$data);
    $this->load->view('dashboard/layout/aside-items',$data);
    $this->load->view('reports/purchase_summary',$data);
    $this->load->view('reports/footer-view');
  }
  
  public function CustomerReport(){
    $data['page_title'] = 'Customer Report';
    $data['username'] = $this->Dashboard_model->username();
    $data['pending_count'] = $this->Dashboard_model->pending_count();
    $data['confirm_count'] = $this->Dashboard_model->confirm_count();

    $data['customer_report'] = $this->Report_model->customer_report();

        $data['nav'] = "Report";
        $data['subnav'] = "AddReport";

    $this->load->view('dashboard/layout/header-items',$data);
    $this->load->view('dashboard/layout/aside-items',$data);
    $this->load->view('reports/customer_report',$data);
    $this->load->view('reports/footer-view');
  }


  public function ExpenseReport(){
    $data['page_title'] = 'Expense Report';
    $data['username'] = $this->Dashboard_model->username();
    $data['pending_count'] = $this->Dashboard_model->pending_count();
    $data['confirm_count'] = $this->Dashboard_model->confirm_count();

    $data['expense_report'] = $this->Report_model->expense_report();

        $data['nav'] = "Report";
        $data['subnav'] = "AddReport";

    $this->load->view('dashboard/layout/header-items',$data);
    $this->load->view('dashboard/layout/aside-items',$data);
    $this->load->view('reports/expense_report',$data);
    $this->load->view('reports/footer-view');
  }

  public function ProfitReport(){
    $from_date=null;
    $to_date=null;
  if ($this->input->post('submit')) {
    $from_date=$this->input->post('from_date');
    $to_date=$this->input->post('to_date');
  }
  

  $data['page_title'] = 'Profit & Lost Report';
  $data['username'] = $this->Dashboard_model->username();
  $data['pending_count'] = $this->Dashboard_model->pending_count();
  $data['confirm_count'] = $this->Dashboard_model->confirm_count();

  $data['total_expense'] = $this->Report_model->total_expense($from_date,$to_date);
  $data['total_service_income'] = $this->Report_model->total_service_income($from_date,$to_date);
  $data['total_item_income'] = $this->Report_model->total_item_income($from_date,$to_date);
  $data['total_cog'] = $this->Report_model->total_cog($from_date,$to_date);
  // $data['profit_lost_report'] = $this->Report_model->total_revenue();

      $data['nav'] = "Report";
      $data['subnav'] = "AddReport";

  $this->load->view('dashboard/layout/header-items',$data);
  $this->load->view('dashboard/layout/aside-items',$data);
  $this->load->view('reports/profit_lost_report',$data);
  $this->load->view('reports/footer-view');
}

public function SalesReport(){
  $data['page_title'] = 'Sales Report';
  $data['username'] = $this->Dashboard_model->username();
  $data['pending_count'] = $this->Dashboard_model->pending_count();
  $data['confirm_count'] = $this->Dashboard_model->confirm_count();

  // $data['sales_report'] = $this->Report_model->sales_report();
  //$data['service_dep'] = $this->Report_model->total_orderservice_dep(1);

      $data['nav'] = "Report";
      $data['subnav'] = "AddReport";

  $this->load->view('dashboard/layout/header',$data);
  $this->load->view('dashboard/layout/aside',$data);
  $this->load->view('reports/sales_report',$data);
  $this->load->view('reports/footer');
}

public function ProfitlostReport(){
  
  $data['page_title'] = 'Profit Lost Report';
  $data['username'] = $this->Dashboard_model->username();
  $data['pending_count'] = $this->Dashboard_model->pending_count();
  $data['confirm_count'] = $this->Dashboard_model->confirm_count();

      $data['nav'] = "Report";
      $data['subnav'] = "AddReport";

  $this->load->view('dashboard/layout/header',$data);
  $this->load->view('dashboard/layout/aside',$data);
  $this->load->view('reports/profit_report',$data);
  $this->load->view('reports/footer');
}

}


/* End of file Report.php */
/* Location: ./application/controllers/Report.php */