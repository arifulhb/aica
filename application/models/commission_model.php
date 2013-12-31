<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Commission_model extends CI_Model
{
    var $photo_path;
    
    public function __construct()
    {
        parent::__construct();
    }//end constract
    
    public function insert($data){
        
        $this->db->set($data);
        $res=$this->db->insert('aica_commission');
        $rarray=array();
        if($res==1){
            $rarray=array('res'=>$res,'new_id'=>$this->db->insert_id());
        }
        return $rarray;
        
        
    }//end function
    
    public function getCommissions(){
    
        $this->db->select('com_sn,com_name,com_coy_rate,com_rate');                
        $this->db->from('aica_commission');
        $this->db->order_by('com_sn','desc');
        $res=$this->db->get();        
        return $res->result_array();
        
    }//end function

    public function update($data,$com_sn){        
        
        $item['com_name']=$data['com_name'];
        $item['com_insure']=$data['com_insure'];
        $item['com_coy_rate']=$data['com_coy_rate'];
        $item['com_rate']=$data['com_rate'];
        $this->db->set($item);
        $this->db->where('com_sn',$com_sn);
        $res=$this->db->update('aica_commission');
 
        return $res;
        
    }//end function
    
    public function getRecord($com_sn){
        
        $this->db->select('*');
        $this->db->from('aica_commission');
        $this->db->where('com_sn',$com_sn);
        $res=$this->db->get();
        
        return $res->result_array();
        
    }//end function
    
    public function getList($per_page,$offset){
        
        if($offset==''){
            $offset=0;
        }
        
        $this->db->select('*');        
        $this->db->limit($per_page,$offset);
        $this->db->from('aica_commission');
        $this->db->order_by('com_sn','desc');
        $res=$this->db->get();        
        return $res->result_array();
        
    }//END FUNCTION
    
    public function getTotalNum(){
          $this->db->select('com_sn');
        $this->db->from('aica_commission');
        $res=$this->db->get();
        return $res->num_rows;
    }//end functioin
    
    public function deleteRecord($com_sn){
        
        $res = $this->db->delete('aica_commission', array('com_sn' => $com_sn)); 
        return $res;
        
    }//end function
    
}//end class