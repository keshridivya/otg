<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Engineer extends CI_Controller {
    public function __construct()
    {
    parent::__construct();
    $this->load->library(array('form_validation','session'));
    $this->load->helper(array('url','html','form'));
    $this->load->model('Menu','menu',true);
    // if($this->session->userdata['eng_id']){
    //     redirect(base_url('engineer/pages/dashboard'));
    // }
    // else{
    //     redirect(base_url('engineer'));
    // }
    }

    public function index(){
        $page_data=[];
        $ch = $this->input->post('ch');
        echo $ch;
        if(@$this->input->post()){
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_message('required', 'Enter %s');
            if (@$this->form_validation->run() === false)
            {  
                $this->load->view('engineer/login');
            }
            else
            {
            $email=$this->input->post('email');
            $password=sha1($this->input->post('password'));
            $query=$this->db->get_where('engineer',array('email_id'=>$email,'password'=>$password,'status'=>'active'))->result_array();
            if(!$query){
                $page_data['message']='Username and Password is not correct';
            }else{
                $eid=$query[0]['eng_id'];
                $ename=$query[0]['eng_name'];
                $email=$query[0]['email_id'];
                $this->session->set_userdata('eng_id',$eid);
                $this->session->set_userdata('e_name',$ename);
                $this->session->set_userdata('e_mail',$email);
            }
            }
        }
        if($this->session->userdata('eng_id')){
            $bookings_table=$this->db->get("bookings")->result_array();
			$page_data['bookings']=$bookings_table;
            $page_data['page']="dashboard";
            $this->load->view('engineer/index',$page_data);
        }else{
            $this->load->view('engineer/login',$page_data);
        }
    }

    public function myaccount(){
        if($this->session->userdata('eng_id')){
            $id=$this->session->userdata('eng_id');
            if(@$this->input->post()){
                if($_FILES['file']['name']!= ""){
                    $absolute_path=base_url('uploads/engineer/');
            $uploaded_data=$this->uploadimg(array('upload_path'=>'./uploads/engineer/','name'=>'file'));
            }
                $data=array(
                    'address'=>$this->input->post('address'),
                'postcode'=>$this->input->post('pincode'),
                'city'=>$this->input->post('city'),
                );
                if(is_countable($uploaded_data) && count($uploaded_data)>=1){
                    $data['eng_img']='uploads/engineer/'.$uploaded_data['file_name'];
                }

                $this->db->where('eng_id',$id);
                $this->db->update('engineer',$data);
            }
            $page_data['info']=$this->db->get_where('engineer',array('eng_id'=>$id))->result_array();
            $page_data['page']='myaccount';
            $this->load->view('engineer/index',$page_data);
        }else{
            redirect(base_url('engineer'));
            }
    }

    public function ongoing($action,$id= false){
        if($this->session->userdata('eng_id')){
        switch($action){
            case 'view':
                $id=$this->session->userdata['eng_id'];
                $page_data['booking_data']=$this->menu->ongoing_assign($id);
                $page_data['page'] = 'ongoing_assign/view';
                $this->load->view('engineer/index',$page_data);
                break;
            case 'edit':
                
                if($this->input->post()){
                   
                    $dataInfo = array();
                    $files = $_FILES;
                    $rid=$this->input->post('r_id');
                    $breq_id = $this->input->post('request_id');
                    if($_FILES['image1']['name']!= ""){
                        $absolute_path=base_url('uploads/eng_client/');
                        $uploaded_data1=$this->uploadimg1(array('upload_path'=>'./uploads/eng_client/','name'=>'image1'));
                    }
                    if($_FILES['image2']['name']!= ""){
                        $absolute_path=base_url('uploads/eng_client/');
                        $uploaded_data2=$this->uploadimg2(array('upload_path'=>'./uploads/eng_client/','name'=>'image2'));
                    }
                    if($_FILES['image3']['name']!= ""){
                        $absolute_path=base_url('uploads/eng_client/');
                        $uploaded_data3=$this->uploadimg3(array('upload_path'=>'./uploads/eng_client/','name'=>'image3'));
                    }
                    if($_FILES['image4']['name']!= ""){
                        $absolute_path=base_url('uploads/eng_client/');
                        $uploaded_data4=$this->uploadimg4(array('upload_path'=>'./uploads/eng_client/','name'=>'image4'));
                    }
                    if($_FILES['image5']['name']!= ""){
                        $absolute_path=base_url('uploads/eng_client/');
                        $uploaded_data5=$this->uploadimg5(array('upload_path'=>'./uploads/eng_client/','name'=>'image5'));
                    }
                    
                    $data=array(
                        'customer_id'=>$this->input->post('c_id'),
                        'customer_name'=>$this->input->post('c_name'),
                        'engineer_id'=>$this->input->post('e_id'),
                        'engineer_name'=>$this->input->post('e_name'),
                        'booking_request_id'=>$this->input->post('request_id'),
                        'additional_text_1'=>$this->input->post('additional_text_1'),
                        'additional_text_2'=>$this->input->post('additional_text_2'),
                        'additional_text_3'=>$this->input->post('additional_text_3'),
                        'additional_text_4'=>$this->input->post('additional_text_4'),
                        'additional_text_5'=>$this->input->post('additional_text_5'),
                        'status'=>'completed',
                        'created_date'=>date('y/m-d h:i:a'),
                    );

                    if(is_countable($uploaded_data1) && count($uploaded_data1)>=1){
                        $data['image1']='uploads/eng_client/'.$uploaded_data1['file_name'];
                    }
                    if(is_countable($uploaded_data2) && count($uploaded_data2)>=1){
                        $data['image2']='uploads/eng_client/'.$uploaded_data2['file_name'];
                    }
                    if(is_countable($uploaded_data3) && count($uploaded_data3)>=1){
                        $data['image3']='uploads/eng_client/'.$uploaded_data3['file_name'];
                    }
                    if(is_countable($uploaded_data4) && count($uploaded_data4)>=1){
                        $data['image4']='uploads/eng_client/'.$uploaded_data4['file_name'];
                    }
                    if(is_countable($uploaded_data5) && count($uploaded_data5)>=1){
                        $data['image5']='uploads/eng_client/'.$uploaded_data5['file_name'];
                    }
                    if(!empty($_FILES['image6']['name'])){
                        
                        $number_of_file = sizeof($_FILES['image6']['tmp_name']);
                        $file = $_FILES['image6'];

                        $files = array();

                        // Faking upload calls to $_FILE
                        for ($i = 0; $i < $number_of_file; $i++) {

                            $_FILES['image6']['name']     = $file ['name'][$i];
                            $_FILES['image6']['type']     = $file ['type'][$i];
                            $_FILES['image6']['tmp_name'] = $file ['tmp_name'][$i];
                            $_FILES['image6']['error']    = $file ['error'][$i];
                            $_FILES['image6']['size']     = $file ['size'][$i];

                            $config['upload_path'] = './uploads/eng_client/'; 
                            $config['allowed_types'] = 'gif|jpg|png';
                            $this->upload->initialize($config);
                            $this->upload->do_upload('image6');
                            $files[] = $this->upload->data('file_name');

                            $data['imageloop']= implode(",",$files);
                        print_r($data);
                    }
                    }
                    if($this->db->insert('engineer_client',$data)){
                        $data1=array(
                            'status'=>'process',
                            'modified_on'=>date('y-m-d'),
                        );
                        $this->db->where('request_id_value',$breq_id);
                        $this->db->update('bookings',$data1);
                        print_r($this->db->last_query());
                        $page_data['message'] = 'Submitted Succesfully';
                        $data1['procees']='proceed';
                        redirect('engineer/ongoing/add/'.$rid);
                        
                    }
                    else{
                        $page_data['message']='Something Went Wrong';
                    }
                }else{
                $eid=$this->session->userdata['eng_id'];
                $page_data['assign_data']=$this->menu->ongoing_assign_client($id,$eid);
                $page_data['page']='ongoing_assign/form';
                $this->load->view('engineer/index',$page_data);
                }
                break;
            case 'add':
                if($this->input->post()){
                    $data = array(
                        'device_modal' => $this->input->post('device_modal'),
                        'booking_status' => $this->input->post('booking_status'),
                        'payment_method' => $this->input->post('payment_method'),
                        'additional_expens' => $this->input->post('additional_expens'),
                        'additional' => $this->input->post('additional'),
                        'addon' => $this->input->post('addon'),
                        'comment' => $this->input->post('comment'),
                        'expenses' => $this->input->post('expenes'),
                        'advance_amount' => $this->input->post('advance_payment'),
                        'visiting_charges' => $this->input->post('visiting_card'),
                        'customer_name' => $this->input->post('customer_name'),
                        'service_type' => $this->input->post('service_type'),
                        'service_device' => $this->input->post('service_device'),
                        'service_plan' => $this->input->post('service_plan'),
                        'request_id' => $this->input->post('request_id'),
                        'engineer_name' => $this->input->post('eng_name'),
                        'payment_case_online' => $this->input->post('case_payment'),
                        'button' => $this->input->post('btn_name'),
                        'org_amount' => $this->input->post('total_amount'),
                        'total_amount' => $this->input->post('expenes'),
                        'created_on' => date('y-m-d'),
                        'reschedule_date'=>$this->input->post('reschedule_ddate'),
                    );
                    $case_payment=$this->input->post('case_payment');
                    $insert = $this->menu->createData($data);
                    $req_id=$this->input->post('request_id');
                    $btn_name=$this->input->post('btn_name');
                    if($btn_name=='Reschedule'){
                        $data1=array(
                            'status'=>'pending',
                            'modified_on'=>date('y-m-d'),
                        );
                        $this->db->where('request_id_value',$req_id);
                        $this->db->update('bookings',$data1);
                    }
                    else if($btn_name=='Generate'){
                        $data1=array(
                            'status'=>'completed',
                            'modified_on'=>date('y-m-d'),
                        );
                        $this->db->where('request_id_value',$req_id);
                        $this->db->update('bookings',$data1);
                    }
                    else if($btn_name=='close'){
                        $data1=array(
                            'status'=>'close',
                            'modified_on'=>date('y-m-d'),
                        );
                        $this->db->where('request_id_value',$req_id);
                        $this->db->update('bookings',$data1);
                    }
                    else{
                        $data1=array(
                            'status'=>'close',
                            'modified_on'=>date('y-m-d'),
                        );
                        $this->db->where('request_id_value',$req_id);
                        $this->db->update('bookings',$data1);
                       
                    }
                    if($insert){
                        $page_data['message']='Successfully Submitted';
                        if($case_payment == 'online-199'){
                            redirect('engineer/engineerupi');
                        }
                        else{
                        }
                    }
                    else{
                        $page_data['message']='Something Went Wrong';
                    }
                }
                $eid=$this->session->userdata['eng_id'];
                $page_data['assign_data']=$this->menu->ongoing_assign_client_detail($id,$eid);
                $page_data['submit_data']=$this->menu->check_upload($id,$eid);
                $page_data['page']='ongoing_assign/add';
                $this->load->view('engineer/index',$page_data);
        }
    }else{
        redirect(base_url('engineer'));
        }

    }

    public function complete_assignment($action,$id= false,$eid=false){

        switch($action){
            case 'view':
                $id=$this->session->userdata['eng_id'];
                // $page_data['booking_data']=$this->menu->ongoing_assign($id,$eid);
                $page_data['page']='complete_assignment/view';
                $this->load->view('engineer/index',$page_data);
                break;
            case 'edit':
            
                break;
            case 'add':
             break;
        }

    }

    public function reschedule($action,$id=false){
        if($this->session->userdata('eng_id')){
		switch ($action) {
			case 'view':
			
				$id=$this->session->userdata['eng_id'];
                $page_data['booking_data']=$this->menu->reschedule($id);
                $page_data['page']='reschedule/view';
                $this->load->view('engineer/index',$page_data);

				break;

			case 'edit':

				break;
			case 'delete':
				break;
			
			default:
				# code...
				break;
		}
        }else{
            redirect(base_url('engineer'));
            }
	}

    public function engineerupi($action,$id=false){
        if($this->session->userdata('eng_id')){
		switch ($action) {
			case 'view':
			
				$id=$this->session->userdata['eng_id'];
                $page_data['page']='ongoing_assign/upi';
                $this->load->view('engineer/index',$page_data);

				break;
		}
        }else{
            redirect(base_url('engineer'));
            }
	}

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('engineer'));
    }

    //upload img
    public function uploadimg($data)
			{
				// print_r($data);
					$config['upload_path']          = $data['upload_path'];
					$config['allowed_types']        = 'gif|jpg|png|jpeg';
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

            public function uploadimg1($data){
                $config['upload_path'] =$data['upload_path'];
                $config['allowed_types']='gif|jpg|png|jpeg';
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload($data['name']))
                {
                    print_r($this->upload->display_errors());
                }
                else
                {
                    return $this->upload->data();
                }
            }
            public function uploadimg2($data){
                $config['upload_path'] =$data['upload_path'];
                $config['allowed_types']='gif|jpg|png|jpeg';
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload($data['name']))
                {
                    print_r($this->upload->display_errors());
                }
                else
                {
                    return $this->upload->data();
                }
            }
            public function uploadimg3($data){
                $config['upload_path'] =$data['upload_path'];
                $config['allowed_types']='gif|jpg|png|jpeg';
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload($data['name']))
                {
                    print_r($this->upload->display_errors());
                }
                else
                {
                    return $this->upload->data();
                }
            }
            public function uploadimg4($data){
                $config['upload_path'] =$data['upload_path'];
                $config['allowed_types']='gif|jpg|png|jpeg';
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload($data['name']))
                {
                    print_r($this->upload->display_errors());
                }
                else
                {
                    return $this->upload->data();
                }
            }
            public function uploadimg5($data){
                $config['upload_path'] =$data['upload_path'];
                $config['allowed_types']='gif|jpg|png|jpeg';
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload($data['name']))
                {
                    print_r($this->upload->display_errors());
                }
                else
                {
                    return $this->upload->data();
                }
            }
            // public function uploadimgloop($data){
            //     $config['upload_path'] =$data['upload_path'];
            //     $config['allowed_types']='gif|jpg|png|jpeg';
            //     $this->load->library('upload',$config);
            //     if(!$this->upload->do_upload($data['name']))
            //     {
            //         print_r($this->upload->display_errors());
            //     }
            //     else
            //     {
            //         return $this->upload->data();
            //     }
            // }
           
}
