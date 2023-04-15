<?php

defined('BASEPATH') OR exit('no direct script access allowed');

class Shop extends CI_Controller{
    public function __construct()
    {
    parent::__construct();
    $this->load->library(array('form_validation','session'));
    $this->load->helper(array('url','html','form'));
    $this->load->model('Menu','menu',true);
    }

    //index
    public function index(){
        // if(@$this->input->post()){
        //     $this->form_validation->set_rules('email','Email','required');
        //     $this->form_validation->set_rules('password','Password','required');
        //     $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        //     $this->form_validation->set_message('required', 'Enter %s');
        //     if($this->form_validation->run() === false){
        //         $this->load->view('shop/login');
        //     }else{
        //         $email = $this->input->post('email');
        //         $password = sha1($this->input->post('password'));
        //         $query = $this->db->get_where('shop_owner',['email_id'=>$email,'password'=>$password,'status'=>'active'])->row();
        //         if(!$query){
        //             $page_data['message'] = 'Username and Password is not correct';
        //             $this->load->view('shop/login',$page_data);
        //         }
        //         else{
        //             $this->session->set_userdata('sid',$query->shop_id );
        //             $this->session->set_userdata('semail',$query->email_id);
        //             $this->session->set_userdata('sname',$query->name);

        //             set_cookie('sid',$query->shop_id,time()+60*60*24*90);
        //             set_cookie('semail',$query->email_id,time()+60*60*24*90);
        //             set_cookie('sname',$query->name,time()+60*60*24*90);
        //         }
        //     }
        // }
        if(@$_COOKIE['sid']){
            $id = get_cookie('sid');
            $page_data['all'] = $this->menu->warranty($id);
            $page_data['geyser'] = $this->menu->geyser($id);
            $page_data['laptop'] = $this->menu->laptop($id);
            $page_data['ac'] = $this->menu->ac($id);
            $page_data['page_title'] = 'Dashboard';
            $page_data['page']="dashboard";
            $this->load->view('shop/index',$page_data);
        }
        else{
        $this->load->view('shop/login');
        }
    }

    public function regloginotp(){
        if($this->input->post('number')){
            $this->load->helper('msg');
            $number = $this->input->post('number');
            $result=$this->db->get_where('shop_owner',array('contact'=>$number))->result_array();
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
                $otp = '';
            }
            
        }
        $this->session->set_userdata('login_otp',$otp);
        $data['otp'] = $otp_resu;
        $data['otp1'] = $otp;
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function loginverify(){
        if($this->input->post('loginotp')){
            $loginotp=$this->input->post('loginotp');
            $number = $this->input->post('number');
            if($this->session->userdata['login_otp'] == $loginotp){
                $otp = 'success';
                $result=$this->db->get_where('shop_owner',array('contact'=>$number))->row();
                if(!empty($result)){
                    $this->session->set_userdata('sid',$result->shop_id );
                    $this->session->set_userdata('semail',$result->email_id);
                    $this->session->set_userdata('sname',$result->name);

                    set_cookie('sid',$result->shop_id,time()+60*60*24*90);
                    set_cookie('semail',$result->email_id,time()+60*60*24*90);
                    set_cookie('sname',$result->name,time()+60*60*24*90);
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
    //regis
    public function registration(){
        if($this->input->post()){
            $contact = $this->input->post('contact');
            $data=array(
                "name"=>$this->input->post('name'),
                "contact"=>$this->input->post('contact'),
                "email_id"=>$this->input->post('email'),
                "status"=>'active',
                "address"=>$this->input->post('address'),
                "pincode"=>$this->input->post('pincode'),
                "city"=>$this->input->post('city'),
                "created_on"=>date('Y-m-d h:i:s')
            );
            if($this->db->insert('shop_owner',$data)){
                $page_data['message']="Successfully created.";
                $query = $this->db->get_where('shop_owner',['contact'=>$contact,'status'=>'active'])->row();

                $this->session->set_userdata('sid',$query->shop_id );
                $this->session->set_userdata('semail',$query->email_id);
                $this->session->set_userdata('sname',$query->name);

                set_cookie('sid',$query->shop_id,time()+60*60*24*90);
                set_cookie('semail',$query->email_id,time()+60*60*24*90);
                set_cookie('sname',$query->name,time()+60*60*24*90);
                       
            }else{
                $page_data['message']="Problem occured while adding customer.";
            }
        }
        if($this->session->userdata('sid') || get_cookie('sid')){
            redirect('shop/');
        }
        else{
            $this->load->view('shop/registration');
        }
    }

    // registration otp
    public function otp(){

        if($this->input->post('number')){
            $this->load->helper('msg');
            $number = $this->input->post('number');
            $result=$this->db->get_where('shop_owner',array('contact'=>$number))->result_array();
            if (count($result) == 0)
        {
            $otp = rand(10000, 99999);
            $otp_res = 'success';
            $timestamp =  $_SERVER["REQUEST_TIME"];  
                $_SESSION['time_check'] = $timestamp;
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
            $otp_res = 'error';
            $otp = '';
        }
        }
        $this->session->set_userdata('reg_login_otp',$otp);
        $data['otp1'] = $otp;
        $data['otp'] = $otp_res;
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data);
    }

    public function resg_otp_verify(){
        $timestamp = $_SERVER['REQUEST_TIME'];
        if($this->input->post('get_otp')){
            $loginotp=$this->input->post('get_otp');
			if(($timestamp - $_SESSION['time_check']) > 300) //5min
			{
				$otp = "expired";
			}else{
				if($this->session->userdata['reg_login_otp'] == $loginotp){
					$otp = 'success';
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

    //account
    public function account($action){
        switch($action){
            case 'view':
                $id = get_cookie('sid');
                if(get_cookie('sid')){
                    if($this->input->post()){
                        $data = [
                            'name' => $this->input->post('name'),
                            'contact' => $this->input->post('contact'),
                            'email_id' => $this->input->post('email_id'),
                            'address' => $this->input->post('address'),
                            'pincode' => $this->input->post('pincode'),
                            'city' => $this->input->post('city'),
                        ];
                        
                        $this->db->where('shop_id',$id);
                        $this->db->update('shop_owner',$data);
                    }
                   
                    $page_data['info'] = $this->db->get_where('shop_owner',['shop_id '=>$id])->row();
                    $page_data['page_title'] = 'Myaccount';
                    $page_data['page'] = 'account';
                    $this->load->view('shop/index',$page_data);
                }else{
                    redirect(base_url('shop'));
                }
                break;
        }
    }

    //extended
    public function extended($action,$id=false){
        switch($action){
            case 'view':
                $id = get_cookie('sid');
                if(get_cookie('sid')){
                    $page_data['info'] = $this->menu->extended($id);
                    $page_data['page_title'] = 'Extented Warranty Registration';
                    $page_data['page'] = 'extended/view';
                    $this->load->view('shop/index',$page_data);
                }else{
                    redirect(base_url('shop'));
                }
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
                        $st_date = $this->input->post('st_date');
                        $duration = $this->input->post('duration');
                        $expire_date = date('y-m-d', strtotime($st_date . '+ '.$duration));
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
                            'created_on' => date('y-m-d'),
                            'start_date' => $this->input->post('st_date'),
                            'invoice_date' => $this->input->post('invoice_date'),
                            'device_serial_no' => $this->input->post('de_se_no'),
                            'expires_on' => $expire_date,
                            'serial_no_image' => $this->input->post('device_photo'),
                            'invoice_image' => $this->input->post('invoice_photo'),
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
                    $this->load->view('shop/index',$page_data);
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
                        $uploaded_data1=$this->uploadimg(array('upload_path'=>'./uploads/shop_invoice/','name'=>'invoice_photo'));
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
                        $this->load->view('shop/index',$page_data);
                    }
                    break;
                case 'delete':
                    $this->db->where('warrenty_id',$id);
                    $this->db->delete('warrenty');
                    redirect('shop/extended');
                    break;
        }
    }

    public function logout(){
        delete_cookie('sid');
        delete_cookie('semail');
        delete_cookie('sname');
        $this->session->sess_destroy();
        redirect(base_url('shop'));
    }

    public function uploadimg($data)
    {
            $config['upload_path']          = $data['upload_path'];
            $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload($data['name']))
            {
                print_r($this->upload->display_errors());
            }
            else
            {
                $uploaded_data = $this->upload->data();
                unset($this->upload);
                return $uploaded_data;
            }
    }

    // public function uploadimg1($data)
    // {
    //     // print_r($data);
    //         $config['upload_path']          = $data['upload_path'];
    //         $config['allowed_types']        = 'gif|jpg|png';
    //         $config['max_size']             = 400;
    //         $config['max_width']            = 1024;
    //         $config['max_height']           = 768;

    //         $this->load->library('upload', $config);
    //         if ( ! $this->upload->do_upload($data['name']))
    //         {
    //             print_r($this->upload->display_errors());
    //         }
    //         else
    //         {
    //             return $this->upload->data();
    //         }
    // }


}





?>
