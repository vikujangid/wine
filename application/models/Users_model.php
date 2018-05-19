<?php 

   class Users_model extends CI_Model 
   {
   
      function __construct() 
      { 
         parent::__construct(); 
      }     

      public function login_autantication($email,$password)
      {
         $this->db->select('*');
         $this->db->where('email',$email);
         $this->db->where('password',$password);
         $query = $this->db->get('tbl_users');
         $result = $query->row();
         return $result;
      }

      public function update_validation_key($email,$validation_key)
      {
         $this->db->set('forgot_password_key',$validation_key);
         $this->db->where('email',$email);
         $this->db->update('tbl_users');
      } 

      public function get_user_id($validation_key)
      {
         $this->db->select('id');
         $this->db->where('forgot_password_key',$validation_key);
         $query = $this->db->get('tbl_users');
         $result = $query->row();
         return $result->id;
      }   

      public function forgot_password_key_updation($user_id_for_verification) {
         $forgot_password_key_to_be_changed = null;
         $this->db->set('forgot_password_key',$varification_key_to_be_changed);
         $this->db->where('id',$user_id_for_verification);
         $this->db->update('tbl_users');
      }

      public function update_password($user_id,$new_password) {
         $this->db->set('password',$new_password);
         $this->db->where('id',$user_id);
         $this->db->update('tbl_users');
         return true;
      }     

      public function add_new_user($data) 
      {
         $this->db->set('add_date',date("Y-m-d"));
         $this->db->set($data);
         $this->db->insert('tbl_users');
         return $this->db->insert_id();
      }

      public function show_all_users() 
      {  
         $this->db->select('*');
         $query = $this->db->get('tbl_users');
         return $query->result();
      }

      public function get_record_by_id($id) 
      {  
         $this->db->select('*');
         $this->db->where('id',$id);
         $query = $this->db->get('tbl_users');
         return $query->row();
      }

      public function update($id,$data) 
      {  
         $this->db->set($data);
         $this->db->where('id',$id);
         $this->db->update('tbl_users');
      }

      public function delete($record_id) 
      {  
         $this->db->select('*');
         $this->db->where('id',$record_id);
         $this->db->delete('tbl_users');
      }

      public function is_email_exist_in_database($email)
      {
         $this->db->select('id');
         $this->db->where('email',$email);
         $query = $this->db->get('tbl_users');
         $result = $query->row();
         return $result;
      }

      public function is_email_exist_in_database_excluded_user($email_id,$user_id)
      {
         $this->db->select('*');
         $this->db->where('email',$email_id);
         $this->db->where('id !=',$user_id);
         $query = $this->db->get('tbl_users');
         $result = $query->row();
         return $result;
      }

      public function is_username_exist_in_database_excluded_user($username,$user_id)
      {
         $this->db->select('*');
         $this->db->where('username',$username);
         $this->db->where('id !=',$user_id);
         $query = $this->db->get('tbl_users');
         $result = $query->row();
         return $result;
      }

          








   }