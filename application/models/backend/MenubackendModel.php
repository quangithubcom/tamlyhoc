<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MenuBackendModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAll(){
		$query = $this->db->get('tb_menu_backend');
		return $query->result_array();
	}
	public function getFather($father){
		$this->db->select('*');
		$this->db->where('father', $father);
		$this->db->order_by('arrange', 'asc');
		$query = $this->db->get('tb_menu_backend');
		return $query->result_array();
	}
	public function checkArrange($father){
		$list_father = $this->db->select('*')->from('tb_menu_backend')->where('father',$father)->get()->result_array();
		return count($list_father)+1;
	}
	public function getAllOption($father){
		// Displayed in the Select data importer
		$list_father = $this->db->select('*')->from('tb_menu_backend')->where('father',$father)->get()->result_array();
		$array_menu = '';
		foreach ($list_father as $key => $menu_backend) {
			$list_father_sub_1 = $this->db->select('*')->from('tb_menu_backend')->where('father',$menu_backend['id'])->get()->result_array();
			$array_menu = $array_menu.'<option value="'.$menu_backend['id'].'">'.$menu_backend['name_menu'].'</option>';

				foreach ($list_father_sub_1 as $key => $menu_backend_sub_1) {
					$list_father_sub_2 = $this->db->select('*')->from('tb_menu_backend')->where('father',$menu_backend_sub_1['id'])->get()->result_array();
					$array_menu = $array_menu.'<option value="'.$menu_backend_sub_1['id'].'">-------- '.$menu_backend_sub_1['name_menu'].'</option>';

						foreach ($list_father_sub_2 as $key => $menu_backend_sub_2) {
							$list_father_sub_3 = $this->db->select('*')->from('tb_menu_backend')->where('father',$menu_backend_sub_2['id'])->get()->result_array();
							$array_menu = $array_menu.'<option value="'.$menu_backend_sub_2['id'].'">---------------- '.$menu_backend_sub_2['name_menu'].'</option>';

								foreach ($list_father_sub_3 as $key => $menu_backend_sub_3) {
									$list_father_sub_4 = $this->db->select('*')->from('tb_menu_backend')->where('father',$menu_backend_sub_3['id'])->get()->result_array();
									$array_menu = $array_menu.'<option value="'.$menu_backend_sub_3['id'].'">------------------------ '.$menu_backend_sub_3['name_menu'].'</option>';

										foreach ($list_father_sub_4 as $key => $menu_backend_sub_4) {
											$array_menu = $array_menu.'<option value="'.$menu_backend_sub_4['id'].'">-------------------------------- '.$menu_backend_sub_4['name_menu'].'</option>';
										}
								}
						}
				}
		}
		return $array_menu;
	}

	public function getAllOptionEdit($father,$id_menu_backend){

		$list_father = $this->db->select('*')->from('tb_menu_backend')->where('father',$father)->get()->result_array();

		$array_menu = '';
		foreach ($list_father as $key => $menu_backend) {
			$list_father_sub_1 = $this->db->select('*')->from('tb_menu_backend')->where('father',$menu_backend['id'])->get()->result_array();
			if($menu_backend['id'] == $id_menu_backend){ $check = ' selected'; }else{ $check = ''; }
			// Check if the parent category is previously selected
			$array_menu = $array_menu.'<option value="'.$menu_backend['id'].'"'.$check.'>'.$menu_backend['name_menu'].'</option>';

				foreach ($list_father_sub_1 as $key => $menu_backend_sub_1) {
					// Check if the parent category is previously selected
					if($menu_backend_sub_1['id'] == $id_menu_backend){ $check = ' selected'; }else{ $check = ''; }
					$list_father_sub_2 = $this->db->select('*')->from('tb_menu_backend')->where('father',$menu_backend_sub_1['id'])->get()->result_array();
					$array_menu = $array_menu.'<option value="'.$menu_backend_sub_1['id'].'"'.$check.'>-------- '.$menu_backend_sub_1['name_menu'].'</option>';

						foreach ($list_father_sub_2 as $key => $menu_backend_sub_2) {
							// Check if the parent category is previously selected
							if($menu_backend_sub_2['id'] == $id_menu_backend){ $check = ' selected'; }else{ $check = ''; }
							$list_father_sub_3 = $this->db->select('*')->from('tb_menu_backend')->where('father',$menu_backend_sub_2['id'])->get()->result_array();
							$array_menu = $array_menu.'<option value="'.$menu_backend_sub_2['id'].'"'.$check.'>---------------- '.$menu_backend_sub_2['name_menu'].'</option>';

									foreach ($list_father_sub_3 as $key => $menu_backend_sub_3) {
										// Check if the parent category is previously selected
										if($menu_backend_sub_3['id'] == $id_menu_backend){ $check = ' selected'; }else{ $check = ''; }
										$array_menu = $array_menu.'<option value="'.$menu_backend_sub_3['id'].'"'.$check.'>------------------------ '.$menu_backend_sub_3['name_menu'].'</option>';
									}
						}
				}
		}

		return $array_menu;
	}

	public function viewId($id_menu_backend)
	{
		$this->db->select('*');
		$this->db->where('id', $id_menu_backend);
		$query = $this->db->get('tb_menu_backend');
        return $query->row_array();
	}
}

/* End of file MenuBackendModel.php */
/* Location: ./application/models/MenuBackendModel.php */