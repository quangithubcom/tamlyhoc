<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Check if you are logged in
		if(!$this->session->userdata('LoggedIn')){
			redirect(base_url('login'));
		}else{
			$this->load->model('backend/UserModel');
			$id_user = $this->session->userdata('LoggedIn')['id'];
			$view_user = $this->MainModel->viewId('tb_user',$id_user);
			$this->decentralization = json_decode($view_user['decentralization']);
		}
	}
	public function checkDecentraliza($id_decentraliza){
		if(in_array($id_decentraliza, $this->decentralization)){

		}else{
			$dataresult = array('error' => 'ok','messenger' => 'Bạn không được phân quyền quản lý trang này. Xin vui lòng thử lại!',);
			$this->session->set_flashdata($dataresult);
			redirect(base_url('dashboard'));
		}
	}
	public function index()
	{
		$this->checkDecentraliza(33);
		$data['list_user'] = $this->UserModel->getAll();
		$this->load->view('backend/layout/v_header');
		$this->load->view('backend/user/v_main',$data);
		$this->load->view('backend/layout/v_footer');
	}

	public function create()
	{
		$this->checkDecentraliza(42);
		$data['list_decentralization_group'] = $this->UserModel->getAllDecentralizationGroup();
		$this->load->view('backend/layout/v_header');
		$this->load->view('backend/user/v_user_create',$data);
		$this->load->view('backend/layout/v_footer');
	}

	public function add()
	{
		$this->checkDecentraliza(42);
		$view_decentralization_group = $this->MainModel->viewId('tb_user_decentralization',$_POST['id_decentralization']);
		$info_user = array(
			'name' => $_POST['name'],
			'username' => $_POST['username'],
			'password' => md5($_POST['password']),
			'decentralization' => $view_decentralization_group['decentralization'],
			'status' => 1,
			'admin' => 1,
		);
		$this->MainModel->insert('tb_user', $info_user);
		redirect(base_url('user'));
	}

	public function edit($id_user)
	{
		$this->checkDecentraliza(43);
		$data['view_user'] = $this->MainModel->viewId('tb_user',$id_user);

		$this->load->view('backend/layout/v_header');
		$this->load->view('backend/user/v_user_edit',$data);
		$this->load->view('backend/layout/v_footer');
	}

	public function update(){
		$this->checkDecentraliza(43);
		if(isset($_POST['update'])){
			$user_info = array(
				'name' => $_POST['name'],
			);
			$this->MainModel->update('tb_user',$user_info,$_POST['id_user']);
			redirect(base_url('user'));
		}else{
			redirect(base_url('user'));
		}
	}
	public function delete($id_user){
		$this->checkDecentraliza(44);
		$this->MainModel->delete('tb_user',$id_user);
		redirect(base_url('user'));
	}
	public function editpass()
	{
		$this->load->view('backend/layout/v_header');
		$this->load->view('backend/user/v_edit_password');
		$this->load->view('backend/layout/v_footer');
	}
	public function decentralization_group(){
		$data['list_user'] = $this->UserModel->getAllDecentralizationGroup();
		$this->load->view('backend/layout/v_header');
		$this->load->view('backend/user/v_decentralization_group',$data);
		$this->load->view('backend/layout/v_footer');
	}
	public function decentralization_group_creat(){
		$this->load->view('backend/layout/v_header');
		$this->load->view('backend/user/v_decentralization_group_create');
		$this->load->view('backend/layout/v_footer');
	}
	public function decentralization_group_add(){
		if(isset($_POST['add'])){
			$info_decentralization_group = array(
				'name_decentralization' => $_POST['name_decentralization'],
				'decentralization' => json_encode(array()),
			);
			$this->MainModel->insert('tb_user_decentralization', $info_decentralization_group);
			redirect(base_url('decentralization-group'));
		}else{
			redirect(base_url('decentralization-group'));
		}
	}
	public function decentralization_group_edit($id_decentralization_group){
		$data['view_decentralization_group'] = $this->MainModel->viewId('tb_user_decentralization',$id_decentralization_group);
		$this->load->view('backend/layout/v_header');
		$this->load->view('backend/user/v_decentralization_group_edit',$data);
		$this->load->view('backend/layout/v_footer');
	}
	public function decentralization_group_update(){
		if(isset($_POST['update'])){
			$info_decentralization_group = array(
				'name_decentralization' => $_POST['name_decentralization'],
			);
			$this->UserModel->decentralization_group_update($_POST['id_decentralization_group'],$info_decentralization_group);
			redirect(base_url('decentralization-group'));
		}else{
			redirect(base_url('decentralization-group'));
		}
	}
	public function decentralization_group_delete($id_decentralization_group){
		$this->MainModel->delete('tb_user_decentralization',$id_decentralization_group);
		redirect(base_url('decentralization-group'));
	}
	
	public function decentralization_group_setting($id_decentralization_group){

		$view_decentralization_group = $this->MainModel->viewId('tb_user_decentralization',$id_decentralization_group);
		$data['decentralization_group'] = json_decode($view_decentralization_group['decentralization']);

		$data['view_decentralization_group'] = $this->MainModel->viewId('tb_user_decentralization',$id_decentralization_group);
		$this->load->view('backend/layout/v_header');
		$this->load->view('backend/user/v_decentralization_group_setting',$data);
		$this->load->view('backend/layout/v_footer');
	}
	public function decentralization_group_setting_update(){
		if(isset($_POST['update'])){
			$decentralization = array(
				'decentralization' => json_encode($_POST['decentralization'])
			);
			$this->UserModel->decentralization_group_update($_POST['id_decentralization-group'],$decentralization);
			redirect(base_url('decentralization-group-setting/'.$_POST['id_decentralization-group']));
		}else{
			redirect(base_url('decentralization-group'));
		}
	}
	public function decentralization($id_user){
		$this->checkDecentraliza(45);
		$view_id_user = $this->MainModel->viewId('tb_user',$id_user);
		
		$data['decentralization_user'] = json_decode($view_id_user['decentralization']);
		$data['id_user'] = $id_user;
		$data['view_id_user'] = $this->MainModel->viewId('tb_user',$id_user);
		$this->load->view('backend/layout/v_header');
		$this->load->view('backend/user/v_decentralization',$data);
		$this->load->view('backend/layout/v_footer');
	}
	public function decentralization_update(){
		if(isset($_POST['update'])){
			$decentralization = array(
				'decentralization' => json_encode($_POST['decentralization'])
			);
			$this->UserModel->update_decentralization($_POST['id_user'],$decentralization);
			redirect(base_url('decentralization/'.$_POST['id_user']));
		}else{
			redirect(base_url('user'));
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('LoggedIn');
		$this->session->set_flashdata('success', 'Đăng xuất thành công!');
		redirect(base_url('login'),'refresh');
	}
	public function changepass()
	{
		$id_user = $this->session->userdata('LoggedIn')['id'];
		$view_id_user = $this->MainModel->viewId('tb_user',$id_user);
		$pass_old = md5($_POST['re_old_password']);
		$pass_new = md5($_POST['new_password']);
		$pass_new_re = md5($_POST['re_new_password']);

		if($pass_old != $view_id_user['password']){
			$dataresult = array('error' => 'ok','messenger' => 'Mật khẩu hiện tại không đúng. Xin vui lòng nhập lại!',);
			$this->session->set_flashdata($dataresult);
		}elseif($pass_new != $pass_new_re){
			$dataresult = array('error' => 'ok','messenger' => 'Mật khẩu nhập lại không trùng với mật khẩu mới. Xin vui lòng nhập lại!',);
			$this->session->set_flashdata($dataresult);
		}else{
			$this->UserModel->update_pass($id_user,$pass_new);
		}
		redirect(base_url('edit-password'));
	}
}

/* End of file UserController.php */
/* Location: ./application/controllers/UserController.php */