<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("product_model");
        $this->load->library('form_validation');
    }


    public function index()
    {
        $this->load->model('Product_model');
        $data= $this->Product_model->Get('tabel_laundry');
        $data=array('data'=>$data);
        $this->load->view("admin/product/list", $data);
    }

    public function form_baru()
    {
        $this->load->model('Product_model');
        $data= $this->Product_model->Get('tabel_laundry');
        $data=array('data'=>$data);
        $this->load->view("admin/product/new_form", $data);
    }

    // public function form_edit()
    // {
    //     $this->load->model('Product_model');
    //     $data= $this->Product_model->Get('tabel_laundry');
    //     $data=array('data'=>$data);
    //     $this->load->view("admin/product/edit_form", $data);
    // }

    public function add()
    {
        $this->load->model('Product_model');

        $data=array(
            'nama_depan'=>$this->input->post('nama_depan'),
            'nama_belakang' =>$this->input->post('nama_belakang'),
            'berat' => $this->input->post('berat'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'jenis_laundry' => $this->input->post('jenis_laundry'),
            'waktu' => $this->input->post('waktu'),
            'harga' => $this->input->post('harga')
        );

        
        $data=$this->Product_model->Insert('tabel_laundry', $data);
        redirect(base_url().'admin/Products');
    }

    public function edit($product_id)
    {
        $this->load->model('Product_model');
        $customer=$this->Product_model->GetWhere('tabel_laundry', array('product_id' => $product_id));

        $data=array(
            'product_id'=>$customer[0]['product_id'],
            'nama_depan'=>$customer[0]['nama_depan'],
            'nama_belakang' =>$customer[0]['nama_belakang'],
            'berat' => $customer[0]['berat'],
            'alamat' => $customer[0]['alamat'],
            'email' => $customer[0]['email'],
            'jenis_laundry' => $customer[0]['jenis_laundry'],
            'waktu' => $customer[0]['waktu'],
            'harga' => $customer[0]['harga']
        );
        
        $this->load->view('admin/product/edit_form', $data);
        // $product_id = $this->input->post('product_id');
        // $data['data'] = $this->Product_model->productById($product_id);
        // $this->load->view('admin/product/edit_form', $data);
    }

    public function update()
    {
        $product_id = $this->input->post('product_id');
        $nama_depan = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        $berat = $this->input->post('berat');
        $alamat=$this->input->post('alamat');
        $email = $this->input->post('email');
        $jenis_laundry = $this->input->post('jenis_laundry');
        $waktu = $this->input->post('waktu');
        $harga = $this->input->post('harga');

        $data=array(
            'product_id' => $product_id,
            'nama_depan'=>$nama_depan,
            'nama_belakang'=>$nama_belakang,
            'berat'=>$berat,
            'alamat'=>$alamat,
            'email'=>$email,
            'jenis_laundry'=>$jenis_laundry,
            'waktu'=>$waktu,
            'harga'=>$harga
        );

         $where = array(
             'product_id'=> $product_id
         );

            // echo $data['product_id'];
            // echo $data['nama_depan'];
            // echo $data['nama_belakang'];
            // echo $data['berat'];
            // echo $data['alamat'];
            // echo $data['email'];
            // echo $data['jenis_laundry'];
            // echo $data['waktu'];
            // echo $data['harga'];
         
        $this->load->model('Product_model');
        
        $res = $this->Product_model->Update('tabel_laundry',$data,$where);
        if($res>0)
        {
            redirect(base_url().'admin/Products');
        }
        
        
    }

    public function delete($product_id)
    {
        

        $where=array('product_id'=>$product_id);

        $this->load->model('Product_model');
        $this->Product_model->Delete('tabel_laundry',$where);
        redirect(base_url().'admin/Products');
        
    }
}
