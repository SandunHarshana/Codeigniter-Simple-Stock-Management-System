<?php
class M_home extends CI_Model{  
        
    public function __construct() {
        parent::__construct();
    }
    //login validate
    function validate_login($uname,$pword){
        
        $query = $this->db->get_where('user', array('email' => $uname, 'password' => $pword));
        if ($query->num_rows() >= 1) {
            $row = $query->row();
            $data[]=$row;
            return $data;
        }else{
            return NULL;
        }            
    }
    
    //get stock item count
    function get_stock_count(){
        $query  = $this->db->query("SELECT count(id) as scnt FROM stock");        
        $res = $query->result();
        $stockCount = 0;
        foreach ($res as $value) {
            $stockCount = $value->scnt;
        }
        return $stockCount;
    } 
    //get stock item count
    function get_total_invoice_count(){
        $query  = $this->db->query("SELECT count(id) as scnt FROM invoice");        
        $res = $query->result();
        $stockCount = 0;
        foreach ($res as $value) {
            $stockCount = $value->scnt;
        }
        return $stockCount;
    } 
    //get stock item count
    function get_month_invoice_count(){
        $year = date('Y');
        $month = date('m');
        $query  = $this->db->query("SELECT count(id) as scnt FROM invoice WHERE month(`payment_date`) = $month AND year(`payment_date`) = $year");        
        $res = $query->result();
        $stockCount = 0;
        foreach ($res as $value) {
            $stockCount = $value->scnt;
        }
        return $stockCount;
    } 
    //get stock item count
    function get_today_invoice_count(){
        $year = date('Y');
        $month = date('m');
        $day = date('d');
        $query  = $this->db->query("SELECT count(id) as scnt FROM invoice WHERE month(`payment_date`) = $month AND year(`payment_date`) = $year AND day(`payment_date`) = $day");        
        $res = $query->result();
        $stockCount = 0;
        foreach ($res as $value) {
            $stockCount = $value->scnt;
        }
        return $stockCount;
    } 
    //get get redeem request amount
    function test_method($year,$month){
        $query  = $this->db->query("SELECT SUM(amount) AS sm FROM payment AS p WHERE month(`record_date`) = $month AND year(`record_date`) = $year");        
        $res = $query->result();
        $redeemamount = 0;
        foreach ($res as $value) {
            $redeemamount = $value->sm;
        }
        return $redeemamount;
    } 
    
    //add salesman
    function add_salesman($sname){
        $data = array(
            'name' => $sname
        );
        $this->db->insert('salesmans', $data);
    }
    
    //get salesman list
    function get_salesman(){
        $this->db->select('salesmans.*');
        $this->db->from('salesmans');        
        $query = $this->db->get();
        return $query->result();
    }
    
    //get salesman history
    function get_salesman_history($year,$month,$day){        
        $query  = $this->db->query("SELECT s.name,m.month_amount,m.paid_amount,m.remaining_amount FROM monthly_payments AS m,salesmans AS s WHERE m.added_by = s.id AND month(`paid_date`) = $month AND year(`paid_date`) = $year AND day(`paid_date`) = $day");        
        $res = $query->result();        
        return $res;
    }
    
    //add salesman
    function update_salesman($sname,$id){
        $data = array(
            'name' => $sname
        );
        $this->db->where('id', $id);
        $this->db->update('salesmans', $data);
    }
    
}
?>