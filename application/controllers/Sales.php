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
      	$this->load->model('expensive_model', 'expenses');
      	$this->load->model('direct_sold_model', 'direct_solds');
        $this->user_id = $this->session->userdata('user_id');
        $this->shop_id = $this->session->userdata('shop_id');;
        $this->date = $this->session->userdata('date')?$this->session->userdata('date'):date('Y-m-d');
    }
    function index() 
    {
        $output['left_menu'] = "Sales";
        $output['left_submenu'] = "";
        $output['page_title'] = "";

        $shops = $this->shops->get_records();
        $brands = $this->brands->get_brands("Active");
        $brands = $this->shop_brands_model->get_my_brands($this->shop_id, NULL);
        $output['shops'] = $shops;
        $output['brands'] = $brands;
        $output['date'] = $this->date;

        if ($_POST) {
            $message = false;
            $success = true;
            $this->form_validation->set_rules('date','date','required');
            $this->form_validation->set_rules('brand_id','brand','required');
            $this->form_validation->set_rules('size[]','size','required');

            if ($this->form_validation->run()) {
                $shop_id = $this->shop_id;
                $sold_date = date('Y-m-d',strtotime($this->input->post('date')));
                $brand_id = $this->input->post('brand_id');
                $brand = $this->brands->get_brand($brand_id);
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
                    $data_insert['is_beer'] = $brand->is_beer;
                    $data_insert['is_desi'] = $brand->is_desi;
                    $data_insert['brand_name'] = $brand->brand_name;
                    $data_insert['quantity_initial'] = $value['quantity_initial'];
                    $data_insert['quantity_credit'] = $value['quantity_credit'];
                    $data_insert['quantity_shipped'] = $value['quantity_shipped'];
                    $data_insert['quantity_sold'] = $value['quantity_sold'];
                    $data_insert['quantity_remaining'] = $data_insert['quantity_initial'] + $data_insert['quantity_credit'] - $value['quantity_sold'] - $data_insert['quantity_shipped'];
                    $data_insert['price'] = $price * $data_insert['quantity_sold'];
                    
                    $this->product_sales->add_record($data_insert);
                    $message = 'Sales entries are updated';

                }
                $response['callBackFunction'] = 'callback_sale_added';

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
      	$shop_id = $this->shop_id;
      	$date = date("Y-m-d", strtotime($this->input->get('date')));
      	$this->session->set_userdata('date', $date);
      	$this->date = $date;
      	$sizesType = $this->brands->get_brand_categories($brand_id);
      	$sizes = array();
      	$sizes2 = array();

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
      	foreach ($sizesType as $key => $value) {
      		$sizes2[$value->size_type]['size_type'] = $value->size_type;
      		$sizes2[$value->size_type]['quantity_sold'] = 0;
      		$sizes2[$value->size_type]['rate_per_unit'] = $value->price;
      		$result = $this->product_list->get_sold_units($brand_id,$date,$shop_id,$value->size_type);

      		if ($result) {
      			
      			$sizes2[$value->size_type]['quantity_sold'] = $result->quantity_sold;
      			$sizes2[$value->size_type]['rate_per_unit'] = $result->rate_per_unit;
      		}
      	}
        $total_sales_prices = $this->product_sales->get_total_price($shop_id, $date, $brand_id);
        $total_expenses = $this->expenses->get_total_expenses($shop_id, $date, $date);
        $output['sizes'] = $sizes;
        

        $output['sizes2'] = $sizes2;
        $output['quantities'] = $this->get_quantities();
        $output['total_sales_prices'] = $total_sales_prices;
        $output['total_expenses'] = $total_expenses;
        $output['total_outcome'] = $total_sales_prices - $total_expenses;
        $html = $this->load->view('admin/sales/sales_ajax_form',$output, true); 
        $html2 = $this->load->view('admin/sales/sales_ajax_form_side_table',$output, true);
      	//$html2 = $this->load->view('admin/sales/sales_ajax_expenses', $output, true);
      	$data['success'] = true;
        $data['html'] = $html;
      	$data['html2'] = $html2;
      	$data['daily_total'] = $this->get_total_footer_summary();
      	$product_photo = $this->brands->get_brand_photo($brand_id);
      	$data['product_photo'] = $product_photo;
      	echo json_encode($data); 
  }
  function get_quantities()
  {
  		$response['quantities_full_wine'] = $this->product_sales->get_different_quantities($this->shop_id, $this->date, NULL, 'Full', 'No', 'No');
  		$response['quantities_half_wine'] = $this->product_sales->get_different_quantities($this->shop_id, $this->date, NULL, 'Half', 'No', 'No');
  		$response['quantities_quarter_wine'] = $this->product_sales->get_different_quantities($this->shop_id, $this->date, NULL, 'Quarter', 'No', 'No');

  		$response['quantities_full_beer'] = $this->product_sales->get_different_quantities($this->shop_id, $this->date, NULL, 'Full', 'Yes', 'No');
  		$response['quantities_half_beer'] = $this->product_sales->get_different_quantities($this->shop_id, $this->date, NULL, 'Half', 'No', 'Yes');
  		$response['quantities_quarter_beer'] = $this->product_sales->get_different_quantities($this->shop_id, $this->date, NULL, 'Quarter', 'Yes', 'No');

  		return $response;
  }
  function get_total_footer_summary()
  {
  	   $total_sale_wine = $this->product_sales->get_total_price($this->shop_id, $this->date, NULL, NULL, 'No', 'No' );
  	   $total_sale_beer = $this->product_sales->get_total_price($this->shop_id, $this->date, NULL, NULL, 'Yes', 'No');
  	   $total_sale_desi = $this->product_sales->get_total_price($this->shop_id, $this->date, NULL, NULL, 'No', 'Yes');
  	   $total_sale = $this->product_sales->get_total_price($this->shop_id, $this->date);
  	   $total_expenses = $this->expenses->get_total_expenses($this->shop_id, $this->date, $this->date);

  	   $quantity_sold_full = $this->product_sales->get_sold_quantity($this->shop_id, $this->date, NULL, 'Full');
  	   $quantity_sold_half = $this->product_sales->get_sold_quantity($this->shop_id, $this->date, NULL, 'Half');
  	   $quantity_sold_quarter = $this->product_sales->get_sold_quantity($this->shop_id, $this->date, NULL, 'Quarter');
  	   $total_amount_direct_sold = $this->direct_solds->get_total_amount($this->shop_id, $this->date, $this->date);

  	   $response['success'] = true;
  	   $response['date'] = $this->date;
  	   $response['date_text'] = date('d F Y', strtotime($this->date));
  	   $response['total_sale'] = $total_sale + $total_amount_direct_sold;
  	   $response['total_sale_wine'] = $total_sale_wine;
  	   $response['total_sale_beer'] = $total_sale_beer;
  	   $response['total_sale_wine_beer'] = $total_sale_wine + $total_sale_beer;
  	   $response['total_sale_desi'] = $total_sale_desi + $total_amount_direct_sold;
  	   $response['total_expenses'] = $total_expenses;
  	   $response['quantity_sold_full'] = $quantity_sold_full;
  	   $response['quantity_sold_half'] = $quantity_sold_half;
  	   $response['quantity_sold_quarter'] = $quantity_sold_quarter;
  	   $response['total_amount'] = $total_sale + $total_amount_direct_sold - $total_expenses;

  	   return $response;
  }
  function get_expenses()
  {
      $shop_id = $this->shop_id;
      $date = date("Y-m-d", strtotime($this->input->get('date')));

      $expenses = $this->expenses->get_expenses($shop_id, $date, $date);

      //pr($expenses); die;

      $output['expenses'] = $expenses;
      $output['date'] = $date;
      $output['shop_id'] = $shop_id;

      $html = $this->load->view('admin/sales/sales_ajax_expenses', $output, true);

      $response['success'] = true;
      $response['html'] = $html;
      echo json_encode($response); die;

  }
  function get_direct_solds()
  {
      $solds = $this->direct_solds->get_records($this->shop_id, $this->date, $this->date);

      $output['solds'] = $solds;
      $output['date'] = $this->date;
      $output['shop_id'] = $this->shop_id;

      $html = $this->load->view('admin/sales/sales_ajax_direct_sold', $output, true);

      $response['success'] = true;
      $response['html'] = $html;
      echo json_encode($response); die;

  }
  function delete_direct_sale($sale_id)
  {
    $this->direct_solds->delete_record($sale_id);
    $response['success'] = true;
    $response['message'] = 'Deleted';
    echo json_encode($response); die;

  }
  function add_expense($shop_id)
  {

      if ($_POST) 
      {
            $message = FALSE;
            $success = TRUE;
            $failure = FALSE;

            $this->form_validation->set_rules('date','date','required|trim');
            $this->form_validation->set_rules('title','title','trim|required');
            $this->form_validation->set_rules('amount','Amount','trim|required');
            $this->form_validation->set_rules('shop_id','shop_id','trim|required');
            $this->form_validation->set_rules('transaction_type','transaction_type','trim|required');

            if ($this->form_validation->run()) {
                $data_insert['user_id'] = $this->user_id;
                $data_insert['date'] = date('Y-m-d',strtotime($this->input->post('date')));
                $data_insert['title'] = $this->input->post('title');
                $data_insert['shop_id'] = $this->input->post('shop_id');
                $data_insert['amount'] = $this->input->post('amount');
                $data_insert['transaction_type'] = $this->input->post('transaction_type');
                $this->expenses->add_record($data_insert);
                $message = "Expense added successfully";
            
            } else {
                $message = validation_errors();
                $failure = TRUE;
            }
            
            if (!$failure) {
                $success = TRUE;
                $data['callBackFunction'] = 'callback_expense_added';
                $data['resetForm'] = true;

            } else {
                $success = FALSE;
            }

            $data['success'] = $success;
            $data['message'] = $message;
            echo json_encode($data); die;
      }
      $date = $this->input->get('date');
      $output['shop_id'] = $shop_id;
      $output['date'] = $date;
      $output['title'] = '';
      $output['amount'] = '';
      $output['transaction_type'] = 'Debit';
      $output['date'] = $date;
      $html = $this->load->view('admin/sales/add_expenses', $output, true);

      $response['success'] = true;
      $response['html'] = $html;
      echo json_encode($response); die;
  }
  function add_direct_sale()
  {
      if ($_POST) 
      {
            $message = FALSE;
            $success = TRUE;
            $failure = FALSE;

            $this->form_validation->set_rules('buyer_name','buyer name','trim|required');
            $this->form_validation->set_rules('quantity','Quantity','trim|required');
            $this->form_validation->set_rules('price_per_quantity','price_per_quantity','trim|required');

            if ($this->form_validation->run()) {
                $data_insert['shop_id'] = $this->shop_id;
                $data_insert['user_id'] = $this->user_id;
                $data_insert['sold_date'] = $this->date;
                $data_insert['buyer_name'] = $this->input->post('buyer_name');
                $data_insert['quantity'] = $this->input->post('quantity');
                $data_insert['price_per_quantity'] = $this->input->post('price_per_quantity');
                $data_insert['price_total'] = $data_insert['price_per_quantity'] * $data_insert['quantity'];
                
                $this->direct_solds->add_record($data_insert);
                $message = "Direct Sales added";
            
            } else {
                $message = validation_errors();
                $failure = TRUE;
            }
            
            if (!$failure) {
                $success = TRUE;
                $data['redirectURL'] = NULL;
                $data['resetForm'] = TRUE;
                $data['callBackFunction'] = 'callback_direct_sale_added';

            } else {
                $success = FALSE;
            }

            $data['success'] = $success;
            $data['message'] = $message;
            echo json_encode($data); die;
      }
      
      $output['buyer_name'] = '';
      $output['quantity'] = '';
      $output['price_per_quantity'] = '';
      $output['price_total'] = '';

      $html = $this->load->view('admin/sales/add_direct_sale', $output, true);

      $response['success'] = true;
      $response['html'] = $html;
      echo json_encode($response); die;
  }
  function get_side_report()
  {
      $brand_id = $this->input->get('brand_id');
      $shop_id = $this->input->get('shop_id');
      $date = date("Y-m-d", strtotime($this->input->get('date')));
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
      $output['print_link'] = NULL;

      if($shop_id)
        $output['print_link'] = site_url('sales/print?date='.$date.'&shop_id='.$shop_id); 

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
      //pr($sale_list); die;

      $product_sale = array();

      foreach ($sale_list as $key => $value) {
          $brand_id = $value->brand_id;
          $brand_name = $this->product_list->get_brand($brand_id);

          foreach ($brand_name as $key => $value_for_brand_name) {
              $value->brand_name =  $value_for_brand_name->brand_name;
          }

          $product_sale[$value->brand_name]['loop']['initial'][$value->size_type] = $value->quantity_initial;
          $product_sale[$value->brand_name]['loop']['credit'][$value->size_type] = $value->quantity_credit;
          $product_sale[$value->brand_name]['loop']['shipped'][$value->size_type] = $value->quantity_shipped;
          $product_sale[$value->brand_name]['loop']['sold'][$value->size_type] = $value->quantity_sold;
          $product_sale[$value->brand_name]['loop']['rate'][$value->size_type] = round($value->rate_per_unit);
          $product_sale[$value->brand_name]['total_price'] = $this->product_sales->get_total_price($shop_id, $date, $value->brand_id);

      }
      $output['total_expenses'] = $this->expenses->get_total_expenses($shop_id, $date, $date);
      
      $output['sale_list'] = $sale_list; 
      $output['shop_id'] = $shop_id; 
      $output['date'] = $date; 
      $output['product_sale'] = $product_sale; 

      $this->load->view('admin/sales/print', $output); 
      
  }
}