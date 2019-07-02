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
		if($this->session->userdata('login')!=1){
			$this->load->view('dashboard');
		}else{
			$id = $this->session->userdata('id');
			$transaction = $this->RentCarModel->gettransaction($id);
			$this->session->set_flashdata('notif',$transaction);
			$this->load->view('dashboard');
		}
		
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

		
		if($login){
			if($login->type==1){
				$this->session->set_flashdata('notification',1);
				$sess_data = array(
					'login' => 1,
					'name' => $login->name,
					'id' => $login->id_user,
					'type'=>$login->type
				);
				$this->session->set_userdata($sess_data);
				redirect('welcome/admin');
			}else{
				$this->session->set_flashdata('notification',1);
				$sess_data = array(
					'login' => 1,
					'name' => $login->name,
					'id' => $login->id_user
				);
				$_SESSION['transaction'] = 1;
				$this->session->set_userdata($sess_data);
				redirect('welcome/index');
			}
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
		$name = $_POST['name'];
		$email = $_POST['email'];
		$pwd  = $_POST['password'];
		$telp = $_POST['notelepon'];
		$norek = $_POST['norek'];
		$addr = $_POST['address'];

		$data = array(
			'name'=>$name,
			'email'=>$email,
			'password'=>$pwd,
			'telepon'=>$telp,
			'norek'=>$norek,
			'address'=>$addr
		);

		$result = $this->LoginModel->regisuser($data);

		if($result){
			$this->session->set_flashdata('alert', 'registrasi_berhasil');;
			redirect('/welcome/index');
			
		}else{
			$this->session->set_flashdata('alert', 'registrasi_gagal');;
			redirect('/welcome/index');
			
		}
	}

	public function admin(){
		$user = $this->LoginModel->getalluser();
		$transaction = $this->RentCarModel->getalltransaction();
		$product = $this->RentCarModel->getallproduct();

		$this->session->set_flashdata('product',$product);
		$this->session->set_flashdata('transaction',$transaction);
		$this->session->set_flashdata('user',$user);
		$this->load->view('admin');
	}

	public function lost(){
		
		$this->load->view('lost');
	}

	public function addproduct(){
		$data=array(
			'type'=>$this->input->post('type'),
			'image'=>$this->input->post('image'),
			'price'=>$this->input->post('price'),
			'owner'=>$this->input->post('owner')
		);

		$result = $this->RentCarModel->addproductmodel($data);

		if($result){
			redirect('/welcome/admin');
		}else{
			redirect('/welcome/admin');
		}
	}

	public function paymentverification(){
		$id = $this->input->post('id');
		$no = $this->input->post('bukti');

		$result = $this->RentCarModel->paymentverification($id,$no);
		if($result){
			redirect('/welcome/admin');
		}else{
			redirect('/welcome/admin');
		}
	}

	public function editproduct(){
		$data=array(
			'id'=>$this->input->post('number_product'),
			'type'=>$this->input->post('type'),
			'image'=>$this->input->post('image'),
			'price'=>$this->input->post('price'),
			'owner'=>$this->input->post('owner')
		);

		$result = $this->RentCarModel->editproductmodel($data);

		redirect('/welcome/admin');
	}

	public function delteprodut(){
		$id = $this->input->post('number_product');

		$result = $this->RentCarModel->deleteproduct($id);

		redirect('/welcome/admin');
	}
}
