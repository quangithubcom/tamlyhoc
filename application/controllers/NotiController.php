<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotiController extends CI_Controller {

	public function index()
	{
		$data['list_post'] = $this->db->select('*')->from('tlh_postinglist')->get()->result_array();
		$data['template'] = 'postinglist/v_main';
		$this->load->view('backend/layout/v_main',$data);
	}

}

