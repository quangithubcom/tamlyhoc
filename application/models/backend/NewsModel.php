<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NewsModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function view($id_post,$lang){
		$this->db->select('*');
		$this->db->where('id_post', $id_post);
		$query = $this->db->get('tb_post_'.$lang);
		return $query->row_array();
	}

	public function getAll(){
		$query = $this->db->get('tb_setup_template');
		return $query->result_array();
	}
	public function getType($category_type,$lang){
		$this->db->order_by('date_creat', 'desc');
		$this->db->order_by('id', 'desc');
		$this->db->where('category_type',$category_type);
		$query = $this->db->get('tb_post');
		return $query->result_array();
	}
	public function getFatherType($id_father,$category_type){
		$this->db->where('category_type',$category_type);
		$this->db->where('id_father',$id_father);
		$query = $this->db->get('tb_category_vn');
		return $query->result_array();
	}

	public function checkUrl($url,$lang){
		$this->db->where('url_post', $url);
		$query = $this->db->get('tb_post_'.$lang);
		return $query->result_array();
	}

	public function delete($id_post)
	{
		// Kiểm tra xem giao diện có đang được dùng không
		$view_post = $this->db->select('*')->from('tb_post')->where('id',$id_post)->get()->row_array();
		$view_post_vn = $this->db->select('*')->from('tb_post_vn')->where('id_post',$id_post)->get()->row_array();
		$view_post_en = $this->db->select('*')->from('tb_post_en')->where('id_post',$id_post)->get()->row_array();
		
			if($view_post['confirm_delete'] == 0) {
				$dataresult = array('error' => 'ok','messenger' => 'Bài viết không thể xóa.',);
			}else{
				$this->db->where('id', $id_post);
				$result = $this->db->delete('tb_post');
				if(isset($view_post_vn)) {
					$this->db->where('id', $view_post_vn['id']);
					$this->db->delete('tb_post_vn');
				}
				if(isset($view_post_en)) {
					$this->db->where('id', $view_post_en['id']);
					$this->db->delete('tb_post_en');
				}
				if($result){
					$dataresult = array('access' => 'ok','messenger' => 'Bạn xóa bài viết thành công!',);
				}else{
					$dataresult = array('error' => 'ok','messenger' => 'Dữ liệu chưa được xóa vào cơ sở dữ liệu vui lòng thử lại.',);
				}
			}
		$this->session->set_flashdata($dataresult);
	}
}
