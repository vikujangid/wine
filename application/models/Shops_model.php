<?php 

   class Shops_model extends CI_Model 
   {
   
      function __construct() 
      { 
          parent::__construct(); 
          $this->table = "tbl_shops";
      }

      function get_records() 
      {  
          $query = $this->db->get($this->table);
          $result = $query->result();
          return $result;
      }
      function get_shop_name($id)
      {
          $this->db->select('shop_name');
          $this->db->where('id', $id);
          $query = $this->db->get($this->table);
          $result = $query->row();
          return $result->shop_name?$result->shop_name:NULL;



   }




      ////////////////

      public function get_all_shops() 
      {  
         $this->db->select('*');
         $query = $this->db->get('tbl_shops');
         return $query->result();
      }

      public function add_new_shop($data) 
      {
         $this->db->set('add_date',date("Y-m-d"));
         $this->db->set($data);
         $this->db->insert('tbl_shops');
         return $this->db->insert_id();
      }

      public function get_shop_record_by_id($id) 
      {  
         $this->db->select('*');
         $this->db->where('id',$id);
         $query = $this->db->get('tbl_shops');
         return $query->row();
      }

      public function get_record_by_id($id) 
      {  
         $this->db->select('*');
         $this->db->where('id',$id);
         $query = $this->db->get('tbl_shops');
         return $query->row();
      }

      public function update_shop($shop_id,$data) 
      {  
         $this->db->set($data);
         $this->db->where('id',$shop_id);
         $this->db->update('tbl_shops');
      }

      public function delete_shop($record_id) 
      {  
         $this->db->select('*');
         $this->db->where('id',$record_id);
         $this->db->delete('tbl_shops');
      }

      public function check_email_already_exist($emailId,$id)
      {
         $this->db->select('*');
         $this->db->where('shop_email_address',$emailId);
         $this->db->where('id !=',$id);
         $query = $this->db->get('tbl_shops');
         $result = $query->row();
         return $result;
      }

      

     

    

        


   }