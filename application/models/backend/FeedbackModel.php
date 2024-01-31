<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FeedbackModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function getLang($lang){
		$this->db->select('*');
		$this->db->order_by('sort_order', 'asc');
		$query = $this->db->get('tb_feedback');
		return $query->result_array();
	}
}
