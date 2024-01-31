<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CouponsModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getLang($lang){
		$query = $this->db->get('tb_coupons');
		return $query->result_array();
	}

	public function getActive($lang){
		$this->db->where('status', 1);
		$query = $this->db->get('tb_coupons');
		return $query->result_array();
	}
}
