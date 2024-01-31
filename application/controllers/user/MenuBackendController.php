<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MenuBackendController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Check if you are logged in
		if(!$this->session->userdata('LoggedIn')){
			redirect(base_url('login'));
		}else{
			$this->load->model('backend/MenuBackendModel');
		}
	}

	public function index()
	{
		$data['list_menu'] = $this->MenuBackendModel->getFather(0);

		$this->load->view('backend/layout/v_header');
		$this->load->view('backend/user/v_menu_backend',$data);
		$this->load->view('backend/layout/v_footer');
	}

	public function create()
	{
		$data['list_father_menu'] = $this->MenuBackendModel->getAllOption(0);
		$this->load->view('backend/layout/v_header');
		$this->load->view('backend/user/v_menu_backend_create',$data);
		$this->load->view('backend/layout/v_footer');
	}

	public function add()
	{
		// Get the input order of the menu
		$check_arrange = $this->MenuBackendModel->checkArrange($_POST['father']);
		$info_menu = array(
			'icon_font' => $_POST['icon_font'],
			'name_menu' => $_POST['name_menu'],
			'link_menu' => $_POST['link_menu'],
			'father' => $_POST['father'],
			'menu_function' => $_POST['menu_function'],
			'status' => 1,
			'arrange' => $check_arrange,
		);
		$this->MainModel->insert('tb_menu_backend', $info_menu);
		redirect(base_url('menu-backend'));
	}
	public function edit($id_menu_backend)
	{
		$view_menu_backend = $this->MenuBackendModel->viewId($id_menu_backend);
		// Get the parent category
		$data['list_father_menu'] = $this->MenuBackendModel->getAllOptionEdit(0,$view_menu_backend['father']);
		$data['view_menu_backend'] = $this->MenuBackendModel->viewId($id_menu_backend);

		$this->load->view('backend/layout/v_header');
		$this->load->view('backend/user/v_menu_backend_edit',$data);
		$this->load->view('backend/layout/v_footer');
	}
	public function update()
	{
		$info_menu = array(
			'icon_font' => $_POST['icon_font'],
			'name_menu' => $_POST['name_menu'],
			'link_menu' => $_POST['link_menu'],
			'menu_function' => $_POST['menu_function'],
			'father' => $_POST['father'],
		);
		$this->MainModel->update('tb_menu_backend',$info_menu,$_POST['id_menu_backend']);
		redirect(base_url('menu-backend'));
	}

	public function delete($id_menu_backend){

		$view_menu_backend = $this->MenuBackendModel->viewId($id_menu_backend);
		$id_father_menu = $view_menu_backend['father'];

		$this->MainModel->delete('tb_menu_backend',$id_menu_backend);

		// Sắp xếp lại thứ tự menu cùng cấp với menu vừa xóa
		$list_menu = $this->MenuBackendModel->getFather($id_father_menu);
		foreach($list_menu as $key => $menu) {
			$update_arrange = array(
				'arrange' => $key + 1,
			);
			$this->MainModel->update('tb_menu_backend',$update_arrange,$menu['id']);
		}
		redirect(base_url('menu-backend'));
	}
}

/* End of file MenuBackendController.php */
/* Location: ./application/controllers/MenuBackendController.php */