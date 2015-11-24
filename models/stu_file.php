<?php
class Stu_file extends CI_Model {
 
    function __construct()
    {
        parent::__construct();
    }

	function init_path($upload_data,$h_num,$c_num,$s_num){
		$this->db->query('insert into stu_file values(0,"'.$c_num.'","'.$s_num.'","'.$h_num.'","'.$upload_data['full_path'].'","'.$upload_data['file_name'].'",now());');
	}
	function get_id($c_num){
		return $this->db->query('select id,file_path,file_name from stu_file where c_num='.$c_num)->result();
	}
	function get_fileinfo($id){
		return $this->db->query('select file_path,file_name from stu_file where id='.$id)->result();	
	}
}