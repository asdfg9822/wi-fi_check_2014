<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Camera{

    private $CI;
    
        public function __construct(){
            $this->CI = & get_instance();
            $this->CI->load->library('camera');
        }
    
        public function get_record_time(){
            
        }
        
        public function video_exec($record_time){
            date_default_timezone_set('Asia/Seoul');
            
            //echo $day = date("Y-m-d_h:i:s");
            echo $day = time();
            $path = "/var/www/check_sys/files/video/";
            $h264_name= $day.".h264";
            $mp4_name = $day.".mp4";
            
            //$record_time = $this->get_record_time();
            //$record_time = 10000; 
            
            $command = "sudo raspivid -o ".$path.$h264_name." -f -t ".$record_time;
            exec($command);
            echo "<br>";
            echo $command = "sudo MP4Box -add ".$path.$h264_name." ".$path.$mp4_name;
            exec($command);
            
            $command = "sudo rm -f ".$path.$h264_name;
            exec($command);
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
