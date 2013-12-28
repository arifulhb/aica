<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Customer_model extends CI_Model
{
    var $photo_path;
    
    public function __construct()
    {
        parent::__construct();

        //$this->photo_path=realpath(APPPATH.'../store/images');
        

    }//end constract
    
    public function getAllCustomerList(){
        $this->db->select('cust_sn, cust_name, cust_nric');
        $this->db->from('aica_customer');
        $res=$this->db->get();
        
        return $res->result_array();
        
    }//end function

        //Insert Customer Data in aica_customer table
    public function insert($data){                
        
        $this->db->set($data);
        $res=$this->db->insert('aica_customer');
        return $res;
        
    }//end function insert
    
    public function update($data){
       
        $this->db->set('cust_name',$data['cust_name']);
        $this->db->set('cust_nric',$data['cust_nric']);
        $this->db->set('cust_type',$data['cust_type'],TRUE);
        $this->db->set('cust_dob',$data['cust_dob'],TRUE);
        $this->db->set('cust_gender',$data['cust_gender'],TRUE);
        $this->db->set('cust_marital_status',$data['cust_marital_status']);
        $this->db->set('cust_license_date',$data['cust_license_date'], TRUE);
        $this->db->set('cust_instructions',$data['cust_instructions'], TRUE);
        $this->db->set('cust_occupation',$data['cust_occupation'], TRUE);
        $this->db->set('cust_contact_email',$data['cust_contact_email'], TRUE);
        $this->db->set('cust_contact_office',$data['cust_contact_office'], TRUE);
        $this->db->set('cust_contact_hp',$data['cust_contact_hp'], TRUE);
        $this->db->set('cust_contact_house',$data['cust_contact_house'], TRUE);
        $this->db->set('cust_contact_fax',$data['cust_contact_fax'], TRUE);
        $this->db->set('cust_address_1',$data['cust_address_1'], TRUE);
        $this->db->set('cust_address_2',$data['cust_address_2'], true);
        $this->db->set('cust_post_code',$data['cust_post_code'], FALSE);
        $this->db->set('update_by',$this->session->userdata('user_sn'), FALSE);                
        $this->db->set('update_date', 'NOW()', FALSE);
        
        $this->db->where('cust_sn',$data['cust_sn']);
        $res=$this->db->update('aica_customer');
 
        return $res;
    }//end function update
    
    public function remove($data){
        
    }//end function remove
    
    public function getList($per_page,$offset){
         if($offset==''){
            $offset=0;
        }
        
        $this->db->select('cust_sn as sn,cust_name as name, cust_type as type, 
            UNIX_TIMESTAMP(cust_license_date) as license_date, cust_occupation as occupation');
        //$sql .=' LIMIT '.$offset.','.$per_page;
        $this->db->limit($per_page,$offset);
        $this->db->from('aica_customer');
        $res=$this->db->get();
        //echo $this->db->last_query();
        return $res->result_array();
        
    }//end function getList
    
    public function getRecord($cust_sn){
        
        $this->db->select('c.cust_sn, c.cust_name, c.cust_nric, UNIX_TIMESTAMP(c.cust_dob) as cust_dob, ');
        $this->db->select('c.cust_gender, c.cust_marital_status, c.cust_type');
        $this->db->select('c.cust_contact_hp, c.cust_contact_office, c.cust_contact_house, c.cust_contact_fax, c.cust_contact_email, ');
        $this->db->select('c.cust_address_1, c.cust_address_2, c.cust_post_code, c.cust_occupation, UNIX_TIMESTAMP(c.cust_license_date) cust_license_date, ');
        $this->db->select('c.cust_instructions, '); 
        $this->db->select('c.add_by, u.user_name as add_by_name, UNIX_TIMESTAMP(c.date_of_add) as date_of_add,');
        //$this->db->select('c.add_by, u.user_name as add_by_name, date_of_add,');
        $this->db->select('c.update_by, up.user_name as update_by_name, c.update_date ');
        $this->db->from('aica_customer as c');
        $this->db->join('aica_user as u', 'u.user_sn = c.add_by');
        $this->db->join('aica_user as up', 'up.user_sn = c.update_by');
        $this->db->where('c.cust_sn',$cust_sn);
        $res=$this->db->get();
        //echo $this->db->last_query();
        return $res->result_array();
        
    }//end function getRecord
    
    private function setData($data){
        
    }//end function

    public function getTotalNum(){
        
        $this->db->select('cust_sn');
        $this->db->from('aica_customer');
        $res=$this->db->get();
        return $res->num_rows;
    }//end function

}//end classs