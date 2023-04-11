<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	 
	 function __construct()
	 {
		parent::__construct();
		$this->load->model('Menu','menu',true);
	 }
	public function index()
	{
		// if(@$this->input->post()){
		// 	$email=$this->input->post('email');
		// 	$password=sha1($this->input->post('password'));
		// 	$result=$this->db->get_where('admin',array('email_id'=>$email,'password'=>$password,'status'=>'active'))->result_array();
		// 	$aid=$result[0]['admin_id'] ?? '';
		// 	$aemail=$result[0]['email_id'] ?? '';
		// 	$this->session->set_userdata('a_id',$aid);
		// 	$this->session->set_userdata('e_id',$aemail);
		// }
		if(@$this->session->userdata['a_id']){
			//redirect to dashboard
			$customers_table=$this->db->get("customer")->result_array();
			$bookings_table=$this->db->get("bookings")->result_array();
			$engineer_table=$this->db->get("engineer")->result_array();
			$page_data['page_title']="Dashboard";
			$page_data['customers']=$customers_table;
			$page_data['bookings']=$bookings_table;
			$page_data['engineers']=$engineer_table;
	
			$page_data['page']="dashboard";
		$this->load->view('admin/index',$page_data);
		}else{
			$page_data['page_title']="Login Admin";
		$this->load->view('admin/login',$page_data);

		}
	}

	public function loginotp(){
        if($this->input->post('number')){
            $this->load->helper('msg');
            $number = $this->input->post('number');
            $result=$this->db->get_where('admin',array('contact'=>$number))->result_array();
			$name = $result[0]['name'];
            if (count($result) > 0)
            {
                $otp = rand(10000, 99999);
				$otp_resu = 'success';
				$timestamp =  $_SERVER["REQUEST_TIME"];  
                $_SESSION['time'] = $timestamp;
                  $msg = 'Your Verification code for Login to OTG Cares admin panel is '.$otp.'. Please do not share your OTP with anyone.';
                  if (sendsms($number,$dltId='1207167835592949172',$header="OTGCRS", $msg)) {
                      $data['message'] = "success";
                      } else {
                      $data['message'] = "Something went wrong, please try again later.";
                      }
            }
            else
            {
                $otp_resu = 'error';
				$otp = '';
            }
        }
        $this->session->set_userdata('admin_login_otp',$otp);
        $data['otp'] = $otp_resu;
		$data['otp1'] = $otp;
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function login_otp_verify(){
        if($this->input->post('loginotp')){
            $loginotp=$this->input->post('loginotp');
            $number = $this->input->post('number');
			$timestamp = $_SERVER['REQUEST_TIME'];
			if(($timestamp - $_SESSION['time']) > 300) //5min
			{
				$otp = "expired";
				// echo json_encode(array("type"=>"error", "message"=>"OTP expired. Pls. try again."));
			}else{
				if($this->session->userdata['admin_login_otp'] == $loginotp){
					$otp = 'success';
						$result=$this->menu->adminlogin($number);
						if(!empty($result)){
							$this->session->set_userdata('a_id', $result->admin_id);
							$this->session->set_userdata('e_id', $result->email_id);
							$this->session->unset_userdata('login_otp');
						}else{
							$page_data['message']="User not found";
						}
				}
				else{
					$otp='error';
				}
		}
           
        }
        $data['otp'] = $otp;
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

	//Customer page in admin
	public function customer($action,$id=false){
		if(@$this->session->userdata['a_id']){
			switch ($action) {
				case 'view':
					$customer_data=$this->db->get("customer")->result_array();
					$page_data['page_title']="Our Customers";
					$page_data['customers']=$customer_data;
					$page_data['page']="customer/view";
					$this->load->view('admin/index',$page_data);

					break;
					
					
				case 'add':
					if($this->input->post()){
						$data=array(
							"cust_name"=>$this->input->post('c_name'),
							"contact"=>$this->input->post('c_contact'),
							"email_id"=>$this->input->post('c_email'),
							"password"=>sha1($this->input->post('c_password')),
							"city"=>$this->input->post('c_city'),
							"address"=>$this->input->post('c_address'),
							"pincode"=>$this->input->post('c_pincode'),
							"created_on"=>date('Y-m-d h:i:s'),
							"modified_on"=>date('Y-m-d h:i:s')

						);
					
						if($this->db->insert('customer',$data)){
							$page_data['message']="Successfully created.";
						}else{
							$page_data['message']="Problem occured while adding customer.";

						}
					}
					$page_data['page_title']="add Customer";
					$page_data['page']="customer/form";
					$page_data['action']="add";

					$this->load->view('admin/index',$page_data);
				
					break;
				case 'edit':
					if($this->input->post()){
						// print_r($this->input->post());
						$data=array(
							"cust_name"=>$this->input->post('customer_name'),
							"contact"=>$this->input->post('c_contact'),
							"email_id"=>$this->input->post('c_email'),
							"password"=>sha1($this->input->post('c_password')),
							"city"=>$this->input->post('c_city'),
							"address"=>$this->input->post('c_address'),
							"pincode"=>$this->input->post('c_pincode'),
							"modified_on"=>date('Y-m-d h:i:s')

						);
						$this->db->where('cust_id',$id);
						$this->db->update('customer',$data);
					}
					$customer_data=$this->db->get_where('customer',array('cust_id'=>$id))->result_array();
				
					$page_data['cust_data']=$customer_data;
				
					$page_data['page_title']="Edit Customer";
					$page_data['page']="customer/form";
					$page_data['action']="edit";

					$this->load->view('admin/index',$page_data);

					break;
				case 'delete':
					
					if($id){
						$this->db->where('cust_id',$id);
						$this->db->delete('customer');
						redirect('admin/customer');
					}
					break;
				
				
				default:
					# code...
					break;
			}
		}else{
			$page_data['page_title']="Login Admin";
		$this->load->view('admin/login',$page_data);

		}	
	}

	public function amc($action,$id=false){
		if(@$this->session->userdata['a_id']){
			switch ($action) {
				case 'view':
				
					$this->db->select('*');
					$this->db->from('bookings');
					$this->db->like('service_plan', 'AMC');
					$customer_data = $this->db->get()->result_array();
					// $customer_data=$this->db->get("bookings")->result_array();
					$page_data['page_title']="Our AMC Bookings";
					$page_data['bookings_data']=$customer_data;
					$page_data['page']="amc/view";
					$this->load->view('admin/index',$page_data);

					break;
					
					
				case 'add':
					if($this->input->post()){
						$data=array(
							"service_plan"=>$this->input->post('s_plan'),
							"service_device"=>$this->input->post('s_device'),
							"eng_name"=>$this->input->post('e_name'),
							"status"=>$this->input->post('b_status'),
							"total_amount"=>$this->input->post('t_amnt'),
							"created_on"=>date('Y-m-d h:i:s'),
							"modified_on"=>date('Y-m-d h:i:s')

						);
					
						if($this->db->insert('bookings',$data)){
							$page_data['message']="Successfully created.";
						}else{
							$page_data['message']="Problem occured while adding bookings.";

						}
					}
					$page_data['page_title']="add AMC's";
					$page_data['page']="amc/form";
					$page_data['action']="add";

					$this->load->view('admin/index',$page_data);
				
					break;
				case 'edit':
					
					if($this->input->post()){
						$data=array(
							"cust_name"=>$this->input->post('c_name'),
							"service_plan"=>$this->input->post('s_plan'),
							"service_device"=>$this->input->post('s_device'),
							"eng_name"=>$this->input->post('e_name'),
							"status"=>$this->input->post('b_status'),
							"total_amount"=>$this->input->post('t_amnt'),
							"modified_on"=>date('Y-m-d h:i:s')

						);
						$this->db->where('request_id',$id);
						$this->db->update('bookings',$data);
					}
					$bookings_data=$this->db->get_where('bookings',array('request_id'=>$id))->result_array();
				
					$page_data['book_data']=$bookings_data;
					$page_data['message']="";
					$page_data['page_title']="Edit bookings";
					$page_data['page']="amc/form";
					$page_data['action']="edit";

					$this->load->view('admin/index',$page_data);

					break;
				case 'delete':
					
					if($id){
						$this->db->where('request_id',$id);
						$this->db->delete('bookings');
						redirect('admin/amc');
					}
					break;
				
				
				default:
					# code...
					break;
			}
		}else{
			$page_data['page_title']="Login Admin";
		$this->load->view('admin/login',$page_data);

		}	
	}

	public function one_time_service($action,$id=false){
		if(@$this->session->userdata['a_id']){
			switch ($action) {
				case 'view':
				
					$this->db->select('*');
					$this->db->from('bookings');
					$this->db->not_like('service_plan', 'AMC');
					$customer_data = $this->db->get()->result_array();
					// $customer_data=$this->db->get("bookings")->result_array();
					$page_data['page_title']="Our OTS Bookings";
					$page_data['bookings_data']=$customer_data;
					$page_data['page']="one_time_service/view";
					$this->load->view('admin/index',$page_data);

					break;
					
					
				case 'add':
					if($this->input->post()){
						$data=array(
							"service_plan"=>$this->input->post('s_plan'),
							"service_device"=>$this->input->post('s_device'),
							"eng_name"=>$this->input->post('e_name'),
							"status"=>$this->input->post('b_status'),
							"total_amount"=>$this->input->post('t_amnt'),
							"created_on"=>date('Y-m-d h:i:s'),
							"modified_on"=>date('Y-m-d h:i:s')

						);
					
						if($this->db->insert('bookings',$data)){
							$page_data['message']="Successfully created.";
						}else{
							$page_data['message']="Problem occured while adding bookings.";

						}
					}
					$page_data['page_title']="add bookings";
					$page_data['page']="one_time_service/form";
					$page_data['action']="add";

					$this->load->view('admin/index',$page_data);
				
					break;
				case 'edit':
					
					if($this->input->post()){
						$data=array(
							"description"=>$this->input->post('sc_desc'),
							"eng_name"=>$this->input->post('engineer_name'),
							"status"=>$this->input->post('sc_status'),
							"modified_on"=>date('Y-m-d h:i:s')
						);
						$this->db->where('request_id',$id);
						if($this->db->update('bookings',$data)){
							$page_data['message']='Engineer Assign Successfully';
						}
						else{
							$page_data['message']='Please try again';
						}
					}
					$bookings_data=$this->db->get_where('bookings',array('request_id'=>$id))->result_array();
					$engineer_data=$this->db->get('engineer')->result_array();
				
					$page_data['bookings_data']=$bookings_data;
					$page_data['engineer_data']=$engineer_data;
					$page_data['page_title']="Edit bookings";
					$page_data['page']="one_time_service/form";
					$page_data['action']="Assign Engineer";

					$this->load->view('admin/index',$page_data);

					break;
				case 'delete':
					
					if($id){
						$this->db->where('request_id',$id);
						$this->db->delete('bookings');
						redirect('admin/one_time_service');
					}
					break;
				
				
				default:
					# code...
					break;
			}
		}else{
			$page_data['page_title']="Login Admin";
		$this->load->view('admin/login',$page_data);

		}
	}

	//Bookings Page in Admin
	public function bookings($action,$id=false){
		if(@$this->session->userdata['a_id']){
			switch ($action) {
				case 'view':
					// echo "View";
					$bookings_data=$this->db->get("bookings")->result_array();
					$page_data['page_title']="Our bookings";
					$page_data['bookings_data']=$bookings_data;
					$page_data['page']="bookings/view";
					$this->load->view('admin/index',$page_data);
					break;
				case 'add':
				
					if($this->input->post()){
						$data=array(
							"service_plan"=>$this->input->post('s_plan'),
							"service_device"=>$this->input->post('s_device'),
							"eng_name"=>$this->input->post('e_name'),
							"status"=>$this->input->post('b_status'),
							"total_amount"=>$this->input->post('t_amnt'),
							"created_on"=>date('Y-m-d h:i:s'),
							"modified_on"=>date('Y-m-d h:i:s')

						);
					
						if($this->db->insert('bookings',$data)){
							$page_data['message']="Successfully created.";
							$booking=$this->db->get_where("bookings",array('request_id'=>$id))->result_array();
						$cust_mail=$this->db->get_where("customer",array('cust_id'=>$booking[0]['cust_id']))->result_array();
					
						if($this->input->post('eng_name') && $this->input->post('eng_name')!=" "){
							$this->load->library('email');
							$this->email->from('mywebsiteauth1@gmail.com','OTG Cares');
							$this->email->to($cust_mail[0]['email_id']);
							$this->email->subject("Engineer Assigned for you order");
							$this->email->message("Engineer is assigned for you order"."\r\n"."Ordere Id: ".$booking[0]['request_id']."\r\n".$cust_mail[0]["cust_name"]."\r\n"."Engineer name: ".$booking[0]['eng_name']."\r\n");
							$this->email->set_newline("\r\n");
							$this->email->send();
							if($this->email->send()){
								show_error($this->email->print_debugger());
							}
							else{
								$page_data['message']="Problem occured while email notification";
							}
						}
						}else{
							$page_data['message']="Problem occured while adding bookings.";

						}
					}
					$page_data['page_title']="add bookings";
					$catep_data=$this->db->get("category_product")->result_array();
					$page_data['catp']=$catep_data;
					$page_data['page']="bookings/form";
					$page_data['action']="add";

					$this->load->view('admin/index',$page_data);
				
					break;
				case 'edit':
					
					if($this->input->post()){
						$data=array(
							"cust_name"=>$this->input->post('c_name'),
							"service_plan"=>$this->input->post('s_plan'),
							"service_device"=>$this->input->post('s_device'),
							"eng_name"=>$this->input->post('e_name'),
							"status"=>$this->input->post('b_status'),
							"total_amount"=>$this->input->post('t_amnt'),
							"modified_on"=>date('Y-m-d h:i:s')

						);
						
						$this->db->where('request_id',$id);
						$this->db->update('bookings',$data);
						$booking=$this->db->get_where("bookings",array('request_id'=>$id))->result_array();
						$cust_mail=$this->db->get_where("customer",array('cust_id'=>$booking[0]['cust_id']))->result_array();
					
						if($this->input->post('e_name') && $this->input->post('e_name')!=" "){
							$this->load->library('email');
							$this->email->from('mywebsiteauth1@gmail.com','OTG Cares');
							$this->email->to($cust_mail[0]['email_id']);
							$this->email->subject("Engineer Assigned for you order");
							$this->email->message("Engineer is assigned for you order"."\r\n"."Ordere Id: ".$booking[0]['request_id']."\r\n".$cust_mail[0]["cust_name"]."\r\n"."Engineer name: ".$booking[0]['eng_name']."\r\n");
							$this->email->set_newline("\r\n");
							$this->email->send();
							if($this->email->send()){
								show_error($this->email->print_debugger());
							}
							else{
								$page_data['message']="Problem occured while email notification";
							}
						}
					}
					$bookings_data=$this->db->get_where('bookings',array('request_id'=>$id))->result_array();
				
					$page_data['book_data']=$bookings_data;
					$catep_data=$this->db->get("category_product")->result_array();
					$page_data['catp']=$catep_data;
					$plans_data=$this->db->get("category_plans")->result_array();
					$page_data['plans']=$plans_data;
					$engineer_data=$this->db->get("engineer")->result_array();
					$page_data['engineers']=$engineer_data;	
					$page_data['page_title']="Edit bookings";
					$page_data['message']="";
					$page_data['page']="bookings/form";
					$page_data['action']="edit";

					$this->load->view('admin/index',$page_data);

					break;
				case 'delete':
					
					if($id){
						$this->db->where('request_id',$id);
						$this->db->delete('bookings');
						redirect('admin/bookings');
					}
					break;
				
				
				default:
					
					break;
			}
		}else{
			$page_data['page_title']="Login Admin";
		$this->load->view('admin/login',$page_data);

		}
	}

	//Engineer page in admin
	public function engineer($action,$id=false){
		if(@$this->session->userdata['a_id']){
			switch ($action) {
				case 'view':
					// echo "View";
					$engineer_data=$this->db->get("engineer")->result_array();
					$page_data['page_title']="Our Engineers";
					$page_data['engineers']=$engineer_data;
					$page_data['page']="engineer/view";
					$this->load->view('admin/index',$page_data);
					break;
				case 'add':
					if($this->input->post()){
						$data=array(
							"eng_name"=>$this->input->post('e_name'),
							"contact"=>$this->input->post('e_contact'),
							"email_id"=>$this->input->post('e_email'),
							"password"=>sha1($this->input->post('e_password')),
							"ongoing-booking"=>$this->input->post('e_booking'),
							"created_on"=>date('Y-m-d h:i:s'),
							"modified_on"=>date('Y-m-d h:i:s')

						);
					
						if($this->db->insert('engineer',$data)){
							$page_data['message']="Successfully created.";
						}else{
							$page_data['message']="Problem occured while adding customer.";

						}
					}
					$page_data['page_title']="add Engineer";
					$page_data['page']="engineer/form";
					$page_data['action']="add";

					$this->load->view('admin/index',$page_data);
				
					break;
				case 'edit':
					if($this->input->post()){
						$data=array(
							"eng_name"=>$this->input->post('e_name'),
							"contact"=>$this->input->post('e_contact'),
							"email_id"=>$this->input->post('e_email'),
							"status"=>$this->input->post('status'),
							"password"=>sha1($this->input->post('e_password')),
							"ongoing-booking"=>$this->input->post('e_booking'),
							"modified_on"=>date('Y-m-d h:i:s')

						);
						$this->db->where('eng_id',$id);
						$this->db->update('engineer',$data);
					}
					$customer_data=$this->db->get_where('engineer',array('eng_id'=>$id))->result_array();
				
					$page_data['eng_data']=$customer_data;
				
					$page_data['page_title']="Edit Engineer";
					$page_data['page']="engineer/form";
					$page_data['action']="edit";

					$this->load->view('admin/index',$page_data);

					break;
				case 'delete':
					
					if($id){
						$this->db->where('eng_id',$id);
						$this->db->delete('engineer');
						redirect('admin/engineer');
					}
					break;
				
				
				default:
					# code...
					break;
			}
		}else{
			$page_data['page_title']="Login Admin";
		$this->load->view('admin/login',$page_data);

		}
	}

	//Engineer page in admin
	public function shop($action,$id=false){
		if(@$this->session->userdata['a_id']){
			switch ($action) {
				case 'view':
					$shop_owner=$this->db->get("shop_owner")->result_array();
					$page_data['page_title']="Our Shop Owner";
					$page_data['shop']=$shop_owner;
					$page_data['page']="shop/view";
					$this->load->view('admin/index',$page_data);
					break;
				case 'add':
					if($this->input->post()){
						$data=array(
							"name"=>$this->input->post('name'),
							"contact"=>$this->input->post('contact'),
							"email_id"=>$this->input->post('email'),
							"status"=>$this->input->post('status'),
							"address"=>$this->input->post('address'),
							"pincode"=>$this->input->post('pincode'),
							"city"=>$this->input->post('city'),
							"created_on"=>date('Y-m-d h:i:s')
						);
						if($this->db->insert('shop_owner',$data)){
							$page_data['message']="Successfully created.";
						}else{
							$page_data['message']="Problem occured while adding customer.";
						}
					}
					$page_data['page_title']="add Shop Owner";
					$page_data['page']="shop/form";
					$page_data['action']="add";
					$this->load->view('admin/index',$page_data);
					break;
				case 'edit':
					if($this->input->post()){
						$data=array(
							"name"=>$this->input->post('name'),
							"contact"=>$this->input->post('contact'),
							"email_id"=>$this->input->post('email'),
							"status"=>$this->input->post('status'),
							"address"=>$this->input->post('address'),
							"pincode"=>$this->input->post('pincode'),
							"city"=>$this->input->post('city'),
							"modified_on"=>date('Y-m-d h:i:s')
						);
						$this->db->where('shop_id',$id);
						$this->db->update('shop_owner',$data);
					}
					$shop=$this->db->get_where('shop_owner',array('shop_id'=>$id))->result_array();
				
					$page_data['shop']=$shop;
					$page_data['page_title']="Edit Shop Owner";
					$page_data['page']="shop/form";
					$page_data['action']="Edit";
					$this->load->view('admin/index',$page_data);

					break;
				case 'delete':
					if($id){
						$this->db->where('shop_id',$id);
						$this->db->delete('shop_owner');
						redirect('admin/shop');
					}
					break;
							default:
					break;
			}
		}else{
			$page_data['page_title']="Login Admin";
		$this->load->view('admin/login',$page_data);

		}
	}

	//Category page in admin
	public function category($action,$id=false){
		if(@$this->session->userdata['a_id']){
			switch ($action) {
				case 'view':
					// echo "View";
					$engineer_data=$this->db->get("category")->result_array();
					$page_data['page_title']="Our Categories";
					$page_data['categories']=$engineer_data;
					$page_data['page']="category/view";
					$this->load->view('admin/index',$page_data);
					break;
				case 'add':
					if($this->input->post()){
						$data=array(
							"category_name"=>$this->input->post('ct_name'),
							"status"=>$this->input->post('ct_status'),
							
							"created_on"=>date('Y-m-d h:i:s'),
							"modified_on"=>date('Y-m-d h:i:s')

						);
					
						if($this->db->insert('category',$data)){
							$page_data['message']="Successfully created.";
						}else{
							$page_data['message']="Problem occured while adding customer.";

						}
					}
					$page_data['page_title']="add Category";
					$page_data['page']="category/form";
					$page_data['action']="add";

					$this->load->view('admin/index',$page_data);
				
					break;
				case 'edit':

					if($this->input->post()){
						
						$data=array(
							// "cproduct_img"=>$this->input->post('ct_photo'),
							"category_name"=>$this->input->post('ct_name'),
							"status"=>$this->input->post('ct_status'),
							
							"modified_on"=>date('Y-m-d h:i:s')

						);
						
						$this->db->where('category_id',$id);
						$this->db->update('category',$data);
					}
					$category_data=$this->db->get_where('category',array('category_id'=>$id))->result_array();
				
					$page_data['cats_data']=$category_data;
				
					$page_data['page_title']="Edit Category";
					$page_data['page']="category/form";
					$page_data['action']="edit";

					$this->load->view('admin/index',$page_data);

					break;
				case 'delete':
					
					if($id){
						$this->db->where('category_id',$id);
						$this->db->delete('category');
						redirect('admin/category');
					}
					break;
				
				
				default:
					# code...
					break;
			}
		}else{
			$page_data['page_title']="Login Admin";
		$this->load->view('admin/login',$page_data);

		}
	}

	public function plans_features($action,$id="false"){
		if(@$this->session->userdata['a_id']){
			switch($action){
				case 'view':
					$plan_features=$this->db->get('plan_features')->result_array();
				$page_data['plan_features']=$plan_features;

					$plans=$this->db->get("category_plans")->result_array();
					$page_data['plans']=$plans;
					$page_data['page_title']="Our Plan Features";
					$page_data['page']="plans_features/view";
					$this->load->view('admin/index',$page_data);
					
					break;
					case 'edit':
					
						// if($this->input->post()){
							
							
						// 	$data=array(
						// 		"category_name"=>$this->input->post('ct_name'),
						// 		"cproduct_name"=>$this->input->post('cp_name'),
						// 		"cproduct_desc"=>$this->input->post('cp_desc'),
						// 		"status"=>$this->input->post('cp_status'),
								
						// 		"modified_on"=>date('Y-m-d h:i:s')
		
						// 	);
		
							
						// 	$this->db->where('cproduct_id',$id);
						// 	$this->db->update('category_product',$data);
						// }
						$plan_features=$this->db->get_where("plan_features",array('cfeature_id'=>$id))->result_array();
						$page_data['plan_features']=$plan_features;
						
						$plans=$this->db->get_where("category_plans",array('cplan_id'=>$plan_features[0]['cplan_id']))->result_array();
						$page_data['plans']=$plans;
						$all_plans=$this->db->get("category_plans")->result_array();
						$page_data['all_plans']=$all_plans;
						
						$page_data['page_title']="Edit Plans Features";
						$page_data['page']="plans_features/form";
						$page_data['action']="edit";
						$page_data['message']=" ";
						
		
						$this->load->view('admin/index',$page_data);
		
						break;
						case 'delete':
					
							if($id){
								$this->db->where('cfeature_id',$id);
								$this->db->delete('plan_features');
								redirect('admin/plans_features');
							}
							break;
					default:
					# code...
					break;
			}
		}else{
			$page_data['page_title']="Login Admin";
		$this->load->view('admin/login',$page_data);

		}
	}

	//product features in admin
	public function product_features($action,$id='false'){
		if(@$this->session->userdata['a_id']){
			switch($action){
				case 'view':
				$page_data['products']=$this->menu->product_feature();
					$page_data['page_title']="Our Product Features";
					$page_data['page']="product_features/view";
					$this->load->view('admin/index',$page_data);
					
					break;
					case 'add';
						if($this->input->post()){
							$data=array(
								"cproduct_id"=>$this->input->post('product_name'),
								"feature"=>$this->input->post('feature'),
								"created_on"=>date('Y-m-d h:i:s'),
							);
							if($this->db->insert('product_features',$data)){
								$page_data['message']="Successfully Created.";
							}else{
								$page_data['message']="Problem occured while adding customer.";
							}

						}

						$page_data['category_product']=$this->db->get('category_product')->result_array();
						$page_data['page_title']="Add Product Features";
						$page_data['page']="product_features/form";
						$page_data['action']="add";
						$page_data['message']="";
						
						$this->load->view('admin/index',$page_data);
						break;
					case 'edit':
						if($this->input->post()){
							$data=array(
								"feature"=>$this->input->post('feature'),
								"modified_on"=>date('Y-m-d h:i:s'),
							);
							$this->db->where('id',$id);
							if($this->db->update('product_features',$data)){
								$page_data['message']="Successfully Updated.";
							}else{
								$page_data['message']="Problem occured while adding customer.";
							}
						}

						$page_data['products']=$this->menu->product_feature_edit($id);
						$page_data['page_title']="Edit Product Features";
						$page_data['page']="product_features/form";
						$page_data['action']="edit";
						$page_data['message']="";
						
						$this->load->view('admin/index',$page_data);
		
						break;
						case 'delete':
					
							if($id){
								$this->db->where('id',$id);
								$this->db->delete('product_features');
								redirect('admin/product_features');
							}
							break;
					default:
					# code...
					break;
			}
		}else{
			$page_data['page_title']="Login Admin";
		$this->load->view('admin/login',$page_data);

		}
	}

	//product benefits in admin
	public function product_benefit($action,$id='false'){
		if(@$this->session->userdata['a_id']){
			switch($action){
				case 'view':
				$page_data['products']=$this->menu->product_benefit();
					$page_data['page_title']="Our Product Benefits";
					$page_data['page']="product_benefit/view";
					$this->load->view('admin/index',$page_data);
					
					break;
					case 'add';
						if($this->input->post()){
							$data=array(
								"cproduct_id"=>$this->input->post('product_name'),
								"benefits"=>$this->input->post('benefits'),
								"created_on"=>date('Y-m-d h:i:s'),
							);
							if($this->db->insert('product_benefits',$data)){
								$page_data['message']="Successfully Created.";
							}else{
								$page_data['message']="Problem occured while adding customer.";
							}
						}

						$page_data['category_product']=$this->db->get('category_product')->result_array();
						$page_data['page_title']="Add Product Benfit";
						$page_data['page']="product_benefit/form";
						$page_data['action']="add";
						$page_data['message']="";
						
						$this->load->view('admin/index',$page_data);
						break;
					case 'edit':
						if($this->input->post()){
							$data=array(
								"benefits"=>$this->input->post('benefits'),
								"modified_on"=>date('Y-m-d h:i:s'),
							);
							$this->db->where('id',$id);
							if($this->db->update('product_benefits',$data)){
								$page_data['message']="Successfully Updated.";
							}else{
								$page_data['message']="Problem occured while adding customer.";
							}
						}

						$page_data['products']=$this->menu->product_benefit_edit($id);
						$page_data['page_title']="Edit Product Benefit";
						$page_data['page']="product_benefit/form";
						$page_data['action']="edit";
						$page_data['message']="";
						
						$this->load->view('admin/index',$page_data);
		
						break;
						case 'delete':
					
							if($id){
								$this->db->where('id',$id);
								$this->db->delete('product_benefits');
								redirect('admin/product_benefit');
							}
							break;
					default:
					# code...
					break;
			}
		}else{
			$page_data['page_title']="Login Admin";
		$this->load->view('admin/login',$page_data);

		}
	}

	//Product page in admin
	public function category_products($action,$id=false){
		if(@$this->session->userdata['a_id']){
			switch ($action) {
				case 'view':
					// echo "View";
					$cproducts_data=$this->db->get("category_product")->result_array();
					$page_data['page_title']="Our Category Products";
					$page_data['cproducts']=$cproducts_data;
					$page_data['page']="category_products/view";			
					
					$this->load->view('admin/index',$page_data);
					
					break;
				case 'add':
					if($this->input->post('send')){
						if($_FILES['cp_photo']['name']!= ""){
							$absolute_path=base_url('uploads/category/');
					$uploaded_data=$this->uploadimg(array('upload_path'=>'./uploads/category/','name'=>'cp_photo'));
				}
						
						$data=array(
							"category_name"=>$this->input->post('ct_name'),
							"cproduct_name"=>$this->input->post('cp_name'),
							"cproduct_desc"=>$this->input->post('cp_desc'),
							"status"=>$this->input->post('cp_status'),
							"created_on"=>date('Y-m-d h:i:s'),
							"modified_on"=>date('Y-m-d h:i:s')

						);
						if(is_countable($uploaded_data) && count($uploaded_data)>=1){
							$data['cproduct_img']='uploads/category/'.$uploaded_data['file_name'];
						}
					
						if($this->db->insert('category_product',$data)){
							$page_data['message']="Successfully created.";
						}else{
							$page_data['message']="Problem occured while adding customer.";

						}
					}
					$page_data['message']="";
					$page_data['page_title']="add Category";
					$page_data['page']="category_products/add";
					$page_data['action']="add";
					$categ_data=$this->db->get("category")->result_array();
					$page_data['cato']=$categ_data;

					$this->load->view('admin/index',$page_data);
				
					break;
				case 'edit':
					
					if($this->input->post()){
						$uploaded_data='0';
						if($_FILES['cp_photo']['name']!= ""){
									$absolute_path=base_url('uploads/category/');
							$uploaded_data=$this->uploadimg(array('upload_path'=>'./uploads/category/','name'=>'cp_photo'));
						}
						else{
							$data['uploaded_data']=$this->input->post('cp_photoedit');
						}
						
						$data=array(
							"category_name"=>$this->input->post('ct_name'),
							"cproduct_name"=>$this->input->post('cp_name'),
							"cproduct_desc"=>$this->input->post('cp_desc'),
							"status"=>$this->input->post('cp_status'),
							"modified_on"=>date('Y-m-d h:i:s')
						);

						if(is_countable($uploaded_data) && count($uploaded_data)>=1){
							$data['cproduct_img']='uploads/category/'.$uploaded_data['file_name'];
						}
						$this->db->where('cproduct_id',$id);
						$this->db->update('category_product',$data);
					}
					$cpros_data=$this->db->get_where('category_product',array('cproduct_id'=>$id))->result_array();
				
					$page_data['cpro_data']=$cpros_data;
				
					$page_data['page_title']="Edit Products";
					$page_data['page']="category_products/form";
					$page_data['action']="edit";
					$page_data['message']=" ";
					$categ_data=$this->db->get("category")->result_array();
					$page_data['cato']=$categ_data;

					$this->load->view('admin/index',$page_data);

					break;
				case 'delete':
					
					if($id){
						$this->db->where('cproduct_id',$id);
						$this->db->delete('category_product');
						redirect('admin/category_products');
					}
					break;
				
				default:
					# code...
					break;
			}
		}else{
			$page_data['page_title']="Login Admin";
		$this->load->view('admin/login',$page_data);

		}
	}

	//testimonial 
	public function testimonial($action,$id=false){
		if(@$this->session->userdata['a_id']){
			switch ($action) {
				case 'view':
					$testimonial_data=$this->db->get("testimonials")->result_array();
					$page_data['page_title']="Our Testimonials";
					$page_data['testimonial_data']=$testimonial_data;
					$page_data['page']="testimonial/view";
					$this->load->view('admin/index',$page_data);
					
					break;
				case 'add':
					if($this->input->post('submit')){
						if($_FILES['file']['name']!= ""){
							$absolute_path=base_url('uploads/testimonial/');
					$uploaded_testimonial=$this->uploadimg(array('upload_path'=>'./uploads/testimonial/','name'=>'file'));	}
						$data=array(
							"name"=>$this->input->post('name'),
							"comapny_name"=>$this->input->post('comapny_name'),
							"short_desc"=>$this->input->post('short_desc'),
							"long_desc"=>$this->input->post('testimonial'),
							"status"=>$this->input->post('cp_status'),
							"created_date"=>date('Y-m-d h:i:s'),
						);
						if(is_countable($uploaded_testimonial) && count($uploaded_testimonial)>=1){
							$data['file']='uploads/testimonial/'.$uploaded_testimonial['file_name'];
						}
						if($this->db->insert('testimonials',$data)){
							$page_data['message']="Successfully created.";
						}else{
							$page_data['message']="Problem occured while adding customer.";
						}
					}
					$page_data['message']="";
					$page_data['page_title']="Add Testimonials";
					$page_data['page']="testimonial/form";
					$page_data['action']="add";
					// $testimonial_data=$this->db->get("testimonials")->result_array();
					// $page_data['cato']=$categ_data;

					$this->load->view('admin/index',$page_data);
				
					break;
				case 'edit':
					
					if($this->input->post()){
						$data=array(
							"name"=>$this->input->post('name'),
							"comapny_name"=>$this->input->post('comapny_name'),
							"short_desc"=>$this->input->post('short_desc'),
							"long_desc"=>$this->input->post('testimonial'),
							"status"=>$this->input->post('cp_status'),
							"modified_date"=>date('Y-m-d h:i:s'),
						);

						$this->db->where('id',$id);
						$this->db->update('testimonials',$data);
					}
					$testimonial_data=$this->db->get_where('testimonials',array('id'=>$id))->result_array();
					$page_data['testimonial_data']=$testimonial_data;
					$page_data['page_title']="Edit Products";
					$page_data['page']="testimonial/form";
					$page_data['action']="edit";
					$page_data['message']=" ";
					$categ_data=$this->db->get("testimonials")->result_array();
					$page_data['cato']=$categ_data;

					$this->load->view('admin/index',$page_data);

					break;
				case 'delete':
					if($id){
						$this->db->where('id',$id);
						$this->db->delete('testimonials');
						redirect('admin/testimonial');
					}
					break;
				
				default:
					# code...
					break;
			}
		}else{
			$page_data['page_title']="Login Admin";
		$this->load->view('admin/login',$page_data);

		}
	}

	//our client in admin
	public function client($action,$id=false){
		if(@$this->session->userdata['a_id']){
			switch($action){
				case 'view':
					$client_data=$this->db->get("our_client")->result_array();
					$page_data['page_title']="Our Clients";
					$page_data['client']=$client_data;
					$page_data['page']="client/view";
					$this->load->view('admin/index',$page_data);
					break;
				case 'add':
						$uploadedclient_data='0';
					
						if(@$this->input->post()){
							if($_FILES['logo']['name']!= ""){
								$absolute_path=base_url('uploads/our_client/');
								$uploadedclient_data=$this->uploadimg3(array('upload_path'=>'./uploads/our_client/','name'=>'logo'));
							}
							$data=array(
								'status'=>$this->input->post('status'),
								'created_date'=>date('y-m-d h:i:s'),
							);

							if(is_countable($uploadedclient_data) && count($uploadedclient_data)>=1){
								$data['client_logo']='uploads/our_client/'.$uploadedclient_data['file_name'];
							}
							if($this->db->insert('our_client',$data)){
								$page_data['message']="Successfully created.";
							}else{
								$page_data['message']="Problem occured while adding customer.";
		
							}
						}
					$page_data['page_title']="Add Client";
					$page_data['page']="client/form";
					$this->load->view('admin/index',$page_data);
					break;
				case 'edit';
					if(@$id){
						$client_data=$this->db->get_where("our_client",array('id'=>$id))->result_array();
						$page_data['client']=$client_data;
					}
					$uploadedclient_data='0';

					if(@$this->input->post()){
						if($_FILES['logo']['name']!= ""){
							$absolute_path=base_url('uploads/our_client/');
							$uploadedclient_data=$this->uploadimg3(array('upload_path'=>'./uploads/our_client/','name'=>'logo'));
						}
						else{
							$data['client_logo']=$this->input->post('file');
						}
						$data=array(
							'client_logo'=>$this->input->post('file'),
							'status'=>$this->input->post('status'),
							'modified_date'=>date('y-m-d h:i:s'),
						);

					if(is_countable($uploadedclient_data) && count($uploadedclient_data)>=1){
						$data['client_logo']='uploads/our_client/'.$uploadedclient_data['file_name'];
					}
					$this->db->where('id',$id);
					$this->db->update('our_client',$data);
				}
				$page_data['page_title']='Edit Client';
				$page_data['page']='client/form';
				$this->load->view('admin/index',$page_data);
				break;
				case 'delete';
				if($id){
					$this->db->where('id',$id);
				$this->db->delete('our_client');
				redirect('admin/client');
				}
				break;	
			}
		}else{
			$page_data['page_title']="Login Admin";
		$this->load->view('admin/login',$page_data);

		}
	}

	//blog in admin
	public function blog($action,$id=false){
		if(@$this->session->userdata['a_id']){
			switch($action){
				case 'view':
					$blog_data=$this->db->get("blog")->result_array();
					$page_data['page_title']="Our Blogs";
					$page_data['blog']=$blog_data;
					$page_data['page']="blog/view";
					$this->load->view('admin/index',$page_data);
					break;
				case 'add':
						$uploadedblog_data='0';
					
						if(@$this->input->post()){
							if($_FILES['file']['name']!= ""){
								$absolute_path=base_url('uploads/blog/');
								$uploadedblog_data=$this->uploadimg4(array('upload_path'=>'./uploads/blog/','name'=>'file'));
							}
							$data=array(
								'name'=>$this->input->post('blog'),
								'writtenby'=>$this->input->post('writtenby'),
								'insert_date'=>$this->input->podt('blogdate'),
								'description'=>$this->input->post('editordata'),
								'status'=>$this->input->post('cp_status'),
								'created_date'=>date('y-m-d h:i:s'),
							);

							if(is_countable($uploadedblog_data) && count($uploadedblog_data)>=1){
								$data['file']='uploads/blog/'.$uploadedblog_data['file_name'];
							}
							if($this->db->insert('blog',$data)){
								$page_data['message']="Successfully created.";
							}else{
								$page_data['message']="Problem occured while adding blog.";
		
							}
						}
					$page_data['page_title']="Add Blog";
					$page_data['page']="blog/form";
					$this->load->view('admin/index',$page_data);
					break;
				case 'edit';
					if(@$id){
						$client_data=$this->db->get_where("blog",array('id'=>$id))->result_array();
						$page_data['blog']=$client_data;
					}
					$uploadedblog_data='0';

					if(@$this->input->post()){
						if($_FILES['file']['name']!= ""){
							$absolute_path=base_url('uploads/blog/');
							$uploadedblog_data=$this->uploadimg3(array('upload_path'=>'./uploads/blog/','name'=>'file'));
						}
						else{
							$data['file']=$this->input->post('file');
						}
						$data=array(
							'name'=>$this->input->post('blog'),
								'writtenby'=>$this->input->post('writtenby'),
								'insert_date'=>$this->input->podt('blogdate'),
								'description'=>$this->input->post('editordata'),
								'status'=>$this->input->post('cp_status'),
							'modified_date'=>date('y-m-d h:i:s'),
						);

					if(is_countable($uploadedblog_data) && count($uploadedblog_data)>=1){
						$data['file']='uploads/blog/'.$uploadedblog_data['file_name'];
					}
					$this->db->where('id',$id);
					$this->db->update('blog',$data);
				}
				$page_data['page_title']='Edit Blog';
				$page_data['page']='blog/form';
				$this->load->view('admin/index',$page_data);
				break;
				case 'delete';
				if($id){
					$this->db->where('id',$id);
				$this->db->delete('blog');
				redirect('admin/blog');
				}
				break;	
			}
		}else{
			$page_data['page_title']="Login Admin";
		$this->load->view('admin/login',$page_data);

		}
	}

	//fetch service plan
	public function service_plan(){
		$pname = $this->input->post('pname');
		$msg = $this->db->get_where('category_plans',['cproduct_name'=>$pname])->result_array();
		$data_plan['plan'] = $msg;
        $data_plan['token'] = $this->security->get_csrf_hash();
        echo json_encode($data_plan);
	}

	//pincode
	public function pincode($action,$id=false){
		if(@$this->session->userdata['a_id']){
			switch ($action) {
				case 'view':
					// echo "View";
					$pincode=$this->menu->pincodeview();
					$page_data['page_title']="Not Allowed Pincode List";
					$page_data['pincode']=$pincode;
					$page_data['page']="pincode/view";
					$this->load->view('admin/index',$page_data);
					break;
				case 'add':
					if($this->input->post()){
						$data=array(
							"pincode"=>$this->input->post('pincode'),
							"service_product"=>$this->input->post('category'),
						);
					
						if($this->db->insert('pincode',$data)){
							$page_data['message']="Successfully created.";
						}else{
							$page_data['message']="Problem occured while adding customer.";
						}
					}
					$page_data['cate']=$this->db->get('category_product')->result_array();
					$page_data['page_title']="add Category";
					$page_data['page']="pincode/form";
					$page_data['action']="add";
					$this->load->view('admin/index',$page_data);
					break;
				case 'edit':
					if($this->input->post()){
						$data=array(
							"pincode"=>$this->input->post('pincode'),
							"service_product"=>$this->input->post('category'),
						);
						$this->db->where('id',$id);
						
						if($this->db->update('pincode',$data)){
							$page_data['message']="Successfully updated.";
						}else{
							$page_data['message']="Problem occured while adding customer.";
						}
					}
					$page_data['pincode']=$this->db->get_where('pincode',['id'=>$id])->row();
					$page_data['cate']=$this->db->get('category_product')->result_array();
					$page_data['page_title']="Edit Pincode";
					$page_data['page']="pincode/form";
					$page_data['action']="edit";
					$this->load->view('admin/index',$page_data);
					break;
				case 'delete':
					
					if($id){
						$this->db->where('id',$id);
						$this->db->delete('pincode');
						redirect('admin/pincode');
					}
					break;
			}
		}else{
			$page_data['page_title']="Login Admin";
		$this->load->view('admin/login',$page_data);

	}
	}

	//coupon in admin
	public function coupon($action,$id=false){
		if(@$this->session->userdata['a_id']){
			switch($action){
				case 'view':
					$page_data['page_title'] = 'Coupons';
					$page_data['page'] = 'coupons/view';
					// $page_data['coupon'] = $this->db->get_where('coupons')->result_array();
					$page_data['coupon'] = $this->menu->coupon();
					$this->load->view('admin/index',$page_data);
					break;
				case 'add':
					if($this->input->post()){
						$data = [
							'code' => $this->input->post('code'),
							'cproduct' => $this->input->post('pname'),
							'cplan' => $this->input->post('plan'),
							'percentage' => $this->input->post('percent'),
							'status' => $this->input->post('ct_status'),
							'expiry_date' => $this->input->post('expiry'),
							'created_on' => date('y-m-d'),
						];
						if(!empty($_POST['service'])){
							
							$number_of_file = sizeof($_POST['service']);
							$files = $_POST['service'];
							for ($i = 0; $i < $number_of_file; $i++) {
								$data['service_name']= implode(",",$files);
						}
						}

						if($this->db->insert('coupons',$data)){
							$page_data['message'] = 'Successfully created';
						}
						else{
							$page_data['message'] = 'something went wrong';
						}
					}
					$page_data['product'] = $this->db->get('category_product')->result_array();
						// $page_data['plan'] = $this->db->get('category_plans')->result_array();
					$page_data['page_title'] = 'Add Coupon';
					$page_data['page'] = 'coupons/add';
					$this->load->view('admin/index',$page_data);
					break;
				case 'edit':
					if($this->input->post()){
						$data = [
							'code' => $this->input->post('code'),
							'cproduct' => $this->input->post('pname'),
							'cplan' => $this->input->post('plan'),
							'percentage' => $this->input->post('percent'),
							'service_name'=>$this->input->post('service'),
							'status' => $this->input->post('ct_status'),
							'expiry_date' => $this->input->post('expiry'),
							'created_on' => date('y-m-d'),
						];
						$this->db->where('coupon_id',$id);
						if($this->db->update('coupons',$data)){
							$page_data['message'] = 'Successfully updated';
						}
						else{
							$page_data['message'] = 'something went wrong';
						}
					}
					$page_data['coupon'] = $this->menu->coupondata($id);
					$page_data['product'] = $this->db->get('category_product')->result_array();
					$page_data['page_title'] = 'Edit Coupon';
					$page_data['page'] = 'coupons/add';
					$this->load->view('admin/index',$page_data);
					break;
				case 'delete':
					$this->db->where('coupon_id',$id);
					$this->db->delete('coupons');
					redirect('admin/coupon');
					break;

			}
		}else{
			$page_data['page_title']="Login Admin";
		$this->load->view('admin/login',$page_data);

	}
	}

	//offer banner
	public function offer($action,$id=false){
		if(@$this->session->userdata['a_id']){
			switch($action){
				case 'view':
					$banner_data=$this->db->get("banner")->result_array();
					$page_data['page_title']="Offer Banner";
					$page_data['banner']=$banner_data;
					$page_data['page']="offer_banner/view";
					$this->load->view('admin/index',$page_data);
					break;

				case 'edit';
					if(@$id){
						$client_data=$this->db->get_where("banner",array('id'=>$id))->result_array();
						$page_data['banner']=$client_data;
					}
					$uploadedblog_data='0';

					if(@$this->input->post()){
						if($_FILES['file1']['name']!= ""){
							$absolute_path=base_url('uploads/banner/');
							$uploadedbanner_data1=$this->uploadimgbanner1(array('upload_path'=>'./uploads/banner/','name'=>'file1'));
						}
						
						if($_FILES['file2']['name']!= ""){
							$absolute_path=base_url('uploads/banner/');
							$uploadedbanner_data2=$this->uploadimgbanner2(array('upload_path'=>'./uploads/banner/','name'=>'file2'));
						}

						if($_FILES['file3']['name']!= ""){
							$absolute_path=base_url('uploads/banner/');
							$uploadedbanner_data3=$this->uploadimgbanner3(array('upload_path'=>'./uploads/banner/','name'=>'file3'));
						}
						

					if(is_countable($uploadedbanner_data1) && count($uploadedbanner_data1)>=1){
						$data['banner1']='uploads/banner/'.$uploadedbanner_data1['file_name'];
					}
					if(is_countable($uploadedbanner_data2) && count($uploadedbanner_data2)>=1){
						$data['banner2']='uploads/banner/'.$uploadedbanner_data2['file_name'];
					}
					if(is_countable($uploadedbanner_data3) && count($uploadedbanner_data3)>=1){
						$data['banner3']='uploads/banner/'.$uploadedbanner_data3['file_name'];
					}
					$this->db->where('id',$id);
					$this->db->update('banner',$data);
				}
				$page_data['page_title']='Edit Banner';
				$page_data['page']='offer_banner/form';
				$this->load->view('admin/index',$page_data);
				break;
			
			}
		}else{
			$page_data['page_title']="Login Admin";
		$this->load->view('admin/login',$page_data);

		}
	}

	//extended
    public function extended($action,$id=false){
		if(@$this->session->userdata['a_id']){
			$id = $this->session->userdata('a_id');
			switch($action){
				case 'view':
						$page_data['shopname'] = $this->db->get('shop_owner')->result_array();
						$page_data['info'] = $this->menu->extended($id);
						$page_data['page_title'] = 'Extented Warranty Registration';
						$page_data['page'] = 'extended/view';
						$this->load->view('admin/index',$page_data);
					break;
				case 'add':
					if(get_cookie('sid')){
						if($this->input->post()){
							if($_FILES['invoice_photo']['name'] == TRUE){
								$absolute_path=base_url('uploads/shop_invoice/');
								$uploaded_data1=$this->uploadimg(array('upload_path'=>'./uploads/shop_invoice/','name'=>'invoice_photo'));
							}
							if($_FILES['device_photo']['name'] == TRUE){						$absolute_path=base_url('uploads/shop_device/');
								$uploaded_data=$this->uploadimg(array('upload_path'=>'./uploads/shop_device/','name'=>'device_photo'));
							}

					       $shop_id = get_cookie('sid');
							$data = [
								'name' => $this->input->post('name'),
								'contact' => $this->input->post('contact'),
								'email' => $this->input->post('email'),
								'address' => $this->input->post('address'),
								'pincode' => $this->input->post('pincode'),
								'device' => $this->input->post('device'),
								'original_price' => $this->input->post('orprice'),
								'amount' => $this->input->post('waprice'),
								'duration' => $this->input->post('duration'),
								'created_on' => $this->input->post('st_date'),
								'device_serial_no' => $this->input->post('de_se_no'),
								'serial_no_image' => $this->input->post('device_photo'),
								'invoice_image' => $this->input->post('invoice_photo'),
								'status' => $this->input->post('status'),
								'shop_id' => $shop_id,
							];

							if(is_countable($uploaded_data) && count($uploaded_data)>=1){
								$data['serial_no_image']='uploads/shop_device/'.$uploaded_data['file_name'];
							}

							if(is_countable($uploaded_data1) && count($uploaded_data1)>=1){
								$data['invoice_image']='uploads/shop_invoice/'.$uploaded_data1['file_name'];
							}
							
							if($this->db->insert('warrenty',$data)){
								$page_data['message'] = 'Warranty Submitted Successfully';
							}else{
								$page_data['message'] = 'Something Went Wrong . Please try again';
							}
							// $this->db->where('shop_id',$id);
							// $this->db->update('warrenty',$data);
						}
						// $page_data['info'] = $this->menu->extendededit($id);
						$page_data['product'] = $this->db->get_where('category_product',['category_name'=>'Extended Warrenty'])->result_array();
						$page_data['page_title'] = 'Add Warranty';
						$page_data['page'] = 'extended/form';
						$this->load->view('admin/index',$page_data);
					}
					break;
					case 'edit':
						if(get_cookie('sid')){
							if($this->input->post()){
								if($_FILES['device_photo']['name'] != ""){
											// $absolute_path=base_url('uploads/shop_device/');
									$uploaded_data=$this->uploadimg(array('upload_path'=>'./uploads/shop_device/','name'=>'device_photo'));
								}
								if($_FILES['invoice_photo']['name']!= ""){
									// $absolute_path1=base_url('uploads/shop_invoice/');
							$uploaded_data1=$this->uploadimg1(array('upload_path'=>'./uploads/shop_invoice/','name'=>'invoice_photo'));
						}
						$shop_id = get_cookie('sid');
								$data = [
									'name' => $this->input->post('name'),
									'contact' => $this->input->post('contact'),
									'email' => $this->input->post('email'),
									'address' => $this->input->post('address'),
									'pincode' => $this->input->post('pincode'),
									'device' => $this->input->post('device'),
									'original_price' => $this->input->post('orprice'),
									'amount' => $this->input->post('waprice'),
									'duration' => $this->input->post('duration'),
									'created_on' => $this->input->post('st_date'),
									'device_serial_no' => $this->input->post('de_se_no'),
									'serial_no_image' => $this->input->post('device_photo'),
									'invoice_image' => $this->input->post('invoice_photo'),
									'status' => $this->input->post('status'),
									'shop_id' => $shop_id,
									'modified_on' => date('y-m-d'),
								];

								if(is_countable($uploaded_data) && count($uploaded_data)>=1){
									$data['serial_no_image']='uploads/shop_device/'.$uploaded_data['file_name'];
								}

								if(is_countable($uploaded_data1) && count($uploaded_data1)>=1){
									$data['invoice_image']='uploads/shop_invoice/'.$uploaded_data1['file_name'];
								}
								
								$this->db->where('warrenty_id',$id);
								$this->db->update('warrenty',$data);
							}
							$page_data['info'] = $this->menu->extendededit($id);
							$page_data['product'] = $this->db->get_where('category_product',['category_name'=>'Extended Warrenty'])->result_array();
							$page_data['page_title'] = 'Edit Warranty';
							$page_data['page'] = 'extended/form';
							$this->load->view('admin/index',$page_data);
						}
						break;
					case 'delete':
						$this->db->where('warrenty_id',$id);
						$this->db->delete('warrenty');
						redirect('admin/extended');
						break;
			}
		}else{
			$page_data['page_title']="Login Admin";
		$this->load->view('admin/login',$page_data);

		}
    }
	//contact in admin
	public function contact($action,$id=false){
		if(@$this->session->userdata['a_id']){
			switch($action){
				case 'view':
					$contact_data=$this->db->get("contact-form")->result_array();
					$page_data['page_title']="All Contact Query";
					$page_data['contact_data']=$contact_data;
					$page_data['page']="contact";
					$this->load->view('admin/index',$page_data);
					break;

				case 'delete':
					if($id){
						$this->db->where('id',$id);
					$this->db->delete('contact-form');
					redirect('admin/contact');
					}

			}
		}else{
			$page_data['page_title']="Login Admin";
		$this->load->view('admin/login',$page_data);

		}
	}

	//Product page in admin
	public function subcategory($action,$id=false){
		if(@$this->session->userdata['a_id']){
			switch ($action) {
				case 'view':
					// echo "View";
					$cproducts_data=$this->db->get("subcategories")->result_array();
					$page_data['page_title']="Our Subcategories";
					$page_data['scategory']=$cproducts_data;
					$page_data['page']="subcategory/view";
					$this->load->view('admin/index',$page_data);
					break;
					
				case 'add':
					if($this->input->post()){
						
						$data=array(
							
							"cproduct_name"=>$this->input->post('cp_name'),
							"subcat_name"=>$this->input->post('sc_name'),
							"sub_desc"=>$this->input->post('sc_desc'),
							"status"=>$this->input->post('sc_status'),
							"created_on"=>date('Y-m-d h:i:s'),
							"modified_on"=>date('Y-m-d h:i:s')

						);
					
						if($this->db->insert('subcategories',$data)){
							$page_data['message']="Successfully created.";
						}else{
							$page_data['message']="Problem occured while adding customer.";

						}
					}
					$page_data['page_title']="add Subcategory";
					$page_data['page']="subcategory/form";
					$page_data['action']="add";
					$catep_data=$this->db->get("category_product")->result_array();
					$page_data['catp']=$catep_data;
					$this->load->view('admin/index',$page_data);
				
					break;
				case 'edit':

					if($this->input->post()){
						
						$data=array(
						
							"cproduct_name"=>$this->input->post('cp_name'),
							"subcat_name"=>$this->input->post('sc_name'),
							"sub_desc"=>$this->input->post('sc_desc'),
							"status"=>$this->input->post('sc_status'),
							
							"modified_on"=>date('Y-m-d h:i:s')

						);
						
						$this->db->where('subcat_id',$id);
						$this->db->update('subcategories',$data);
					}
					$subcategory_data=$this->db->get_where('subcategories',array('subcat_id'=>$id))->result_array();
				
					$page_data['subcat_data']=$subcategory_data;
				
					$page_data['page_title']="Edit Subcategories";
					$page_data['page']="subcategory/form";
					$page_data['action']="edit";
					$catep_data=$this->db->get("category_product")->result_array();
					$page_data['catp']=$catep_data;

					$this->load->view('admin/index',$page_data);

					break;
				case 'delete':
					
					if($id){
						$this->db->where('subcat_id',$id);
						$this->db->delete('subcategories');
						redirect('admin/subcategory');
					}
					break;
				
				
				default:
					# code...
					break;
			}
		}else{
			$page_data['page_title']="Login Admin";
		$this->load->view('admin/login',$page_data);

		}
	}

	//Product page in admin
	public function plans($action,$id=false){
		if(@$this->session->userdata['a_id']){
			switch ($action) {
				case 'view':
					// echo "View";
					$cplans_data=$this->db->get("category_plans")->result_array();
					$page_data['page_title']="Our Plans";
					$page_data['cplans']=$cplans_data;
					$page_data['page']="plans/view";
					$this->load->view('admin/index',$page_data);
					break;
				case 'add':
					if($this->input->post()){
						$data=array(
							
							"cplan_name"=>$this->input->post('pl_name'),
							"cproduct_name"=>$this->input->post('cp_name'),
							"subcat_name"=>$this->input->post('subcat_name'),
							"cplan_desc"=>$this->input->post('pl_desc'),
							"cplan_price"=>$this->input->post('pl_price'),
							"status"=>$this->input->post('pl_status'),
							"created_on"=>date('Y-m-d h:i:s'),
							"modified_on"=>date('Y-m-d h:i:s')

						);
					
						if($this->db->insert('category_plans',$data)){
							$page_data['message']="Successfully created.";
						}else{
							$page_data['message']="Problem occured while adding customer.";

						}
					}
					$page_data['page_title']="add Plan";
					$page_data['page']="plans/form";
					$page_data['action']="add";
					$catep_data=$this->db->get("category_product")->result_array();
					$page_data['catp']=$catep_data;
						$this->db->select('subcat_name');
						$this->db->distinct();
						$subcategory_data= $this->db->get('subcategories')->result_array();
					// $subcategory_data=$this->db->get("subcategories")->result_array();
					$page_data['subcats']=$subcategory_data;
					$this->load->view('admin/index',$page_data);
				
					break;
				case 'edit':

					if($this->input->post()){
						
						$data=array(
						
							"cplan_name"=>$this->input->post('pl_name'),
							"cproduct_name"=>$this->input->post('cp_name'),
							"subcat_name"=>$this->input->post('subcat_name'),
							"cplan_desc"=>$this->input->post('pl_desc'),
							"cplan_price"=>$this->input->post('pl_price'),
							"status"=>$this->input->post('pl_status'),
							
							"modified_on"=>date('Y-m-d h:i:s')

						);
						
						
						$this->db->where('cplan_id',$id);
						$this->db->update('category_plans',$data);
					}
					$subcategory_data=$this->db->get_where('category_plans',array('cplan_id'=>$id))->result_array();
				
					$page_data['cplan_data']=$subcategory_data;
				
					$page_data['page_title']="Edit Plans";
					$page_data['page']="plans/form";
					$page_data['action']="edit";
					$catep_data=$this->db->get("category_product")->result_array();
					$page_data['catp']=$catep_data;
						$this->db->select('subcat_name');
						$this->db->distinct();
						$subcategory_data= $this->db->get('subcategories')->result_array();
					// $subcategory_data=$this->db->get("subcategories")->result_array();
					$page_data['subcats']=$subcategory_data;

					$this->load->view('admin/index',$page_data);

					break;
				case 'delete':
					
					if($id){
						$this->db->where('cplan_id',$id);
						$this->db->delete('category_plans');
						redirect('admin/plans');
					}
					break;
				
				
				default:
					# code...
					break;
			}
		}else{
			$page_data['page_title']="Login Admin";
		$this->load->view('admin/login',$page_data);

		}
	}

	//generate invoice
	public function generateinvoice($action,$id=false){
		if(@$this->session->userdata['a_id']){
			switch($action){
				case 'view':
					$page_data['invoice'] = $this->menu->admininvoiceview($id);
					$page_data['page_title'] = 'Generate Invoice';
					$page_data['page']="generateinvoice/view";
					$this->load->view('admin/index',$page_data);
					break;
				case 'add':
					if($this->input->post()){
						$order_id = $this->input->post('order_id');
						if(empty($this->input->post('id'))){
							$data = [
								'cust_name' =>$this->input->post('name'),
								'email_id' => $this->input->post('email'),
								'contact' =>$this->input->post('contact_login'),
								'address' =>$this->input->post('address'),
								'pincode' =>$this->input->post('pincode'),
								'created_on' => date('y-m-d'),
							];
							$this->db->insert('customer',$data);
						}
						
						$post = $this->input->post('Product');
						// echo '<pre>';
						// print_r($this->input->post());
						// echo '</pre>';
						for ($i = 0; $i < count($post); $i++) 
						{
							$datainvoice = [
								'contact' => $this->input->post('contact_login'),
								'order_id' => $this->input->post('order_id'),
								'product' => $this->input->post('Product')[$i],
								'qua' => $this->input->post('qua')[$i],
								'mrp' => $this->input->post('mrp')[$i],
								'discount' => $this->input->post('dis')[$i],
								'created_date' => date('y-m-d')
							];
							$QUERY = $this->db->insert('invoice',$datainvoice);
							
						}
						if($QUERY){
							$page_data['message'] = 'Invoice Submit Successfully';
							redirect('admin/generateinvoice/invoice/'.$order_id);
						}
						else{
							$page_data['message'] = 'Something went wrong. Please try again';
						}
					}
					$page_data['page_title'] = 'Add Invoice';
					$page_data['page']="generateinvoice/add";
					$this->load->view('admin/index',$page_data);
					break;
				case 'invoice':
					$page_data['invoice'] = $this->menu->admininvoice($id);
					$page_data['page']="generateinvoice/invoice";
					$this->load->view('admin/index',$page_data);
					break;
				case 'edit':
					break;
					case 'delete':
						$this->db->where('id',$id);
						$this->db->delete('invoice');
						redirect('admin/generateinvoice');
						break;
			}
		}else{
			$page_data['page_title']="Login Admin";
		$this->load->view('admin/login',$page_data);

		}
	}

	public function checkcontact(){
            $number = $this->input->post('contact');
                    $result=$this->menu->checklogin($number);
                    if(!empty($result)){
						$email=$result->email_id;
						$cid=$result->cust_id;
						$cname=$result->cust_name;
						$address=$result->address;
						$pincode=$result->pincode;
                    }else{
                        $page_data['message']="User not found";
						
                    }
           
        $data['email'] = $email ?? '';
		$data['cid'] = $cid ?? '';
		$data['cname'] = $cname ?? '';
		$data['address'] = $address ?? '';
		$data['pincode'] = $pincode ?? '';
		$data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }
	
		//generate quotation
		public function quotation($action,$id=false){
			if(@$this->session->userdata['a_id']){
				switch($action){
					case 'view':
						$page_data['invoice'] = $this->menu->adminquoview($id);
						$page_data['page_title'] = 'Generate Quotation';
						$page_data['page']="quotation/view";
						$this->load->view('admin/index',$page_data);
						break;
					case 'add':
						if($this->input->post()){
							$post = $this->input->post('Product');
							for ($i = 0; $i < count($post); $i++) 
							{
								$datainvoice = [
									'name' => $this->input->post('name'),
									'contact' => $this->input->post('contact_login'),
									'address' => $this->input->post('address'),
									'email' => $this->input->post('email'),
									'pincode' => $this->input->post('pincode'),
									'gst' => $this->input->post('gst'),
									'terms' => $this->input->post('terms'),
									'product' => $this->input->post('Product')[$i],
									'qty' => $this->input->post('qua')[$i],
									'mrp' => $this->input->post('mrp')[$i],
									'discount' => $this->input->post('dis')[$i],
									'created_date' => date('y-m-d')
								];
								$QUERY = $this->db->insert('quotation',$datainvoice);
								$last_id = $this->db->insert_id();
								$quo_id = $this->db->get_where('quotation',['id'=>$last_id])->row();
								$code = $quo_id->quo_code;
							}
							if($QUERY){
								$page_data['message'] = 'Invoice Submit Successfully';
								redirect('admin/quotation/invoice/'.$code);
							}
							else{
								$page_data['message'] = 'Something went wrong. Please try again';
							}
						}
						$page_data['page_title'] = 'Add Quotation';
						$page_data['page']="quotation/add";
						$this->load->view('admin/index',$page_data);
						break;
					case 'invoice':
						$page_data['invoice'] = $this->menu->adminquotation($id);
						$page_data['page_title'] = 'Quotation';
						$page_data['page']="quotation/invoice";
						$this->load->view('admin/index',$page_data);
						break;
					case 'generateinvoice':
						// if($this->session->userdata('cid')){
							$invoice_generate = $this->db->get_where('quotation',['quo_code'=>$id])->result_array();
							$quo_code = $invoice_generate[0]['quo_code'];
							$data = [
								'quo_code' => $id,
								'created_date' => date('y-m-d'),
								'name' =>  $invoice_generate[0]['name'],
							];
							$checkdata = $this->db->get_where('quotation_invoice',array('quo_code'=>$quo_code))->result_array();
							if(count($checkdata) == 0){
								$this->db->insert('quotation_invoice',$data);
							}
							$page_data['invoice'] = $this->menu->adminquoinvoice($id);
							$page_data['page_title'] = 'Generate Invoice';
							$page_data['page']="quotation/generateinvoice";
							$this->load->view('admin/index',$page_data);
							// }
							// else{
							// 	redirect(base_url());
							// }
					
						break;
					case 'invoicelist':
						$page_data['invoice'] = $this->db->get('quotation_invoice')->result_array();
						$page_data['page_title'] = 'Quotation Invoice List';
							$page_data['page']="quotation/invoicelist";
							$this->load->view('admin/index',$page_data);
						break;
					case 'edit':
						if($this->input->post()){
							$datainvoice = [
								'name' => $this->input->post('name'),
								'contact' => $this->input->post('contact_login'),
								'address' => $this->input->post('address'),
								'email' => $this->input->post('email'),
								'pincode' => $this->input->post('pincode'),
								'gst' => $this->input->post('gst'),
								'terms' => $this->input->post('terms'),
								'product' => $this->input->post('Product'),
								'qty' => $this->input->post('qua'),
								'mrp' => $this->input->post('mrp'),
								'discount' => $this->input->post('dis'),
								'created_date' => date('y-m-d')
							];
							$this->db->where('id',$id);
							$query = $this->db->update('quotation',$datainvoice);
							if($query){
								$page_data['message'] = 'Invoice Update Successfully';
							}
							else{
								$page_data['message'] = 'Something went wrong. Please try again';
							}
						}
						$page_data['invoice'] = $this->db->get_where('quotation',['id'=>$id])->row();
						$page_data['page_title'] = 'Edit Quotation';
								$page_data['page']="quotation/edit";
								$this->load->view('admin/index',$page_data);
							break;
					case 'delete':
							$this->db->where('id',$id);
							$this->db->delete('quotation');
							redirect('admin/quotation');
							break;
				}
			}else{
				$page_data['page_title']="Login Admin";
			$this->load->view('admin/login',$page_data);

			}
		}

	//Logout session
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin');
	}
	
			public function uploadimg($data)
			{
				// print_r($data);
					$config['upload_path']          = $data['upload_path'];
					$config['allowed_types']        = 'gif|jpg|png';
					$config['max_size']             = 400;
					$config['max_width']            = 1024;
					$config['max_height']           = 768;
	
					$this->load->library('upload', $config);
	
					if ( ! $this->upload->do_upload($data['name']))
					{
						print_r($this->upload->display_errors());
					}
					else
					{
						return $this->upload->data();
					}
			}

			public function uploadimg1($data)
			{
				// print_r($data);
					$config['upload_path']          = $data['upload_path'];
					$config['allowed_types']        = 'gif|jpg|png';
					$config['max_size']             = 400;
					$config['max_width']            = 1024;
					$config['max_height']           = 768;
	
					$this->load->library('upload', $config);
	
					if ( ! $this->upload->do_upload($data['name']))
					{
						print_r($this->upload->display_errors());
					}
					else
					{
						return $this->upload->data();
					}
			}

			public function uploadimg3($data)
			{
				// print_r($data);
					$config['upload_path']          = $data['upload_path'];
					$config['allowed_types']        = 'gif|jpg|png';
					$config['max_size']             = 400;
					$config['max_width']            = 1074;
					$config['max_height']           = 768;
	
					$this->load->library('upload', $config);
	
					if ( ! $this->upload->do_upload($data['name']))
					{
						print_r($this->upload->display_errors());
					}
					else
					{
						return $this->upload->data();
					}
			}

			public function uploadimg4($data)
			{
				// print_r($data);
					$config['upload_path']          = $data['upload_path'];
					$config['allowed_types']        = 'gif|jpg|png';
					$config['max_size']             = 400;
					$config['max_width']            = 1074;
					$config['max_height']           = 768;
	
					$this->load->library('upload', $config);
	
					if ( ! $this->upload->do_upload($data['name']))
					{
						print_r($this->upload->display_errors());
					}
					else
					{
						return $this->upload->data();
					}
			}

			public function uploadimgbanner1($data)
			{
				// print_r($data);
					$config['upload_path']          = $data['upload_path'];
					$config['allowed_types']        = 'gif|jpg|png';
					$config['max_size']             = 500;
					$config['max_width']            = 1074;
					$config['max_height']           = 768;
	
					$this->load->library('upload', $config);
	
					if ( ! $this->upload->do_upload($data['name']))
					{
						print_r($this->upload->display_errors());
					}
					else
					{
						return $this->upload->data();
					}
			}

			public function uploadimgbanner2($data)
			{
				// print_r($data);
					$config['upload_path']          = $data['upload_path'];
					$config['allowed_types']        = 'gif|jpg|png';
					$config['max_size']             = 500;
					$config['max_width']            = 1074;
					$config['max_height']           = 768;
	
					$this->load->library('upload', $config);
	
					if ( ! $this->upload->do_upload($data['name']))
					{
						print_r($this->upload->display_errors());
					}
					else
					{
						return $this->upload->data();
					}
			}

			public function uploadimgbanner3($data)
			{
				// print_r($data);
					$config['upload_path']          = $data['upload_path'];
					$config['allowed_types']        = 'gif|jpg|png';
					$config['max_size']             = 500;
					$config['max_width']            = 1074;
					$config['max_height']           = 768;
	
					$this->load->library('upload', $config);
	
					if ( ! $this->upload->do_upload($data['name']))
					{
						print_r($this->upload->display_errors());
					}
					else
					{
						return $this->upload->data();
					}
			}
}
