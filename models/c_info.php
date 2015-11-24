<?php
class C_info extends CI_Model {
 
    function __construct()
    {       
        parent::__construct();
    }

    function get_c_list(){
        return $this->db->query('select c_name,c_num from c_info;')->result();
    }

	function get_c_name($c_num){
		return $this->db->query('select c_name from c_info where c_num='.$c_num)->result();
	}
}