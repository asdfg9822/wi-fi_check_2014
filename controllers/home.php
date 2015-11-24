<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('form', 'url'));
		$this->load->model('sc_info');
		$this->load->model('d_info');
		$this->load->model('admin_notify');
		$this->load->model('stu_file');
		$this->load->model('h_info');
		$this->load->model('c_info');
		$this->load->model('s_info');
		$this->load->model('time');
	}
	public function index()
	{
	}

	public function main($c_num=NULL){
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		if($this->time->get_cnum()!=NULL){
			$c_num=$this->time->get_cnum()[0]->c_num;
		}else{
			$c_num=0;
		}
		$act=1;
		$this->load->view("header",array('act'=>$act));
		$this->load->view('main/topbar');
		$data['result']=$this->time->get_time($c_num);
		$data['c_name']=$this->c_info->get_c_name($c_num);
		$data['att_stu_list']=$this->s_info->att_stu_list($c_num);
		$data['n_att_stu_list']=$this->s_info->n_att_stu_list($c_num);
		$data['late_list']=$this->sc_info->get_late($c_num);
		$data['stu_list']=$this->sc_info->stu_list($c_num);
		$data['c_num']=$c_num;
		$data['point_list']=$this->sc_info->get_point_list($c_num);
		$data['notify_list']=$this->admin_notify->get_data($c_num);
		$data['c_list']=$this->c_info->get_c_list();
		$num=$this->sc_info->get_stu_count($c_num);
		$num1=$this->d_info->cur_att_count($c_num);
		if($data['result']!=1){
			$data['per']=($num1[0]->num1)/($num[0]->num)*100;
			settype($data['per'], "integer");
		}
		else{
			$data['per']=0;	
		}
		if($c_num!=0){
			$this->load->view('/home/home',array('data'=>$data,'c_num'=>$c_num));
		}
		else{
			$this->load->view('/home/empty',array('data'=>$data,'c_num'=>$c_num));	
		}
			$this->load->view('footer');	
	}


	function add_point(){
		$s_num = $_POST['add_point'];
		$c_num = $_POST['c_num'];
		$this->sc_info->add_point($c_num,$s_num);
		echo "<script>alert('성공');</script>";
		redirect('/home/main/'.$c_num, 'refresh');
	}
}
