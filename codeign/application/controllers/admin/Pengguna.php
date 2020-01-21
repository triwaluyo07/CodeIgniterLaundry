<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("product_model");
        $this->load->library('form_validation');
    }

    public function add()
    {
        $this->load->model('Product_model');
        $oke = $this->input->post('password');

        $data=array(
            'username'=>$this->input->post('username'),
            'password' =>md5($oke)
        );        
        $data=$this->Product_model->Insert('admin', $data);
        redirect(base_url().'admin/Pengguna');
    }

    public function index()
    {
        $this->load->model('Product_model');
        $data= $this->Product_model->Get('admin');
        $data=array('data'=>$data);
        $this->load->view("admin/product/halaman_user", $data);
    }

    public function form_baru()
    {
        $this->load->model('Product_model');
        $data= $this->Product_model->Get('admin');
        $data=array('data'=>$data);
        $this->load->view("admin/product/new_user", $data);
    }

    public function edit($id)
    {
        $this->load->model('Product_model');
        $user=$this->Product_model->GetWhere('admin', array('id' => $id));

        $data=array(
            'id'=>$user[0]['id'],
            'username'=>$user[0]['username'],
            'password'=>$user[0]['password']
        );
        
        $this->load->view('admin/product/edit_user', $data);
    }

    public function update()
    {
        $product_id = $this->input->post('product_id');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data=array(
            'id' => $id,
            'username'=>$username,
            'password'=>md5($password)
        );

         $where = array(
             'id'=> $id
         );
         
        $this->load->model('Product_model');
        
        $res = $this->Product_model->Update('admin',$data,$where);
        if($res>0)
        {
            redirect(base_url().'admin/Pengguna');
        }
        
        
    }

     public function delete($id)
    {
        $where=array('id'=>$id);

        $this->load->model('Product_model');
        $this->Product_model->Delete('admin',$where);
        redirect(base_url().'admin/Pengguna');
        
    }
}