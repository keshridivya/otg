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
        return $query->result_array();
    }

    public function product_feature_edit($id){
        $this->db->select('*,product_features.id as cid,product_features.created_on as date');
        $this->db->from('product_features');
        $this->db->join('category_product' ,'product_features.cproduct_id = category_product.cproduct_id');
        $this->db->where('product_features.id',$id);
        $query = $this->db->get(); 
        return $query->result_array();
    }

    public function product_benefit(){
        $this->db->select('*,product_benefits.id as cid,product_benefits.created_on as date');
        $this->db->from('product_benefits');
        $this->db->join('category_product' ,'product_benefits.cproduct_id = category_product.cproduct_id');
        $query = $this->db->get(); 
        return $query->result_array();
    }

    public function product_benefit_edit($id){
        $this->db->select('*,product_benefits.id as cid,product_benefits.created_on as date');
        $this->db->from('product_benefits');
        $this->db->join('category_product' ,'product_benefits.cproduct_id = category_product.cproduct_id');
        $this->db->where('product_benefits.id',$id);
        $query = $this->db->get()->result_array(); 
        return $query;
    }

    public function ongoing_assign($id){
        $this->db->select('*,bookings.created_on as created_date,bookings.total_amount as amt,customer.created_on as date');
        $this->db->from('customer');
        $this->db->join('bookings','bookings.cust_id=customer.cust_id ');
        $this->db->where(array('bookings.eng_name '=>$id,'bookings.status'=>'new'));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function ongoing_assign_client($id,$eid){
        $this->db->select('*,bookings.created_on as created_date,engineer.eng_name as e_name');
        $this->db->from('engineer');
        $this->db->join('bookings','bookings.eng_name=engineer.eng_id ');
        $this->db->where(array('bookings.eng_name '=>$eid,'bookings.request_id'=>$id));
        $query = $this->db->get();
        return $query->result_array();
        
    }

    public function ongoing_assign_client_detail($id,$eid){
        $this->db->select('*,bookings.created_on as created_date,engineer.eng_name as e_name');
        $this->db->from('engineer');
        $this->db->join('bookings','bookings.eng_name=engineer.eng_id ');
        $this->db->join('customer','bookings.cust_id=customer.cust_id ');
        $this->db->where(array('bookings.eng_name '=>$eid,'bookings.request_id'=>$id));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function check_upload($id,$eid){
        $this->db->select('*,bookings.created_on as created_date');
        $this->db->from('engineer_client');
        $this->db->join('bookings','bookings.request_id_value=engineer_client.booking_request_id ');
        $this->db->where(array('bookings.eng_name '=>$eid,'bookings.request_id'=>$id));
        $query = $this->db->get();
        return $query->result_array();
        
    }

    public function reschedule($id){
        $this->db->select('*,bookings.created_on as created_date,bookings.total_amount as amt');
        $this->db->from('booking_items');
        $this->db->join('bookings','bookings.request_id_value=booking_items.request_id ');
        $this->db->join('customer','bookings.cust_id=customer.cust_id ');
        $this->db->where(array('bookings.eng_name '=>$id,'bookings.status'=>'pending','booking_items.button'=>'Reschedule'));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function invoice($id){
        $cid=$this->session->userdata['cid'];
        $this->db->select('*,bookings.created_on as created_date,bookings.total_amount as amt,customer.cust_name as name');
        $this->db->from('bookings');
        $this->db->join('customer','bookings.cust_id=customer.cust_id ');
        // $this->db->join('checklist','bookings.request_id_value=checklist.request_id ');
        $this->db->where(array('bookings.request_id_value '=>$id,'customer.cust_id '=>$cid));
        $query = $this->db->get();
            return $query->result_array();
    }

    // function checklogin($email,$password)
    // {
    //     $this->db->select('*');
    //     $this->db->from('customer');
    //     $this->db->group_start();
    //     $this->db->where('email_id', $email)->or_where('contact', $email);
    //     $this->db->group_end();
    //     $this->db->where('password', $password);
    //     $query = $this->db->get();
    //     return $query->row();

    // }

    function checklogin($email)
    {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('contact', $email);
        $query = $this->db->get();
        return $query->row();

    }

    public function createData($data) {
        $query = $this->db->insert('booking_items', $data);
                //  print_r($this->db->last_query()); 

        return $query;
    }
    
}
?>