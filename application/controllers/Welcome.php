<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

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
		$page_data['page_title']="Home";
		$page_data['page']="home";
		$page_data['testimonial']=$testimonial;
		$page_data['client']=$client;
		$this->load->view('index',$page_data);
	}
	// public function head(){
	// 	$this->load->view('')
	// }
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
		
		
		if ($this->input->post('submit') == 'login' || $this->session->userdata('cid')){
			// echo "login page";
			$this->form_validation->set_rules('userid','User Id','required');

			$this->form_validation->set_rules('pwd','Password','required');
			$this->form_validation->set_error_delimiters('<div class="error-div text-danger">','</div>');
			if($this->form_validation->run()){
			
				$userid=$this->input->post('userid');
				$pwd=sha1($this->input->post('pwd'));
				$result=$this->db->get_where('customer',array('email_id'=>$userid,'password'=>$pwd))->result_array();
				if(count($result)>0){
					$cid=$result[0]['cust_id'];
					$cemail=$result[0]['email_id'];
					$this->session->set_userdata('cid',$cid);
					$this->session->set_userdata('cemail',$cemail);
				}else{
					$page_data['message']="User not found";

				}
				
			}else{
				// echo validation_errors();
			}
			
			if($this->session->userdata['cid']){
				$session_cust=$this->session->userdata['cid'];
				$customers_table=$this->db->get_where("customer",array('cust_id'=>$session_cust))->result_array();
				$page_data['customers']=$customers_table;
				$bookings_table=$this->db->get_where('bookings',array('cust_id'=>$session_cust))->result_array();
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
		elseif ($this->input->post('submit') == 'register' || $this->session->userdata('custid') ){
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
												'field' => 'password',
												'label' => 'Password',
												'rules' => 'required',
												
										),
										array(
												'field' => 'email_id',
												'label' => 'Email',
												'rules' => 'required|valid_email|is_unique[customer.email_id]'
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
					
					if($this->db->insert('customer',$data)){
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
						// print_r($customers_login);
						$custid=$customers_login[0]['cust_id'];
						$custemail=$customers_login[0]['email_id'];
						
						$this->session->set_userdata('custid',$custid);
						$this->session->set_userdata('custemail',$custemail);
						
					}else{
						$page_data['message']="Problem occured while creating account.";
		
					}
					
					
					
				}else{
					// echo validation_errors();
					
				}
				
				
	
				if($this->session->userdata['custid']){
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
		
		else{
			$page_data['dropdown']=$this->menu->menu_all();
				$page_data['page_title']="Sign Up";
				$page_data['message']="";
				$page_data['page']="sign_up";
				$this->load->view('index',$page_data);
		}
		
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
			$page_data['dropdown']=$this->menu->menu_all();
			$page_data['page_title']="My Account";
			$page_data['page']="account";
			$this->load->view('index',$page_data);
		}
		//if user register while checking out
		elseif($this->session->userdata('newid')){
			$session_cust=$this->session->userdata('newid');
			$customers_table=$this->db->get_where("customer",array('cust_id'=>$session_cust))->result_array();
			$page_data['dropdown']=$this->menu->menu_all();
			$page_data['customers']=$customers_table;
			$page_data['page_title']="My Account";
			$page_data['page']="account";
			$this->load->view('index',$page_data);
		}
		else{
			$page_data['dropdown']=$this->menu->menu_all();
			$page_data['page']="sign_up";
				$page_data['message']="";
				$this->load->view('index',$page_data);
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
				redirect(base_url('summery'));
			}

		}//if user registered
		elseif($this->session->userdata('custid')){
			$page_data['cartItems']=$this->cart->contents();

			$session_cust=$this->session->userdata['custid'];
			
			$ex_cust=$this->db->get_where("customer",array('cust_id'=>$session_cust))->result_array();
				if($this->input->post()){
				redirect(base_url('summery'));
			}

		}//user added to cart without logging in
		else{
			$page_data['cartItems']=$this->cart->contents();
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
		}elseif($this->session->userdata('custid')){
			$session_cust=$this->session->userdata('custid');
			$customers_table=$this->db->get_where("customer",array('cust_id'=>$session_cust))->result_array();
			$page_data['customers']=$customers_table;
		}
		else{
			$session_cust=$this->session->userdata('newid');
			$customers_table=$this->db->get_where("customer",array('cust_id'=>$session_cust))->result_array();
			$page_data['customers']=$customers_table;	
		}
		$page_data['cartItems']=$this->cart->contents();
		if($this->input->post()){
				$data=array(
					"cust_id"=>$this->input->post('customer_id'),
					"cust_name"=>$this->input->post('c_name'),
					"service_plan"=>$this->input->post('s_plan'),

					"service_device"=>$this->input->post('s_device'),
					"quantity"=>$this->input->post('quantity'),
					"total_amount"=>$this->input->post('t_amnt'),
					"status"=>'new',
					"created_on"=>date('Y-m-d h:i:s')
				

				);
							
				$customer_email=$this->db->get_where("customer",array('cust_id'=>$data['cust_id']))->result_array();
					// print_r($customer_email);
					// print_r($customer_email['email_id']);
				if($this->db->insert('bookings',$data)){
					$page_data['message']="Successfully created.";
						
					$booking_data=$this->db->get_where("bookings",array('cust_id'=>$data['cust_id'],'created_on'=>$data['created_on'],'status'=>$data['status']))->result_array();
						// print_r($customers_login);
						$reqid=$booking_data[0]['request_id'];
						
						
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
			$new_booking=$this->db->get_where("bookings",array('request_id'=>$reqid))->result_array();
			$cust_mail=$this->db->get_where("customer",array('cust_id'=>$new_booking[0]['cust_id']))->result_array();
							
						$this->load->library('email');
						$this->email->from('mywebsiteauth1@gmail.com','OTG Cares');
						$this->email->to($cust_mail[0]['email_id']);
						$this->email->subject("New Service Booked");
						$this->email->message("Thank you for your order"." ".$new_booking[0]["cust_name"]."\r\n"."Request Id"." ".$new_booking[0]["new_request_id"]."\r\n"."Order Details"."\r\n"."Order Id".$new_booking[0]['request_id']."\r\n"."Your name: ".$new_booking[0]['cust_name']."\r\n"."Service: ".$new_booking[0]['service_plan']." for ".$new_booking[0]['service_device']."\r\n"."Charges: &#8377;".$new_booking[0]['total_amount']);
						$this->email->set_newline("\r\n");
						$this->email->send();
						if($this->email->send()){
							show_error($this->email->print_debugger());
						}
						else{
							$page_data['message']="Problem occured while email notification";
						}
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
	$page_data['dropdown']=$this->menu->menu_all();
	$page_data['page_title']="Contact Us";
	$page_data['page']="contact";
	$this->load->view('index',$page_data);
}

}
