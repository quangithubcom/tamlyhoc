<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CommentController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Check if you are logged in
		if(!$this->session->userdata('LoggedIn')){
			redirect(base_url('login'));
		}else{
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
		$this->checkDecentraliza(19);
		$this->load->view('backend/layout/v_header');
		$this->load->view('backend/layout/v_footer');
	}

}
