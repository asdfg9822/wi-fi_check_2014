<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
		$this->load->view('login_header');
		$this->load->view('login/login_1');
		$this->load->view('footer');
	}
}
