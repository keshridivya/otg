<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Engineer extends CI_Controller {
    public function __construct()
    {
    parent::__construct();
    $this->load->library(array('form_validation','session'));
    $this->load->helper(array('url','html','form'));
    $this->load->model('Menu','menu',true);
    }

    public function index(){
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
                $this->session->set_userdata('e_id',$eid);
                $this->session->set_userdata('e_name',$ename);
                $this->session->set_userdata('e_mail',$email);
            }
            }
        }
        if($this->session->userdata['e_id']){
            $bookings_table=$this->db->get("bookings")->result_array();
			$page_data['bookings']=$bookings_table;
            $page_data['page']="dashboard";
            $this->load->view('engineer/index',$page_data);
        }else{
        $this->load->view('engineer/login',$page_data);
        }
    }

    public function myaccount(){
        $id=$this->session->userdata['e_id'];
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
    }

    public function ongoing($action,$id= false){

        switch($action){
            case 'view':
                $id=$this->session->userdata['e_id'];
                $page_data['booking_data']=$this->menu->ongoing_assign($id);
                $page_data['page']='ongoing_assign/view';
                $this->load->view('engineer/index',$page_data);
                break;
            case 'edit':
                $id=$this->session->userdata['e_id'];
                $page_data['booking_data']=$this->menu->ongoing_assign($id);
                $page_data['page']='ongoing_assign/form';
                $this->load->view('engineer/index',$page_data);
                break;
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
