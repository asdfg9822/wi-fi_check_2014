<?php
class D_info extends CI_Model {
 
    function __construct()
    {       
        parent::__construct();
    }

	function get_date($c_num){
		return $this->db->query('select distinct date from d_info where c_num='.$c_num.' order by date;')->result();
	}

	function get_att_info($c_num){
		return $this->db->query(' select s_num,date,conn,res from d_info where c_num='.$c_num.' order by date,s_num;')->result();	
	}

	function att_count($c_num,$date){
		return $this->db->query('select count(res) as num from d_info where (res="pass" || res="late") and date="'.$date.'" and c_num='.$c_num.';')->result();
	}

	function cur_att_count($c_num){
		return $this->db->query('select count(s_num) as num1 from d_info where c_num='.$c_num.' and date=date(now()) and check_num>=1;')->result();
	}

}