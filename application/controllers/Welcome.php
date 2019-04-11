<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	function __construct(){
		 parent::__construct();
		 $this->load->model('LoginModel');
	} 
	 public function index()
	{
		$this->load->view('dashboard');
	}
	
	public function rentaleventequipment(){
		$this->load->view('rentcar');
	}

	public function login(){
		$email =  $this->input->post('email');
		$password = $this->input->post('password');

		$login = $this->LoginModel->loginuser($email,$password);

		if($login){
			$sess_data = array(
				'login' => 1,
				'name' => $login->name
			);
			$this->session->set_userdata($sess_data);
			echo "<script>console.log('berhasil login')</script>";
			redirect('welcome/index');
		}else{
			echo "<script>console.log('gagal login')</script>";
			redirect('welcome/index');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
    	redirect('welcome/index');
	}
}
