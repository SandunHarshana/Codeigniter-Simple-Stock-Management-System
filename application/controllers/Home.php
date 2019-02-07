<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
    function __construct() {
        // Initialization of class
        parent::__construct();
            
        if(!$this->session->userdata('username'))
        {      
          redirect('common/sign_in');
        } 
        $this->load->library('session');
        //load models    
        $this->load->model('m_home'); 
    }      
    public function index() {
        if(!$this->session->userdata('username')){
            $this->load->view("index");
        }else{
            $info['scount'] = $this->m_home->get_stock_count();
            $info['totalinvoices'] = $this->m_home->get_total_invoice_count();
            $info['thismonthinvoices'] = $this->m_home->get_month_invoice_count();
            $info['todayinvoices'] = $this->m_home->get_today_invoice_count();
            
            $info['date'] = date("F Y");
            $this->load->view("admin_header",$info);
            $this->load->view("home",$info);
        }
    }    
    
    public function manage_salesman() {
        $info['slist'] = $this->m_home->get_salesman();
        
        $this->load->view('admin_header');
        $this->load->view('saleman_manage',$info);
    }
    
    public function history_salesman() {        
        $year = date('Y');
        $month = date('m');
        $day = date('d');
        //month name
        $dateObj = DateTime::createFromFormat('!m', $month);
        $monthName = $dateObj->format('F');
        
        $info['sdate'] =$year.'-'.$monthName.''.$day;
        
        $info['slist'] = $this->m_home->get_salesman_history($year,$month,$day);
        
        $this->load->view('admin_header');
        $this->load->view('saleman_history',$info);
    }
    
    public function search_history_salesman() {
        $date = $this->input->post('date');
        $year = date('Y', strtotime($date));
        $month = date('m', strtotime($date));
        $day = date('d', strtotime($date));
        //month name
        $dateObj = DateTime::createFromFormat('!m', $month);
        $monthName = $dateObj->format('F');
        
        $info['sdate'] =$year.'-'.$monthName.''.$day;
        
        $info['slist'] = $this->m_home->get_salesman_history($year,$month,$day);
        
        $this->load->view('admin_header');
        $this->load->view('saleman_history',$info);
    }
    
    public function add_salesman() {
        $sname = $this->input->post('salesman_name');
        $this->m_home->add_salesman($sname);
        $info['slist'] = $this->m_home->get_salesman();
        
        $this->load->view('admin_header');
        $this->load->view('saleman_manage',$info);
    }
    
    public function update_salesman($id) {
        $sname = $this->input->post('sname');
        $this->m_home->update_salesman($sname,$id);
        $info['slist'] = $this->m_home->get_salesman();
        
        $this->load->view('admin_header');
        $this->load->view('saleman_manage',$info);
    }
    
    
}
ob_flush();