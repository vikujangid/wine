<?php 

class Product_list_model extends CI_Model {

  function __construct() 
  { 
    parent::__construct();
  }






  /////////////////////////
  function get_product()
  {
    $this->db->select('*');
    $query = $this->db->get('tbl_shops');
    $results = $query->result();
    return $results;
  }
  function get_brand($brand_id=NULL){
     $this->db->select('*');
     if($brand_id)
     $this->db->where('id',$brand_id);
     $query = $this->db->get('tbl_wine_brands');
     $results = $query->result();
     return $results;
  }
  function get_price($brand_id, $size_type){
     $this->db->select('price');
     $this->db->where('brand_id', $brand_id);
     $this->db->where('size_type', $size_type);
     $query = $this->db->get('tbl_wine_brand_prices');
     return $query->row()->price;
  }
 function delete_brand_sizes($brand_id =NULL,$date =NULL,$shop_id =NULL){ 
      if($brand_id)
        $this->db->where('brand_id',$brand_id);
      if($shop_id)
        $this->db->where('shop_id',$shop_id);
      if($date)
        $this->db->where('sold_date',$date);
        $this->db->delete('product_sale');
  }
  function add_sale_quantity($data_insert){
      $this->db->set($data_insert);
      $this->db->set('add_date',date("Y-m-d H:i:s"));
      $this->db->insert('product_sale');
      return $this->db->insert_id();
  }
  function get_sold_units($brand_id =NULL,$sold_date =NULL,$shop_id =NULL, $size_type =NULL){  
      if($brand_id)
        $this->db->where('brand_id',$brand_id);
      if($shop_id)
        $this->db->where('shop_id',$shop_id);
      if($sold_date)
        $this->db->where('sold_date',$sold_date);
      if($size_type)
        $this->db->where('size_type',$size_type);
      $query = $this->db->get('product_sale');
      $result = $query->row();
      return $result ; 
  }
  function product_sale_list($shop_id,$date){  
      $this->db->select('*');
      $this->db->where('shop_id',$shop_id);
      $this->db->where('sold_date',$date);
      $query = $this->db->get('product_sale');
      //echo $this->db->last_query();
      $result = $query->result();
      return $result ; 
  }
  function get_last_remainings($brand_id =NULL, $sold_date =NULL, $shop_id =NULL, $size_type =NULL)
  {
      if($brand_id)
        $this->db->where('brand_id',$brand_id);
      if($shop_id)
        $this->db->where('shop_id',$shop_id);
      if ($sold_date) {
        $this->db->where('sold_date <',$sold_date);
      }
      if($size_type)
        $this->db->where('size_type',$size_type);
      $this->db->limit(1);
      $this->db->order_by('sold_date','DESC');
      $query = $this->db->get('product_sale');
      $result = $query->row();
      return $result ? $result->quantity_remaining : 0; 
  }
}