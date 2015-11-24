<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//종혁수정 2014-08-10 
//목적 : DB가 없을 경우 DB,Table 생성 
//기본적으로 DB가 설치되어있어야함

//<Usage> 예시, 현재 my_db라는 디비명 사용

//DB, TABLE 생성  
//  1) Web 실행 : 203.237.80.139/check_sys/check_web/index.php/init/create_db/db이름 
//  2) CLI 실행 : (웹루트 이동 후) php index.php init create_db db이름

//DB 삭제 
//  1) Web 실행 : 203 .237.80.139/check_sys/check_web/index.php/init/delete_db/DB이름 
//  2) CLI 실행 : (웹루트 이동 후) php index.php init delete_db db이름


class Init_db{

    private $CI;
    
	public function __construct()
	{
            $this->CI =& get_instance();    
            $this->CI->load->dbforge();
	}
        
	public function create_db($db_name)
	{
            if ($this->CI->dbforge->create_database('IF NOT EXISTS '.$db_name))
            {
                echo 'Database created!<br>'; 
            }
            
            $this->CI->load->database($db_name);
            $this->CI->db->query('use '.$db_name);
            
            $this->tcreate_admin_file();
            $this->tcreate_admin_notify();
            $this->tcreate_c_info();
            $this->tcreate_d_info();
            $this->tcreate_h_info();
            $this->tcreate_s_info();
            $this->tcreate_sc_info();
            $this->tcreate_stu_file();
            
            echo 'Table created!'; 
	}
        
        public function delete_db($db_name){
            
            if ($this->CI->dbforge->drop_database($db_name))
            {
                echo 'Database deleted!'; 
            }
            else
                echo 'Database not exist..';
        }
        
        public function tcreate_admin_file(){
            $fields = array(
                'id' => array(
                            'type'=>'int',
                            'constraint'=>'11',
                            'auto_increment'=>TRUE
                        ),
                'c_num' => array(
                            'type'=>'int',
                            'constraint'=>'11',
                            'null'=>TRUE
                        ),
                'title' => array(
                            'type'=>'VARCHAR',
                            'constraint'=>'100',
                            'null'=>TRUE
                        ),
                'des' => array(
                            'type'=>'mediumtext',
                            'null'=>TRUE
                        ),
                'filepath' => array(
                            'type'=>'VARCHAR',
                            'constraint'=>'100',
                            'null'=>TRUE
                        ),
                'filename' => array( 
                            'type'=>'VARCHAR',
                            'constraint'=>'100',
                            'null'=>TRUE
                        ),
            );
            
            $this->CI->dbforge->add_field($fields);
            $this->CI->dbforge->add_key('id', TRUE);
            $this->CI->dbforge->create_table('admin_file', TRUE);
        }
        
        public function tcreate_admin_notify(){
            $fields = array(
                'id' => array(
                            'type'=>'int',
                            'constraint'=>'11',
                            'auto_increment'=>TRUE
                        ),
                'c_num' => array(
                            'type'=>'int',
                            'constraint'=>'11',
                            'null'=>TRUE
                        ),
                'title' => array(
                            'type'=>'VARCHAR',
                            'constraint'=>'100',
                            'null'=>TRUE
                        ),
                'des' => array(
                            'type'=>'mediumtext',
                            'null'=>TRUE
                        ),
                'regi_date' => array(
                            'type'=>'date',
                            'null'=>TRUE
                        ),
            );
            
            $this->CI->dbforge->add_field($fields);
            $this->CI->dbforge->add_key('id', TRUE);
            $this->CI->dbforge->create_table('admin_notify', TRUE);
        }
        
        
        public function tcreate_c_info(){
            $fields = array(
                'id' => array(
                            'type'=>'int',
                            'constraint'=>'11',
                            'auto_increment'=>TRUE
                        ),
                'c_num' => array(
                            'type'=>'int',
                            'constraint'=>'11',
                            'null'=>TRUE
                        ),
                'c_name' => array(
                            'type'=>'VARCHAR',
                            'constraint'=>'40',
                            'null'=>TRUE
                        ),
                'c_dept' => array(
                            'type'=>'VARCHAR',
                            'constraint'=>'25',
                            'null'=>TRUE,
                        ),
                'a_name' => array(
                            'type'=>'VARCHAR',
                            'constraint'=>'15',
                            'null'=>TRUE
                        ),
                's_time' => array(
                            'type'=>'time',
                            'null'=>TRUE
                        ),
                'e_time' => array(
                            'type'=>'time',
                            'null'=>TRUE
                        ),
                'succ_per' => array(
                            'type'=>'int',
                            'constraint'=>'11',
                            'defalut'=>'50',
                            'unsigned' => TRUE,
                            'default' => '50',
                        ),
                'ap_id' => array(
                            'type'=>'int',
                            'constraint'=>'11',
                            'null'=>TRUE
                        ),
                'day' => array(
                            'type'=>'int',
                            'constraint'=>'10',
                            'null'=>TRUE
                        ),
                'day2' => array(
                            'type'=>'int',
                            'constraint'=>'10',
                            'null'=>TRUE
                        ),
                
            );
            
            $this->CI->dbforge->add_field($fields);
            $this->CI->dbforge->add_key('id', TRUE);
            $this->CI->dbforge->create_table('c_info', TRUE);
        }
        
        public function tcreate_d_info(){
            $fields = array(
                'id' => array(
                            'type'=>'int',
                            'constraint'=>'11',
                            'auto_increment'=>TRUE
                        ),
                's_num' => array(
                            'type'=>'VARCHAR',
                            'constraint'=>'10',
                            'null'=>TRUE
                        ),
                'c_num' => array(
                            'type'=>'int',
                            'constraint'=>'11',
                            'null'=>TRUE
                        ),
                'date' => array(
                            'type'=>'date',
                            'null'=>TRUE
                        ),
                'status' => array(
                            'type'=>'VARCHAR',
                            'constraint'=>'10',
                            'null'=>TRUE
                        ),
                'per' => array(
                            'type'=>'int',
                            'constraint'=>'10',
                            'null'=>TRUE,
                        ),
                'conn' => array(
                            'type'=>'date',
                            'null'=>TRUE
                        ),
                'check_num' => array(
                            'type'=>'int',
                            'constraint'=>'11',
                            'null'=>TRUE,
                        ),
                'div_count' => array(
                            'type'=>'int',
                            'constraint'=>'11',
                            'null'=>TRUE,
                        ),
                'res' => array(
                            'type'=>'VARCHAR',
                            'constraint'=>'10',
                            'null'=>TRUE,
                        ),
                'point' => array(
                            'type'=>'int',
                            'constraint'=>'11',
                            'null'=>TRUE,
                        ),
            );
            
            $this->CI->dbforge->add_field($fields);
            $this->CI->dbforge->add_key('id', TRUE);
            $this->CI->dbforge->create_table('d_info', TRUE);
        }
        
        
        public function tcreate_h_info(){
            $fields = array(
                'id' => array(
                            'type'=>'int',
                            'constraint'=>'11',
                            'auto_increment'=>TRUE,
                        ),
                'c_num' => array(
                            'type'=>'int',
                            'constraint'=>'11',
                            'null'=>TRUE
                        ),
                'h_num' => array(
                            'type'=>'int',
                            'constraint'=>'11',
                            'null'=>TRUE
                        ),
                'title' => array(
                            'type'=>'VARCHAR',
                            'constraint'=>'500',
                            'null'=>TRUE
                        ),
                'des' => array(
                            'type'=>'mediumtext',
                            'null'=>TRUE
                        ),
                'file_path' => array(
                            'type'=>'VARCHAR',
                            'constraint'=>'100',
                            'null'=>TRUE
                        ),
                'file_name' => array( 
                            'type'=>'VARCHAR',
                            'constraint'=>'100',
                            'null'=>TRUE
                        ),
                'upload_time' => array( 
                            'type'=>'datetime',
                            'null'=>TRUE
                        ),
                'end_time' => array( 
                            'type'=>'datetime',
                            'null'=>TRUE
                        ),
            );
            
            $this->CI->dbforge->add_field($fields);
            $this->CI->dbforge->add_key('id', TRUE);
            $this->CI->dbforge->create_table('h_info', TRUE);
        }
        
        public function tcreate_s_info(){
            $fields = array(
                'id' => array(
                            'type'=>'int',
                            'constraint'=>'11',
                            'auto_increment'=>TRUE,
                        ),
                's_num' => array(
                            'type'=>'VARCHAR',
                            'constraint'=>'20',
                            'null'=>TRUE
                        ),
                's_name' => array(
                            'type'=>'VARCHAR',
                            'constraint'=>'10',
                            'null'=>TRUE
                        ),
                's_year' => array(
                            'type'=>'int',
                            'constraint'=>'11',
                            'null'=>TRUE
                        ),
                's_dept' => array(
                            'type'=>'VARCHAR',
                            'constraint'=>'25',
                            'null'=>TRUE
                        ),
                's_mac' => array(
                            'type'=>'VARCHAR',
                            'constraint'=>'20',
                            'null'=>TRUE
                        ),
            );
            
            $this->CI->dbforge->add_field($fields);
            $this->CI->dbforge->add_key('id', TRUE);
            $this->CI->dbforge->create_table('s_info', TRUE);
        }
        
        public function tcreate_sc_info(){
            $fields = array(
                'id' => array(
                            'type'=>'int',
                            'constraint'=>'11',
                            'auto_increment'=>TRUE,
                        ),
                's_num' => array(
                            'type'=>'VARCHAR',
                            'constraint'=>'10',
                            'null'=>TRUE
                        ),
                'c_num' => array(
                            'type'=>'int',
                            'constraint'=>'11',
                            'null'=>TRUE
                        ),
                'pass' => array(
                            'type'=>'int',
                            'constraint'=>'11',
                            'null'=>TRUE,
                            'default' => '0',
                        ),
                'fail' => array(
                            'type'=>'int',
                            'constraint'=>'11',
                            'null'=>TRUE,
                            'default' => '0',
                        ),
                'late' => array(
                            'type'=>'int',
                            'constraint'=>'11',
                            'null'=>TRUE,
                            'default' => '0',
                        ),
                'point' => array(
                            'type'=>'int',
                            'constraint'=>'11',
                            'null'=>TRUE,
                            'default' => '0',
                        ),
            );
            
            $this->CI->dbforge->add_field($fields);
            $this->CI->dbforge->add_key('id', TRUE);
            $this->CI->dbforge->create_table('sc_info', TRUE);
        }
        
        
        public function tcreate_stu_file(){
            $fields = array(
                'id' => array(
                            'type'=>'int',
                            'constraint'=>'11',
                            'auto_increment'=>TRUE
                        ),
                'c_num' => array(
                            'type'=>'int',
                            'constraint'=>'11',
                            'null'=>TRUE
                        ),
                's_num' => array(
                            'type'=>'VARCHAR',
                            'constraint'=>'20',
                            'null'=>TRUE
                        ),
                'h_num' => array(
                            'type'=>'int',
                            'constraint'=>'11',
                            'null'=>TRUE
                        ),
                'file_path' => array(
                            'type'=>'VARCHAR',
                            'constraint'=>'100',
                            'null'=>TRUE
                        ),
                'file_name' => array( 
                            'type'=>'VARCHAR',
                            'constraint'=>'100',
                            'null'=>TRUE
                        ),
                'upload_time' => array( 
                            'type'=>'datetime',
                            'null'=>TRUE
                        ),
            );
            
            $this->CI->dbforge->add_field($fields);
            $this->CI->dbforge->add_key('id', TRUE);
            $this->CI->dbforge->create_table('stu_file', TRUE);
        }
        
}
