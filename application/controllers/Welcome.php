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
		$this->load->model('RentCarModel');
	} 
	
	public function index()
	{
		$this->load->view('dashboard');
	}
	
	public function rentaleventequipment(){
		$prod = $this->RentCarModel->fetchvehicle();
		$data = array(
			'products'=>$prod
		);

		$this->load->view('rentcar',$data);
	}

	public function registrationform(){
		$this->load->view('registrasi');
	}

	public function login(){
		$email =  $this->input->post('email');
		$password = $this->input->post('password');

		$login = $this->LoginModel->loginuser($email,$password);

		$transaction = $this->RentCarModel->gettransaction($login->id_user);

		if($login){
			$this->session->set_flashdata('notification',1);
			$sess_data = array(
				'login' => 1,
				'name' => $login->name,
				'id' => $login->id_user
			);
			$this->session->set_userdata($sess_data);
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

	public function details(){
		$id = $this->uri->segment(3);

		$product = $this->RentCarModel->fetchdataspec($id);

		if($product){
			$data = array(
				'id'=>$product->id_product,
				'name'=>$product->name,
				'image'=>$product->image,
				'price'=>$product->price,
			);
			$this->load->view('itemdetail',$data);
		}
		
	}

	public function order(){
		$custid = $_POST['custId'];
		$productId = $_POST['productId'];
		$total = $_POST['total'];

		$data = array(
			'id_product'=>$productId,
			'id_user'=>$custid,
			'total'=>$total,
			'status'=>'waiting for payment'
		);

		$result = $this->RentCarModel->order($data);

		if($result){
			redirect('welcome/rentaleventequipment');
		}else{
			redirect('welcome/index');
		}
	}

	public function registeruser(){
		$name = $this->session->post('name');
		$email = $this->session->post('email');
		$pwd  = $this->session->post('password');
		$telp = $this->session->post('notelepon');
		$norek = $this->session->post('norek');

		$data = array(
			'name'=>$name,
			'email'=>$email,
			'password'=>$pwd,
			'telepon'=>$telp,
			'norek'=>$norek
		);

		$result = $this->LoginModel->regisuser($data);

		if($result){
			echo 'berhasil';
		}else{
			echo 'gagal';
		}
	}
}
