<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Expenses extends CI_Controller 
{
   function __construct() 
     { 
       parent::__construct();
       if(!$this->session->userdata('user_id'))
       return redirect('login');
       $this->load->model('expensive_model','expensive');
       $this->load->model('shops_model','shops');
     }
   
   public function index()
   {
       $all_shops = $this->shops->get_all_shops();
       $output['left_menu'] = "Expenses";
       $output['left_submenu'] = "";
       $output['page_title'] = "";
       $output['all_shops'] = $all_shops;
       $this->load->view('admin/includes/header',$output);
       $this->load->view('admin/expensive/index');
       $this->load->view('admin/includes/footer');
    }
    public function show($shop_id)
    {
      $output['left_menu'] = "Expenses";
      $output['left_submenu'] = "";
      $output['page_title'] = "";
      $output['shop_id'] = $shop_id;
      $output['records'] =  $this->expensive->get_record($shop_id);
      $output['shop_name'] = $this->expensive->get_shop_name_by_shop_id($shop_id);  
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
      if($_POST){
       $this->form_validation->set_rules('date','date','required|trim');
       $this->form_validation->set_rules('title','title','trim|required');
       $this->form_validation->set_rules('amount','Amount','trim|required');
       if($this->form_validation->run())
       { 
        $data_insert = array();
        $data_insert['user_id'] = $this->session->userdata('user_id');
        $data_insert['date'] = date('Y-m-d',strtotime($this->input->post('date')));
        $data_insert['add_date'] = date('Y-m-d H:i:s');
        $data_insert['title'] = $this->input->post('title');
        $data_insert['shop_id'] = $shop_id;
        $data_insert['amount'] = $this->input->post('amount');
        $this->expensive->add_record($data_insert );
        redirect('expenses');
        } }
        $this->load->view('admin/includes/header',$output);
        $this->load->view('admin/expensive/add_expensive');
        $this->load->view('admin/includes/footer');  
    }
    public function edit($id)
    {
      $output['left_menu'] = "Expenses";
       $output['left_submenu'] = "";
       $output['page_title'] = "";
      $record =  $this->expensive->get_record_by_id($id);
      $output['title'] =  $record->title;
      $output['amount'] =  $record->amount;
      $output['date'] =  $record->date;
      $output['shop_id'] =  $record->shop_id;
      if($_POST)
      {
        $this->form_validation->set_rules('date','date','trim|required');
        $this->form_validation->set_rules('title','title','trim|required');
        $this->form_validation->set_rules('amount','Amount','trim|required');
        if($this->form_validation->run())
        { 
          $data_insert = array();
          $data_insert['date'] = date('Y-m-d',strtotime($this->input->post('date')));
          $data_insert['title'] = $this->input->post('title');
          $data_insert['amount'] = $this->input->post('amount');
          $this->expensive->update_record($data_insert, $id);
          redirect('expenses');
        }
      }
      $this->load->view('admin/includes/header',$output);
      $this->load->view('admin/expensive/add_expensive');
      $this->load->view('admin/includes/footer');  
    }
} 