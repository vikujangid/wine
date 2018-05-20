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
}