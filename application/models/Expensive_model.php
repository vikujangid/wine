<?php 

class Expensive_model extends CI_Model {

    function __construct() 
    {
        parent::__construct();
        $this->table = 'tbl_expensive';
    }


    function get_records($shop_id =NULL) 
    {
        if($shop_id)
            $this->db->where('shop_id', $shop_id);

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
    function add_record($data)
    {
        $this->db->set('add_date', date('Y-m-d H:i:s'));
        $this->db->set($data);
        $this->db->insert('tbl_expensive');
        return $this->db->insert_id();
    }
    function update_record($data, $id)
    {
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update($this->table);
   }
   function get_total_expenses($shop_id, $from_date, $to_date)
   {
        $this->db->select('SUM(amount) AS amount');
        $this->db->where('shop_id',$shop_id);
        $this->db->where('date >=',$from_date);
        $this->db->where('date <=',$to_date);
        $query = $this->db->get($this->table);
        $result = $query->row();
        return $result->amount?$result->amount:0;
   }

  //////////////////////////////////////////

  function get_record_by_id($id){
      $this->db->select('*');
      $this->db->where('id',$id);
      $query = $this->db->get('tbl_expensive');
      return $query->row();
   }
  function delete_record($id){
      $this->db->where('id',$id);
      $this->db->delete('tbl_expensive');     
   }
   
   function get_shop_name_by_shop_id($id){

         $this->db->select('shop_name');
         $this->db->where('id',$id);
         $query = $this->db->get('tbl_shops');
         $result = $query->row();
         return $result->shop_name?$result->shop_name:false;



   }
}