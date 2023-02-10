<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Engineer extends CI_Controller {
    public function __construct()
    {
    parent::__construct();
    $this->load->library(array('form_validation','session'));
    $this->load->helper(array('url','html','form'));
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
        $page_data['info']=$this->db->get_where('engineer',array('eng_id'=>$id))->result_array();
        $page_data['page']='myaccount';
        $this->load->view('engineer/index',$page_data);
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('engineer'));
    }
}
