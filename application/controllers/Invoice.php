<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

    function __construct() {
        // Initialization of class
        parent::__construct();

        if(!$this->session->userdata('username'))
        {      
          redirect('common/sign_in');
        }       
        //load models    
        $this->load->model('m_home'); 
        $this->load->model('m_invoice');
        $this->load->model('m_stock');
    }  
    
    public function index() {
        if(!$this->session->userdata('username')){
            $this->load->view("index");
        }else{
            $this->load->view('admin_header', $header);
            $this->load->view('invoice', $info);
        }
    }
    
    public function add_invoice() {
        $info['slist'] = $this->m_home->get_salesman();
        $info['glist'] = $this->m_stock->get_stock();
        
        $this->load->view('admin_header');
        $this->load->view('add_invoice',$info);
    }
    //add invoice to db
    public function added_invoice() {
        $info['slist'] = $this->m_home->get_salesman();
        $info['glist'] = $this->m_stock->get_stock();
        
        $this->form_validation->set_rules('billno', 'Billno', 'required|min_length[1]|numeric|xss_clean');
        $this->form_validation->set_rules('regno', 'Register Number', 'required|min_length[1]|xss_clean');
        $this->form_validation->set_rules('customername', 'Customer Name', 'required|min_length[1]|xss_clean');
        $this->form_validation->set_rules('address', 'Address', 'required|min_length[1]|xss_clean');
        $this->form_validation->set_rules('contact', 'Contact', 'required|min_length[1]|xss_clean');
        $this->form_validation->set_rules('salesmanname', 'Salesman Name', 'required|min_length[1]|xss_clean');
        $this->form_validation->set_rules('goodname', 'Good Name', 'required|min_length[1]|xss_clean');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required|min_length[1]|numeric|xss_clean');
        $this->form_validation->set_rules('amount', 'Amount', 'required|min_length[1]|numeric|xss_clean');
        $this->form_validation->set_rules('monthlyamount', 'Monthly Amount', 'required|min_length[1]|numeric|xss_clean');
        $this->form_validation->set_rules('paymentdate', 'Payment Date', 'required|min_length[1]|xss_clean');

        if ($this->form_validation->run() == TRUE) {
            $date = new DateTime($this->input->post('paymentdate'));
            $data = array(
                'bill_no' => $this->input->post('billno'),
                'reg_no' => $this->input->post('regno'),
                'customer_name' => $this->input->post('customername'),
                'adress' => $this->input->post('address'),
                'contact' => $this->input->post('contact'),
                'nic' => $this->input->post('nic'),
                'salesman' => $this->input->post('salesmanname'),
                'good' => $this->input->post('goodname'),
                'quantity' => $this->input->post('quantity'),
                'amount' => $this->input->post('amount'),
                'monthly_amount' => $this->input->post('monthlyamount'),
                'payment_date' => $date->format('Y-m-d'),
                'added_by' => $this->session->userdata('uid')
            );
            $this->m_invoice->add_invoice($data);
            //update stock quantity
            $good = $this->input->post('goodname');
            $quantity = $this->input->post('quantity');
            $this->m_stock->setUpdateStock($good,$quantity);
            //echo $this->db->last_query();
        }else{
            
        }
        $this->load->view('admin_header');
        $this->load->view('add_invoice',$info);
    }
    

    public function view_all_invoice() {
                
        $info['alllist'] = $this->m_invoice->get_all_invoice();
        $this->load->view('admin_header');
        $this->load->view('all_invoice',$info);
    }

    public function view_monthly_invoice() {
        $year = date('Y');
        $month = date('m');
        //month name        
        $dateObj = DateTime::createFromFormat('!m', $month);
        $monthName = $dateObj->format('F');
        
        $info['sdate'] =$year.'-'.$monthName;
        $info['slist'] = $this->m_invoice->get_monthly_invoice($year,$month,"PENDING");
        $info['comlist'] = $this->m_invoice->get_monthly_invoice($year,$month,"COMPLETE");
        $info['canlist'] = $this->m_invoice->get_monthly_invoice($year,$month,"CANCEL");
        $info['retlist'] = $this->m_invoice->get_monthly_invoice($year,$month,"RETURN");
        
        $this->load->view('admin_header');
        $this->load->view('monthly_invoice',$info);
    }
    
    public function search_monthly_invoice() {
        $date = $this->input->post('date');
        $year = date('Y', strtotime($date));
        $month = date('m', strtotime($date));

        $dateObj = DateTime::createFromFormat('!m', $month);
        $monthName = $dateObj->format('F');

        $info['sdate'] = $year.'-'.$monthName;
        
        $info['slist'] = $this->m_invoice->get_monthly_invoice($year,$month,"PENDING");
        $info['comlist'] = $this->m_invoice->get_monthly_invoice($year,$month,"COMPLETE");
        $info['canlist'] = $this->m_invoice->get_monthly_invoice($year,$month,"CANCEL");
        $info['retlist'] = $this->m_invoice->get_monthly_invoice($year,$month,"RETURN");
        
        $this->load->view('admin_header');
        $this->load->view('monthly_invoice',$info);
    }
    
    public function view_daily_invoice() {
        $year = date('Y');
        $month = date('m');
        $day = date('d');
        //month name
        $dateObj = DateTime::createFromFormat('!m', $month);
        $monthName = $dateObj->format('F');
        
        $info['sdate'] =$year.'-'.$monthName.''.$day;
        
        $info['slist'] = $this->m_invoice->get_daily_invoice($year,$month,$day,"PENDING");
        $info['comlist'] = $this->m_invoice->get_daily_invoice($year,$month,$day,"COMPLETE");
        $info['canlist'] = $this->m_invoice->get_daily_invoice($year,$month,$day,"CANCEL");
        $info['retlist'] = $this->m_invoice->get_daily_invoice($year,$month,$day,"RETURN");
        
        $this->load->view('admin_header');
        $this->load->view('daily_invoice',$info);
    }
    
    public function search_daily_invoice() {
        $date = $this->input->post('date');
        $year = date('Y', strtotime($date));
        $month = date('m', strtotime($date));
        $day = date('d', strtotime($date));
        //month name
        $dateObj = DateTime::createFromFormat('!m', $month);
        $monthName = $dateObj->format('F');
        
        $info['sdate'] =$year.'-'.$monthName.''.$day;
        
        $info['slist'] = $this->m_invoice->get_daily_invoice($year,$month,$day,"PENDING");
        $info['comlist'] = $this->m_invoice->get_daily_invoice($year,$month,$day,"COMPLETE");
        $info['canlist'] = $this->m_invoice->get_daily_invoice($year,$month,$day,"CANCEL");
        $info['retlist'] = $this->m_invoice->get_daily_invoice($year,$month,$day,"RETURN");
        
        $this->load->view('admin_header');
        $this->load->view('daily_invoice',$info);
    }
    //view invoice details
    public function view_invoice_details($iid) {
        $info['invoDetails'] = $this->m_invoice->get_invoice_details($iid);
        $info['paymentDetails'] = $this->m_invoice->get_monthly_payments($iid);
        $this->load->view('admin_header');
        $this->load->view('invoice_details',$info);
    } 
    
    //change monthly invoice status
    public function change_monthly_invoice_status($iid,$status,$good,$quantity) {
        $this->m_invoice->update_invoice_status($iid,$status);  
        if($status != "COMPLETE"){
            $this->m_invoice->update_good_quantity($good,$quantity); 
            echo 'res : '.$this->db->last_query();
        }else{
            
        }
        redirect('/Invoice/view_monthly_invoice/');
    } 
    
    //change daily invoice status
    public function change_daily_invoice_status($iid,$status) {
        $this->m_invoice->update_invoice_status($iid,$status);
        redirect('/Invoice/view_daily_invoice/');
    } 
    
    //add payment to db
    public function add_payment($iid) {        
        $this->form_validation->set_rules('monthly_amount', 'Monthly Amount', 'required|min_length[1]|numeric|xss_clean');
        $this->form_validation->set_rules('paid_amount', 'Paid Amount', 'required|min_length[1]|xss_clean');
        $this->form_validation->set_rules('remain', 'Remain', 'required|min_length[1]|xss_clean');
        $this->form_validation->set_rules('paid_date', 'Paid Date', 'required|min_length[1]|xss_clean');        
        if ($this->form_validation->run() == TRUE) {
            $date = new DateTime($this->input->post('paid_date'));
            $data = array(
                'invoice_id' => $this->input->post('invoice_id'),
                'date_to_be_paid' => $this->input->post('date_tobe_paid'),
                'month_amount' => $this->input->post('monthly_amount'),
                'paid_date' => $date->format('Y-m-d'),
                'paid_amount' => $this->input->post('paid_amount'),
                'remaining_amount' => $this->input->post('remain'),
                'added_by' => $this->session->userdata('uid')
            );
            $this->m_invoice->add_payment($data);            
        }else{}
        $info['invoDetails'] = $this->m_invoice->get_invoice_details($iid);
        $this->load->view('admin_header');
        $this->load->view('invoice_details',$info);
    }
}

