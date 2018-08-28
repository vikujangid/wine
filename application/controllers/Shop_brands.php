<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop_brands extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->common_model->check_user_must_login();
        $this->load->model('shops_model', 'shops');
        $this->load->model('shop_brands_model');
    }
    public function index($shop_id)
    {
        $output['left_menu'] = "";
        $output['left_submenu'] = "";
        $output['page_title'] = "";

        $this->load->view('admin/includes/header', $output);
        $this->load->view('admin/shop_brands/index');
        $this->load->view('admin/includes/footer');
    }
    public function show($shop_id)
    {
        $output['left_menu'] = "";
        $output['left_submenu'] = "";
        $output['page_title'] = "";
        $arrayMybrands = array();
        $shop_name = $this->shop_brands_model->get_shop_name($shop_id);
        $my_brands = $this->shop_brands_model->get_brands($shop_id);
        $all_brands = $this->shop_brands_model->get_all_brands();

        foreach ($my_brands as $value) {
            $arrayMybrands[] = $value->brand_id;    
        }

        foreach ($all_brands as $key => $brands) {
            
            if(in_array($brands->id, $arrayMybrands)) {
                unset($all_brands[$key]);
                continue;
            }

            $brands->price_full = '';
            $brands->price_half = '';
            $brands->price_quarter = '';
        }
        if ($_POST) {
            $prices = $this->input->post('prices');
            $this->shop_brands_model->delete_record_from_shop($shop_id);

            foreach ($prices as $key => $value) {

                if (isset($value['brand_id']) && $value['brand_id']) {
                    $data_insert = array();
                    $data_insert['brand_id'] = $value['brand_id'];
                    $data_insert['price_full'] = $value['Full'];
                    $data_insert['price_half'] = $value['Half'];
                    $data_insert['price_quarter'] = $value['Quarter'];
                    $data_insert['shop_id'] = $shop_id;
                    //$data_insert['display_order'] = '';

                    $this->shop_brands_model->create_record_in_shop($data_insert);
                }
            }
            $data['success'] = TRUE;
            $data['message'] = "Saved..";
            echo json_encode($data); die;
            
        }
        $output['all_brands'] = $all_brands;
        $output['my_brands'] = $my_brands;
        $output['shop_name'] = $shop_name;

        $this->load->view('admin/includes/header', $output);
        $this->load->view('admin/shop_brands/add');
        $this->load->view('admin/includes/footer');
    }
}
