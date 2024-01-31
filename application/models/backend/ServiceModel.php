<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ServiceModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll(){
		$query = $this->db->get('tb_setup_template');
		return $query->result_array();
	}
	public function getType($category_template,$type_template){
		$this->db->where('category_template',$category_template);
		$this->db->where('type_template',$type_template);
		$query = $this->db->get('tb_setup_template');
		return $query->result_array();
	}

	public function delete($id_template){
		// Kiểm tra xem giao diện có đang được dùng không
		$list = $this->db->select('id')->from('tb_post_vn')->where('id_template',$id_template)->get()->result_array();
		$view_template = $this->db->select('*')->from('tb_setup_template')->where('id',$id_template)->get()->row_array();
		if(count($list) > 0){
			$dataresult = array('error' => 'ok','messenger' => 'Giao diện đã được dùng không thể xóa.',);
		}else{
			if($view_template['delete_template'] == 0) {
				$dataresult = array('error' => 'ok','messenger' => 'Giao diện không thể xóa.',);
			}else{
				unlink('application/views/'.$view_template['url_template']);
				$this->db->where('id', $id_template);
				$result = $this->db->delete('tb_setup_template');
				if($result){
					$dataresult = array('access' => 'ok','messenger' => 'Bạn xóa giao diện thành công!',);
				}else{
					$dataresult = array('error' => 'ok','messenger' => 'Dữ liệu chưa được xóa vào cơ sở dữ liệu vui lòng thử lại.',);
				}
			}
		}
		$this->session->set_flashdata($dataresult);
	}
}
