<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model
{
    var $photo_path;
    
    public function __construct()
    {
        parent::__construct();

        //$this->photo_path=realpath(APPPATH.'../store/images');
        
    }//end constract
    
    public function signin($data){
        
        $user_email=$data['user_email'];
        $user_pass=md5($data['user_pass']);
        
        $this->db->select('user_sn,user_name, user_role, user_photo_file_name as user_photo,user_status');
        $this->db->from('aica_user');
        $this->db->where('user_email',$user_email);
        $this->db->where('user_pass',$user_pass);
        //$this->db->where('user_status','active');
        $res=$this->db->get();
        //echo $this->db->last_query();
        return $res->result_array();
    }//end function
    
    public function getList($per_page,$offset){
        
        if($offset==''){
            $offset=0;
        }
        
        $this->db->select('user_sn, user_name,user_email, user_role,user_status, last_login');
        $this->db->limit($per_page,$offset);
        $this->db->from('aica_user');
        $res=$this->db->get();
        
        return $res->result_array();
        
    }//end function
    
    public function getRecord($user_sn){
        
        $this->db->select('user_sn, user_name,user_email, user_role,user_status, last_login');
        $this->db->from('aica_user');
        $this->db->where('user_sn',$user_sn);
        $res=$this->db->get();
        
        return $res->result_array();
        
    }//end function
    
    
    public function insert($data){
        
        $item=array('user_name'=>$data['user_name'],
                    'user_email'=>$data['user_email'],
                    'user_role'=>$data['user_role'],
                    'user_status'=>'inactive',
                    'user_pass'=>md5($data['user_email'])
                );
        $res=$this->db->insert('aica_user',$item);
        
        return $res;
        
    }//end function
    
    public function update($data){
        
        $item=array('user_name'=>$data['user_name'],
                    'user_email'=>$data['user_email'],
                    'user_role'=>$data['user_role'],
                    'user_status'=>$data['user_status']
                );
        $this->db->where('user_sn',$data['user_sn']);
        $res=$this->db->update('aica_user',$item);
        
        return $res;
        
    }//end function
    
    public function change_pass($data){
        
        $item=array('user_pass'=>md5($data['new_pass']));        
        
        $this->db->where('user_sn',$data['user_sn']);
        $res=$this->db->update('aica_user',$item);
        
        return $res;
                
    }//end function
    
    public function validate_current_pass($data){
        
        $this->db->select('user_sn');
        $this->db->from('aica_user');
        $this->db->where('user_sn',$data['user_sn']);
        $this->db->where('user_pass',md5($data['curr_pass']));
        $res=$this->db->get();
        //echo 'num rows: '.$res->num_rows.'<br>';
        return $res->num_rows;
        
    }//end function
    
    public function update_last_login(){
        
        $user_sn=$this->session->userdata('user_sn');
                
        $this->db->set('last_login', 'NOW()', FALSE);
        $this->db->where('user_sn',$user_sn);
        $this->db->update('aica_user');
                        
    }//end function

    public function getTotalNum(){        
        
        $this->db->select('user_sn');
        $this->db->from('aica_user');
        $res=$this->db->get();
        return $res->num_rows;
        
    }//end function
    
}//end class