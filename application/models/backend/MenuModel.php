<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MenuModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll($lang){
		$this->db->where('id_menu_food', 0);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('qh_menu_post_'.$lang);
		return $query->result_array();
	}
	public function getFood($id_menu_food,$lang){
		$this->db->where('id_menu_food', $id_menu_food);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('qh_menu_post_'.$lang);
		return $query->result_array();
	}
	public function getType($category_type,$lang){
		$this->db->where('category_type',$category_type);
		$query = $this->db->get('tb_post_vn');
		return $query->result_array();
	}
	public function getStatus($lang){
		$query = $this->db->get('qh_menu_post_'.$lang);
		return $query->result_array();
	}
	public function getFatherType($id_father,$category_type){
		$this->db->where('category_type',$category_type);
		$this->db->where('id_father',$id_father);
		$query = $this->db->get('tb_category_vn');
		return $query->result_array();
	}

	public function delete($id_menu)
	{
		// Kiểm tra có menu con kh
		$list = $this->db->select('id')->from('qh_menu_post_vn')->where('id_menu_food',$id_menu)->get()->result_array();
		if(count($list) > 0){
			$dataresult = array('error' => 'ok','messenger' => 'Có menu con.Vui lòng xóa Menu con trước.',);
		}else{
			$this->db->where('id', $id_menu);
			$result = $this->db->delete('qh_menu_post_vn');
			if($result){
				$dataresult = array('access' => 'ok','messenger' => 'Bạn xóa Menu thành công!',);
			}else{
				$dataresult = array('error' => 'ok','messenger' => 'Dữ liệu chưa được xóa vào cơ sở dữ liệu vui lòng thử lại.',);
			}
		}
		$this->session->set_flashdata($dataresult);
	}
}
