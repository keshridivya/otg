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
                $this->session->set_userdata('eng_id',$eid);
                $this->session->set_userdata('e_name',$ename);
            }
            }
        }
        if(@$this->session->userdata['eng_id']){
            $page_data['page_title']="Dashboard";
            $page_data['page']="dashboard";
            $this->load->view('admin/index',$page_data);
        }else{
        $this->load->view('engineer/login',$page_data);
        }
    }
}
