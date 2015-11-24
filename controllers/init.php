<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Init extends CI_Controller {

	function __construct()
	{
		parent::__construct();
                $this->load->database();
                $this->load->library('init_db');

	}
	public function index()
	{
	}
        public function create_db($db_name="test"){
            $this->init_db->create_db($db_name);
        }
        public function delete_db($db_name="test"){
            $this->init_db->delete_db($db_name);
        }
        public function input_db($db_name="test"){
            $this->init_db->input_db($db_name);
        }

}
