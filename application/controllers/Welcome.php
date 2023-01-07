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

	 
	public function index()

	{
		
		$page_data['page_title']="Home";

		$page_data['page']="home";
		$this->load->view('index',$page_data);
	}
	public function about_us()
	{
		$page_data['page_title']="About Us";

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
			
				$page_data['bookings_table']=$bookings_table;
				$page_data['page']="account";
				$this->load->view('index',$page_data);
			}else{
				$page_data['page']="sign_up";
				$page_data['message']="";
				$this->load->view('index',$page_data);

			}
			
		}
		elseif ($this->input->post('submit') == 'register' || $this->session->userdata('custid') ){
			
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
												'rules' => 'required|valid_email'
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
						$page_data['bookings_table']=$bookings_table;
						$page_data['page']="account";
					
					$this->load->view('index',$page_data);
				}else{
					$page_data['page']="sign_up";
					$page_data['message']="";
					$this->load->view('index',$page_data);
	
				}
				

			
		}
		
		else{
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
		$page_data['page']="maintenance";
		$this->load->view('index',$page_data);
	}
	public function services()
	{
		$page_data['page_title']="Our Services";
		$product_data=$this->db->get_where('category_product',array('category_name'=>'Maintenance and repair'))->result_array();
		$page_data['product_data']=$product_data;
		$page_data['page']="services";
		$this->load->view('index',$page_data);
	}
	public function account()
	{
		if($this->session->userdata('cid') || $this->session->userdata('custid')){
				
			$page_data['page_title']="My Account";
			$page_data['page']="account";
			$this->load->view('index',$page_data);
		}else{
			$page_data['page']="sign_up";
				$page_data['message']="";
				$this->load->view('index',$page_data);
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('sign-up'));
	}
	
}
