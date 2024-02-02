<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll(){
		$this->db->select('*');
		$this->db->where('admin', 7);
		$query = $this->db->get('tb_user');
		return $query->result_array();
	}
	public function getAllDecentralizationGroup(){
		$this->db->select('*');
		$query = $this->db->get('tb_user_decentralization');
		return $query->result_array();
	}
	public function getFatherMenu($father){
		$this->db->select('*');
		$this->db->where('father', $father);
		$this->db->order_by('arrange', 'asc');
		$query = $this->db->get('tb_menu_backend');
		return $query->result_array();
	}
	public function checkLogin($username,$password)
	{
		$query = $this->db->where('username',$username)->where('password',$password)->get('tb_user');
		return $query->result_array();
	}
	public function update_pass($id_user,$pass_new)
	{
		$update_pass = array(
			'password' => $pass_new,
		);
		$this->db->where('id', $id_user);
		$result = $this->db->update('tb_user',$update_pass);
		if($result){
			$dataresult = array('access' => 'ok','messenger' => 'Cập nhật mật khẩu thành công!',);
		}else{
			$dataresult = array('error' => 'ok','messenger' => 'Cập nhật mật khẩu thất bại. Vui lòng thử lại.',);
		}
		$this->session->set_flashdata($dataresult);
		return $this->db->insert_id();
	}
	public function decentralization_group_update($id_decentralization_group,$info_decentralization_group)
	{
		$this->db->where('id', $id_decentralization_group);
		$result = $this->db->update('tb_user_decentralization',$info_decentralization_group);
		if($result){
			$dataresult = array('access' => 'ok','messenger' => 'Cập nhật phân quyền tài khoản thành công!',);
		}else{
			$dataresult = array('error' => 'ok','messenger' => 'Cập nhật phân quyền thất bại. Vui lòng thử lại.',);
		}
		$this->session->set_flashdata($dataresult);
		return $this->db->insert_id();
	}
	public function update_decentralization($id_user,$decentralization)
	{
		$this->db->where('id', $id_user);
		$result = $this->db->update('tb_user',$decentralization);
		if($result){
			$dataresult = array('access' => 'ok','messenger' => 'Cập nhật phân quyền tài khoản thành công!',);
		}else{
			$dataresult = array('error' => 'ok','messenger' => 'Cập nhật phân quyền thất bại. Vui lòng thử lại.',);
		}
		$this->session->set_flashdata($dataresult);
		return $this->db->insert_id();
	}
}

/* End of file LoginModel.php */
/* Location: ./application/models/LoginModel.php */