<?php
defined('BASEPATH') OR exit('No direct script access allowed');


   class Users extends CI_Controller 
   {
	
      	function __construct() 
        { 
            parent::__construct(); 
            if(!$this->session->userdata('user_id'))
            return redirect('login');
            $this->load->library('form_validation');
            $this->load->helper('form');
            $this->load->helper('url');
            $this->load->library('email');
            $this->load->library('session'); 
            $this->load->helper('string');
           	$this->load->database();
            $this->load->model('users_model');
      	}       

        public function show()
        {
        	$users = $this->users_model->show_all_users();
        	$users['users'] = $users;
        	$this->load->view('includes/header');
        	$this->load->view('users/show',$users);
        	$this->load->view('includes/footer');
      	}       

        public function add() 
      	{
	        $output = array();
	        $output['first_name'] = '';
	        $output['last_name'] = '';
	        $output['username'] = '';
	        $output['email'] = '';
	        $output['password'] = '';
	        $output['confirm_password'] = '';
	       
	        if($_POST)
	        {    
	        	$output = array(); 
		        $output['first_name'] = $this->input->post('first_name');
		        $output['last_name'] = $this->input->post('last_name');
		        $output['username'] = $this->input->post('username');
		        $output['email'] = $this->input->post('email');
		        $output['password'] = $this->input->post('password');
		        $output['confirm_password'] = $this->input->post('confirm_password');		          

		        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		        $this->form_validation->set_rules('username', 'User Name', 'trim|required|is_unique[tbl_users.username]');
		        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[tbl_users.email]');
		        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirm_password]');
		        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');
		          
		        if($this->form_validation->run())
		        {	
		        	$dbdata = array();
		        	$dbdata['first_name'] = $this->input->post('first_name');
			        $dbdata['last_name'] = $this->input->post('last_name');
			        $dbdata['username'] = $this->input->post('username');
			        $dbdata['email'] = $this->input->post('email');
			        $dbdata['password'] = $this->input->post('password');
		        	$this->users_model->add_new_user($dbdata);
		            $this->session->set_flashdata('add_more_user', 'Add More User');
		            redirect('users/add');
		        } 
          	}
        	$this->load->view('includes/header');
        	$this->load->view('users/add',$output);
        	$this->load->view('includes/footer'); 	
   		}

		public function edit($user_id)
	    {	
	    	$row = $this->users_model->get_record_by_id($user_id);
	    	$output = array();
	        $output['first_name'] = $row->first_name;
	        $output['last_name'] = $row->last_name;
	        $output['username'] = $row->username;
	        $output['email'] = $row->email;
	        if($_POST)
	        { 	
	        	$output = array();
		        $output['first_name'] = $this->input->post('first_name');
		        $output['last_name'] = $this->input->post('last_name');
		        $output['username'] = $this->input->post('username');
		        $output['email'] = $this->input->post('email');

		        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		        $this->form_validation->set_rules('username', 'User Name', 'trim|required|callback_is_username_exist_in_database_excluded_user['.$user_id.']');
		        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|callback_is_email_exist_in_database_excluded_user['.$user_id.']');
		        if($this->form_validation->run())
		        {	
		        	$dbdata = array();	
		        	$dbdata['first_name'] = $this->input->post('first_name');
		        	$dbdata['last_name'] = $this->input->post('last_name');
		        	$dbdata['username'] = $this->input->post('username');
		        	$dbdata['email'] = $this->input->post('email');
		          	$this->users_model->update($user_id,$dbdata);
		            redirect('users/show');
		        }
	    	}
	    	$this->load->view('includes/header');
	    	$this->load->view('users/edit',$output);
	    	$this->load->view('includes/footer');
	    }

      	public function delete($record_id)
	    {
	    	$this->users_model->delete($record_id);
	    	redirect('users/show');
	    }

	    public function is_email_exist_in_database_excluded_user($email,$user_id)
	    {
	    	$user = $this->users_model->is_email_exist_in_database_excluded_user($email,$user_id);
	    	if($user)
	    	{
	    		$this->form_validation->set_message('is_email_exist_in_database_excluded_user','Email Address is already exist');
	    		return false;
	    	}
	    	else
	    	{
	    		return true;
	    	}
	    }

      	public function is_username_exist_in_database_excluded_user($user_name,$user_id) 
	    {
	    	$is_user_exist = $this->users_model->is_username_exist_in_database_excluded_user($user_name,$user_id);
	    	if($is_user_exist)
	    	{
	    		$this->form_validation->set_message('is_username_exist_in_database_excluded_user','User name is already exist');
	    		return false;
	    	}
	    	else
	    	{
	    		return true;
	    	}
	    }

	    public function check_user_name_existance() 
        {
            $username = $this->input->post('username');
            $is_user_name_exist = $this->users_model->check_user_name_existance($username);
            if($is_user_name_exist)
            {	
            	$this->form_validation->set_message('check_user_name_existance','This user name is already exist');
               	return false;
            }
            else
            {
               	return true;
            }
        }	





        





	}
