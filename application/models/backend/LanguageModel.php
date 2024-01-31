<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LanguageModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function getAll(){
		$query = $this->db->get('tb_language');
		return $query->result_array();
	}
	public function delete($id_language)
	{
		// Kiểm tra xem giao diện có đang được dùng không
		$view_language = $this->db->select('*')->from('tb_language')->where('id',$id_language)->get()->row_array();
		
		if($view_language['confirm_delete'] == 0) {
			$dataresult = array('error' => 'ok','messenger' => 'Ngôn ngữ không thể xóa.',);
		}else{
			$this->db->where('id', $id_language);
			$result = $this->db->delete('tb_language');
			if($result){
				$dataresult = array('access' => 'ok','messenger' => 'Bạn xóa ngôn ngữ thành công!',);
			}else{
				$dataresult = array('error' => 'ok','messenger' => 'Dữ liệu chưa được xóa vào cơ sở dữ liệu vui lòng thử lại.',);
			}
		}
		$this->session->set_flashdata($dataresult);
	}
}
