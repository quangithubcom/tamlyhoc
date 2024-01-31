<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DashboardController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Check if you are logged in
		if(!$this->session->userdata('LoggedIn')){
			redirect(base_url('login'));
		}
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}

	public function index()
	{	
		$check_notification = array(
			'user_to' => $this->session->userdata('LoggedIn')['id'],
			'read_notification' => 0,
		);
		$data['list_notification'] = $this->db->select('*')->from('tbl_notification')->where($check_notification)->order_by('date_creat','desc')->get()->result_array();
		$data['template'] = 'backend/layout/v_dashboard';
		$this->load->view('backend/layout/v_main',$data);
	}

}
