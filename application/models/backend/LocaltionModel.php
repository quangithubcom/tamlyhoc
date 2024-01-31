<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LocaltionModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getLang($lang){
		$this->db->order_by('sort_order', 'asc');
		$query = $this->db->get('qh_location');
		return $query->result_array();
	}
}
