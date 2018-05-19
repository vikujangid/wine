<?php 

   class Settings_model extends CI_Model 
   {
   
      function __construct() 
      { 
         parent::__construct(); 
      }

      public function get_setings_record() 
      {  
         $this->db->select('*');
         $query = $this->db->get('tbl_website_settings');
         return $query->row();
      }

       public function insert_settings($data) 
      { 
         $this->db->select('*'); 
         $this->db->set($data);
         $this->db->insert('tbl_website_settings');
         return $this->db->insert_id();
      }

       public function update_settings($data) 
      {  
         $this->db->select('*');  
         $this->db->set($data);
         $this->db->update('tbl_website_settings');
      }




        








   }