<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AllpostController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}

	public function index()
	{
		$data['list_post'] = $this->db->select('*')->from('tlh_postinglist')->get()->result_array();
		$data['list_counter'] = $this->db->select('*')->from('tb_user')->where('admin',7)->get()->result_array();
		$data['template'] = 'allpost/v_main';
		$this->load->view('backend/layout/v_main',$data);
	}

	public function checkPost($id_post){
		$view_post = $this->MainModel->viewId('tlh_postinglist',$id_post);
		if (isset($view_post)){ }else{
			$dataresult = array('error' => 'ok','messenger' => 'Bài viết không tồn tại',);
			$this->session->set_flashdata($dataresult);
			redirect($_SERVER["HTTP_REFERER"]);
		}
	}

	public function checkClosePost($id_post){
		$view_post = $this->MainModel->viewId('tlh_postinglist',$id_post);
		if($view_post['close_post'] == 0) { }else {
			$dataresult = array('error' => 'ok','messenger' => 'Bài viết đã đóng. Không thể thao tác.',);
			$this->session->set_flashdata($dataresult);
			redirect($_SERVER["HTTP_REFERER"]);
		}
	}

	public function status($id_post,$status){
		$this->checkPost($id_post);
		$this->checkClosePost($id_post);
		$view_post = $this->MainModel->viewId('tlh_postinglist',$id_post);
		if($status == 2 || $status == 3){
			if($status == 3){
				$update = array(
					'status' => $status,
				);
				$this->MainModel->update('tlh_postinglist',$update,$id_post);

				// Tạo 1 thông báo cho host
					$mess_notification = 'Admin đã duyệt bài viết "'.$view_post['name'].'" của bạn.';
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
			}else{
				$update = array(
					'status' => $status,
					'id_counter' => 0,
				);
				$this->MainModel->update('tlh_postinglist',$update,$id_post);

				// Tạo 1 thông báo cho host
					$mess_notification = 'Admin đã hủy duyệt bài viết "'.$view_post['name'].'" của bạn.';
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
						'status' => 2,
						'date_creat' => strtotime(date('d-m-Y H:i:s')),
					);
					$this->db->insert('tbl_notification', $array_host);
			}
			
			redirect($_SERVER["HTTP_REFERER"]);
		}else{
			$dataresult = array('error' => 'ok','messenger' => 'Dữ liệu đã bị can thiệp không thể chỉnh sửa.',);
			$this->session->set_flashdata($dataresult);
			redirect($_SERVER["HTTP_REFERER"]);
		}

	}

	public function counter($id_post,$id_counter){
		$this->checkPost($id_post);
		$this->checkClosePost($id_post);
		$view_post = $this->MainModel->viewId('tlh_postinglist',$id_post);
		$view_user = $this->MainModel->viewId('tb_user',$id_counter);
		// Kiểm tra xem đã được phản biện chưa, Nếu phản biện rồi sẽ không được đổi
		$list_history = $this->db->select('*')->from('tlh_postinglist_histoty')->where('id_post',$id_post)->get()->result_array();
		if(count($list_history) > 0){
			$dataresult = array('error' => 'ok','messenger' => 'Bài viết đang được phản biện không thể đổi người phản biện.',);
			$this->session->set_flashdata($dataresult);
		}else{
			$update = array(
				'id_counter' => $id_counter,
			);
			$this->MainModel->update('tlh_postinglist',$update,$id_post);
			// Tạo 1 thông báo cho host
					$mess_notification = 'Bài viết "'.$view_post['name'].'" của bạn đã được giao cho '.$view_user['name'].' phản biện.';
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
			// Tạo 1 thông báo cho người phản biện
					$mess_notification = 'Bài viết "'.$view_post['name'].'" cần được phản biện.';
					$code = '#TLH'.RandomInt(7);
					$link_check = 'user-counter-check/'.$view_post['id'];
					$array_host = array(
						'user_from' => $this->session->userdata('LoggedIn')['id'],
						'user_to' => $id_counter,
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
		redirect($_SERVER["HTTP_REFERER"]);
	}

	public function view($id_post){

		$data['view_post'] = $this->MainModel->viewId('tlh_postinglist',$id_post);
		$data['template'] = 'allpost/v_view';
		$this->load->view('backend/layout/v_main',$data);
	}

	public function edit($id_post){
		// Update lại trạng thái thông báo
		$check_info = array(
			'id_post' => $id_post,
			'status' => 2,
		);
		$check_info_now = $this->db->select('*')->from('tbl_notification')->where($check_info)->get()->row_array();
		$update_info = array(
			'read_notification' => 1,
		);
		$this->db->where('id', $check_info_now['id']);
		$this->db->update('tbl_notification', $update_info);
		// Kết thúc update

		$data['view_post'] = $this->MainModel->viewId('tlh_postinglist',$id_post);
		$data['list_counter'] = $this->db->select('*')->from('tb_user')->where('admin',7)->get()->result_array();
		$data['template'] = 'allpost/v_edit';
		$this->load->view('backend/layout/v_main',$data);
	}

	public function delete($id_post){
		// Kiểm tra trạng thái
		$view_post = $this->MainModel->viewId('tlh_postinglist',$id_post);
		if($view_post['status'] == 1){
			$dataresult = array('error' => 'ok','messenger' => 'Bài viết đang được phản biện không thể xóa.',);
			$this->session->set_flashdata($dataresult);
			redirect('all-post');
		}
	}
}