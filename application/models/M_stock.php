<?php
class M_stock extends CI_Model{  
        
    public function __construct() {
        parent::__construct();
    } 
    
    //add salesman
    function add_stock($sname,$quantity,$uPrice,$sellprice){
        $data = array(
            'stock_name' => $sname,
            'quantity' => $quantity,
            'unit_price' => $uPrice,
            'sell_price' => $sellprice
        );
        $res = $this->db->insert('stock', $data);
        return $res;
    }
    
    //update stock
    function update_stock($sname,$quantity,$uPrice){
        $data = array(
            'stock_name' => $sname,
            'quantity' => $quantity,
            'unit_price' => $uPrice
        );
        $res = $this->db->insert('stock', $data);
        return $res;
    }
    
    //get stock list
    function get_stock(){
        $this->db->select('stock.*');
        $this->db->from('stock');        
        $query = $this->db->get();
        return $query->result();
    }
    //get search stock list
    function get_searchstock($key){
        $this->db->select('stock.*');
        $this->db->from('stock');
        $this->db->like('stock_name', $key);
        $query = $this->db->get();
        return $query->result();
    }
    
    //save stock
    function save_stock($iname,$quantity,$uprice,$id,$sprice){
        $data = array(
            'stock_name' => $iname,
            'quantity' => $quantity,
            'unit_price' => $uprice,
            'sell_price' => $sprice
        );
        $this->db->where('id', $id);
        $this->db->update('stock', $data);
    }
    //get good amount
    public function getAmount($goodId) {
        $value="0";
        $query = $this->db->get_where('stock', array('id' => $goodId));
        foreach ($query->result() as $row) {
            $value = $row->sell_price ;
        }
        return $value;
    }
    //update stock while invoicing
    public function setUpdateStock($gid,$qnt){
        $this->db->where('id', $gid);
        $this->db->set('quantity', '`quantity`-'.$qnt, FALSE);
        $this->db->update('stock');
    }
}
?>