<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Check_excel{

    private $CI;
    
    public function __construct(){
        $this->CI = & get_instance();
        $this->CI->load->library('excel');
    }
    
    public function create_class($inputFileName = 'attend.xls')
    {       
        $db_name = "check_sys";

        $db = $this->CI->load->database($db_name); 
        $this->CI->db->query('use '.$db_name);

        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);
        date_default_timezone_set('Asia/Seoul');
        define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

        require_once '/var/www/check_sys/check_web/application/third_party/PHPExcel.php';


                //excel 지정
        $inputFilePath = '/var/www/check_sys/files/excel/'.$inputFileName;


                $objPHPExcel = PHPExcel_IOFactory::load($inputFilePath);  //excel load 
                $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true); //excel to array 
                
                $this->insert_excel($sheetData);
                
            }

            function insert_excel($sheetData){
            //Class Infomation
                echo $c_name  = $sheetData[EXCEL_CINFO_ROW_2][EXCEL_CNAME_COLUMN];
                echo $c_num   = $sheetData[EXCEL_CINFO_ROW_2][EXCEL_CNUM_COLUMN];
                echo $a_name  = $sheetData[EXCEL_CINFO_ROW_1][EXCEL_ANAME_COLUMN];
                echo $s_time1 = $sheetData[EXCEL_CINFO_ROW_1][EXCEL_STIME_COLUMN];
                echo $e_time1 = $sheetData[EXCEL_CINFO_ROW_1][EXCEL_ETIME_COLUMN];
                echo $s_time2 = $sheetData[EXCEL_CINFO_ROW_2][EXCEL_STIME_COLUMN];
                echo $e_time2 = $sheetData[EXCEL_CINFO_ROW_2][EXCEL_ETIME_COLUMN];
                echo $c_dept  = $sheetData[EXCEL_CINFO_ROW_1][EXCEL_CDEPT_COLUMN];
                echo $day_temp1 = $sheetData[EXCEL_CINFO_ROW_1][EXCEL_DAY_COLUMN];
                echo $day_temp2 = $sheetData[EXCEL_CINFO_ROW_2][EXCEL_DAY_COLUMN];

                $day = $this->day_to_int($day_temp1,$day_temp2);

            //Student Infomation
                for( $i=EXCEL_STU_START_ROW ; isset($sheetData[$i][EXCEL_STU_SORTING_NUM_COLUMN]) ; $i++){
                $s_names[] = $sheetData[$i][EXCEL_SNAME_COLUMN];  //Get stu_num
                $s_nums[]  = $sheetData[$i][EXCEL_SNUM_COLUMN];  //Get stu_num
                $s_depts[] = $sheetData[$i][EXCEL_SDEPT_COLUMN];  //Get stu_num
                $s_years[] = $sheetData[$i][EXCEL_SYEAR_COLUMN];  //Get stu_num
            }
            
            //c_info table 
            $cinfo_data = array(
                'c_num' => (int)$c_num,
                'c_name'=> $c_name,
                'c_dept'=> $c_dept,
                'a_id'=> $a_name,
                'succ_per' => (int)50,
                'ap_id'=>"0812",
                );
            $this->CI->db->insert('c_info',$cinfo_data);
            
            //c_info table 
            $cinfo_data = array(
                'c_num' => (int)$c_num,
                's_time1'=> $s_time1,
                'e_time1'=> $e_time1, 
                's_time2'=> $s_time2,
                'e_time2'=> $e_time2,
                'day1'=>$day[0],
                'day2'=>$day[1],
                );
            $this->CI->db->insert('c_time',$cinfo_data);
            
            foreach($s_nums as $i => $s_num){

                //s_info table
                /*$sinfo_data = array(
                    's_num'=>$s_nums[$i],
                    's_name'=>$s_names[$i],
                    's_year'=>$s_years[$i],
                    's_dept'=>$s_depts[$i],
                    );
                $this->CI->db->insert('s_info',$sinfo_data);*/
                $this->CI->db->query('insert into s_info values("'.$s_nums[$i].'","'.$s_names[$i].'",'.$s_years[$i].',"'.$s_depts[$i].'",NULL) on duplicate key update s_name=s_name;');


                //sc_info table
                $scinfo_data = array(
                    'c_num'=>$c_num,
                    's_num'=>$s_nums[$i],
                    );
                $this->CI->db->insert('sc_info',$scinfo_data);
            }
            
            
        }
        
        function day_to_int($day_temp,$day_temp2){

            if($day_temp == "월")
                $day[0] = 2;
            elseif($day_temp == "화")
                $day[0] = 3;
            elseif($day_temp == "수")
                $day[0] = 4;
            elseif($day_temp == "목")
                $day[0] = 5;
            elseif($day_temp == "금")
                $day[0] = 6;
            elseif($day_temp == "토")
                $day[0] = 7;
            elseif($day_temp == "일")
                $day[0] = 1;
            else
                $day[0] = 0;
            
            if($day_temp2 == "월")
                $day[1] = 2;
            elseif($day_temp2 == "화")
                $day[1] = 3;
            elseif($day_temp2 == "수")
                $day[1] = 4;
            elseif($day_temp2 == "목")
                $day[1] = 5;
            elseif($day_temp2 == "금")
                $day[1] = 6;
            elseif($day_temp2 == "토")
                $day[1] = 7;
            elseif($day_temp2 == "일")
                $day[1] = 1;
            else
                $day[1] = 0;
            
            return $day;
        }
        
    }

    /* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */
