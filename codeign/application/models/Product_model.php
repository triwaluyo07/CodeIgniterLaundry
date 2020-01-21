<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
    public function Get($table)
        {
            $res=$this->db->get($table);
            return ($res->result_array());
        }

        public function Insert($table, $data)
        {
            $res=$this->db->insert($table, $data);
            return ($res);
        }

        public function Update($table, $data, $where)
        {
            $res=$this->db->update($table, $data, $where);
            return ($res);
        }

        public function Delete($table, $where)
        {
            $res=$this->db->delete($table, $where);
            return ($res);
        }

        public function GetWhere($table, $data)
        {
            $res=$this->db->get_where($table, $data);
            return ($res->result_array());
        }

        public function GetJoinTwoInOne($select, $table1, $table2, $join)
        {
            $this->db->select($select);
            $this->db->from($table1);
            $this->db->join($table2, $join);

            $res=$this->db->get();

            return ($res->result_array());
        }
    }


/*
class Product_model extends CI_Model
{

    private $_table = "tabel_laundry";

    public $product_id;
    public $nama_depan;
    public $nama_belakang;
    public $jenis_kelamin;
    public $alamat;
    public $email;
    public $jenis_laundry;
    public $waktu;
    public $harga;

    public function rules()
    {
        return [
            ['field' => 'name',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'price',
            'label' => 'Price',
            'rules' => 'numeric'],
            
            ['field' => 'description',
            'label' => 'Description',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["product_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->product_id = uniqid();
        $this->nama_depan = $post["nama_depan"];
        $this->nama_belakang = $post["nama_belakang"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->alamat = $post["alamat"];
        $this->email = $post["email"];
        $this->jenis_laundry = $post["jenis_laundry"];
        $this->waktu = $post["waktu"];
        $this->harga = $post["harga"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->product_id = $post["id"];
        $this->nama_depan = $post["nama_depan"];
        $this->nama_belakang = $post["nama_belakang"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->alamat = $post["alamat"];
        $this->email = $post["email"];
        $this->jenis_laundry = $post["jenis_laundry"];
        $this->waktu = $post["waktu"];
        $this->harga = $post["harga"];
        $this->db->update($this->_table, $this, array('product_id' => $post['id']));

        
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("product_id" => $id));
    }

    /*private function _uploadImage()
    {
        $config['upload_path']          = './upload/product/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->product_id;
        $config['overwrite']			= true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }
    

    private function _deleteImage($id)
    {
        $product = $this->getById($id);
        if ($product->image != "default.jpg") {
            $filename = explode(".", $product->image)[0];
            return array_map('unlink', glob(FCPATH."upload/product/$filename.*"));
        }
    }

    
}

*/