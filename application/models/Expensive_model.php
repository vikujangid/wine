<?php 

class Expensive_model extends CI_Model {
  
  function __construct() 
  { 
    parent::__construct(); 
  }
  function add_record($data_insert){
      $this->db->set($data_insert);
      $this->db->insert('tbl_expensive');
   }
  function get_record_by_id($id){
      $this->db->select('*');
      $this->db->where('id',$id);
      $query = $this->db->get('tbl_expensive');
      return $query->row();
   }
  function get_record($shop_id =NULL){
    if($shop_id)
      $this->db->where('shop_id',$shop_id);
    $query = $this->db->get('tbl_expensive');
    $result = $query->result();
    return $result;
   }
  function delete_record($id){
      $this->db->where('id',$id);
      $this->db->delete('tbl_expensive');     
   }
   function update_record($data, $id){
      $this->db->set($data);
      $this->db->where('id', $id);
      $this->db->update('tbl_expensive');
   }
   function get_shop_name_by_shop_id($id){

         $this->db->select('shop_name');
         $this->db->where('id',$id);
         $query = $this->db->get('tbl_shops');
         $result = $query->row();
         return $result->shop_name?$result->shop_name:false;



   }
}