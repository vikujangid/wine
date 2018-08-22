<?php 

class Direct_sold_model extends CI_Model {

    function __construct() 
    {
        parent::__construct();
        $this->table = 'tbl_direct_sold';
    }

    function get_records($shop_id, $from_date, $to_date)
    {
        $this->db->where('shop_id',$shop_id);
        $this->db->where('sold_date >=',$from_date);
        $this->db->where('sold_date <=',$to_date);
        $query = $this->db->get($this->table);
        $result = $query->result();
        return $result;
    }
    function get_record($id) 
    {
        $this->db->where('id',$id);
        $query = $this->db->get($this->table);
        return $query->row();
   }
    function delete_record($id) 
    {
        $this->db->where('id',$id);
        $this->db->delete($this->table);
    }
   function add_record($data)
   {
        $this->db->set('add_date', date('Y-m-d H:i:s'));
        $this->db->set($data);
        $this->db->insert($this->table);
        return $this->db->insert_id();
   }
   function get_total_amount($shop_id, $from_date, $to_date)
   {
        $this->db->select('SUM(price_total) AS price_total');
        $this->db->where('shop_id',$shop_id);
        $this->db->where('sold_date >=',$from_date);
        $this->db->where('sold_date <=',$to_date);
        $query = $this->db->get($this->table);
        $result = $query->row();
        return $result->price_total?$result->price_total:0;
   }
}