<?php

class Menu extends CI_model {
    function __construct()
    {
       parent::__construct();
    }

    public function menu_all(){
        $this->db->select('*,group_concat(category_name) as categ_name');
        $this->db->from('category_product');
        $this->db->where('status','active');
        $this->db->group_by('cproduct_name');
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
        $this->db->select('*,invoice.contact as cont,mrp-(mrp*discount/100) as rate,(mrp-(mrp*discount/100))*qua as amt,CONCAT(customer.address,", ", customer.pincode) as addr');
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
        $this->db->select('*,invoice.contact as cont,mrp-(mrp*discount/100) as rate,(mrp-(mrp*discount/100))*qua as amt,CONCAT(customer.address,", ", customer.pincode) as addr');
        $this->db->from('invoice');
        $this->db->join('customer','invoice.contact=customer.contact');
        $this->db->where(array('invoice.order_id'=>$id,'invoice.product'=>$service_device));
        $query = $this->db->get();
            return $query->result_array();
    }

    //admin quo
    public function adminquotation($id){
        $this->db->select('*,mrp-(mrp*discount/100) as rate,(mrp-(mrp*discount/100))*qty as amt,CONCAT(address,", ", pincode) as addr');
        $this->db->from('quotation');
        $this->db->where(array('quotation.quo_code'=>$id));
        $query = $this->db->get();
            return $query->result_array();
    }

    //admin quo view
    public function adminquoview(){
        $this->db->select('*,mrp-(mrp*discount/100) as rate,(mrp-(mrp*discount/100))*qty as amt,CONCAT(address,", ", pincode) as addr');
        $this->db->from('quotation');
        $this->db->group_by('quo_code');
        $query = $this->db->get();
        return $query->result_array();
    }

     //admin create quo view
     public function adminquoinvoice(){
        $this->db->select('*,mrp-(mrp*discount/100) as rate,(mrp-(mrp*discount/100))*qty as amt,CONCAT(address,", ", pincode) as addr');
        $this->db->from('quotation');
        $this->db->join('quotation_invoice','quotation.quo_code=quotation_invoice.quo_code');
        $query = $this->db->get();
        return $query->result_array();
    }

    //admin pincode view
    public function pincodeview(){
        $this->db->select('*');
        $this->db->from('pincode');
        $this->db->join('category_product','category_product.cproduct_id=pincode.service_product');
        $query = $this->db->get();
        return $query->result_array();
    }

    //front pincode view
    public function checkpin($c_pincode, $cartItems){
        $this->db->select('*');
        $this->db->from('pincode');
        $this->db->join('category_product','category_product.cproduct_id=pincode.service_product');
        $this->db->where(['category_product.cproduct_name'=>$cartItems, 'pincode.pincode'=>$c_pincode]);
        $query = $this->db->get();
        // print_r($this->db->last_query());
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
    function couponcheck($cartItems,$inputcoupon,$servicename,$service){
        $this->db->select('*');
        $this->db->from('coupons');
        $this->db->join('category_product','category_product.cproduct_name = coupons.cproduct');
        $this->db->join('category_plans','category_plans.cplan_id = coupons.cplan');
        $this->db->where("FIND_IN_SET('$service',coupons.service_name) !=", 0);
         $this->db->where(['category_product.cproduct_name'=>$cartItems,'coupons.code'=>$inputcoupon,'category_plans.cplan_name'=>$servicename,'coupons.status'=>'active']);
        $query = $this->db->get();
        // print_r($this->db->last_query());
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
        $this->db->select('*,DATE_FORMAT(created_on,"%Y-%m-%d") as created_on');
        $this->db->from('bookings');
        $this->db->where('cust_contact',$serviceno);
        $this->db->or_where('cust_email',$serviceno);
        $this->db->or_where('request_id_value',$serviceno);
        $query = $this->db->get();
        return $query->result_array();
    }

    //front track
    public function track($req_id){
        $this->db->select('*,DATE_FORMAT(created_on,"%Y-%m-%d") as cdate,DATE_FORMAT(modified_on,"%Y-%m-%d") as mdate');
        $this->db->from('bookings');
        $this->db->where('request_id_value',$req_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function createData($data) {
        $query = $this->db->insert('booking_items', $data);
        return $query;
    }

    //shop extended
    public function extended($id){
        $this->db->select('*');
        $this->db->from('warrenty');
        $this->db->join('category_product','category_product.cproduct_id = warrenty.device');
        $this->db->where('warrenty.shop_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    //admin extended
    public function adminextended($id){
        $this->db->select('*');
        $this->db->from('warrenty');
        $this->db->join('category_product','category_product.cproduct_id = warrenty.device');
        // $this->db->where('warrenty.shop_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

     //admin new
     public function extendednew($id){
        $this->db->select('*');
        $this->db->from('warrenty');
        $this->db->join('category_product','category_product.cproduct_id = warrenty.device');
        // $this->db->where('warrenty.shop_id',$id);
        $this->db->where('warrenty.status','new');
        $query = $this->db->get();
        return $query->result_array();
    }

    //admin new
    public function extendedongoing($id){
        $this->db->select('*');
        $this->db->from('warrenty');
        $this->db->join('category_product','category_product.cproduct_id = warrenty.device');
        $this->db->join('engineer','engineer.eng_id = warrenty.eng_id');
        // $this->db->where('warrenty.shop_id',$id);
        $this->db->where('warrenty.eng_id !=','0');
        $query = $this->db->get();
        return $query->result_array();
    }

     //shop extended edit
     public function extendededit($id){
        $this->db->select('*');
        $this->db->from('warrenty');
        $this->db->join('category_product','category_product.cproduct_id = warrenty.device');
        $this->db->where('warrenty.warrenty_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    //shop all warranty
    public function warranty($id){
        $this->db->select('* , count("*") as count');
        $this->db->from('warrenty');
        $this->db->join('category_product','category_product.cproduct_id = warrenty.device');
        $this->db->where('warrenty.shop_id',$id);
        $query = $this->db->get();
        return $query->row();        
    }

    //shop geyser warranty
    public function geyser($id){
        $this->db->select('* , count("*") as countgey');
        $this->db->from('warrenty');
        $this->db->join('category_product','category_product.cproduct_id = warrenty.device');
        $this->db->where('warrenty.shop_id',$id);
        $this->db->where('category_product.cproduct_name','Geyser');
        $query = $this->db->get();
        return $query->row();         
    }

     //shop geyser warranty
     public function laptop($id){
        $this->db->select('* , count("*") as countgey');
        $this->db->from('warrenty');
        $this->db->join('category_product','category_product.cproduct_id = warrenty.device');
        $this->db->where('warrenty.shop_id',$id);
        $this->db->where('category_product.cproduct_name','Laptop');
        $query = $this->db->get();
        return $query->row();         
    }

      //shop ac warranty
      public function ac($id){
        $this->db->select('* , count("*") as countgey');
        $this->db->from('warrenty');
        $this->db->join('category_product','category_product.cproduct_id = warrenty.device');
        $this->db->where('warrenty.shop_id',$id);
        $this->db->where('category_product.cproduct_name','Air Conditioner');
        $query = $this->db->get();
        return $query->row();         
    }

    //front checkpriveval
    public function checkpriveval($price,$device){
        $this->db->select('*');
        $this->db->from('warranty_price');
        $this->db->join('category_product','category_product.cproduct_id = warranty_price.device');
        $this->db->where('category_product.cproduct_name',$device);
        $this->db->where("$price BETWEEN warranty_price.fromprice AND warranty_price.toprice");
        $query = $this->db->get();
        return $query->row();  
    }
    
}
?>