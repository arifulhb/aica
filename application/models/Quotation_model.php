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
    
    public function insert_quotation($data)
    {
        
        $this->db->set($data);
        $this->db->set('qt_date','NOW()',FALSE);
        $this->db->set('add_date', 'NOW()', FALSE);
        $res = $this->db->insert('aica_quotation');
        if($res==true){
            $new_id=$this->db->insert_id();
            $this->create_record($new_id, $data['qt_insurance_type']);
                    
            return $new_id;
        }else{
            return false;
        }
                        
    }//end function
    
    private function create_record($id,$table)
    {
        $this->db->set('qt_ref_no',$id);
        if($table=='Private'){
            
            $this->db->insert('aica_vehicle_info_pvt');
        }else{            
            $this->db->insert('aica_vehicle_info_commercial');
        }
    }//end function

    public function update_full($data,$ref_no)
    {
        
        $this->db->where('qt_ref_no',$ref_no);
        
        $res=$this->db->update('aica_quotation',$data);
        
        return $res;
        
    }//end function
    
    public function update_vehicle_private($data,$ref_no)
    {
        $this->db->where('qt_ref_no',$ref_no);        
        $res=$this->db->update('aica_vehicle_info_pvt',$data);
        
        return $res;
        
    }//end function
    
    public function getList($per_page,$offset){
         if($offset==''){
            $offset=0;
        }
        
        $this->db->select('q.qt_ref_no, UNIX_TIMESTAMP(q.qt_date) as qt_date, q.customer_sn, c.cust_name, 
            vi_number AS reg_no,  UNIX_TIMESTAMP(vi_regn_date) AS regn_date, 
            UNIX_TIMESTAMP(q.ci_period_start_date) AS start_date, UNIX_TIMESTAMP(q.ci_poi_end_date) AS end_date, 
            q.ci_current_premium AS premium, q.qt_agent_sn, u.user_name AS agent_name, q.qt_consultant_sn, 
            u.user_name AS consultant_name, q.qt_state');
        
        $this->db->limit($per_page,$offset);
        $this->db->from('aica_quotation as q');
        $this->db->join('aica_customer AS c','c.cust_sn = q.customer_sn','LEFT OUTER');
        $this->db->join('aica_user AS u','u.user_sn = q.qt_consultant_sn','LEFT OUTER');
        $this->db->join('aica_user AS ua','ua.user_sn = q.qt_agent_sn','LEFT OUTER');
               
        $res=$this->db->get();
      //  echo $this->db->last_query();
//        exit();
        return $res->result_array();
        
    }//end function

    
    public function getTotalNum(){
        $this->db->select('qt_ref_no');
        $this->db->from('aica_quotation');
        $res=$this->db->get();
        return $res->num_rows;
        
    }//end function

    public function update_vehicle_commercial($data,$ref_no)
    {
        $this->db->where('qt_ref_no',$ref_no);        
        $res=$this->db->update('aica_vehicle_info_commercial',$data);
        
        return $res;
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