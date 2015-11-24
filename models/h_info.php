<?php
class H_info extends CI_Model {
 
    function __construct()
    {       
        parent::__construct();
    }

	function get_hwlist($c_num){
		return $this->db->query('select h_num,title,end_time from h_info where c_num='.$c_num.' and end_time>now();')->result();
	}

}