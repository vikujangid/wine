<?php defined('BASEPATH') OR exit('No direct script access allowed');

/////////////////////////////////////////////////////
/// Sales controller for insert daily report sheet
/////////////////////////////////////////////////////


class Sales extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct(); 
        $this->common_model->check_user_must_login();
        $this->load->model('product_list_model','product_list');
      	$this->load->model('product_sale_model','product_sales');
      	$this->load->model('brands_model','brands');
      	$this->load->model('shop_brands_model');
      	$this->load->model('shops_model', 'shops');
    }
    function index() 
    {
        $output['left_menu'] = "Sales";
        $output['left_submenu'] = "";
        $output['page_title'] = "";

        $shops = $this->shops->get_records();
        $brands = $this->brands->get_brands("Active");
        $output['shops'] = $shops;
        $output['brands'] = $brands;

        if ($_POST) {
            $message = false;
            $success = true;
            $this->form_validation->set_rules('date','date','required');
            $this->form_validation->set_rules('shop_id','shop','required');
            $this->form_validation->set_rules('brand_id','brand','required');
            $this->form_validation->set_rules('size[]','size','required');

            if ($this->form_validation->run()) {
                $shop_id = $this->input->post('shop_id');
                $sold_date = date('Y-m-d',strtotime($this->input->post('date')));
                $brand_id = $this->input->post('brand_id');
                $size = $this->input->post('size');
                $this->product_list->delete_brand_sizes($brand_id,$sold_date,$shop_id);

                foreach ($size as $key => $value) {
                    $price = $this->shop_brands_model->get_price($shop_id, $brand_id, $key);

                    if (!$price)
                        $price =  $this->product_list->get_price($brand_id,$key);

                    $data_insert = array();
                    $data_insert['rate_per_unit'] = $price;
                    $data_insert['shop_id'] = $shop_id;
                    $data_insert['sold_date'] = $sold_date;
                    $data_insert['brand_id'] = $brand_id;
                    $data_insert['size_type'] = $key;
                    $data_insert['quantity_initial'] = $value['quantity_initial'];
                    $data_insert['quantity_credit'] = $value['quantity_credit'];
                    $data_insert['quantity_shipped'] = $value['quantity_shipped'];
                    $data_insert['quantity_sold'] = $value['quantity_sold'];
                    $data_insert['quantity_remaining'] = $data_insert['quantity_initial'] + $data_insert['quantity_credit'] - $value['quantity_sold'] - $data_insert['quantity_shipped'];
                    $data_insert['price'] = $price * $data_insert['quantity_sold'];
                    
                    $this->product_sales->add_record($data_insert);
                    $message = 'Sales entries are updated';
                }

            } else {
                $message = validation_errors();
                $success = false;
            }
            $response['redirectURL'] = false;
            $response['message'] = $message;
            $response['success'] = $success;
            echo json_encode($response); die;
        }
        $this->load->view('admin/includes/header', $output);
        $this->load->view('admin/sales/index');
        $this->load->view('admin/includes/footer');
    }
    function get_product_sale_quantity_for_daily_report()
    {
        $brand_id = $this->input->get('brand_id');
      	$shop_id = $this->input->get('shop_id');
      	$date = date("Y-m-d", strtotime($this->input->get('date')));
      	$sizesType = $this->brands->get_brand_categories($brand_id);
      	$sizes = array();

      	foreach ($sizesType as $key => $value) {
      		
	        $sizes[$value->size_type]['size_type'] = $value->size_type;
	        $sizes[$value->size_type]['brand_id'] = $value->brand_id;
	        $sizes[$value->size_type]['size_in_ml'] = $value->size_in_ml;
	        $sizes[$value->size_type]['price'] = $value->price;
	        $sizes[$value->size_type]['quantity_initial'] = $this->product_list->get_last_remainings($brand_id, $date, $shop_id, $value->size_type);
	        $sizes[$value->size_type]['quantity_credit'] = '';
	        $sizes[$value->size_type]['quantity_shipped']  = '';
	        $sizes[$value->size_type]['quantity_sold'] = '';

	        $result = $this->product_list->get_sold_units($brand_id,$date,$shop_id,$value->size_type);
	        
	        if ($result) {

		        $sizes[$value->size_type]['quantity_initial'] = $result->quantity_initial;
		        $sizes[$value->size_type]['quantity_credit'] = $result->quantity_credit;
		        $sizes[$value->size_type]['quantity_shipped'] = $result->quantity_shipped;
		        $sizes[$value->size_type]['quantity_sold'] = $result->quantity_sold;
	        }
      	}
        $output['sizes'] = $sizes;
      	$html = $this->load->view('admin/sales/sales_ajax_form',$output, true); 
      	$data['success'] = true;
      	$data['html'] = $html;
      	$product_photo = $this->brands->get_brand_photo($brand_id);
      	$data['product_photo'] = $product_photo;
      	echo json_encode($data); 
   }

  function report()
  {
      $shops = $this->shops->get_records();
      $output['shops'] = $shops;
      $output['left_menu'] = "Reports";
      $shop_id = $this->input->get('shop_id');
      $date = $this->input->get('date')?$this->input->get('date'):date("Y-m-d");
      $date = date("Y-m-d",strtotime($date));

      $sale_list = $this->product_list->product_sale_list($shop_id,$date);

      $product_sale = array();

      foreach ($sale_list as $key => $value) {
          $brand_id = $value->brand_id;
          $brand_name = $this->product_list->get_brand($brand_id);

          foreach ($brand_name as $key => $value_for_brand_name) {
              $value->brand_name =  $value_for_brand_name->brand_name;
          }

          $product_sale[$value->brand_name]['initial'][$value->size_type] = $value->quantity_initial;
          $product_sale[$value->brand_name]['credit'][$value->size_type] = $value->quantity_credit;
          $product_sale[$value->brand_name]['shipped'][$value->size_type] = $value->quantity_shipped;
          $product_sale[$value->brand_name]['sold'][$value->size_type] = $value->quantity_sold;
      }
      $output['sale_list'] = $sale_list; 
      $output['shop_id'] = $shop_id; 
      $output['date'] = $date; 
      $output['product_sale'] = $product_sale; 

      $this->load->view('admin/includes/header', $output);
      $this->load->view('admin/sales/report'); 
      $this->load->view('admin/includes/footer'); 
  }
  function print()
  {
      $shops = $this->shops->get_records();
      $output['shops'] = $shops;
      $output['left_menu'] = "Reports";
      $shop_id = $this->input->get('shop_id');
      $date = $this->input->get('date')?$this->input->get('date'):date("Y-m-d");
      $date = date("Y-m-d",strtotime($date));

      $sale_list = $this->product_list->product_sale_list($shop_id,$date);

      $product_sale = array();

      foreach ($sale_list as $key => $value) {
          $brand_id = $value->brand_id;
          $brand_name = $this->product_list->get_brand($brand_id);

          foreach ($brand_name as $key => $value_for_brand_name) {
              $value->brand_name =  $value_for_brand_name->brand_name;
          }

          $product_sale[$value->brand_name]['initial'][$value->size_type] = $value->quantity_initial;
          $product_sale[$value->brand_name]['credit'][$value->size_type] = $value->quantity_credit;
          $product_sale[$value->brand_name]['shipped'][$value->size_type] = $value->quantity_shipped;
          $product_sale[$value->brand_name]['sold'][$value->size_type] = $value->quantity_sold;
      }
      $output['sale_list'] = $sale_list; 
      $output['shop_id'] = $shop_id; 
      $output['date'] = $date; 
      $output['product_sale'] = $product_sale; 

      $this->load->view('admin/includes/header', $output);
      $this->load->view('admin/sales/report'); 
      $this->load->view('admin/includes/footer'); 
  }
}