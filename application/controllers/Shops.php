<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  class Shops extends CI_Controller 
  {
	function __construct() 
    { 
	    parent::__construct(); 
	    $this->common_model->check_user_must_login();
	    $this->load->model('shops_model', 'shops');
    }	   
        
	public function index()
    {
    	$output['left_menu'] = "Shops";
        $output['left_submenu'] = "Shops";
        $output['page_title'] = "Shops";

    	$records = $this->shops->get_records();
    	$output['records'] = $records;

    	$this->load->view('admin/includes/header', $output);
    	$this->load->view('admin/shops/index'); 
    	$this->load->view('admin/includes/footer');  	
  	}       

    public function add() 
  	{
        $output['shop_name'] = '';
        $output['shop_owner_name'] = '';
        $output['shop_address'] = '';
        $output['shop_address_city'] = '';
        $output['shop_address_zip_code'] = '';
        $output['shop_primary_contact_number'] = '';
        $output['shop_owner_mobile_number'] = '';
        $output['shop_email_address'] = '';	
       
        $output['left_menu'] = "Shops";
        $output['left_submenu'] = "";
        $output['page_title'] = "Shops";
        
        if ($_POST) {
	        $this->form_validation->set_rules('shop_name', 'Shop Name', 'trim|required');
	        $this->form_validation->set_rules('shop_owner_name', 'Owner Name', 'trim|required');
	        $this->form_validation->set_rules('shop_address', 'Address ', 'trim|required');
	        $this->form_validation->set_rules('shop_address_city', 'City', 'trim|required');
	        $this->form_validation->set_rules('shop_address_zip_code', 'Zip Code', 'trim|required|numeric');
	        $this->form_validation->set_rules('shop_primary_contact_number', 'Primary Contact Number', 'trim|required');
	        $this->form_validation->set_rules('shop_owner_mobile_number', 'Owner Mobile Number', 'trim|required');
	        $this->form_validation->set_rules('shop_email_address', 'Email Address', 'trim|required|valid_email|is_unique[tbl_shops.shop_email_address]');		        
	       
	        if ($this->form_validation->run()) {	
	        	$dbD['shop_name'] = $this->input->post('shop_name');
		        $dbD['shop_owner_name'] = $this->input->post('shop_owner_name');
		        $dbD['shop_address'] = $this->input->post('shop_address');
		        $dbD['shop_address_city'] = $this->input->post('shop_address_city');
		        $dbD['shop_address_zip_code'] = $this->input->post('shop_address_zip_code');
		        $dbD['shop_primary_contact_number'] = $this->input->post('shop_primary_contact_number');
		        $dbD['shop_owner_mobile_number'] = $this->input->post('shop_owner_mobile_number');        
		        $dbD['shop_email_address'] = $this->input->post('shop_email_address');

	        	$this->shops->add_new_shop($dbD);
	            $message = "Shop added";
	            $response['redirectURL'] = site_url('shops');

	        } else {
	        	$message = validation_errors();
	        } 
	        $response['message'] = $message;
	        echo json_encode($response); die; 
      	}
        $this->load->view('admin/includes/header', $output);
        $this->load->view('admin/shops/add_shop'); 
        $this->load->view('admin/includes/footer');  	
   	}

	public function edit($shop_id)
	{	
    	$row = $this->shops->get_shop_record_by_id($shop_id);
    	$output = array();
    	$output['shop_id'] = $row->id;
        $output['shop_name'] = $row->shop_name;
        $output['shop_owner_name'] = $row->shop_owner_name;
        $output['shop_address'] = $row->shop_address;
        $output['shop_address_city'] = $row->shop_address_city;
        $output['shop_address_zip_code'] = $row->shop_address_zip_code;
        $output['shop_primary_contact_number'] = $row->shop_primary_contact_number; 
        $output['shop_owner_mobile_number'] = $row->shop_owner_mobile_number;
        $output['shop_email_address'] = $row->shop_email_address;
        $output['status'] = $row->status;
        $output['left_menu'] = "Shops";
        $output['left_submenu'] = "";
        $output['page_title'] = "";

        if ($_POST) {
	        $this->form_validation->set_rules('shop_name', 'Shop Name', 'trim|required');
	        $this->form_validation->set_rules('shop_owner_name', 'Owner Name', 'trim|required');
	        $this->form_validation->set_rules('shop_address', 'Address ', 'trim|required');
	        $this->form_validation->set_rules('shop_address_city', 'City', 'trim|required');
	        $this->form_validation->set_rules('shop_address_zip_code', 'Zip Code', 'trim|required|numeric');
	        $this->form_validation->set_rules('shop_primary_contact_number', 'Primary Contact Number', 'trim|required');
	        $this->form_validation->set_rules('shop_owner_mobile_number', 'Owner Mobile Number', 'trim|required');
	        $this->form_validation->set_rules('shop_email_address', 'Email Address', 'trim|required|valid_email');		        
	       
	        if ($this->form_validation->run()) {	
	        	$dbD['shop_name'] = $this->input->post('shop_name');
		        $dbD['shop_owner_name'] = $this->input->post('shop_owner_name');
		        $dbD['shop_address'] = $this->input->post('shop_address');
		        $dbD['shop_address_city'] = $this->input->post('shop_address_city');
		        $dbD['shop_address_zip_code'] = $this->input->post('shop_address_zip_code');
		        $dbD['shop_primary_contact_number'] = $this->input->post('shop_primary_contact_number');
		        $dbD['shop_owner_mobile_number'] = $this->input->post('shop_owner_mobile_number');        
		        $dbD['shop_email_address'] = $this->input->post('shop_email_address');

	        	$this->shops->update_shop($shop_id, $dbD);
	            $message = "Shop Updated";
	            $response['redirectURL'] = site_url('shops');

	        } else {
	        	$message = validation_errors();
	        } 
	        $response['message'] = $message;
	        echo json_encode($response); die; 
      	}
        $this->load->view('admin/includes/header', $output);
    	$this->load->view('admin/shops/add_shop'); 
    	$this->load->view('admin/includes/footer');  
   }
    public function delete($record_id)
	{
	  $this->shops->delete_shop($record_id);
	  redirect('shops/show');
	}
    public function check_email_already_exist($email,$shopId)
	{
	  $shop = $this->shops->check_email_already_exist($email,$shopId);
	   if($shop)
	    {
	     $this->form_validation->set_message('check_email_already_exist','Email Address already exist');
	     return false;
	    }
	    else{
	    	 return true;
	    	}
	    }      

	 }
