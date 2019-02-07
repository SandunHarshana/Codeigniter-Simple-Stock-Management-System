<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {
	
	function __construct(){
	  // Initialization of class
    parent::__construct();
    //load models           
    // load form_validation library
    $this->load->library('form_validation');
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

	public function sign_in()
	{	
		$this->load->view('index');
	}	
	function login(){    
        if(!$this->session->userdata('username')){
            $uname = $this->input->post('username');
            $pword = $this->input->post('password');
            
            $queryResult = $this->m_home->validate_login($uname,$pword);
            if($queryResult !=NULL){            
                foreach ($queryResult as $key) {
                    $data = array(
                        'username' => $key->email ,
                        'uid' => $key->id ,
                        'u_is_logged_in' => true
                    );
                    $this->session->set_userdata($data);                
                    $info['downloadcount'] = 0;
                    
                    $info['scount'] = $this->m_home->get_stock_count();
                    $info['totalinvoices'] = $this->m_home->get_total_invoice_count();
                    $info['thismonthinvoices'] = $this->m_home->get_month_invoice_count();
                    $info['todayinvoices'] = $this->m_home->get_today_invoice_count();

                    $info['date'] = date("F Y");
                    
                    $info['date'] = date("F Y");
                    $this->load->view("admin_header",$info);
                    $this->load->view("home",$info);
                }
            }else{
                $info['error_msg'] = "Incorrect username or password";
                $this->load->view("index",$info );
            }   
        }else{
            $this->index();
        }
    }

    function logout(){    
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('uid');
        $this->session->sess_destroy();   
        $this->index();
    }

}

?>