<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MainModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}
	public function checkSetupExtendInfo($id_setup){
		$view = $this->db->select('extend_info')->from('tlh_setup')->where('id',$id_setup)->get()->row_array();
		echo $view['extend_info'];
	}
	public function checkStatus($status)
	{
		if($status == 1){
            echo '<span class="badge badge-soft-success p-2">Active</span>';

        }else{
            echo '<span class="badge badge-soft-danger p-2">Pause</span>';
        }
	}

	public function counter($id_counter){
		$view = $this->db->select('*')->from('tb_user')->where('id',$id_counter)->get()->row_array();
		if(isset($view)){
			echo $view['name'];
		}else{
			echo 'Không có người phản biện!';
		}
	}
	public function setupSatus($id_setup){
		$view = $this->db->select('*')->from('tlh_setup')->where('id',$id_setup)->get()->row_array();
		if(isset($view)){
			echo $view['extend'];
		}else{
			echo 'Không tồn tại!';
		}
	}
	public function checkLang($lang)
	{
		if($lang == 'vn'){
            echo '';
        }elseif($lang == 'en'){
            echo ' Tiếng Anh';
        }else{
        	echo '';
        }
	}
	public function getFatherMenu($father){
		$this->db->select('*');
		$this->db->where('father', $father);
		$this->db->where('menu_function', 0);
		$this->db->order_by('arrange', 'asc');
		$query = $this->db->get('tb_menu_backend');
		return $query->result_array();
	}
	public function viewId($table,$id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get($table);
        return $query->row_array();
	}

	public function viewField($table,$field,$field_info)
	{
		$this->db->select('*');
		$this->db->where($field,$field_info);
		$query = $this->db->get($table);
        return $query->row_array();
	}
	public function viewArray($table,$array_info)
	{
		$this->db->select('*');
		$this->db->where($array_info);
		$query = $this->db->get($table);
        return $query->row_array();
	}
	public function viewNameCategory($id_category,$lang){
		$view = $this->db->select('name_category')->from('tb_category_'.$lang)->where('id_category',$id_category)->get()->row_array();
		$name = $view['name_category'];
		return $name;
	}
	public function insert($table,$array)
	{
		$result = $this->db->insert($table, $array);
		if($result){
			$dataresult = array('access' => 'ok','messenger' => 'Thêm nội dung thành công!',);
		}else{
			$dataresult = array('error' => 'ok','messenger' => 'Dữ liệu chưa được thêm vào cơ sở dữ liệu vui lòng thử lại.',);
		}
		$this->session->set_flashdata($dataresult);
		return $this->db->insert_id();
	}

	public function insert_noti($table,$array)
	{
		$result = $this->db->insert($table, $array);
		return $this->db->insert_id();
	}

	public function update($table,$info,$id)
	{
		$this->db->where('id', $id);
		$result = $this->db->update($table, $info);
		if($result){
			$dataresult = array('access' => 'ok','messenger' => 'chỉnh sửa nội dung thành công!',);
		}else{
			$dataresult = array('error' => 'ok','messenger' => 'Dữ liệu chưa được chỉnh sửa vào cơ sở dữ liệu vui lòng thử lại.',);
		}
		$this->session->set_flashdata($dataresult);
		return $this->db->insert_id();
	}
	public function delete($table,$id)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete($table);
		if($result){
				$dataresult = array('access' => 'ok','messenger' => 'Bạn xóa nội dung thành công!',);
			}else{
				$dataresult = array('error' => 'ok','messenger' => 'Dữ liệu chưa được xóa vào cơ sở dữ liệu vui lòng thử lại.',);
			}
			$this->session->set_flashdata($dataresult);
	}

	public function listTemplate($category_template,$type_template){
		$this->db->select('*');
		$this->db->where('category_template', $category_template);
		$this->db->where('type_template', $type_template);
		$query = $this->db->get('tb_setup_template');
		return $query->result_array();
	}
}
