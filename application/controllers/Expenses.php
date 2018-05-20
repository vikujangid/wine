<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Expenses extends CI_Controller 
{
   function __construct() 
     { 
       parent::__construct();
       $this->common_model->check_user_must_login();
       $this->load->model('expensive_model','expensive');
       $this->load->model('shops_model','shops');
       $this->user_id = $this->session->userdata('user_id');
     }
   
   public function index()
   {
       $shops = $this->shops->get_records();
       $output['left_menu'] = "Expenses";
       $output['left_submenu'] = "Expenses";
       $output['page_title'] = "Expenses";
       $output['shops'] = $shops;

       $this->load->view('admin/includes/header', $output);
       $this->load->view('admin/expensive/index');
       $this->load->view('admin/includes/footer');
    }
    public function show($shop_id)
    {
      $output['left_menu'] = "Expenses";
      $output['left_submenu'] = "Expenses";
      $output['page_title'] = "Expenses";

      $output['shop_id'] = $shop_id;
      $output['records'] =  $this->expensive->get_records($shop_id);
      $output['shop_name'] = $this->shops->get_shop_name($shop_id);  

      $this->load->view('admin/includes/header',$output);
      $this->load->view('admin/expensive/show_expensive');
      $this->load->view('admin/includes/footer'); 
    }
    public function delete($id)
    {
       $this->expensive->delete_record($id);
       redirect('expenses');
    }
    public function add($shop_id)
    {
        $output['left_menu'] = "Expenses";
        $output['left_submenu'] = "";
        $output['page_title'] = "";
        $output['title'] =  NULL;
        $output['amount'] =  NULL;
        $output['date'] =  date("Y-m-d");
        $output['shop_id'] =  $shop_id;
        $output['shop_name'] = $this->shops->get_shop_name($shop_id);

        if ($_POST) {
            $message = FALSE;
            $success = TRUE;
            $failure = FALSE;

            $this->form_validation->set_rules('date','date','required|trim');
            $this->form_validation->set_rules('title','title','trim|required');
            $this->form_validation->set_rules('amount','Amount','trim|required');

            if ($this->form_validation->run()) {
                $data_insert['user_id'] = $this->user_id;
                $data_insert['date'] = date('Y-m-d',strtotime($this->input->post('date')));
                $data_insert['title'] = $this->input->post('title');
                $data_insert['shop_id'] = $shop_id;
                $data_insert['amount'] = $this->input->post('amount');
                $this->expensive->add_record($data_insert);
                $message = "Expense added successfully";
            
            } else {
                $message = validation_errors();
                $failure = TRUE;
            }
            
            if (!$failure) {
                $success = TRUE;
                $data['redirectURL'] = site_url('expenses/show/'.$shop_id);

            } else {
                $success = FALSE;
            }

            $data['success'] = $success;
            $data['message'] = $message;
            echo json_encode($data); die;
        }

        $this->load->view('admin/includes/header',$output);
        $this->load->view('admin/expensive/add_expensive');
        $this->load->view('admin/includes/footer');  
    }
    function edit($id)
    {
        $output['left_menu'] = "Expenses";
        $output['left_submenu'] = "";
        $output['page_title'] = "";
        $record =  $this->expensive->get_record($id);
        $output['title'] =  $record->title;
        $output['amount'] =  $record->amount;
        $output['date'] =  $record->date;
        $output['shop_id'] =  $shop_id = $record->shop_id;
        $output['shop_name'] = $this->shops->get_shop_name($shop_id);

        if ($_POST) {
            $message = FALSE;
            $success = TRUE;
            $failure = FALSE;

            $this->form_validation->set_rules('date','date','trim|required');
            $this->form_validation->set_rules('title','title','trim|required');
            $this->form_validation->set_rules('amount','Amount','trim|required');

            if ($this->form_validation->run()) {
                $data_insert = array();
                $data_insert['date'] = date('Y-m-d',strtotime($this->input->post('date')));
                $data_insert['title'] = $this->input->post('title');
                $data_insert['amount'] = $this->input->post('amount');
                $this->expensive->update_record($data_insert, $id);
                $message = "Record updated";
            
            } else {
                $message = validation_errors();
                $failure = TRUE;
            }
            
            if (!$failure) {
                $success = TRUE;
                $data['redirectURL'] = site_url('expenses/show/'.$shop_id);

            } else {
                $success = FALSE;
            }
            $data['success'] = $success;
            $data['message'] = $message;
            echo json_encode($data); die;
        }

        $this->load->view('admin/includes/header',$output);
        $this->load->view('admin/expensive/add_expensive');
        $this->load->view('admin/includes/footer');
    }
} 