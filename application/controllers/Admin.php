<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	 
	 function __construct()
	 {
		parent::__construct();
		$this->load->model('Menu','menu',true);
		// if(!$this->session->userdata('a_id')){
		// 	redirect(base_url('admin')); 
		// }

	 }
	public function index()
	{
		
		if(@$this->input->post()){
			$email=$this->input->post('email');
			$password=sha1($this->input->post('password'));
			$result=$this->db->get_where('admin',array('email_id'=>$email,'password'=>$password,'status'=>'active'))->result_array();
			// print_r($result);
			$aid=$result[0]['admin_id'];
			$aemail=$result[0]['email_id'];
			$this->session->set_userdata('a_id',$aid);
			$this->session->set_userdata('e_id',$aemail);
		
		}
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

	//Customer page in admin
	public function customer($action,$id=false){
		switch ($action) {
			case 'view':
				// echo "View";
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
	}
	public function amc($action,$id=false){
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
	}

	public function one_time_service($action,$id=false){
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
			
				$page_data['page_title']="Edit bookings";
				$page_data['page']="one_time_service/form";
				$page_data['action']="edit";

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
	}

	//Bookings Page in Admin
	public function bookings($action,$id=false){
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
	}


	//Engineer page in admin
	public function engineer($action,$id=false){
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
	}



	//Category page in admin
	public function category($action,$id=false){
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
	}
	public function plans_features($action,$id="false"){
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

	}

	//product features in admin
	public function product_features($action,$id='false'){
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
	}

	//product benefits in admin
	public function product_benefit($action,$id='false'){
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
	}

	//Product page in admin
	public function category_products($action,$id=false){
		switch ($action) {
			case 'view':
				// echo "View";
				$cproducts_data=$this->db->get("category_product")->result_array();
				$page_data['page_title']="Our Category Products";
				$page_data['cproducts']=$cproducts_data;
				$page_data['page']="category_products/view";

				// $this->db->select('*');
				// $this->db->from('articles');
				// $this->db->join('category', 'category.category_name = category_product.category_name','left');
				// $this->db->get_where('category','category_category_name = category_product.category_name')->result_array();
				
				
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
	}

	//testimonial 
	public function testimonial($action,$id=false){
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
	}

	//our client in admin
	public function client($action,$id=false){
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
	}

	//blog in admin
	public function blog($action,$id=false){
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
							$page_data['message']="Problem occured while adding customer.";
	
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
	}

	//Product page in admin
	public function subcategory($action,$id=false){
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
	}

	//Product page in admin
	public function plans($action,$id=false){
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
	}
	
		// public function plans_features($action,$id=false){
		// 	switch ($action){
		// 		case 'view':
		// 			// echo "View";
		// 			$cfeatures_data=$this->db->get("plan_features")->result_array();
		// 			$page_data['page_title']="Plan Features";
		// 			$page_data['cfeatures']=$cfeatures_data;
		// 			$page_data['page']="plans_features/view";
		// 			$this->load->view('admin/index',$page_data);
		// 			break;
		// 	}
		// }
	//file upload
	
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
}
