<?php     
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Model
        $this->load->model('Dashboard_model');
        //Already logged In
        if (!$this->session->has_userdata('user_id')) {
            redirect('/LoginController/logout');
        }
    }
    public function index()
    {
        $from_date=null;
        $to_date=null;
            if ($this->input->post('submit')) {
                $from_date=$this->input->post('from_date');
                $to_date=$this->input->post('to_date');
      }

        $data['page_title'] = 'Dashboard';
        $data['username'] = $this->Dashboard_model->username();
        
        $data['pending_count'] = $this->Dashboard_model->pending_count();
        $data['confirm_count'] = $this->Dashboard_model->confirm_count();

        $data['recent_orders'] = $this->Dashboard_model->recent_orders();
        $data['total_service_income'] = $this->Dashboard_model->total_service_income($from_date,$to_date);
        $data['total_item_income'] = $this->Dashboard_model->total_item_income($from_date,$to_date);
        $data['total_expense'] = $this->Dashboard_model->total_expense($from_date,$to_date);
        $data['total_purchase'] = $this->Dashboard_model->total_purchase($from_date,$to_date);
        $data['orders_total'] = $this->Dashboard_model->orders_total($from_date,$to_date);

        $data['main_menu'] = $this->Dashboard_model->recent_orders();

        $data['nav'] = "";
        $data['subnav'] = "";

        $this->load->view('dashboard/layout/header',$data);
        $this->load->view('dashboard/layout/aside',$data);
        $this->load->view('dashboard/index',$data);
        $this->load->view('footer');
        $this->load->view('dashboard/layout/footer');
    }
}

/* End of file DashboardController.php and path /application/controllers/DashboardController.php */


