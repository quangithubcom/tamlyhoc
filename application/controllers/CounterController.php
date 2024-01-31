<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CounterController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}

	public function index()
	{
		$data['list_post'] = $this->db->select('*')->from('tlh_postinglist')->where('id_counter',$this->session->userdata('LoggedIn')['id'])->get()->result_array();
		$data['template'] = 'counter/v_main';
		$this->load->view('backend/layout/v_main',$data);
	}

	public function checkcounter($id_post){
		$data['view_post'] = $this->MainModel->viewId('tlh_postinglist',$id_post);
		$data['template'] = 'counter/v_check';
		$this->load->view('backend/layout/v_main',$data);
	}

	public function status($id_post,$status){
		// Cập nhật trạng thái
		$data['id_post'] = $id_post;
		$update = array(
			'status' => $status,
		);
		$this->MainModel->update('tlh_postinglist',$update,$id_post);
		redirect(base_url('user-counter'));
	}

	public function counter_argument($num,$id_post){
		$data['template'] = 'counter/v_counter_argument';
		$this->load->view('backend/layout/v_main',$data);
	}

	public function add($num,$id_post){
		$insert = array(
			'id_post' => $id_post,
			'id_counter' => $this->session->userdata('LoggedIn')['id'],
			'counter' => $_POST['counter_info'],
			'num' => $num,
			'date_creat' => strtotime(date('d-m-Y H:i:s')),
		);
		$this->MainModel->insert('tlh_postinglist_histoty',$insert);
		redirect(base_url('user-counter'));
	}

}