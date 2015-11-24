<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
    
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
	}
	public function index()
	{
            $this->setting_view();
	}
        
        public function setting_view($c_num=22){
            $act = 3; 
            
            $data['stu_list'] = $this->sc_info->get_list(22);
            $this->load->view("header",array('act'=>$act));
            $this->load->view('main/topbar');
            $this->load->view('main/list',array('lists'=>$data['stu_list']));
            $this->load->view('setting/body');
            $this->load->view('footer');
        }
        
        public function video_record(){
            $time = $this->input->post("time",TRUE);
            
            $time = $time * 1000;
            
            $this->load->library('camera');
            $this->camera->video_exec($time);
        }        
        
        public function video_view(){
            $act = 3; 
            
            $dir_path = "/var/www/check_sys/files/video/";
            $dir_lists_temp = scandir($dir_path);
            
            //except '.' or '..'
            foreach ( $dir_lists_temp as $list){
                if( $list === "." || $list ===".." ){
                    continue;
                }
                $temp = explode(".", $list);
                $data['file_name'][] = date("Y-m-d h:i:s",$temp[0]);
                $data['file_val'][] = $list;
            }
            
            //echo "<pre>".  var_dump($dir_lists)."</pre>"; // view files in dir
            
            if(isset($_POST['video_name'])){
                $data['video_name'] = trim($_POST['video_name']);
                //$current = time();
                //dd = date("Y-m-d", $current);
            }
            else{
                $data['video_name'] = NULL;
            }
            
            //$data['stu_list'] = $this->sc_info->get_list();
            $this->load->view("header",array('act'=>$act));
            $this->load->view('main/topbar');
            $this->load->view('setting/camera_func',array(
                'video_name' => $data['video_name'],
                'file_name'  => $data['file_name'],
                'file_val'  => $data['file_val'],
                ));
            
            $this->load->view('main/footer');
        }
        
        public function data_on_off(){
            $data = $this->input->post("data",TRUE);
            $result = 0;
            
            if(!$data){
                $command = "sudo ifconfig br0 155.155.155.155 netmask 255.255.255.0";
                exec($command);
                $command = "sudo service networking restart";
                exec($command);
                $result = 0;
            }
            else{
                $command = "sudo service networking restart";
                exec($command);
                $command = "sudo service hostapd restart";
                exec($command);
                $result = 1; 
            }
            
           echo $result;
        }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */