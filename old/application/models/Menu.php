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
        $query = $this->db->get()->result_array(); 
        // print_r($this->db->last_query());   
        if($query->num_rows() != 0)
        {
            return $query;
            
        }
        else
        {
            return false;
        }
    }

    public function ongoing_assign($id){
        $this->db->select('*,bookings.created_on as created_date,bookings.total_amount as amt,customer.created_on as date');
        $this->db->from('customer');
        $this->db->join('bookings','bookings.cust_id=customer.cust_id ');
        $this->db->where(array('bookings.eng_name '=>$id,'bookings.status'=>'new'));
        $query = $this->db->get();
        // print_r($this->db->last_query());
        if($query->num_rows()!=0){
            return $query->result_array();
        }
        else{
            return false;
        }
    }

    public function ongoing_assign_client($id,$eid){
        $this->db->select('*,bookings.created_on as created_date,engineer.eng_name as e_name');
        $this->db->from('engineer');
        $this->db->join('bookings','bookings.eng_name=engineer.eng_id ');
        $this->db->where(array('bookings.eng_name '=>$eid,'bookings.request_id'=>$id));
        $query = $this->db->get();
        if($query->num_rows()!=0){
            return $query->result_array();
        }
        else{
            return false;
        }
    }

    public function ongoing_assign_client_detail($id,$eid){
        $this->db->select('*,bookings.created_on as created_date,engineer.eng_name as e_name');
        $this->db->from('engineer');
        $this->db->join('bookings','bookings.eng_name=engineer.eng_id ');
        $this->db->join('customer','bookings.cust_id=customer.cust_id ');
        $this->db->where(array('bookings.eng_name '=>$eid,'bookings.request_id'=>$id));
        $query = $this->db->get();
        if($query->num_rows()!=0){
            return $query->result_array();
        }
        else{
            return false;
        }
    }

    public function check_upload($id,$eid){
        $this->db->select('*,bookings.created_on as created_date');
        $this->db->from('engineer_client');
        $this->db->join('bookings','bookings.request_id_value=engineer_client.booking_request_id ');
        $this->db->where(array('bookings.eng_name '=>$eid,'bookings.request_id'=>$id));
        $query = $this->db->get();
                // print_r($this->db->last_query());

        if($query->num_rows()!=0){
            return $query->result_array();
        }
        else{
            return false;
        }
    }

    public function reschedule($id){
        $this->db->select('*,bookings.created_on as created_date,bookings.total_amount as amt');
        $this->db->from('booking_items');
        $this->db->join('bookings','bookings.request_id_value=booking_items.request_id ');
        $this->db->join('customer','bookings.cust_id=customer.cust_id ');
        $this->db->where(array('bookings.eng_name '=>$id,'bookings.status'=>'pending','booking_items.button'=>'Reschedule'));
        $query = $this->db->get();
        if($query->num_rows()!=0){
            return $query->result_array();
        }
        else{
            return false;
        }
    }

    // public function booking_id($id){
    //     $this->db->select('bookings');
    //     $this->db->where(array('cust_id'=>$id,'created_on'=>,'status'=>$data['status']));
    //     $this->db->order_by("cust_id desc");
    //     $this->db->get();
    //     if($query->num_rows()!=0){
    //         return $query->result_array();
    //     }
    //     else{
    //         return false;
    //     }
    // }

    public function createData($data) {
        $query = $this->db->insert('booking_items', $data);
        return $query;
    }
    
}
?>