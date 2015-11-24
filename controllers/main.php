<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

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

	}
	public function group($c_num=NULL){
        $act=2;
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        if($this->sc_info->get_list()!=NULL){
        	$c_num=$this->sc_info->get_list()[0]->c_num;
        }else{
        	$c_num=0;
        }
		$data['stu_list'] = $this->sc_info->get_list();

		$this->load->view("header",array('act'=>$act));
		$this->load->view('main/topbar');
		$this->load->view('main/list',array('lists'=>$data['stu_list']));
		$this->load->view('main/class_upload');
		$data['stu_date'] = $this->d_info->get_date($c_num);
		$data['stu_list'] = $this->s_info->get_stu_list($c_num);
		$data['att_info'] = $this->d_info->get_att_info($c_num);
		$data['stu_notify']=$this->admin_notify->get_data($c_num);
		if($c_num==0){
			$this->load->view('main/empty');
		}
		else{
			$this->load->view('main/stu_notify',array('notify'=>$data['stu_notify']));
			$this->load->view('main/student_att',array('dates'=>$data['stu_date'],'att_info'=>$data['att_info'],'stu_list'=>$data['stu_list']));
			$data['down_path'] = $this->stu_file->get_id($c_num);
			$this->load->view('main/stu_down',array('down_path'=>$data['down_path']));
			$data['hw_list']=$this->h_info->get_hwlist($c_num);
			$this->load->view('main/stu_upload', array('hw_list'=>$data['hw_list'],'c_num'=>$c_num));
			$s_count[0]=$this->s_info->get_first($c_num,1);
			$s_count[1]=$this->s_info->get_first($c_num,2);
			$s_count[2]=$this->s_info->get_first($c_num,3);
			$s_count[3]=$this->s_info->get_first($c_num,4);
			$date_list=$this->d_info->get_date($c_num);
			foreach($date_list as $i => $entry){
				$date_att[$i]=$this->d_info->att_count($c_num,$entry->date);
			}
			$this->load->view('main/pi_graph',array('s_count'=>$s_count));
			if($date_list!=NULL){
				$this->load->view('main/area_graph',array('date_list'=>$date_list,'date_att'=>$date_att));

				$this->load->view('main/admin_att');
			}
		}
		$this->load->view('footer');
	}

	function do_upload($c_num)
	{
		$config['upload_path'] = '/var/www/check_sys/files/student';
		$config['allowed_types'] = '*';
		$config['max_size']	= '100';
		$config['remove_spaces']= 'TURE';
		//$config['file_name']	= 'haha';
		//$config['max_width']  = '1024';
		//$config['max_height']  = '768';
		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			echo "<script>alert('게시물 등록 실패'); </script>";
		}	
		else
		{
			$data = array('upload_data' => $this->upload->data(),'h_num'=>$_POST['hw']);
			$this->stu_file->init_path($data['upload_data'],$data['h_num'],$c_num,"20091195");
			echo "<script>alert('게시물 등록 완료'); </script>";
		}
		redirect('/main/group/'.$c_num, 'refresh');
	}	
	function do_download(){
		$file_info=$this->stu_file->get_fileinfo($_POST['file_id']);
		foreach($file_info as $entry){
			$this->load->helper('download');
			$data = file_get_contents($entry->file_path); 
			$name = $entry->file_name;		
			force_download($name, $data);
		}
	}
	function excel_upload(){
		$config['upload_path'] = '/var/www/check_sys/files/excel';
		$config['allowed_types'] = '*';
		$config['max_size']	= '1000';
		$config['remove_spaces']= 'TURE';
		//$config['file_name']	= 'haha';
		//$config['max_width']  = '1024';
		//$config['max_height']  = '768';
		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
                    $error = array('error' => $this->upload->display_errors());
                    echo "<script>alert('게시물 등록 실패'); </script>";
		}	
		else
		{
                    //test 를 위한 db 재생성 
                    //$this->load->library('init_db');
                    //$this->init_db->delete_db('test');
                    //$this->init_db->create_db('test');

                    //excel을 이용한 수업정보 등록 
                    $this->load->library('check_excel');
                    $this->check_excel->create_class();

                    //$this->stu_file->init_path($data['upload_data'],$data['h_num'],"21","20091195");
                    echo "<script>alert('게시물 등록 완료'); </script>";
		}
		redirect('/main/group/22', 'refresh');
	}
}
