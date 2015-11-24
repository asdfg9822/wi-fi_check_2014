<?php
class Time extends CI_Model {
 
    function __construct()
    {       
        parent::__construct();
    }
    function get_time($c_num){
    	return $this->db->query('select (s_time1 < time(now()) && time(e_time1) > time(now()) && dayofweek(now()) = day1) || (s_time2 < time(now()) && time(e_time2+3)>time(now()) && dayofweek(now())=day2)=1 as result from c_time where c_num='.$c_num.';')->result();
    }
    function get_cnum(){
    	return $this->db->query('select c_num from c_time where (s_time1<now()&&time(e_time1)>time(now())&&dayofweek(now())=day1) || (s_time2<now()&&time(e_time2+3)>time(now())&&dayofweek(now())=day2)=1;')->result();
    }
}