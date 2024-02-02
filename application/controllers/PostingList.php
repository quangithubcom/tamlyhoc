<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PostingList extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
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
	public function index()
	{
		$data['list_post'] = $this->db->select('*')->from('tlh_postinglist')->where('id_user',$this->session->userdata('LoggedIn')['id'])->order_by('date_creat','desc')->get()->result_array();
		$data['template'] = 'postinglist/v_main';
		$this->load->view('backend/layout/v_main',$data);
	}

	public function creat(){
		$data['template'] = 'postinglist/v_creat';
		$this->load->view('backend/layout/v_main',$data);
	}

	public function add(){
		if(isset($_POST['send'])){
			// Thêm bài vào CSDL
			$post_array = array(
				'name_user' => $_POST['name_user'],
				'phone_user' => $_POST['phone_user'],
				'name' => $_POST['name'],
				'description' => $_POST['description'],
				'id_user' => $this->session->userdata('LoggedIn')['id'],
				'counter' => '',
				'id_counter' => 0,
				'status' => 2,
				'date_creat' => strtotime(date('d-m-Y H:i:s')),
			);
			$insert_post = $this->MainModel->insert_noti('tlh_postinglist',$post_array);
			if($insert_post) {
				$config['upload_path'] = 'uploads';
				$config['allowed_types'] = 'doc|docx';
				$config['file_name'] = 'tlh-'.$insert_post;
				$this->load->library("upload", $config);
				if($this->upload->do_upload("file_post")){
					$uploadData = $this->upload->data();
					$update_file = array(
						'fileposst' => $uploadData['file_name'],
					);
					$this->MainModel->update('tlh_postinglist',$update_file,$insert_post);

					// Tạo 1 thông báo cho host
					$mess_notification = $this->session->userdata('LoggedIn')['name'].' vừa đăng 1 bài viết "'.$_POST['name'].'" cần duyệt!';
					$code = '#TLH'.RandomInt(7);
					$link_check = 'all-post-edit/'.$insert_post;
					$array_host = array(
						'user_from' => $this->session->userdata('LoggedIn')['id'],
						'user_to' => 1,
						'mess_notification' => $mess_notification,
						'read_notification' => 0,
						'code' => $code,
						'link_check' => $link_check,
						'id_post' => $insert_post,
						'status' => 2,
						'date_creat' => strtotime(date('d-m-Y H:i:s')),
					);
					$this->db->insert('tbl_notification', $array_host);

					redirect('posting-list');
				}else{
					$this->db->where('id', $insert_post);
					$this->db->delete('tlh_postinglist');
					$dataresult = array('error' => 'ok','messenger' => 'Nội dung chấp nhận doc,docx.',);
					$this->session->set_flashdata($dataresult);
					redirect('posting-creat?name='.$_POST['name'].'&description='.$_POST['description'].'&name_user='.$_POST['name_user'].'&phone_user='.$_POST['phone_user']);
				}
			}
		}
	}

	public function view($id_post){
		$this->checkPost($id_post);
		// Cập nhật các trạng thái đã đọc cho bài viết
		$check_info = array(
			'id_post' => $id_post,
			'read_notification' => 0,
		);
		$check_info_now = $this->db->select('*')->from('tbl_notification')->where($check_info)->get()->result_array();
		foreach($check_info_now as $value) {
			$update_info = array(
				'read_notification' => 1,
			);
			$this->db->where('id', $value['id']);
			$this->db->update('tbl_notification', $update_info);
		}
		// Kết thúc update
		$data['view_post'] = $this->MainModel->viewId('tlh_postinglist',$id_post);
		$data['template'] = 'postinglist/v_view';
		$this->load->view('backend/layout/v_main',$data);
	}

	public function repaste($num,$id_post,$id_father_counter){

		$data['id_father_counter'] = $id_father_counter;
		$data['num'] = $num;
		$data['view_post'] = $this->MainModel->viewId('tlh_postinglist',$id_post);
		$data['template'] = 'postinglist/v_repaste';
		$this->load->view('backend/layout/v_main',$data);

	}

	public function repaste_add(){
		if(isset($_GET['id_post']) && isset($_GET['id_father_counter']) && isset($_GET['num']) && isset($_POST['name']) && isset($_POST['send']) && isset($_POST['description'])) {
			// Kiểm tra bài viết
			$view_post = $this->MainModel->viewId('tlh_postinglist',$_GET['id_post']);

			if (isset($view_post)) {
				// Kiểm tra xem có đúng người hoặc trạng thái bài viết không thì cho chỉnh lại
				if($view_post['status'] == $_GET['num'] && $view_post['id_user'] == $this->session->userdata('LoggedIn')['id']){
					$post_array_histoty = array(
						'name' => $_POST['name'],
						'description' => $_POST['description'],
						'id_post' => $_GET['id_post'],
						'id_user' => $this->session->userdata('LoggedIn')['id'],
						'id_father_counter' => $_GET['id_father_counter'],
						'num' => $_GET['num'],
						'date_creat' => strtotime(date('d-m-Y H:i:s')),
					);
					$insert_post_histoty = $this->MainModel->insert_noti('tlh_postinglist_histoty',$post_array_histoty);
					
					if($insert_post_histoty) {
						$config['upload_path'] = 'uploads';
						$config['allowed_types'] = 'doc|docx';
						$config['file_name'] = 'tlh-edit-'.$insert_post_histoty;
						$this->load->library("upload", $config);
						if($this->upload->do_upload("file_post")){
							$uploadData = $this->upload->data();
							$update_file = array(
								'linkfile' => $uploadData['file_name'],
							);
							$this->MainModel->update('tlh_postinglist_histoty',$update_file,$insert_post_histoty);
						// Update lại trạng thái cho chỉnh sửa lần 1
							$update_status = array(
								'status' => 8,
							);
							$this->db->where('id',$_GET['id_post']);
							$this->db->update('tlh_postinglist', $update_status);
							redirect('posting-view/'.$_GET['id_post']);
						}else{
							$this->db->where('id', $insert_post_histoty);
							$this->db->delete('tlh_postinglist_histoty');
							$dataresult = array('error' => 'ok','messenger' => 'Nội dung chấp nhận doc,docx.',);
							$this->session->set_flashdata($dataresult);
							redirect($_SERVER["HTTP_REFERER"]);
						}
					}


				}else{
					$dataresult = array('error' => 'ok','messenger' => 'Bạn không có quyền truy cập File hoặc trạng thái bài viết không đúng.',);
					$this->session->set_flashdata($dataresult);
					redirect($_SERVER["HTTP_REFERER"]);
				}
				
			}else{
				$dataresult = array('error' => 'ok','messenger' => 'Bài viết không tồn tại xin kiểm tra lại.',);
				$this->session->set_flashdata($dataresult);
				redirect($_SERVER["HTTP_REFERER"]);
			}
			
		}else{
			$dataresult = array('error' => 'ok','messenger' => 'Dữ liệu nhập không đúng vui lòng nhập lại.',);
			$this->session->set_flashdata($dataresult);
			redirect($_SERVER["HTTP_REFERER"]);
		}

	}

	public function delete($id_post){
		$this->checkPost($id_post);
		$this->checkClosePost($id_post);
		$view_post = $this->MainModel->viewId('tlh_postinglist',$id_post);
		if($view_post['status'] == 2 ){
			
			// Tạo 1 thông báo cho host
			$mess_notification = $this->session->userdata('LoggedIn')['name'].' vừa xóa 1 bài viết "'.$view_post['name'];
			$code = '#TLH'.RandomInt(7);
			$link_check = 'all-post-edit/'.$view_post['id'];
			$array_host = array(
				'user_from' => $this->session->userdata('LoggedIn')['id'],
				'user_to' => 1,
				'mess_notification' => $mess_notification,
				'read_notification' => 0,
				'code' => $code,
				'link_check' => $link_check,
				'id_post' => $view_post['id'],
				'status' => 11,
				'date_creat' => strtotime(date('d-m-Y H:i:s')),
			);
			$this->db->insert('tbl_notification', $array_host);

			$this->db->where('id', $id_post);
			$this->db->delete('tlh_postinglist');

		}else{
			$dataresult = array('error' => 'ok','messenger' => 'Bài viết đã được kiểm duyệt bạn không thể xóa.',);
			$this->session->set_flashdata($dataresult);

		}
		redirect($_SERVER["HTTP_REFERER"]);
	}

}