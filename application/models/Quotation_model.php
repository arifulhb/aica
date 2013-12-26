<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Quotation_model extends CI_Model
{
    var $photo_path;
    
    public function __construct()
    {
        parent::__construct();
    }//end constract
    
    public function getNewQuotationNo(){
        
        $this->db->select('qt_ref_no');
        $this->db->from('aica_quotation');
        $this->db->order_by('qt_ref_no','desc');
        $this->db->limit(1);
        $res =$this->db->get();        
        return $res->result_array();
    }//end function
    
    public function insert_quotation($data){
        
        $this->db->set($data);
        $this->db->set('qt_date','NOW()',FALSE);
        $this->db->set('add_date', 'NOW()', FALSE);
        $res = $this->db->insert('aica_quotation');
        if($res==true){
            return $this->db->insert_id();
        }else{
            return false;
        }
                        
    }//end function
    
    public function update_quotation($data){        
        
        $this->db->where('qt_ref_no',$data['qt_ref_no']);
        
        $res = $this->db->update('aica_quotation',$data);
        
        return $res;        
                
    }//end function update quotatioin
    
    /**
     * Update history on each update
     * @param type $data
     */
    public function updateHistory($data){
        
        $this->db->set($data);
        $this->db->set('update_date', 'NOW()', FALSE);
        $this->db->insert('aica_quotation_history');
        
    }//end function 

    public function getHistory($qt_ref_no){
        
        $this->db->select('q.qt_ref_no, q.add_by, uq.user_name as add_by_name, q.add_date, h.update_by, uh.user_name as update_by_name, h.update_date, h.update_from, h.update_to');
        $this->db->from('aica_quotation q');
        $this->db->join('aica_quotation_history as h','q.qt_ref_no=h.qt_ref_no','LEFT OUTER');
        $this->db->join('aica_user as uq','q.add_by=uq.user_sn','LEFT OUTER');
        $this->db->join('aica_user as uh','h.update_by =uh.user_sn','LEFT OUTER');               
        $this->db->where('q.qt_ref_no',$qt_ref_no);
        //$this->db->select('*');
        //$this->db->from('aica_quotation_history');
        $res=$this->db->get();
        //echo $this->db->last_query();
        return $res->result();
        
    }//end function
    
}//end class