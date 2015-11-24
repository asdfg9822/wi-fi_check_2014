<?php
class Sc_info extends CI_Model {
 
    function __construct(){       
        parent::__construct();
    }

    function get_list(){
        return $this->db->query('select c_name,c_num from c_info;')->result();
    }
    
    function insert($data){
        $this->db->insert('sc_info',$data);
    }
    
    function get_stu($c_num){
    	return $this->db->query('select s_num from sc_info where c_num='.$c_num.';')->result();
    }
    function get_late($c_num){
        return $this->db->query('select s_info.s_name,sc_info.late from s_info,sc_info where sc_info.c_num='.$c_num.' and sc_info.s_num=s_info.s_num order by sc_info.late desc;')->result();
    }
    function stu_list($c_num){
        return $this->db->query('select s_info.s_name,s_info.s_num from s_info,sc_info where sc_info.c_num='.$c_num.' and sc_info.s_num=s_info.s_num order by sc_info.s_num;')->result();
    }
    function add_point($c_num,$s_num){
        $this->db->query('update sc_info set point=point+1 where c_num='.$c_num.' and s_num="'.$s_num.'";');
    }
    function get_point_list($c_num){
        return $this->db->query('select s_info.s_name,s_info.s_num,sc_info.point from s_info,sc_info where sc_info.c_num='.$c_num.' and sc_info.s_num=s_info.s_num order by sc_info.point desc;')->result();
    }
    function get_stu_count($c_num){
        return $this->db->query('select count(s_num) as num from sc_info where c_num='.$c_num.';')->result();
    }
}

//update sc_info set point=point+1 where c_num=22 and s_num="20012341";
