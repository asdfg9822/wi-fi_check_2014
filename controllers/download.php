<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Download extends CI_Controller {
	
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
	}

	public function index() {
		$data['stu_date'] = $this->d_info->get_date("21","20091195");
		$data['att_info'] = $this->d_info->get_att_info("21","20091195");
		$this->load->view('download',array('dates'=>$data['stu_date'],'att_info'=>$data['att_info']));
		}
}
