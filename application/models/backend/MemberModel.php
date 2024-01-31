<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MemberModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getLang($lang){
		$this->db->order_by('sort_order', 'asc');
		$query = $this->db->get('qh_member');
		return $query->result_array();
	}
}
