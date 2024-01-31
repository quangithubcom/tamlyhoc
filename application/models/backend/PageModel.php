<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PageModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function getAll(){
		$query = $this->db->get('tb_page_vn');
		return $query->result_array();
	}
	
}
