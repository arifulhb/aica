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
        $this->db->order_by('q.qt_ref_no','DESC');      
        $res=$this->db->get();
      //  echo $this->db->last_query();
//        exit();
        return $res->result_array();
        
    }//end function

    public function getRecord($ref_no){
        
        $this->db->select('q.qt_ref_no, UNIX_TIMESTAMP(q.qt_date) as qt_date, q.qt_renewal,q.qt_state,q.qt_insurance_type,q.qt_reasons_lost,q.qt_remarks,');        
        $this->db->select('q.qt_consultant_sn, u.user_name as consultant_name, q.qt_agent_sn, ua.user_name as agent_name, q.customer_sn, c.cust_name  as customer_name, ');
        $this->db->select('c.cust_nric, UNIX_TIMESTAMP(c.cust_dob) as cust_dob, c.cust_gender, c.cust_contact_hp, c.cust_contact_office, c.cust_contact_house, c.cust_contact_fax, c.cust_contact_email, c.cust_address_1, c.cust_address_2, c.cust_post_code, c.cust_license_date, ');
        $this->db->select('q.qt_insured_driving,q.qt_marital_status,q.qt_occupation,UNIX_TIMESTAMP(q.qt_dlicense_pass_date) as qt_dlicense_pass_date,q.qt_instructions,q.vi_number,q.vi_make,q.vi_model,');
        $this->db->select('q.vi_cc,q.vi_man_year, UNIX_TIMESTAMP(q.vi_regn_date) as vi_regn_date, UNIX_TIMESTAMP(q.vi_tax_expire_date) as vi_tax_expire_date,q.vi_additional, ');
        $this->db->select('q.ci_company,q.ci_coverage,q.ci_current_premium,q.ci_current_excess,q.ci_finance_company, q.ci_current_ncd, ');
        $this->db->select('q.ci_ncd_per_renewal,q.ci_ncd_affect,q.ci_ssd,UNIX_TIMESTAMP(q.ci_ssd_date) ci_ssd_date,UNIX_TIMESTAMP(q.ci_period_start_date) as ci_period_start, UNIX_TIMESTAMP(q.ci_poi_end_date) as ci_poi_end_date, UNIX_TIMESTAMP(q.ci_road_tax_due_date) as ci_road_tax_due_date,q.ci_ncd_protection,');
        $this->db->select('q.ci_claims_in_last3_year, q.si_company,q.si_coverage,q.si_premium,q.si_excess,q.si_finance_company,q.si_ncd,q.si_ncd_per_on_renewal, ');        
        $this->db->select('q.si_ssd,UNIX_TIMESTAMP(q.si_ssd_date_check) as si_ssd_date_check, UNIX_TIMESTAMP(q.si_start_date) as si_start_date,UNIX_TIMESTAMP(q.si_end_date) as si_end_date,UNIX_TIMESTAMP(q.si_road_tax_due) as si_road_tax_due,q.si_ncd_protection,q.aa_commission, ');        
        $this->db->select('pvt.vip_scheme_type, pvt.vip_fet_sunroof , pvt.vip_fet_soft_top , pvt.vip_fet_turbo_eng , pvt.vip_fet_moonroof , pvt.vip_fet_skyroof , pvt.vip_fet_roof_pan , pvt.vip_vt_super_model , pvt.vip_vt_mpv , pvt.vip_vt_suv , pvt.vip_vt_sedan , pvt.vip_vt_couple , pvt.vip_vt_cabriolet , pvt.vip_vt_parallel_import, ');
        $this->db->select('com.vic_type, com.vic_weight_unladen, com.vic_weight_laden');
        $this->db->from('aica_quotation q');        
        $this->db->join('aica_customer AS c','c.cust_sn=q.customer_sn','LEFT OUTER');
        $this->db->join('aica_user AS u','u.user_sn=q.qt_consultant_sn','LEFT OUTER');
        $this->db->join('aica_user AS ua','ua.user_sn=q.qt_agent_sn','LEFT OUTER');
        $this->db->join('aica_vehicle_info_pvt AS pvt','pvt.qt_ref_no=q.qt_ref_no','LEFT OUTER');
        $this->db->join('aica_vehicle_info_commercial AS com','com.qt_ref_no=q.qt_ref_no','LEFT OUTER');
        
        $this->db->where('q.qt_ref_no',$ref_no);
        
        $res=$this->db->get();
        
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