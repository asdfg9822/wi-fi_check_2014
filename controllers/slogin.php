<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slogin extends CI_Controller {
    
    	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('s_info');
	}
        
	public function index()
	{
            $s_num = $this->input->post("s_num",TRUE);
                //echo "<script>alert(".$s_num.");</script>";
            if($s_num){
                $sdata = $this->s_info->get_syear($s_num);
                if($sdata==NULL){
                    $s_num = 0;
                }
            }
            $this->load->view('header');
            if(!$s_num)
                $this->load->view('student/login');
            else{
                $this->get_stu_mac($s_num);
                $this->load->view('student/welcome');
            }
            $this->load->view('footer');
	}
        public function get_stu_info(){
            $s_num = $this->input->post("s_num",TRUE);
            
            $sdata = $this->s_info->get_syear($s_num);
            //echo '{"data": '.$s_name[0]->s_name.'}';
            //echo $s_name[0]->s_name;
            
            echo json_encode($sdata[0]);
        }
        public function get_stu_mac($s_num){
                $ip=getenv("REMOTE_ADDR");
                
                if(PHP_OS=='WINNT'){
                exec("sudo arp -a", $rgResult);
                $mac_template="/[\d|A-F]{2}\-[\d|A-F]{2}\-[\d|A-F]{2}\-[\d|A-F]{2}\-[\d|A-F]{2}\-[\d|A-F]{2}/i";
                foreach($rgResult as $key=>$value){
                    if(strpos($value, $ip)!==FALSE){
                        preg_match($mac_template, $value, $matches);
                        break;
                    }
                }
                } else{
                exec("sudo arp -a | grep $ip", $rgResult);
                $mac_template="/[\d|A-F]{2}\:[\d|A-F]{2}\:[\d|A-F]{2}\:[\d|A-F]{2}\:[\d|A-F]{2}\:[\d|A-F]{2}/i";
                preg_match($mac_template, $rgResult[0], $matches);
                }
                $mac = $matches[0];
                //echo $s_num."/".$mac."/";
                $this->s_info->input_mac($s_num,$mac);
        }
}
