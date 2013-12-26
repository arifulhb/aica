<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quotation extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->library('template');

    }//end constractor

    public function index()
    {      
        $data=site_data();    
        $data['_page_title']='All Ins Commission Application';
        $this->template->admin_home($data);

    }//end index
    
    public function add(){
        
        /**
         * Access Code: quotation_add, quotation
         */
        
        $data=site_data();    
        
        if(in_array('quotation_add', $this->session->userdata('user_access'))){
                    
            
            $data['_page_title']='New Quotation';
            $data['_page_caption']='New Quotation';
            $data['_page_description']='Entry Page for New Quotation';
            $data['_action']='add';
            $this->load->model('Quotation_model');        

            $refno =$this->Quotation_model->getNewQuotationNo();        
            if(empty($refno)){            
                $data['new_qt_ref_no']=1; //=> New Quotatioin No$refno=1;
            }else{
                //print_r($refno);
                $data['new_qt_ref_no']=$refno[0]['qt_ref_no']+1;
            }                              
            ///$data['new_qt_date']=$refno[0]['cust_sn']+1;
            $this->load->model('user_model');        
            $data['consultants']=$this->user_model->getSmallList(2);//=> Sales Consultant List
            $data['agents']=$this->user_model->getSmallList(5);//=> External Agent List
            $this->load->model('Customer_model');
            $data['customers']=$this->Customer_model->getAllCustomerList();//=> Customer List        

            $this->template->quotation_new($data);
        }//end if
        else{
            $this->template->access_denied($data);
        }//end else
        
    }//end function
    
    public function save_quotation(){
                
        if(in_array('quotation_add', $this->session->userdata('user_access'))){
            
            $action=$this->input->post('_action');
            $data['qt_renewal']=false;//$this->input->post('_qt_renewal');            
            
            $data['qt_state']=$this->input->post('_qt_details_state');
            //IF State= LOST =. SAVE LOST STATUS
            if($data['qt_state']=='Lost'){
                $data['qt_reasons_lost']=$this->input->post('_qt_details_lost');
            }
            $data['qt_insurance_type']=$this->input->post('_qt_details_insurance_type');
                                
            $data['qt_remarks']=$this->input->post('_qt_details_remark');
            $data['qt_consultant_sn']=$this->input->post('_qt_consultant_sn');
            $data['qt_agent_sn']=$this->input->post('_qt_agent_sn');
            $data['customer_sn']=$this->input->post('_qt_customer_sn');
            $data['qt_insured_driving']=$this->input->post('_qt_insured_driving');
            $data['qt_marital_status']=$this->input->post('_qt_cust_mstatus');
            $data['qt_occupation']=$this->input->post('_qt_cust_occupation');
            $data['qt_dlicense_pass_date']=date('Y-m-d', strtotime($this->input->post('_qt_cust_license_date',TRUE)));
            //date($this->input->post('_qt_cust_license_date'),'mm-dd-yyyy');                        
            $data['qt_instructions']=$this->input->post('_qt_cust_instructions');            
                                                                                
                        
            $this->load->model('Quotation_model');
            
            
            if($action=='add'){                
                //Insert
                $data['add_by']=$this->session->userdata('user_sn'); 
                
                $res=$this->Quotation_model->insert_quotation($data);
                echo $res;
                
            }else{
                //Update                
                $data['qt_ref_no']=$this->input->post('_qt_ref_no');
                
                $res=$this->Quotation_model->update_quotation($data);                                
                
                if($res==1){
                    //update history
                    $update=array('qt_ref_no'=>$this->input->post('_qt_ref_no'),
                                'update_by'=>$this->session->userdata('user_sn'),
                                'update_from'=>$this->input->post('_qt_current_state'),
                                'update_to'=>$this->input->post('_qt_details_state'));
                    $this->Quotation_model->updateHistory($update);
                }
                
                print_r($res);
            }                        
            
        }else{
            $data=  site_data();
            $this->template->access_denied($data);
        }
        
    }//end function pvt
    
    public function getHistory(){
    
        $qt_ref_no=$this->input->post('_qt_ref_no');
        
        $this->load->model('Quotation_model');
        $res=$this->Quotation_model->getHistory($qt_ref_no);
        
        echo json_encode($res);
        //echo $res[0];
        
    }//end function 
    
}//end class
?>