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
		$view_post = $this->MainModel->viewId('tlh_postinglist',$id_post);
		$view_user = $this->MainModel->viewId('tb_user',$view_user['name']);
		if($status == 4) {
			// Tạo 1 thông báo cho host
			$mess_notification = $this->session->userdata('LoggedIn')['name'].' đã đồng ý đăng bài viết "'.$view_post['name'].'" của bạn.';
			$code = '#TLH'.RandomInt(7);
			$link_check = 'posting-view/'.$view_post['id'];
			$array_host = array(
				'user_from' => $this->session->userdata('LoggedIn')['id'],
				'user_to' => $view_post['id_user'],
				'mess_notification' => $mess_notification,
				'read_notification' => 0,
				'code' => $code,
				'link_check' => $link_check,
				'id_post' => $view_post['id'],
				'status' => 3,
				'date_creat' => strtotime(date('d-m-Y H:i:s')),
			);
			$this->db->insert('tbl_notification', $array_host);
		}
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