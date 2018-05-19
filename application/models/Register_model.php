<?php 

   class User_model extends CI_Model 
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

      public function update_forgot_key_before_email($email,$forgotPasswordKey)
      {
         $this->db->set('forgot_password_key',$forgotPasswordKey);
         $this->db->where('email',$email);
         $this->db->update('tbl_users');
         return true;
      } 

      public function get_user_id_for_email_verification($forgotPasswordKey)
      {
         $this->db->select('id');
         $this->db->where('forgot_password_key',$forgotPasswordKey);
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

      public function update_new_password($userId,$newPassword) {
         $this->db->set('password',$newPassword);
         $this->db->where('id',$userId);
         $this->db->update('tbl_users');
      }

      public function is_email_exist_in_database($email)
      {
         $this->db->select('id');
         $this->db->where('email',$email);
         $query = $this->db->get('tbl_users');
         $result = $query->row();
         return $result;
      }

      public function check_email_already_exist($emailId,$id)
      {
         $this->db->select('*');
         $this->db->where('email',$emailId);
         $this->db->where('id !=',$id);
         $query = $this->db->get('tbl_users');
         $result = $query->row();
         return $result;
      }

      public function check_username_already_exist($username,$id)
      {
         $this->db->select('*');
         $this->db->where('username',$username);
         $this->db->where('id !=',$id);
         $query = $this->db->get('tbl_users');
         $result = $query->row();
         return $result;
      }

      public function user_name_duplication_check($user_name)
      {
         $this->db->select('id');
         $this->db->where('username',$user_name);
         $query = $this->db->get('tbl_users');
         $result = $query->row();
         return $result;
      }    








   }


?>