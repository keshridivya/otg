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
        $cid=$this->session->userdata('cid');
        $this->db->select('*,bookings.created_on as created_date,bookings.total_amount as amt,customer.cust_name as name,,total_amount-(total_amount*20/100) as rate,(total_amount-(total_amount*20/100))*quantity as tamt');
        $this->db->from('bookings');
        $this->db->join('customer','bookings.cust_id=customer.cust_id ');
        $this->db->where(array('bookings.request_id_value '=>$id,'customer.cust_id '=>$cid));
        $query = $this->db->get();
        // print_r($this->db->last_query());
            return $query->result_array();
    }

    public function admininvoice($id){
        $this->db->select('*,invoice.contact as cont,mrp-(mrp*discount/100) as rate,(mrp-(mrp*discount/100))*qua as amt');
        $this->db->from('invoice');
        $this->db->join('customer','invoice.contact=customer.contact');
        $this->db->where(array('invoice.order_id'=>$id));
        $query = $this->db->get();
            return $query->result_array();
    }

    public function admininvoiceview($id){
        $this->db->select('*,count(*) as total,invoice.contact as cont,mrp-(mrp*discount/100) as rate,(mrp-(mrp*discount/100))*qua as amt');
        $this->db->from('invoice');
        $this->db->join('customer','invoice.contact=customer.contact');
        $this->db->group_by('order_id');
        $this->db->where(array('invoice.order_id '=>$id));
        $query = $this->db->get();
        return $query->result_array();
    }
    
    //froninvoice
    public function invoiceorder_id($id,$service_device){
        $this->db->select('*,invoice.contact as cont,mrp-(mrp*discount/100) as rate,(mrp-(mrp*discount/100))*qua as amt');
        $this->db->from('invoice');
        $this->db->join('customer','invoice.contact=customer.contact');
        $this->db->where(array('invoice.order_id'=>$id,'invoice.product'=>$service_device));
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

    function adminlogin($number){
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('contact',$number);
        $query = $this->db->get();
        return $query->row();
    }

    //admin coupon
    function coupon(){
        $this->db->select('*');
        $this->db->from('coupons');
        $this->db->join('category_product','category_product.cproduct_id = coupons.cproduct');
        $this->db->join('category_plans','coupons.cplan = category_plans.cplan_id ');
        $query = $this->db->get();
        return $query->result_array();
    }

    //admin coupon
    function coupondata($id){
        $this->db->select('*,coupons.status as sta');
        $this->db->from('coupons');
        $this->db->join('category_product','category_product.cproduct_id = coupons.cproduct');
        $this->db->join('category_plans','coupons.cplan = category_plans.cplan_id ');
        $query = $this->db->get();
        return $query->result_array();
    }

    //front coupon
    function couponcheck($cartItems,$inputcoupon){
        $this->db->select('*');
        $this->db->from('coupons');
        $this->db->join('category_product','category_product.cproduct_id = coupons.cproduct');
        $this->db->where(['category_product.cproduct_name'=>$cartItems,'coupons.code'=>$inputcoupon]);
        $query = $this->db->get();
        return $query->row();
    }

    //front booking table
    public function booking_table($id){
        $this->db->select('*,bookings.created_on as created_date,engineer.eng_name as e_name');
        $this->db->from('engineer');
        $this->db->join('bookings','bookings.eng_name=engineer.eng_id ','right');
        $this->db->where(array('bookings.cust_id'=>$id));
        $query = $this->db->get();
        return $query->result_array();
    }

    //front service track
    public function service_track($serviceno){
        $this->db->select('*');
        $this->db->from('bookings');
        $this->db->where('cust_contact',$serviceno);
        $this->db->or_where('cust_email',$serviceno);
        $this->db->or_where('request_id_value',$serviceno);
        $query = $this->db->get();
        return $query->result_array();
        print_r($this->db->last_query());

    }

    public function createData($data) {
        $query = $this->db->insert('booking_items', $data);
        return $query;
    }
    
}
?>