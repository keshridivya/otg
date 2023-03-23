<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."libraries/razorpay/razorpay-php/Razorpay.php");

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
class Welcome extends CI_Controller {

     function __construct()
     {
        parent::__construct();
        $this->load->library('cart');
        // $this->load->library('menu_all');
        $this->load->model('Menu','menu',true);

     }
         //menu list
    
    public function index()
    {
        $page_data['dropdown']=$this->menu->menu_all();
        $testimonial=$this->db->get_where('testimonials',array('status'=>'active'))->result_array();
        $client=$this->db->get_where('our_client',array('status'=>'active'))->result_array();
        $banner=$this->db->get_where('banner',array('status'=>'active'))->result_array();
        $page_data['page_title']="Home";
        $page_data['page']="home";
        $page_data['testimonial']=$testimonial;
        $page_data['client']=$client;
        $page_data['banner']=$banner;
        $this->load->view('index',$page_data);

    }

    public function about_us()
    {
        $page_data['page_title']="About Us";
        $page_data['dropdown']=$this->menu->menu_all();
        $page_data['page']="about";
        $this->load->view('index',$page_data);
    }

    public function sign_up()
    {
        $this->load->library('form_validation');
        // if ($this->input->post('submit') == 'login'){
        //     // echo "login page";
        //     $this->form_validation->set_rules('userid','User Id','required');

        //     $this->form_validation->set_rules('pwd','Password','required');
        //     $this->form_validation->set_error_delimiters('<div class="error-div text-danger">','</div>');
        //     if($this->form_validation->run()){
            
        //         $userid=$this->input->post('userid');
        //         $pwd=sha1($this->input->post('pwd'));
        //         $result=$this->menu->checklogin($userid,$pwd);
        //         // $result=$this->db->get_where('customer',array('email_id'=>$userid,'password'=>$pwd))->result_array();
        //         if($result > 0){
        //             $this->session->set_userdata('cid', $result->cust_id);
        //             $this->session->set_userdata('cemail', $result->email_id);
        //             $this->session->set_userdata('cname', $result->cust_name);

        //             // $cid=$result[0]['cust_id'];
        //             // $cemail=$result[0]['email_id'];
        //             // $cname=$result[0]['cust_name'];
        //             // $this->session->set_userdata('cid',$cid);
        //             // $this->session->set_userdata('cemail',$cemail);
        //             // $this->session->set_userdata('cname',$cname);
        //         }else{
        //             $page_data['message']="User not found";
        //         }
                
        //     }else{
        //         // echo validation_errors();
        //     }
            
        //     if(@$this->session->userdata['cid']){

        //         $testimonial=$this->db->get_where('testimonials',array('status'=>'active'))->result_array();
        //         $client=$this->db->get_where('our_client',array('status'=>'active'))->result_array();
        //         $banner=$this->db->get_where('banner',array('status'=>'active'))->result_array();
        //         $page_data['dropdown']=$this->menu->menu_all();
        //         $page_data['testimonial']=$testimonial;
        //         $page_data['client']=$client;
        //         $page_data['banner']=$banner;
        //         $page_data['page']="home";
        //         $this->load->view('index',$page_data);
        //     }else{
        //         $page_data['dropdown']=$this->menu->menu_all();
        //         $page_data['page']="sign_up";
        //         $this->load->view('index',$page_data);

        //     }
            
        // }
        // else
        if ($this->input->post('submit') == 'register' || $this->session->userdata('custid') ){
            print_r($this->input->post());
            $all_customers=$this->db->get("customer")->result_array();
                                $config=array(
                                        array(
                                                'field' => 'username',
                                                'label' => 'Username',
                                                'rules' => 'required'
                                        ),
                                        array(
                                            'field' => 'mobile',
                                            'label' => 'Mobile No.',
                                            'rules' => 'required|min_length[10]|max_length[10]'
                                        ),
                                        array(
                                            'field' => 'city',
                                            'label' => 'City',
                                            'rules' => 'required'
                                        ),
                                        array(
                                            'field' => 'state',
                                            'label' => 'State',
                                            'rules' => 'required'
                                        ),
                                        array(
                                            'field' => 'address',
                                            'label' => 'Address',
                                            'rules' => 'required'
                                        ),
                                        array(
                                            'field' => 'pincode',
                                            'label' => 'Pincode',
                                            'rules' => 'required'
                                        )
                                );
                $this->form_validation->set_rules($config);
    
                $this->form_validation->set_error_delimiters('<div class="error-div text-danger">','</div>');
                if($this->form_validation->run()){
                    $data=array(
                        "cust_name"=>$this->input->post('username'),
                        "contact"=>$this->input->post('mobile'),
                        "email_id"=>$this->input->post('email_id'),
                        "password"=>sha1($this->input->post('password')),
                        "city"=>$this->input->post('city'),
                        "address"=>$this->input->post('address'),
                        "pincode"=>$this->input->post('pincode'),
                        "created_on"=>date('Y-m-d h:i:s'),
                        "modified_on"=>date('Y-m-d h:i:s')
                    );
                    $mob_num = $this->input->post('mobile');
                    
                    if($this->db->insert('customer',$data)){

                        $result = $this->db->get_where('customer',array('contact' => $mob_num))->row();
                        print_r($this->db->last_query());
                        if(!empty($result)){
                            $this->session->set_userdata('cid', $result->cust_id);
                            $this->session->set_userdata('cemail', $result->email_id);
                            $this->session->set_userdata('cname', $result->cust_name);
                        }else{
                            $page_data['message']="User not found";
                        }

                        $page_data['message']="Successfully Registered.";
                        $this->load->library('email');
                        $this->email->from('mywebsiteauth1@gmail.com','OTG Cares');
                        $this->email->to($data['email_id']);
                        $this->email->subject("New User Registered");
                        $this->email->message("Thank you for registration".$data["cust_name"]."\r\n"."Customer Id".$data["new_cust_id"]."\r\n"."Welcome to OTG cares.");
                        $this->email->set_newline("\r\n");
                        $this->email->send();
                        if($this->email->send()){
                            show_error($this->email->print_debugger());
                        }
                        else{
                            $page_data['message']="Problem occured while email notification";
                        }
                        $customers_login=$this->db->get_where("customer",array('email_id'=>$data['email_id'],'password'=>$data['password']))->result_array();
                        $custid=$customers_login[0]['cust_id'];
                        $custemail=$customers_login[0]['email_id'];
                        
                        $this->session->set_userdata('custid',$custid);
                        $this->session->set_userdata('custemail',$custemail);
                        
                    }else{
                        $page_data['message']="Problem occured while creating account.";
                    }
                    redirect($_SERVER['HTTP_REFERER'] ?? base_url());
                }else{
                    // echo validation_errors();
                    
                }
                if(@$this->session->userdata['custid']){
                    $session_cust=$this->session->userdata['custid'];
                    //redirect to dashboard
                    $new_cust=$this->db->get_where("customer",array('cust_id'=>$session_cust))->result_array();
                    
                    $page_data['customers']=$new_cust;
                    $bookings_table=$this->db->get_where('bookings',array('cust_id'=>$session_cust))->result_array();
                    //user edit details start here
                            if($this->input->post('submit') == 'edit'){
                                echo "reached here";
                                $data=array(
                                    "cust_name"=>$this->input->post('customer_name'),
                                    "contact"=>$this->input->post('customer_contact'),
                                    "email_id"=>$this->input->post('customer_email'),
                                    "city"=>$this->input->post('customer_city'),
                                    "address"=>$this->input->post('customer_address'),
                                    "pincode"=>$this->input->post('customer_pincode'),
                                    "modified_on"=>date('Y-m-d h:i:s')
            
                                );
                                $this->db->where('cust_id',$session_cust);
                                $this->db->update('customer',$data);
                                
                            }
                            $page_data['dropdown']=$this->menu->menu_all();
                        $page_data['bookings_table']=$bookings_table;
                        $page_data['page']="account";
                    
                    $this->load->view('index',$page_data);
                }else{
                    $page_data['dropdown']=$this->menu->menu_all();
                    $page_data['page']="sign_up";
                    $page_data['message']="";
                    $this->load->view('index',$page_data);
                }
        }
        elseif(@$this->session->userdata['cid']){
            $testimonial=$this->db->get_where('testimonials',array('status'=>'active'))->result_array();
            $client=$this->db->get_where('our_client',array('status'=>'active'))->result_array();
            $banner=$this->db->get_where('banner',array('status'=>'active'))->result_array();
            $page_data['dropdown']=$this->menu->menu_all();
            $page_data['testimonial']=$testimonial;
            $page_data['client']=$client;
            $page_data['banner']=$banner;
            $page_data['page']="home";
            $this->load->view('index',$page_data);
        }
        else{
            $page_data['dropdown']=$this->menu->menu_all();
                $page_data['page_title']="Sign Up";
                $page_data['page']="sign_up";
                $this->load->view('index',$page_data);
                
        }
        
    }



    // public function reset_password()
    // {
    //     if ($this->input->post()){
    //         $contact=$this->input->post('mobile');
    //         $data=array(
    //             "password"=>sha1($this->input->post('password')),
    //         );
    //         $this->db->where('contact',$contact);
    //         if($this->db->update('customer',$data)){
    //             redirect('sign-up');
    //         }else{
                
    //             $page_data['message']='something went wrong';
    //         }
    //     }
       
    //     else{
    //         $page_data['dropdown']=$this->menu->menu_all();
    //             $page_data['page_title']="Sign Up";
    //             $page_data['page']="reset_password";
    //             $this->load->view('index',$page_data);
                
    //     }
        
    // }
    
    //otp
    public function otp(){

        if($this->input->post('number')){
            $this->load->helper('msg');
            $number = $this->input->post('number');
            $result=$this->db->get_where('customer',array('contact'=>$number))->result_array();
            if (count($result) == 0)
        {
            $otp = rand(10000, 99999);
              $msg = 'Dear Sir/Madam,Your OTP for Registration of OTGCares is '.$otp.'. Please do not share this OTP with anyone';
              if (sendsms($number,$dltId='1207167757998006000',$header="OTGCRS", $msg)) {
                  $page_data['status'] = true;
                  $page_data['message'] = "success";
                 
                  } else {
                  $page_data['status'] = false;
                  $page_data['message'] = "Something went wrong, please try again later.";
                  }
        }
        else
        {
            $otp = 'error';
        }

        }
        $data['otp'] = $otp;
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function resend_otp(){
        if($this->input->post('number')){
            $this->load->helper('msg');
            $number = $this->input->post('number');
            $otp = rand(10000, 100000);
              $msg = 'Dear Sir/Madam,Your OTP for Registration of OTGCares is '.$otp.'. Please do not share this OTP with anyone';
              if (sendsms($number,$dltId='1207167757998006000',$header="OTGCRS", $msg)) {
                  $page_data['status'] = true;
                  $page_data['message'] = "success";
                 
                  } else {
                  $page_data['status'] = false;
                  $page_data['message'] = "Something went wrong, please try again later.";
                  }
        }
        $data['otp'] = $otp;
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    // public function forgetotp(){
    public function loginotp(){

        if($this->input->post('number')){
            $this->load->helper('msg');
            $number = $this->input->post('number');
            $result=$this->db->get_where('customer',array('contact'=>$number))->result_array();
            if (count($result) > 0)
            {
                $otp = rand(10000, 99999);
                $otp_resu = 'success';
                  $msg = 'Dear Customer, '.$otp.' is your OTP(One Time Password) to authenticate your login to OTGCares.
                  Do not share it with anyone';
                  if (sendsms($number,$dltId='1207167758050869200',$header="OTGCRS", $msg)) {
                      $page_data['status'] = true;
                      $page_data['message'] = "success";
                    
                      } else {
                      $page_data['status'] = false;
                      $page_data['message'] = "Something went wrong, please try again later.";
                      }
            }
            else
            {
                $otp_resu = 'error';
            }
            
        }
        $this->session->set_userdata('login_otp',$otp);
        $data['otp'] = $otp_resu;
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function login_otp_verify(){
        if($this->input->post('loginotp')){
            $loginotp=$this->input->post('loginotp');
            $number = $this->input->post('number');
            if($this->session->userdata['login_otp'] == $loginotp){
                $otp = 'success';
                    $result=$this->menu->checklogin($number);
                    if(!empty($result)){
                        $this->session->set_userdata('cid', $result->cust_id);
                        $this->session->set_userdata('cemail', $result->email_id);
                        $this->session->set_userdata('cname', $result->cust_name);
                        $this->session->unset_userdata('login_otp');
                    }else{
                        $page_data['message']="User not found";
                    }
            }
            else{
                $otp='error';
            }
           
        }
        $data['otp'] = $otp;
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function maintenance($action)
    {
    
        $product_arg=urldecode($action);
        
        $product_data=$this->db->get_where('category_product',array('cproduct_name'=>$product_arg,'category_name'=>'Maintenance and repair'))->result_array();
        $page_data['product_data']=$product_data;
        $subcat_data=$this->db->get_where('subcategories',array('cproduct_name'=>$product_arg))->result_array();
        $page_data['subcat_data']=$subcat_data;
        $plans_data=$this->db->get_where('category_plans',array('cproduct_name'=>$product_arg))->result_array();
        $page_data['plans_data']=$plans_data;
        $plan_features=$this->db->get('plan_features')->result_array();
        $page_data['plan_features']=$plan_features;

        $product_features=$this->db->get_where('product_features',array('cproduct_id'=>$product_data[0]['cproduct_id']))->result_array();
        $page_data['product_features']=$product_features;
        $product_benefits=$this->db->get_where('product_benefits',array('cproduct_id'=>$product_data[0]['cproduct_id']))->result_array();
        $page_data['dropdown']=$this->menu->menu_all();
        $page_data['product_benefits']=$product_benefits;
        $page_data['page']="maintenance";
        $this->load->view('index',$page_data);
        $this->load->library('cart');
    

        
    }
     function addtocart($proid){
        $plans=$this->db->get_where('category_plans',array('cplan_id'=>$proid))->result_array();
        $products=$this->db->get_where('category_product',array('cproduct_name'=>$plans[0]['cproduct_name']))->result_array();
        $data=array(
            'id'=>$plans[0]['cplan_id'],
            'qty'=>1,
            'price'=>$plans[0]['cplan_price'],
            'name'=>$plans[0]['cplan_name'],
            'image'=>$products[0]['cproduct_img'],
            'product_name'=>$products[0]['cproduct_name'],
            'product_category'=>$products[0]['category_name'],

        );
        $this->cart->insert($data);
        redirect(base_url('cart'));
    }

    public function cart(){
        $page_data['dropdown']=$this->menu->menu_all();
        $page_data['cartItems']=$this->cart->contents();
        $page_data['page_title']="My Cart";
        $page_data['page']="cart";
        $this->load->view('index',$page_data);
    }
    public function services()
    {
        $page_data['page_title']="Our Services";
        $product_data=$this->db->get_where('category_product',array('category_name'=>'Maintenance and repair','status'=>'active'))->result_array();
        $page_data['dropdown']=$this->menu->menu_all();
        $page_data['product_data']=$product_data;
        $page_data['page']="services";
        $this->load->view('index',$page_data);
    }
    public function account()
    {
        if($this->session->userdata('cid') || $this->session->userdata('custid')){
            $session_cust=$this->session->userdata['cid'];
                $customers_table=$this->db->get_where("customer",array('cust_id'=>$session_cust))->result_array();
                $page_data['customers']=$customers_table;
                $bookings_table=$this->db->get_where('bookings',array('cust_id'=>$session_cust))->result_array();
                $checklist=$this->db->get_where('checklist',array('cust_id'=>$session_cust))->result_array();
                if($this->input->post('submit') == 'edit'){
                
                    $data=array(
                        "cust_name"=>$this->input->post('customer_name'),
                        "contact"=>$this->input->post('customer_contact'),
                        "email_id"=>$this->input->post('customer_email'),
                        "city"=>$this->input->post('customer_city'),
                        "address"=>$this->input->post('customer_address'),
                        "pincode"=>$this->input->post('customer_pincode'),
                        "modified_on"=>date('Y-m-d h:i:s')
                    );
                    $this->db->where('cust_id',$session_cust);
                    $this->db->update('customer',$data);
                }
            $page_data['dropdown']         =  $this->menu->menu_all();
            $page_data['page_title']       =  "My Account";
            $page_data['bookings_table']   =  $bookings_table;
            $page_data['checklist']        =  $checklist;
            $page_data['page']             =  "account";
            $this->load->view('index',$page_data);
            
        }
        //if user register while checking out
        // elseif($this->session->userdata('newid')){
        //     $session_cust=$this->session->userdata('newid');
        //     $customers_table=$this->db->get_where("customer",array('cust_id'=>$session_cust))->result_array();
        //     $page_data['dropdown']=$this->menu->menu_all();
        //     $page_data['customers']=$customers_table;
        //     $page_data['page_title']="My Account";
        //     $page_data['page']="account";
        //     $this->load->view('index',$page_data);
        // }
        else{
            // $page_data['dropdown']=$this->menu->menu_all();
            // $page_data['page']="sign_up";
            //     $page_data['message']="";
            //     $this->load->view('index',$page_data);
                redirect(base_url('sign-up'));
        }
    }
    public function checkout(){
        $this->load->library('cart');
        if($this->cart->total_items()<=0){
            redirect(base_url('services'));
        }
        //if user logged in
        if($this->session->userdata['cid']){
            $page_data['cartItems']=$this->cart->contents();
            $session_cust=$this->session->userdata['cid'];
            $ex_cust=$this->db->get_where("customer",array('cust_id'=>$session_cust))->result_array();
            if($this->input->post()){
                $payment_method=$this->input->post('payment_method');
                redirect(base_url("summery?payment_option=$payment_method"));
            }

        }//if user registered
        elseif($this->session->userdata('custid')){
            $page_data['cartItems']=$this->cart->contents();
            $session_cust=$this->session->userdata['custid'];
            $ex_cust=$this->db->get_where("customer",array('cust_id'=>$session_cust))->result_array();
                if($this->input->post()){
                    $payment_method=$this->input->post('payment_method');
                redirect(base_url("summery?payment_option=$payment_method"));
            }

        }//user added to cart without logging in
        else{
            $page_data['cartItems']=$this->cart->contents();
            if($this->input->post()){
                $data=array(
                    "cust_name"   =>    $this->input->post('c_name'),
                    "contact"     =>    $this->input->post('c_contact'),
                    "email_id"    =>    $this->input->post('c_email'),
                    "password"    =>    sha1($this->input->post('c_password')),
                    "city"        =>    $this->input->post('c_city'),
                    "address"     =>    $this->input->post('c_address'),
                    "pincode"     =>    $this->input->post('c_pincode'),
                    "created_on"  =>    date('Y-m-d h:i:s'),
                    "modified_on" =>    date('Y-m-d h:i:s')
                      
                );
                    if($this->db->insert('customer',$data)){
                        $page_data['message']="Successfully created.";
                        $customers_login=$this->db->get_where("customer",array('email_id'=>$data['email_id'],'password'=>$data['password']))->result_array();
                        // print_r($customers_login);
                        $newid=$customers_login[0]['cust_id'];
                        $newemail=$customers_login[0]['email_id'];
                        $this->session->set_userdata('newid',$newid);
                        $this->session->set_userdata('newemail',$newemail);
                        if($this->session->userdata('newid')){
                        redirect(base_url('summery'));
                        }
                        
                    }else{
                        $page_data['message']="Problem occured while adding customer.";
        
                    }
            }
        
        }
        $page_data['dropdown']=$this->menu->menu_all();        
        $page_data['ex_cust']=$ex_cust;
        $page_data['cartItems']=$this->cart->contents();
        $page_data['page']="checkout";
        $this->load->view('index',$page_data);
    }
    
    
    public function summery(){
        if($this->session->userdata('cid')){
            $session_cust=$this->session->userdata('cid');
            $customers_table=$this->db->get_where("customer",array('cust_id'=>$session_cust))->result_array();
            $page_data['customers']=$customers_table;
        }else if($this->session->userdata('custid')){
            $session_cust=$this->session->userdata('custid');
            $customers_table=$this->db->get_where("customer",array('cust_id'=>$session_cust))->result_array();
            $page_data['customers']=$customers_table;
        }
        // else{
        //     $session_cust=$this->session->userdata('newid');
        //     $customers_table=$this->db->get_where("customer",array('cust_id'=>$session_cust))->result_array();
        //     $page_data['customers']=$customers_table;    
        // }
        
        $page_data['cartItems']=$this->cart->contents();
        
        $page_data['dropdown']=$this->menu->menu_all();
        $page_data['page_title']="Order Summery";
            $page_data['page']="summery";
            $this->load->view('index',$page_data);
        
    }

    public function pay()
    {
        $api = new Api(RAZOR_KEY, RAZOR_SECRET_KEY);
        /**
         * You can calculate payment amount as per your logic
         * Always set the amount from backend for security reasons
         */
        $_SESSION['payable_amount'] = $this->input->post('t_amnt');

        $razorpayOrder = $api->order->create(array(
            'receipt'         => rand(),
            'amount'          => $_SESSION['payable_amount'] * 100, // 2000 rupees in paise
            'currency'        => 'INR',
            'payment_capture' => 1, // auto capture
        ));

        $amount = $razorpayOrder['amount'];
        $razorpayOrderId = $razorpayOrder['id'];
        $_SESSION['razorpay_order_id'] = $razorpayOrderId;
        $data = $this->prepareData($amount,$razorpayOrderId);
        $session_cust=$this->session->userdata('cid');
        $customers_table=$this->db->get_where("customer",array('cust_id'=>$session_cust))->result_array();
        $data=array(
            'data'=>$data,
            'customers' =>$customers_table,
            'dropdown' =>$this->menu->menu_all(),
            'cartItems'=>$this->cart->contents(),
        );
            $this->load->view('front/razorpay',$data);
    }

    /**
     * This function verifies the payment,after successful payment
     */
    public function verify()
    {
        $success = true;
        $error = "payment_failed";
        if (empty($_POST['razorpay_payment_id']) === false) {
            $api = new Api(RAZOR_KEY, RAZOR_SECRET_KEY);
        try {
                $attributes = array(
                    'razorpay_order_id' => $_SESSION['razorpay_order_id'],
                    'razorpay_payment_id' => $this->input->post('razorpay_payment_id'),
                    'razorpay_signature' => $this->input->post('razorpay_signature')
                );
                $api->utility->verifyPaymentSignature($attributes);
            } catch(SignatureVerificationError $e) {
                $success = false;
                $error = 'Razorpay_Error : ' . $e->getMessage();
            }
        }
        if ($success === true) {
            $this->setRegistrationData();
            $page_data['dropdown']=$this->menu->menu_all();

            $page_data['page_title']="Order Summery";
        $page_data['page']="success";
            $this->load->view('index',$page_data);
        }
        else {
            $page_data['dropdown']=$this->menu->menu_all();

            $page_data['page_title']="Order Summery";
        $page_data['page']="paymentFailed";
            $this->load->view('index',$page_data);
        }
    }

    public function prepareData($amount,$razorpayOrderId)
    {
        $data = array(
            "key" => RAZOR_KEY,
            "amount" => $amount,
            "name" => "OTGCares",
            "description" => "Services",
            "image" => "https://otgcares.com/assets/images/logo/favicon.png",
            "prefill" => array(
                "name"  => $this->input->post('c_name'),
                "email"  => $this->input->post('c_email'),
                "contact" => $this->input->post('c_contact'),
            ),
            "notes"  => array(
                "address"  => "Hello ",
                "merchant_order_id" => rand(),
            ),
            "theme"  => array(
                "color"  => "#F37254"
            ),
            "order_id" => $razorpayOrderId,
        );
        return $data;
        // print_r($data);
        // die;
    }

    public function setRegistrationData()
    {

        $main_arr=array();
        $data=$this->input->post();
        // print_r($data);
        for($i=0;$i<count($data['s_plan']);$i++){
            $arr=array(
                "cust_id"           =>  $data['customer_id'],
                "cust_name"         =>  $data['c_name'],
                "service_plan"      =>  $data['s_plan'][$i],
                "service_device"    =>  $data['s_device'][$i],
                "quantity"          =>  $data['quantity'][$i],
                "total_amount"      =>  $data['sub_total'][$i],
                "order_id"          =>  $data['order_id'],
                "status"=>'new',
                "created_on"=>date('Y-m-d h:i:s')
            );
            $main_arr[]=$arr;
        }
        $cust_id = $this->session->userdata('cid');	
				$sql = $this->db->insert_batch('bookings',$main_arr);

            // $customer_email=$this->db->get_where("customer",array('cust_id'=>$data['cust_id']))->result_array();
            if($sql == true){
                $page_data['message']="Successfully created.";
                    
                $booking_data=$this->db->get_where("bookings",array('cust_id'=>$cust_id,'created_on'=>date('Y-m-d h:i:s'),'status'=>'new'))->result_array();
                
                $order_data                 =   array(
                    "cust_id"               =>  $this->input->post('customer_id'),
                    "cust_name"             =>  $this->input->post('c_name'),
                    "total_amount"          =>  $this->input->post('t_amnt'),
                    'razor_payment_id'      =>  $this->input->post('razorpay_payment_id'),
                    'razorpay_signature'    =>  $this->input->post('razorpay_signature'),
                    'request_id'            =>  $booking_data[0]['request_id_value'],
                    "created_on"            =>  date('y-m-d')
                );
                    $reqid=$booking_data[0]['order_id'];    
                    $this->db->insert('checklist',$order_data);
                    $this->session->set_userdata('reqid',$reqid);
                
                    redirect(base_url('receipt'));
            }else{
                $page_data['message']="Problem occured while adding bookings.";

            }

        // $name = $this->input->post('name');
        // $email = $this->input->post('email');
        // $contact = $this->input->post('contact');
        // $amount = $_SESSION['payable_amount'];

        // $registrationData = array(
        //     'order_id' => $_SESSION['razorpay_order_id'],
        //     'name' => $name,
        //     'email' => $email,
        //     'contact' => $contact,
        //     'amount' => $amount,
        // );
        // save this to database

    }

    /**
     * This is a function called when payment successfull,
     * and shows the success message
     */
    public function success()
    {
        $this->load->view('success',$page_data);
    }
    /**
     * This is a function called when payment failed,
     * and shows the error message
     */
    public function paymentFailed()
    {
        $this->load->view('error');
    }

    public function summerydetail(){
		// if($this->session->userdata('cid')){
		// 	$session_cust=$this->session->userdata('cid');
		// 	$customers_table=$this->db->get_where("customer",array('cust_id'=>$session_cust))->result_array();
		// 	$page_data['customers']=$customers_table;
		// }elseif($this->session->userdata('custid')){
		// 	$session_cust=$this->session->userdata('custid');
		// 	$customers_table=$this->db->get_where("customer",array('cust_id'=>$session_cust))->result_array();
		// 	$page_data['customers']=$customers_table;
		// }
		// else{
		// 	$session_cust=$this->session->userdata('newid');
		// 	$customers_table=$this->db->get_where("customer",array('cust_id'=>$session_cust))->result_array();
		// 	$page_data['customers']=$customers_table;	
		// }
		$page_data['cartItems']=$this->cart->contents();
		if($this->input->post()){
            $main_arr=array();
            $data=$this->input->post();
            for($i=0;$i<count($data['s_plan']);$i++){
				$arr=array(
					"cust_id"           =>  $data['customer_id'],
					"cust_name"         =>  $data['c_name'][$i],
					"service_plan"      =>  $data['s_plan'][$i],
					"service_device"    =>  $data['s_device'][$i],
					"quantity"          =>  $data['quantity'][$i],
					"total_amount"      =>  $data['sub_total'][$i],
                    "order_id"          =>  $data['order_id'],
					"status"=>'new',
					"created_on"=>date('Y-m-d h:i:s')
				);
                $main_arr[]=$arr;
            }
				$cust_id = $this->session->userdata('cid');	
				$sql = $this->db->insert_batch('bookings',$main_arr);
                if($sql == true){
					$page_data['message']="Successfully created.";
					$booking_data=$this->db->get_where("bookings",array('cust_id'=>$cust_id,'created_on'=>date('Y-m-d h:i:s'),'status'=>'new'))->result_array();
						$reqid=$booking_data[0]['order_id'];
						$this->session->set_userdata('reqid',$reqid);
						redirect(base_url('receipt'));
				}else{
					$page_data['message']="Problem occured while adding bookings.";
				}
		}
		$page_data['dropdown']=$this->menu->menu_all();
		$page_data['page_title']="Order Summery";
			$page_data['page']="summery";
			$this->load->view('index',$page_data);
		
	}
    public function receipt(){
        
        $page_data['cartItems']=$this->cart->contents();
        if($this->session->userdata('reqid')){
            $reqid=$this->session->userdata('reqid');
            $new_booking=$this->db->get_where("bookings",array('order_id'=>$reqid))->result_array();
            $cust_mail=$this->db->get_where("customer",array('cust_id'=>$new_booking[0]['cust_id']))->result_array();
                        $this->load->library('email');
                        $this->email->from('hr@otgcares.com','OTG Cares');
                        $this->email->to($cust_mail[0]['email_id']);
                        $this->email->subject("New Service Booked");
                        $message="Thank you for your order"." ".$new_booking[0]["cust_name"];
                        foreach($new_booking as $nb){
                            $message.="\r\n"."Request Id"." ".$nb["request_id_value"]."\r\n"."Order Details"."\r\n"."Order Id".$nb['request_id']."\r\n"."Your name: ".$nb['cust_name']."\r\n"."Service: ".$nb['service_plan']." for ".$nb['service_device']."\r\n"."Charges: &#8377;".$nb['total_amount'];
                        }
                        
                        $this->email->message($message);
                        $this->email->set_newline("\r\n");
                        $this->email->send();
                        if($this->email->send()){
                            show_error($this->email->print_debugger());
                        }
                        else{
                            $page_data['message']="Problem occured while email notification";
                        }
                        

                        $page_data['new_booking']=$new_booking;
                        $page_data['message']="New Service Booked";
                        $page_data['dropdown']=$this->menu->menu_all();
                        $page_data['page_title']="Order Receipt";
                        $page_data['page']="receipt";
                        $this->load->view('index',$page_data);
                        $this->session->unset_userdata('reqid');
                        $this->cart->destroy();
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('sign-up'));
    }
    
    public function update_cart(){
        $id=$this->input->post('id');
        $qty=$this->input->post('qty');
        $data=array(
        'rowid'=>$id,
        'qty'=>$qty,
        );
        $this->cart->update($data);
        echo json_encode($data);
    }
    public function removeItem($rowid){
        $this->cart->remove($rowid);
        redirect(base_url('cart'));
    }

    public function blog(){
        $page_data['dropdown']=$this->menu->menu_all();
        $page_data['blog']=$this->db->get_where('blog',array('status'=>'active'))->result_array();
        $page_data['page_title']="Blog";
        $page_data['page']="blog";
        $this->load->view('index',$page_data);
    }
        
    public function blogdetail($id){
        $page_data['dropdown']=$this->menu->menu_all();
        $page_data['blog']=$this->db->get_where('blog',array('id'=>$id))->result_array();
        $page_data['page_title']="Blog Detail";
        $page_data['page']="blogdetail";
        $this->load->view('index',$page_data);
    }

    public function contact(){
        $this->load->library('phpmailer_lib');
        if($this->input->post()){
            $data=array(
                'name'=>$this->input->post('name'),
                'email'=>$this->input->post('email'),
                'contact'=>$this->input->post('contact'),
                'message'=>$this->input->post('message'),
                'created_date'=>date('y-m-d')
            );
            if($this->db->insert('contact-form',$data)){
            // PHPMailer object
            $mail = $this->phpmailer_lib->load();
                    
            //Server settings
            $mail->SMTPDebug = 0; 
            $mail->isSMTP();                             
            $mail->Host       = 'smtp.hostinger.com';    
            $mail->SMTPAuth   = true;                           
            $mail->Username   = 'hr@otgcares.com';           
            $mail->Password   = 'Admin@123';                          
            $mail->SMTPSecure = 'ssl';          
            $mail->Port       = 465;                            

            //Recipients
            $mail->setFrom('hr@otgcares.com', 'Enquiry from website');
            $mail->addAddress('hr@otgcares.com');    
            
            //Content
            $mail->isHTML(true);                               
            $mail->Subject = 'Request for enquiry by ';
            $mail->Body    = '<html>
            <body>
            <h3>You have a new response in your Contact Form</h3>
            <p>Name : '.$data['name'].'</p>
            <p>Email : '.$data['email'].'</p>
            <p>Contact : '.$data['contact'].'</p>
            <p>Message : '.$data['message'].'</p>
            </body>
            </html>';

            if ($mail->send())
                {
                    $page_data['message']="Thank you, We'll get in touch with you soon";
                }
                else
                {
                    $page_data['message']='Something Went Wrong';
                }
            }
            else{
                $page_data['message']='Server Error Please try again ';
            }
        }
        $page_data['dropdown']=$this->menu->menu_all();
        $page_data['page_title']="Contact Us";
        $page_data['page']="contact";
        $this->load->view('index',$page_data);
    }

    public function privacy(){
        $page_data['dropdown']=$this->menu->menu_all();
        $page_data['page_title']="Pivacy Policy";
        $page_data['page']="privacy&policy";
        $this->load->view('index',$page_data);
    }

    public function terms(){
        $page_data['dropdown']=$this->menu->menu_all();
        $page_data['page_title']="Terms & Condition";
        $page_data['page']="terms";
        $this->load->view('index',$page_data);
    }

    public function tracker(){
        $page_data['dropdown']=$this->menu->menu_all();
        $page_data['page_title']="Track Service Request";
        $page_data['page']="tracker";
        $this->load->view('index',$page_data);
    }
    public function upi(){
        $page_data['cartItems']=$this->cart->contents();
        if($this->input->post()){
            $main_arr=array();
            $data=$this->input->post();
            for($i=0;$i<count($data['s_plan']);$i++){
                $arr=array(
                    "cust_id"           =>  $data['customer_id'],
                    "cust_name"         =>  $data['c_name'][$i],
                    "service_plan"      =>  $data['s_plan'][$i],
                    "service_device"    =>  $data['s_device'][$i],
                    "quantity"          =>  $data['quantity'][$i],
                    "total_amount"      =>  $data['sub_total'][$i],
                    "order_id"          =>  $data['order_id'],
                    "status"=>'new',
                    "created_on"=>date('Y-m-d h:i:s')
                );
                $main_arr[]=$arr;
            }
                $cust_id = $this->session->userdata('cid');	
                $sql = $this->db->insert_batch('bookings',$main_arr);
                if($sql == true){
                    $page_data['message']="Successfully created.";
                    $booking_data=$this->db->get_where("bookings",array('cust_id'=>$cust_id,'created_on'=>date('Y-m-d h:i:s'),'status'=>'new'))->result_array();
                        $reqid=$booking_data[0]['order_id'];
                        $this->session->set_userdata('reqid',$reqid);
                        // redirect(base_url('receipt'));
                        $this->session->unset_userdata('reqid');
                        $this->cart->destroy();
                }else{
                    $page_data['message']="Problem occured while adding bookings.";
                }
        }
        $page_data['dropdown']=$this->menu->menu_all();
        $page_data['page_title']="Payment";
        $page_data['page']="upi";
        $this->load->view('index',$page_data);
    }
    public function forget(){
        $page_data['dropdown']=$this->menu->menu_all();
        $page_data['page_title']="Forget Password";
        $page_data['page']="forget";
        $this->load->view('index',$page_data);
    }
    public function return(){
        $page_data['dropdown']=$this->menu->menu_all();
        $page_data['page_title']="Return Policy";
        $page_data['page']="Return";
        $this->load->view('index',$page_data);
    }
    public function invoice($id){
        if($this->session->userdata('cid')){
        $page_data['dropdown'] = $this->menu->menu_all();
        $invoice_generate = $this->menu->invoice($id);
        $order_id = $invoice_generate[0]['request_id_value'];
        $data = [
            'order_id' => $invoice_generate[0]['request_id_value'],
            'contact' => $invoice_generate[0]['contact'],
            'created_date' => date('y-m-d'),
            'product' =>  $invoice_generate[0]['service_device'],
            'qua' =>  $invoice_generate[0]['quantity'],
            'mrp' => $invoice_generate[0]['amt'],
            'discount' => '20',
        ];
        $checkdata = $this->db->get_where('invoice',array('order_id'=>$order_id))->result_array();
        if(count($checkdata) == 0){
            $this->db->insert('invoice',$data);
        }
        $page_data['invoice_create'] = $this->menu->admininvoice($order_id);
        // print_r($this->db->last_query());
        $page_data['page_title']="Invoice";
        $page_data['page']="invoice";
        $this->load->view('index',$page_data);
        }
        else{
            redirect(base_url());
        }
    }

}
