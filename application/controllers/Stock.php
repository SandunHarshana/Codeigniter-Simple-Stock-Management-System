<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

    function __construct() {
        // Initialization of class
        parent::__construct();

        if(!$this->session->userdata('username'))
        {      
          redirect('common/sign_in');
        }       
        //load models    
        $this->load->model('m_home'); 
        $this->load->model('m_stock');
        $this->load->model('m_invoice');
    }  
    
    public function index() {
        if(!$this->session->userdata('username')){
            $this->load->view("index");
        }else{
            $info['slist'] = $this->m_stock->get_stock();
            $this->load->view('admin_header');
            $this->load->view('view_stock',$info);
        }
    }
    //view add stock page
    public function add_stock() {
        $this->load->view('admin_header');
        $this->load->view('add_stock');
    }
    //add stock to db with form submit
    public function added_stock() {
        $sname = $this->input->post('goodname');
        $quantity = $this->input->post('quantity');
        $uprice = $this->input->post('price');
        $sellprice = $this->input->post('sell_price');
        
        $res = $this->m_stock->add_stock($sname,$quantity,$uprice,$sellprice);
        if($res = 1){
            $info['success'] = 'Succesfully Added Stock Item';
        }else{
            $info['error'] = 'Something Went Wrong While Adding Stock Item';
        }
        $this->load->view('admin_header');        
        $this->load->view('add_stock',$info);
    }
    //save stock while editing stock item
    public function save_stock() {
        
        $iname = $this->input->post('sname');
        $quantity = $this->input->post('quantity');
        $uprice = $this->input->post('uprice');
        $id = $this->input->post('sid');
        $sprice = $this->input->post('sprice');
        
        $this->m_stock->save_stock($iname,$quantity,$uprice,$id,$sprice);
        
        $info['slist'] = $this->m_stock->get_stock();
        $this->load->view('admin_header',$info);
        $this->load->view('view_stock');
    }
    //get amount according to goods name
    public function getAmount() {        
        $gid= $this->input->post('id');
        $amount = $this->m_stock->getAmount($gid);
        echo $amount;
    }
    //search stock
    public function searchstock() {
        $key= $this->input->post('iname');
        $info['slist'] = $this->m_stock->get_searchstock($key);
        $this->load->view('admin_header');
        $this->load->view('view_stock',$info);
    }
}
