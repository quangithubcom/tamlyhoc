<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logincontroller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Check if you are logged in
		if($this->session->userdata('LoggedIn')){
			redirect(base_url('dashboard'));
		}else{
		$this->load->library('form_validation');
		$this->load->model('backend/LoginModel');
		}
	}

	public function index()
	{
		$this->load->view('backend/user/v_login');
	}
	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required',array('required' => 'Bạn phải nhập %s'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required',array('required' => 'Bạn phải nhập %s'));
		if($this->form_validation->run()){
			$username = $_POST['username'];
			$password = md5($_POST['password']);

			$result = $this->LoginModel->checkLogin($username,$password);
			if($result){
				$session_array = array(
					'id' => $result[0]->id,
					'username' => $result[0]->username,
					'name' => $result[0]->name,
				);
				$this->session->set_userdata('LoggedIn',$session_array);
				$this->session->set_flashdata('success', 'Đăng nhập thành công!');
				redirect(base_url('dashboard'),'refresh');
			}else{
				$this->session->set_flashdata('error', 'Đăng nhập thất bại!');
				redirect(base_url('login'),'refresh');
			}
		}else{
			$this->index;
		}
	}

}