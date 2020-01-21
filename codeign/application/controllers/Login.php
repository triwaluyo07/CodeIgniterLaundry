<?php
class Login extends CI_Controller {

    /*
    public function index() { 
        $this->load->view('halaman_login'); 
    } 

    public function proses_login() { 
        $user = $this->input->post('username'); 
        $pass = $this->input->post('md5(password)'); 

        $this->load->model('User');

        $login = $this->User->cek_user($user, $pass); 

        if (!empty($login)) { 
            // login berhasil 
            $this->session->set_userdata($login); 
            redirect(base_url('')); 
        } else { 
            // login gagal 
            $this->session->set_flashdata('gagal', 'Username atau Password Salah!'); 
            redirect(base_url('')); 
        } 
    }
    */
    
    function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url('login'));
		}
	}
    public function index()
    {
        // $this->load->model('User'); //User adalah nama Modelnya COEG
        // $data = $this->User->getAdmin('Admin');
        // $data2 = array('data1' => $data);
        $this->load->view('halaman_login');

        
    }

    public function cek_login()
    {
        $this->load->model('User'); //User adalah nama Modelnya
        $data = $this->User->getAdmin('admin');
        $data2 = array('data1' => $data);
        echo $data[0]['username']; // menapilkan variabel di database atau di username
        echo $data[0]['password'];

        if($data[0]['username'] == $_POST['username'] && $data[0]['password'] == md5($_POST['password']))
        {
            $this->load-> view('admin/overview');
        }
        else
        {
            redirect(base_url('login'));
        }
    }

    // $username = $this->input->post('username');
	// $password = $this->input->post('password');
	// $where = array(
	// 	'username' => $username,
	// 	'password' => md5($password)
	// 	);
    // $cek = $this->User->cek_login("admin",$where)->num_rows();
	// if($cek > 0){
 
	// 	$data_session = array(
	// 		'username' => $username,
	// 		'status' => "login"
	// 		);
 
	// 	$this->session->set_userdata($data_session);
 
	// 	redirect(base_url('admin'));
	// }else{
    //     redirect(base_url('login'));
    //     echo "Username dan password salah !";
        
	// }
    // }

    // public function logout()
    // {
    //     $this->session->sess_destroy();
    //     redirect(base_url('login'));
    // }

}