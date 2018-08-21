<?php
defined('BASEPATH') OR exit('No direct script access allowed');


   class Settings extends CI_Controller 
   {
	
      	function __construct() 
        { 
            parent::__construct();
            if(!$this->session->userdata('user_id'))
            return redirect('login'); 
           
            $this->load->model('settings_model');
            $this->load->model('shops_model', 'shops');
      	}
      	
      	public function settings()
	    {	
	    	$output = array();
	    	$settings = $this->settings_model->get_setings_record();
	    	if($settings)
	    	{
	    		$output['website_title'] = $settings->website_title;
		        $output['contect_email_address'] = $settings->contect_email_address;
		        $output['smtp_host'] = $settings->smtp_host;
		        $output['smtp_port'] = $settings->smtp_port;
		        $output['smtp_username'] = $settings->smtp_username;
		        $output['smtp_password'] = $settings->smtp_password;
		        $output['button_value'] = 'Update';
	    	}
	    	else
	    	{
	    		$output['website_title'] = '';
		        $output['contect_email_address'] = '';
		        $output['smtp_host'] = '';
		        $output['smtp_port'] = '';
		        $output['smtp_username'] = '';
		        $output['smtp_password'] = '';
		        $output['button_value'] = 'Submit';
	    	}	        	        
	        if($_POST)
	        { 	
	        	$dboutput = array();
	        	$dboutput['website_title'] = $this->input->post('website_title');
		        $dboutput['contect_email_address'] = $this->input->post('contect_email_address');
		        $dboutput['smtp_host'] = $this->input->post('smtp_host');
		        $dboutput['smtp_port'] = $this->input->post('smtp_port');
		        $dboutput['smtp_username'] = $this->input->post('smtp_username');
		        $dboutput['smtp_password'] = $this->input->post('smtp_password');		        

		        $this->form_validation->set_rules('website_title', 'Website Title', 'trim|required');
		        $this->form_validation->set_rules('contect_email_address', 'Email Address', 'trim|required|valid_email');
		        $this->form_validation->set_rules('smtp_host', 'SMTP Host', 'trim|required');
		        $this->form_validation->set_rules('smtp_port', 'SMTP Port', 'trim|required');
		        $this->form_validation->set_rules('smtp_username', 'SMTP Username', 'trim|required');
		        $this->form_validation->set_rules('smtp_password', 'SMTP Password', 'trim|required');
		       			       
		        if($this->form_validation->run())
		        {	
		        	if($settings)
		        	{
		        		$this->settings_model->update_settings($dboutput);
		        		$this->session->set_flashdata('settings_flesh_message', 'Settings has been updated');
		        	}
		        	else
		        	{
		        		$this->settings_model->insert_settings($dboutput);
		        		$this->session->set_flashdata('settings_flesh_message', 'Settings has been inserted');

		        	}
		          	redirect('settings/settings');
		        }
	    	}
	    	$this->load->view('includes/header');
        	$this->load->view('settings/settings',$output); 
        	$this->load->view('includes/footer');
        }
        function set_session_shop($shop_id)
        {
        	if($shop_id)
        	{
        		$this->session->set_userdata('shop_id', $shop_id);
        		$this->shops->set_selected_shop($shop_id);
        		$data['success'] = TRUE;
        		$data['redirectURL'] = site_url();
        		echo json_encode($data); die;
        	}
        }
	   
        
		      



        





}
