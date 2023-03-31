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
        if(@$this->input->post()){
            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_message('required', 'Enter %s');
            if($this->form_validation->run() === false){
                $this->load->view('shop/login');
            }else{
                $email = $this->input->post('email');
                $password = sha1($this->input->post('password'));
                $query = $this->db->get_where('shop_owner',['email_id'=>$email,'password'=>$password,'status'=>'active'])->row();
                if(!$query){
                    $page_data['message'] = 'Username and Password is not correct';
                    $this->load->view('shop/login',$page_data);
                }
                else{
                    $this->session->set_userdata('sid',$query->shop_id );
                    $this->session->set_userdata('semail',$query->email_id);
                    $this->session->set_userdata('sname',$query->name);
                }
            }
        }
        if($this->session->userdata('sid')){
            $page_data['page_title'] = 'Dashboard';
            $page_data['page']="dashboard";
            $this->load->view('shop/index',$page_data);
        }
        else{
        $this->load->view('shop/login');
        }
    }

    //account
    public function account($action){
        switch($action){
            case 'view':
                $id = $this->session->userdata('sid');
                if($this->session->userdata('sid')){
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

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('shop'));
    }
}





?>