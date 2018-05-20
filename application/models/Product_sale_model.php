<?php 

class Product_sale_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->table = 'product_sale';
    }

    function add_record($data)
    {
        $this->db->set($data);
        $this->db->set('add_date', date('Y-m-d H:i:s'));
        $this->db->insert($this->table);
        return $this->db->insert_id();
    }
    function get_total_price($shop_id, $sold_date, $brand_id)
    {
        $this->db->where('shop_id', $shop_id);
        $this->db->where('sold_date', $sold_date);
        $this->db->where('brand_id', $brand_id);

        $query = $this->db->get($this->table);
        $result = $query->result();

        $price = 0;
        foreach ($result as $key => $value) {
           $price = $value->price + $price; 
        }  
        return $price;         

    }
}