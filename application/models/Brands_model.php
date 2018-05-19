<?php 

   class Brands_model extends CI_Model 
   {
   
      function __construct() 
      { 
         parent::__construct(); 
      }

      function get_brands($status =NULL)
      {
         $query = $this->db->get('tbl_wine_brands');
         $result = $query->result();
         return $result;
      }
      function delete_brand_category($brand_id,$size_type=NULL)
      {
         $this->db->where('brand_id', $brand_id);

         if ($size_type) {
             $this->db->where('size_type', $size_type);
         }
         $this->db->delete('tbl_wine_brand_prices');
      } 
      function delete_brand($id)
      {
         $this->delete_brand_category($id);
         $this->db->where('id', $id);
         $this->db->delete('tbl_wine_brands');  
      }

/////////////////// old ////////////////////////////////
      
      public function get_brands_with_category() 
      {
         $this->db->select('tbl_wine_brand_prices.*');
         $this->db->select('tbl_wine_brands.brand_name');
         $this->db->from('tbl_wine_brand_prices');
         $this->db->join('tbl_wine_brands', 'tbl_wine_brands.id = tbl_wine_brand_prices.brand_id','left');
         $query = $this->db->get();
         $result = $query->result();
         return $result;
      }

      public function add_brand($data,$image_name = NULL) 
      {
         $this->db->set('add_date',date("Y-m-d"));
         $this->db->set('brand_name',$data);
         if($image_name){
         $this->db->set('brand_img',$image_name);
         }
         $this->db->insert('tbl_wine_brands');
         return $this->db->insert_id();
      }

      public function add_brand_category($data) 
      {
         $this->db->set('add_date',date("Y-m-d"));
         $this->db->set($data);
         $this->db->insert('tbl_wine_brand_prices');
      } 

      public function get_category_record_by_id($brand_id)
      {
         $this->db->select('*');
         $this->db->where('brand_id',$brand_id);
         $query = $this->db->get('tbl_wine_brand_prices');
         $result = $query->result();
         return $result;
      }

      public function get_brand_name_by_brand_id($brand_id)
      {
         $this->db->select('brand_name');
         $this->db->where('id',$brand_id);
         $query = $this->db->get('tbl_wine_brands');
         $result = $query->row();
         return $result->brand_name?$result->brand_name:false;
      }

      public function update_brand_name($id,$brandName)
      {
         $this->db->set('brand_name',$brandName);
         $this->db->where('id',$id);
         $this->db->update('tbl_wine_brands');
      }

      
      function get_brand_categories($brand_id)
      {
         $this->db->where('brand_id',$brand_id);
         $query = $this->db->get('tbl_wine_brand_prices');
         $result = $query->result();
         return $result;
      }
      function get_brand_photo($brand_id)
      {
         $this->db->where('id',$brand_id);
         $query = $this->db->get('tbl_wine_brands');
         $result = $query->result();
         return $result;
      }


   

     
   }