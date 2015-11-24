<?php
class S_info extends CI_Model {

	function __construct()
	{       
		parent::__construct();
	}

	function get_stu_list($c_num){
		return $this->db->query('select s_name,s_num from s_info where s_num=any(select s_num from sc_info where c_num='.$c_num.') order by s_name;')->result();
	}

	function get_syear($s_num){
		return $this->db->query("select * from s_info where s_num=".$s_num.";")->result();
	}
	function att_stu_list($c_num){
		return $this->db->query("select s_name from s_info where s_num=any(select s_num from d_info where check_num>0 and date=date(now()) and c_num=".$c_num.");")->result();
	}
	function n_att_stu_list($c_num){
		return $this->db->query("select s_name from s_info where s_num=any(select s_num from d_info where check_num=0 and date=date(now()) and c_num=".$c_num.");")->result();	
	}
	function get_first($c_num,$year){
		return $this->db->query("select count(s_info.s_year) as num from s_info,sc_info where sc_info.c_num=".$c_num." and sc_info.s_num=s_info.s_num and s_info.s_year=".$year." order by sc_info.s_num;")->result();
	}
        function input_mac($s_num,$mac){
            $this->db->query("update s_info set s_mac='".$mac."' where s_num='".$s_num."';");
        }
}