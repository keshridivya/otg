<?php

class Menu extends CI_model {
    function __construct()
    {
       parent::__construct();
    }

    public function menu_all(){
        $this->db->select('*');
        $this->db->from('category_product');
        $this->db->where('status','active');
        $query=$this->db->get();
        return $query->result_array();
    }

    public function product_feature(){
        $this->db->select('*,product_features.id as cid,product_features.created_on as date');
        $this->db->from('product_features');
        $this->db->join('category_product' ,'product_features.cproduct_id = category_product.cproduct_id');
        $query = $this->db->get(); 
        // print_r($this->db->last_query());   
        if($query->num_rows() != 0)
        {
            return $query->result_array();
            
        }
        else
        {
            return false;
        }
    }

    public function product_feature_edit($id){
        $this->db->select('*,product_features.id as cid,product_features.created_on as date');
        $this->db->from('product_features');
        $this->db->join('category_product' ,'product_features.cproduct_id = category_product.cproduct_id');
        $this->db->where('product_features.id',$id);
        $query = $this->db->get(); 
        // print_r($this->db->last_query());   
        if($query->num_rows() != 0)
        {
            return $query->result_array();
            
        }
        else
        {
            return false;
        }
    }

    public function product_benefit(){
        $this->db->select('*,product_benefits.id as cid,product_benefits.created_on as date');
        $this->db->from('product_benefits');
        $this->db->join('category_product' ,'product_benefits.cproduct_id = category_product.cproduct_id');
        $query = $this->db->get(); 
        // print_r($this->db->last_query());   
        if($query->num_rows() != 0)
        {
            return $query->result_array();
            
        }
        else
        {
            return false;
        }
    }

    public function product_benefit_edit($id){
        $this->db->select('*,product_benefits.id as cid,product_benefits.created_on as date');
        $this->db->from('product_benefits');
        $this->db->join('category_product' ,'product_benefits.cproduct_id = category_product.cproduct_id');
        $this->db->where('product_benefits.id',$id);
        $query = $this->db->get(); 
        // print_r($this->db->last_query());   
        if($query->num_rows() != 0)
        {
            return $query->result_array();
            
        }
        else
        {
            return false;
        }
    }
}
?>