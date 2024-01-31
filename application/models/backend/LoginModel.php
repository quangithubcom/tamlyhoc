<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function checkLogin($username,$password)
	{
		$query = $this->db->where('email',$username)->where('password',$password)->get('tb_user');
		return $query->result();
	}

}

/* End of file LoginModel.php */
/* Location: ./application/models/LoginModel.php */