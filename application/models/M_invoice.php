<?php
class M_invoice extends CI_Model{  
        
    public function __construct() {
        parent::__construct();
    }
    //add invoice
    function add_invoice($data){        
        $res = $this->db->insert('invoice', $data);
        return $res;
    }
    //add monthly payment
    function add_payment($data){        
        $res = $this->db->insert('monthly_payments', $data);
        return $res;
    }
    //get all invoice
    function get_all_invoice(){
        $query  = $this->db->query("SELECT i.*,SUM(p.paid_amount) ttl,u.email FROM invoice i LEFT JOIN monthly_payments p ON p.invoice_id = i.id LEFT JOIN user u ON i.added_by = u.id GROUP BY i.id");//WHERE month(`payment_date`) = $month AND year(`payment_date`) = $year AND status = '$status'        
        $res = $query->result();         
        return $res;
    }
    //get monthly invoice list
    function get_monthly_invoice($year,$month,$status){
        $query  = $this->db->query("SELECT i.*,SUM(p.paid_amount) ttl,u.email FROM invoice i LEFT JOIN monthly_payments p ON p.invoice_id = i.id LEFT JOIN user u ON i.added_by = u.id WHERE month(`payment_date`) = $month AND year(`payment_date`) = $year AND status = '$status' GROUP BY i.id");        
        $res = $query->result();         
        return $res;
    }
    //get daily invoice list
    function get_daily_invoice($year,$month,$date,$status){
        $query  = $this->db->query("SELECT i.*,SUM(p.paid_amount) ttl,u.email FROM invoice i LEFT JOIN monthly_payments p ON p.invoice_id = i.id LEFT JOIN user u ON i.added_by = u.id WHERE month(`payment_date`) = $month AND year(`payment_date`) = $year AND day(`payment_date`) = $date AND status = '$status' GROUP BY i.id");        
        $res = $query->result();         
        return $res;
    }
    //get invoice details
    function get_invoice_details($id){
        $query  = $this->db->query("SELECT * FROM invoice WHERE id = $id");        
        $res = $query->result();         
        return $res;
    }
    //get monthly payment invoice list
    function get_monthly_payments($id){
        $query  = $this->db->query("SELECT p.*,u.email FROM monthly_payments p,user u WHERE u.id = p.added_by AND p.invoice_id = $id");        
        $res = $query->result();         
        return $res;
    }
    
    //update invoice status
    function update_invoice_status($iid,$status){
        $data = array(
            'status' => $status
        );
        $this->db->where('id', $iid);
        $this->db->update('invoice', $data);
    }
    
    //update invoice status
    function update_good_quantity($gid,$quantity){ 
        $this->db->set('quantity', "quantity+".$quantity, FALSE);
        $this->db->where('id', $gid);
        $this->db->update('stock');
    }
}
?>