<?php 

   class Shop_brands_model extends CI_Model 
   {
   
      function __construct() 
      { 
         parent::__construct(); 
      }
      public function get_shop_name($shop_id)
      {
         $this->db->select('shop_name');
         $this->db->where('id',$shop_id);
         $query = $this->db->get('tbl_shops');
         $result = $query->row();
         return $result->shop_name ? $result->shop_name : false;
      }     
      public function get_all_brands() 
      {  
         $this->db->select('*');
         $query = $this->db->get('tbl_wine_brands');
         return $query->result();
      }
      public function available_brands_in_shop($shop_id, $brand_id) 
      {   $this->db->select('*');
          $this->db->where('shop_id',$shop_id);
          $this->db->where('brand_id',$brand_id);
          $query = $this->db->get('tbl_shop_brands');
          return $query->row();
      }
      public function delete_record_from_shop($shop_id,$brand_id = NULL)
      {
         $this->db->where('shop_id',$shop_id);
         if($brand_id)
          $this->db->where('brand_id',$brand_id);
         $this->db->delete('tbl_shop_brands');
      }
      public function create_record_in_shop($data_insert)
      {
         $this->db->set('add_date',date("Y-m-d"));
         $this->db->set($data_insert);
         $this->db->insert('tbl_shop_brands');
         return $this->db->insert_id();
      }
      function get_price($shop_id, $brand_id, $size_type)
      {
        $this->db->where('shop_id',$shop_id);
        $this->db->where('brand_id',$brand_id);
        $query = $this->db->get('tbl_shop_brands');
        $record = $query->row();
        if ($record) {
          if ($size_type == 'Full') {
            return $record->price_full;
          }
          else if ($size_type == 'Half') {
            return $record->price_half;
          }
          else if ($size_type == 'Quarter') {
            return $record->price_quarter;
          }
        }
      }
      
    }