<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
	 * */
	
	public function index()
	{
		
		if($this->input->post()){
			$email=$this->input->post('email');
			$password=sha1($this->input->post('password'));
			$result=$this->db->get_where('admin',array('email_id'=>$email,'password'=>$password,'status'=>'active'))->result_array();
			// print_r($result);
			$aid=$result[0]['admin_id'];
			$aemail=$result[0]['email_id'];
			$this->session->set_userdata('a_id',$aid);
			$this->session->set_userdata('e_id',$aemail);
		
		}
		if($this->session->userdata['a_id']){
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
			case 'active':
				echo "ID:".$id."";
				echo "active";
				break;
			case 'inactive':
				echo "ID:".$id."";
				echo "inactive";
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
				}
				$bookings_data=$this->db->get_where('bookings',array('request_id'=>$id))->result_array();
			
				$page_data['book_data']=$bookings_data;
				$catep_data=$this->db->get("category_product")->result_array();
				$page_data['catp']=$catep_data;
				$plans_data=$this->db->get("category_plans")->result_array();
				$page_data['plans']=$plans_data;
				$page_data['page_title']="Edit bookings";
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
			case 'active':
				echo "ID:".$id."";
				echo "active";
				break;
			case 'inactive':
				echo "ID:".$id."";
				echo "inactive";
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
			case 'active':
				echo "ID:".$id."";
				echo "active";
				break;
			case 'inactive':
				echo "ID:".$id."";
				echo "inactive";
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
			case 'active':
				echo "ID:".$id."";
				echo "active";
				break;
			case 'inactive':
				echo "ID:".$id."";
				echo "inactive";
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
				if($this->input->post()){
					
					$data=array(
						"category_name"=>$this->input->post('ct_name'),
						"cproduct_name"=>$this->input->post('cp_name'),
						"cproduct_desc"=>$this->input->post('cp_desc'),
						"status"=>$this->input->post('cp_status'),
						"created_on"=>date('Y-m-d h:i:s'),
						"modified_on"=>date('Y-m-d h:i:s')

					);
				
					if($this->db->insert('category_product',$data)){
						$page_data['message']="Successfully created.";
					}else{
						$page_data['message']="Problem occured while adding customer.";

					}
				}
				$page_data['page_title']="add Category";
				$page_data['page']="category_products/form";
				$page_data['action']="add";
				$categ_data=$this->db->get("category")->result_array();
				$page_data['cato']=$categ_data;

				$this->load->view('admin/index',$page_data);
			
				break;
			case 'edit':
				
				if($this->input->post()){
					if($_FILES['cp_photo']['name']!= ""){
								$absolute_path=base_url('uploads/category/');
						$uploaded_data=$this->uploadimg(array('upload_path'=>'./uploads/category/','name'=>'cp_photo'));
					}
					
					$data=array(
						"category_name"=>$this->input->post('ct_name'),
						"cproduct_name"=>$this->input->post('cp_name'),
						"cproduct_desc"=>$this->input->post('cp_desc'),
						"status"=>$this->input->post('cp_status'),
						
						"modified_on"=>date('Y-m-d h:i:s')

					);

					if(count($uploaded_data)>=1){
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
			case 'active':
				echo "ID:".$id."";
				echo "active";
				break;
			case 'inactive':
				echo "ID:".$id."";
				echo "inactive";
				break;
			
			default:
				# code...
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
			case 'active':
				echo "ID:".$id."";
				echo "active";
				break;
			case 'inactive':
				echo "ID:".$id."";
				echo "inactive";
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
			case 'active':
				echo "ID:".$id."";
				echo "active";
				break;
			case 'inactive':
				echo "ID:".$id."";
				echo "inactive";
				break;
			
			default:
				# code...
				break;
		}
	}
	

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
}

