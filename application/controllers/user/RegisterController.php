<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RegisterController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('backend/user/v_register');
	}

	public function register_check(){
		if(isset($_POST['register'])){
			$email = trim($_POST['email']);
			$fullname = trim($_POST['fullname']);
			$password = md5(trim($_POST['password']));
			$repassword = md5(trim($_POST['repassword']));
			// Kiểm tra email đã được đăng kí chưa
			$check_mail = $this->db->select('*')->from('tb_user')->where('email',$email)->get()->row_array();
			if(isset($check_mail)){
				$dataresult = array('error' => 'ok','messenger' => 'Email đã tồn tại không thể đăng kí.',);
				$this->session->set_flashdata($dataresult);
				redirect('register');
			}elseif($password != $repassword){
				$dataresult = array('error' => 'ok','messenger' => 'Mật khẩu nhập lại không trùng khớp với mật khẩu.',);
				$this->session->set_flashdata($dataresult);
				redirect('register');
			}else{
				$insert = array(
					'email' => $email,
					'name' => $fullname,
					'password' => $password,
					'decentralization' => json_encode(array()),
					'status' => 1,
					'admin' => 1,
				);
				$query = $this->db->insert('tb_user', $insert);
				if($query){
					$dataresult = array('access' => 'ok','messenger' => 'Đăng kí tài khoản thành công! Vui lòng đăng nhập',);
					$this->session->set_flashdata($dataresult);
					redirect('login');
				}else{
					$dataresult = array('error' => 'ok','messenger' => 'Đăng kí tài khoản thất bại! Vui lòng thử lại.',);
					$this->session->set_flashdata($dataresult);
					redirect('register');
				}
				
			}
		}
	}
}

/* End of file RegisterController.php */
/* Location: ./application/controllers/RegisterController.php */