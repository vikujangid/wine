<?php 

class Product_sale_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->table = 'product_sale';
    }
    function get_records($shop_id, $sold_date, $brand_id, $size_type =NULL, $is_beer =NULL, $is_desi =NULL)
    {
        $this->db->where('shop_id', $shop_id);
        $this->db->where('sold_date', $sold_date);
        $this->db->where('brand_id', $brand_id);
        
        if($size_type)
            $this->db->where('size_type', $size_type);

        if($is_beer)
            $this->db->where('is_beer', $is_beer);

        if($is_desi)
            $this->db->where('is_desi', $is_desi);

        $query = $this->db->get($this->table);
        $result = $query->result();
        return $result;
    }
    function add_record($data)
    {
        $this->db->set($data);
        $this->db->set('add_date', date('Y-m-d H:i:s'));
        $this->db->insert($this->table);
        return $this->db->insert_id();
    }
    function get_total_price($shop_id, $sold_date, $brand_id =NULL, $size_type =NULL, $is_beer =NULL, $is_desi =NULL)
    {
        $this->db->where('shop_id', $shop_id);
        $this->db->where('sold_date', $sold_date);

        if($brand_id)
            $this->db->where('brand_id', $brand_id);
        
        if($size_type)
            $this->db->where('size_type', $size_type);

        if($is_beer)
            $this->db->where('is_beer', $is_beer);

        if($is_desi)
            $this->db->where('is_desi', $is_desi);

        $query = $this->db->get($this->table);
        $result = $query->result();

        $price = 0;

        foreach ($result as $key => $value) {
           $price = $value->price + $price; 
        }  
        return $price;         

    }
    function get_sold_quantity($shop_id, $sold_date, $brand_id =NULL, $size_type =NULL, $is_beer =NULL, $is_desi =NULL)
    {
        $this->db->select('SUM(quantity_sold) AS quantity_sold');
        $this->db->where('shop_id', $shop_id);
        $this->db->where('sold_date', $sold_date);

        if($brand_id)
            $this->db->where('brand_id', $brand_id);
        
        if($size_type)
            $this->db->where('size_type', $size_type);

        if($is_beer)
            $this->db->where('is_beer', $is_beer);

        if($is_desi)
            $this->db->where('is_desi', $is_desi);

        $query = $this->db->get($this->table);
        $result = $query->row();

        return $result->quantity_sold?$result->quantity_sold:0;
    }
    function get_different_quantities($shop_id, $sold_date, $brand_id =NULL, $size_type =NULL, $is_beer =NULL, $is_desi =NULL)
    {
        $this->db->select('SUM(quantity_initial) AS quantity_initial, SUM(quantity_credit) AS quantity_credit, SUM(quantity_shipped) AS quantity_shipped, SUM(quantity_sold) AS quantity_sold, SUM(quantity_remaining) AS quantity_remaining');
        $this->db->where('shop_id', $shop_id);
        $this->db->where('sold_date', $sold_date);

        if($brand_id)
            $this->db->where('brand_id', $brand_id);
        
        if($size_type)
            $this->db->where('size_type', $size_type);

        if($is_beer)
            $this->db->where('is_beer', $is_beer);

        if($is_desi)
            $this->db->where('is_desi', $is_desi);

        $query = $this->db->get($this->table);
        $result = $query->row();

        return $result;
    }
}