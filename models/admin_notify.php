<?php
class Admin_notify extends CI_Model {
 
    function __construct()
    {       
        parent::__construct();
    }

	function get_data($c_num){
		return $this->db->query('select title,des,regi_date from admin_notify where c_num='.$c_num.';')->result();
	}

}