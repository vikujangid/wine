<?php
defined('BASEPATH') OR exit('No direct script access allowed');


    class Brands extends CI_Controller 
    {
        function __construct() 
        { 
            parent::__construct();
            $this->common_model->check_user_must_login();
            $this->load->model('brands_model', 'brands');
        }
        public function index()
        {  
            $brands = $this->brands->get_brands();          
            $output['brands'] = $brands;
            $output['left_menu'] = "Brands";
            $output['left_submenu'] = "Brand_Index";
            $output['page_title'] = "";
            
            $this->load->view('admin/includes/header', $output);
            $this->load->view('admin/brands/index'); 
            $this->load->view('admin/includes/footer'); 
        }
        public function add() 
        {
            $output['left_menu'] = "Brands";
            $output['left_submenu'] = "Brand_Index";
            $output['page_title'] = "";

            
            $output['brand_name'] = '';
            $output['size_type_of_full'] = TRUE;
            $output['size_in_ml_of_full'] = 750;
            $output['price_of_full'] = '';
            $output['size_type_of_half'] = TRUE;
            $output['size_in_ml_of_half'] = 375;
            $output['price_of_half'] = '';
            $output['size_type_of_quarter'] = TRUE;
            $output['size_in_ml_of_quarter'] = 180;
            $output['price_of_quarter'] = '';
            $output['brand_name'] ='';
            $output['brand_category_id'] = '';
            $output['brand_id'] = '';
            $output['size_type'] = '';
            $output['size_in_ml'] = '';
            $output['price'] = '';
            
            $output['id'] = "";

            if ($_POST) {
                $failure = FALSE;
                $message = FALSE;
            	  $success = TRUE;

                $this->form_validation->set_rules('brand_name', 'Brand Name', 'trim|required');

                if (isset($_POST['size_type_of_full'])) 
                {
                  $this->form_validation->set_rules('size_in_ml_of_full', 'Full Quantity', 'trim|required|numeric');
                  $this->form_validation->set_rules('price_of_full', 'Full Price', 'trim|numeric');
                }
                if(isset($_POST['size_type_of_half'])) 
                {
                  $this->form_validation->set_rules('size_in_ml_of_half', 'Half Quantity', 'trim|required|numeric');
                  $this->form_validation->set_rules('price_of_half', 'Half Price', 'trim|numeric');
                }
                if (isset($_POST['size_type_of_quarter'])) 
                {
                  $this->form_validation->set_rules('size_in_ml_of_quarter', 'Quarter Quantity', 'trim|required|numeric');
                  $this->form_validation->set_rules('price_of_quarter', 'Quarter Price', 'trim|numeric');                  
                }

                if($this->form_validation->run())
                {
                    $directory = './uploads'; 
                    @mkdir($directory, 0777); 
                    @chmod($directory,  0777);  
                    
                    $config['upload_path'] = $directory;
                    $config['allowed_types'] = 'gif|jpeg|jpg|png';            
                    $config['encrypt_name'] = TRUE;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    
                    $image_name = NULL;
                    
                    if ($this->upload->do_upload('product_photo')) {
                        $image_data = $this->upload->data();
                        $file_name = $image_data['file_name'];
                        $image_name = $file_name;
                    }
                    $brand_name = $this->input->post('brand_name');
                    $brand_id = $this->brands->add_brand($brand_name, $image_name);
                    
                    if($this->input->post('size_type_of_full'))
                    {
                      $dbdata = array();
                      $dbdata['size_type'] = $this->input->post('size_type_of_full');
                      $dbdata['size_in_ml'] = $this->input->post('size_in_ml_of_full');
                      $dbdata['price'] = $this->input->post('price_of_full')?$this->input->post('price_of_full'):NULL;
                      $dbdata['brand_id'] = $brand_id;
                      $this->brands->add_brand_category($dbdata);
                    }                        
                    if(isset($_POST['size_type_of_half'])) 
                    {   
                      $dbdata = array();
                      $dbdata['size_type'] = $this->input->post('size_type_of_half');
                      $dbdata['size_in_ml'] = $this->input->post('size_in_ml_of_half');
                      $dbdata['price'] = $this->input->post('price_of_half')?$this->input->post('price_of_half'):NULL;
                      $dbdata['brand_id'] = $brand_id;
                      $this->brands->add_brand_category($dbdata);
                    }
                    if (isset($_POST['size_type_of_quarter'])) 
                    {
                      $dbdata = array();
                      $dbdata['size_type'] = $this->input->post('size_type_of_quarter');
                      $dbdata['size_in_ml'] = $this->input->post('size_in_ml_of_quarter');
                      $dbdata['price'] = $this->input->post('price_of_quarter')?$this->input->post('price_of_quarter'):NULL;
                      $dbdata['brand_id'] = $brand_id;              
                      $this->brands->add_brand_category($dbdata);
                    }
                    $data['message'] = "Brand added";
                    $data['redirectURL'] = site_url('brands');
                }
                else
                {
                    $message = validation_errors();
                    $success = FALSE;
                }
                $data['success'] = $success;
                $data['message'] = $message;
                echo json_encode($data); die;
            }
            $this->load->view('admin/includes/header',$output);
            $this->load->view('admin/brands/add_brand'); 
            $this->load->view('admin/includes/footer');   
        }

        public function update($brand_id)
        {
            $output['left_menu'] = "Brands";
            $output['left_submenu'] = "Brand_Index";
            $output['page_title'] = "Brands";
 
            
            $output['id'] = $brand_id;
            $output['brand_id'] = $brand_id;
            $row = $this->brands->get_category_record_by_id($brand_id);
           
            foreach ($row as $key => $value) {
  	            $output['brand_name'] = $this->brands->get_brand_name_by_brand_id($value->brand_id);
  	            $output['size_type'][$value->size_type] = $value->size_type;
  	            $output['size_in_ml'][$value->size_type] = $value->size_in_ml;
  	            $output['price'][$value->size_type] = $value->price;
  	        }

            if ($_POST) {
                $success = TRUE;
                $message = FALSE;
                $this->form_validation->set_rules('brand_name', 'Brand Name', 'trim|required');

                if (isset($_POST['size_type_of_full'])) 
                {
                  $this->form_validation->set_rules('size_in_ml_of_full', 'Full Quantity', 'trim|required|numeric');
                  $this->form_validation->set_rules('price_of_full', 'Full Price', 'trim|numeric');
                }

                if(isset($_POST['size_type_of_half'])) 
                {
                  $this->form_validation->set_rules('size_in_ml_of_half', 'Half Quantity', 'trim|required|numeric');
                  $this->form_validation->set_rules('price_of_half', 'Half Price', 'trim|numeric');
                }
                if (isset($_POST['size_type_of_quarter'])) 
                {
                  $this->form_validation->set_rules('size_in_ml_of_quarter', 'Quarter Quantity', 'trim|required|numeric');
                  $this->form_validation->set_rules('price_of_quarter', 'Quarter Price', 'trim|numeric');                  
                }
                if($this->form_validation->run())
                { 
                    $brand_name = $this->input->post('brand_name');
                    $this->brands->update_brand_name($brand_id, $brand_name);
                    if($this->input->post('size_type_of_full'))
                    {
                      $dbdata = array();
                      $size = $this->input->post('size_type_of_full');
                      $dbdata['size_type'] = $size; 
                      $dbdata['size_in_ml'] = $this->input->post('size_in_ml_of_full');
                      $dbdata['price'] = $this->input->post('price_of_full')?$this->input->post('price_of_full'):NULL;
                      $dbdata['brand_id'] = $brand_id;
                      $this->brands->delete_brand_category($brand_id,$size);
                      $this->brands->add_brand_category($dbdata);
                    }                        
                    if(isset($_POST['size_type_of_half'])) 
                    {   
                      $dbdata = array();
                      $size =  $this->input->post('size_type_of_half');
                      $dbdata['size_type'] = $size; 
                      $dbdata['size_in_ml'] = $this->input->post('size_in_ml_of_half');
                      $dbdata['price'] = $this->input->post('price_of_half')?$this->input->post('price_of_half'):NULL;
                      $dbdata['brand_id'] = $brand_id;
                      $this->brands->delete_brand_category($brand_id,$size);
                      $this->brands->add_brand_category($dbdata);
                    }
                    if (isset($_POST['size_type_of_quarter'])) 
                    {
                      $dbdata = array();
                      $size = $this->input->post('size_type_of_quarter');
                      $dbdata['size_type'] = $size;
                      $dbdata['size_in_ml'] = $this->input->post('size_in_ml_of_quarter');
                      $dbdata['price'] = $this->input->post('price_of_quarter')?$this->input->post('price_of_quarter'):NULL;
                      $dbdata['brand_id'] = $brand_id;              
                      $this->brands->delete_brand_category($brand_id,$size);
                      $this->brands->add_brand_category($dbdata);
                    }
                    $data['redirectURL'] = site_url('brands');
              }
              else
              {
                  $message = validation_errors();
                  $success = FALSE;
              }
              $data['success'] = $success;
              $data['message'] = $message;
              echo json_encode($data); die;
          }
          $this->load->view('admin/includes/header',$output);
          $this->load->view('admin/brands/user_form'); 
          $this->load->view('admin/includes/footer');
      }
      function delete($id)
      {
        $this->brands->delete_brand($id);
        $data['success'] = true;
        $data['redirectURL'] = site_url('brands');
        echo json_encode($data); die;
      }  
  }