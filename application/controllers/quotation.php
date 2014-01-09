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
        
        if(in_array('quotation',$this->session->userdata('user_access'))){
            $quotation_all=null;
            if(in_array('quotation_all',$this->session->userdata('user_access'))){
                $quotation_all=NULL;
            }else{
                $quotation_all=$this->session->userdata('user_sn');
            }
            
             //Load pagination library
            $this->load->library('pagination');

            //set pagination configuration
            $config=  getPaginationConfig();//this function is from helpers/ahb_helper.php file
            $config['base_url'] = base_url().'quotation/index';
            $this->load->model('quotation_model');

            $config['total_rows'] = $this->quotation_model->getTotalNum($quotation_all);        
            $config['use_page_numbers']=true;
            $config['per_page'] = 15;
            $config['num_links'] = 5;        
            $config['uri_segment'] = 3;                        
            $this->pagination->initialize($config);


            $data=site_data();
            $data['_total_rows']=$config['total_rows'];
                
            if($this->uri->segment(3)!=''){
                //if page number exisit
                $last=$this->uri->segment(3)*$config['per_page']>$config['total_rows']?$config['total_rows']:$this->uri->segment(3)*$config['per_page'];

                $data['_pagi_msg']=  (($this->uri->segment(3)-1)*($config['per_page']+1)).' - '.$last;                                            
                $data['_list']=$this->quotation_model->getList($config['per_page'],($config['per_page']*($this->uri->segment(3)-1)+1),$quotation_all);
                
            }else{
                if($config['total_rows']>$config['per_page']){
                    $last=$config['per_page'];      
                }else{
                    $last=$config['total_rows'];      
                }

                $data['_pagi_msg'] = '1 - '.$last;                                  
                $data['_list']=$this->quotation_model->getList($config['per_page'],$this->uri->segment(3),$quotation_all);
            }//end else pagination
            
            $data['_page_title']='All Ins Commission Application';
                   
            //print_r($data['_list']);
            //exit();
            $this->template->admin_home($data);   
        }else{
            $this->template->access_denied($data);   
        }                

    }//end index
    
    public function view(){
        $data=site_data();
        
        //print_r($this->session->userdata('user_access'));
        //exit();
        if(in_array('quotation_view', $this->session->userdata('user_access'))){
            
            $ref_no=$this->uri->segment(3);            
                        
            $this->load->model('quotation_model');            
            
            if(in_array('quotation_all',$this->session->userdata('user_access'))){
                $data['_record'] = $this->quotation_model->getRecord($ref_no);
                $data['_claim_history']=$this->quotation_model->getClaimHistoryList($ref_no);
                $data['_driver_list']=$this->quotation_model->getNameDriverList($ref_no);
                $data['_history']=$this->quotation_model->getHistory($ref_no);
                $data['_quot_list']=$this->quotation_model->get_quotation_item_list($ref_no);
                $data['_page_title']="Quotation View";
                $data['_page_caption']="Quotation View";
                $data['_page_description']="Quotation View";
                $this->template->quotation_view($data);   
            }else{
                //check the author
                if($data['_record'][0]['add_by']==$this->session->userdata('user_sn')){
                    $data['_record'] = $this->quotation_model->getRecord($ref_no);
                    $data['_claim_history']=$this->quotation_model->getClaimHistoryList($ref_no);
                    $data['_history']=$this->quotation_model->getHistory($ref_no);
                    $data['_page_title']="Quotation View";
                    $data['_page_caption']="Quotation View";
                    $data['_page_description']="Quotation View";
                    $this->template->quotation_view($data);  
                }else{
                    $this->template->access_denied($data);   
                }//end local else                
            }//end else
            
            
        }else{
            $this->template->access_denied($data);   
        }
        
    }//end function

    public function edit(){
        $data=site_data();
        
        if(in_array('quotation_edit', $this->session->userdata('user_access'))){
            
            $ref_no=$this->uri->segment(3);            
                        
            $this->load->model('quotation_model');
            $data['_record'] = $this->quotation_model->getRecord($ref_no);
            $data['_claim_history']=$this->quotation_model->getClaimHistoryList($ref_no);
            $data['_driver_list']=$this->quotation_model->getNameDriverList($ref_no);
            $data['_quot_list']=$this->quotation_model->get_quotation_item_list($ref_no);//???
            
            if(in_array('quotation_all',$this->session->userdata('user_access'))){
                $data['_history']=$this->quotation_model->getHistory($ref_no);

                $data['_page_title']="Edit Quotation";
                $data['_page_caption']="Edit Quotation";
                $data['_page_description']="Quotation Edit";
                $data['new_qt_ref_no']=$ref_no;
                $data['_action']='update';

                $this->load->model('user_model');
                $data['consultants']=$this->user_model->getSmallList(2);//=> Sales Consultant List
                $data['agents']=$this->user_model->getSmallList(5);//=> External Agent List

                $this->load->model('commission_model');
                $data['_commissions']=$this->commission_model->getCommissions();//=> Commissions

                $this->template->quotation_edit($data);
            }else{
                 //check the author
                if($data['_record'][0]['add_by']==$this->session->userdata('user_sn')){
                    $data['_history']=$this->quotation_model->getHistory($ref_no);
                    $data['_page_title']="Edit Quotation";
                    $data['_page_caption']="Edit Quotation";
                    $data['_page_description']="Quotation Edit";
                    $data['new_qt_ref_no']=$ref_no;
                    $data['_action']='update';

                    $this->load->model('user_model');
                    $data['consultants']=$this->user_model->getSmallList(2);//=> Sales Consultant List
                    $data['agents']=$this->user_model->getSmallList(5);//=> External Agent List

                    $this->load->model('commission_model');
                    $data['_commissions']=$this->commission_model->getCommissions();//=> Commissions

                    $this->template->quotation_edit($data);
                }else{
                    $this->template->access_denied($data);   
                }
            }                   
            
        }else{
            $this->template->access_denied($data);   
        }
        
    }//end function
    
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
            $this->load->model('quotation_model');

            $refno =$this->quotation_model->getNewQuotationNo();
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


            $this->load->model('quotation_model');


            if($action=='add'){
                //Insert
                $data['add_by']=$this->session->userdata('user_sn');

                $res=$this->quotation_model->insert_quotation($data);
                echo $res;

            }else{
                //Update
                $data['qt_ref_no']=$this->input->post('_qt_ref_no');

                $res=$this->quotation_model->update_quotation($data);

                if($res==1){
                    //update history
                    $update=array('qt_ref_no'=>$this->input->post('_qt_ref_no'),
                                'update_by'=>$this->session->userdata('user_sn'),
                                'update_from'=>$this->input->post('_qt_current_state'),
                                'update_to'=>$this->input->post('_qt_details_state'));
                    $this->quotation_model->updateHistory($update);
                }

                print_r($res);
            }

        }else{
            $data=  site_data();
            $this->template->access_denied($data);
        }

    }//end function pvt

    public function update(){

        //$this->load->library('form_validation');
        //$this->form_validation->set_rules('cust_name', 'Customer Name', 'trim|required|max_length[250]|xss_clean');

        $qt_ref_no=$this->input->post('qt_ref_no');
        $qt_insurance_type=$this->input->post('_qt_insurance_type');        
        
        $data['vi_number']=$this->input->post('_qt_vi_number');
        $data['vi_make']=$this->input->post('_qt_vi_make');
        $data['vi_model']=$this->input->post('_qt_vi_model');
        $data['vi_cc']=$this->input->post('_qt_vi_cc');
        $data['vi_man_year']=$this->input->post('_qt_vi_year_of_manufacture');
        $data['vi_regn_date']=date('Y-m-d',strtotime($this->input->post('_qt_vi_regn_date',TRUE)));                                 
        $data['vi_tax_expire_date']=date('Y-m-d',strtotime($this->input->post('_qt_vi_road_tax_expire_date',TRUE)));                 
        $data['vi_additional']=$this->input->post('_qt_vi_additional_accessories');
        
        if($qt_insurance_type=='Private'){
            $data_pvt['vip_scheme_type']=$this->input->post('_qt_vipvt_scheme_type');
            $data_pvt['vip_fet_sunroof']=$this->input->post('_qt_vipvt_feature_sunroof');
            $data_pvt['vip_fet_soft_top']=$this->input->post('_qt_vipvt_feature_soft_top');
            $data_pvt['vip_fet_turbo_eng']=$this->input->post('_qt_vipvt_feature_turbo_engine');
            $data_pvt['vip_fet_moonroof']=$this->input->post('_qt_vipvt_feature_moonroof');
            $data_pvt['vip_fet_skyroof']=$this->input->post('_qt_vipvt_feature_skyroof');
            $data_pvt['vip_fet_roof_pan']=$this->input->post('_qt_vipvt_feature_roof_panoramic');
            $data_pvt['vip_vt_super_model']=$this->input->post('_qt_vipvt_type_sport_model');
            $data_pvt['vip_vt_mpv']=$this->input->post('_qt_vipvt_type_mpv');
            $data_pvt['vip_vt_suv']=$this->input->post('_qt_vipvt_type_suv');
            $data_pvt['vip_vt_sedan']=$this->input->post('_qt_vipvt_type_sedan');
            $data_pvt['vip_vt_couple']=$this->input->post('_qt_vipvt_type_coupe');
            $data_pvt['vip_vt_cabriolet']=$this->input->post('_qt_vipvt_type_cabriolet');
            $data_pvt['vip_vt_parallel_import']=$this->input->post('_qt_vipvt_type_parallel_import');
        }else{
            $data_com['vic_type']=$this->input->post('_qt_vicom_type');
            $data_com['vic_weight_unladen']=$this->input->post('_qt_vicom_unladen_weight');
            $data_com['vic_weight_laden']=$this->input->post('_qt_vicom_laden_weight');
        }
        $data['ci_company']=$this->input->post('_qt_id_company');
        $data['ci_policy_no']=$this->input->post('_qt_id_policy_no');
        $data['ci_coverage']=$this->input->post('_qt_id_type_of_coverage');
        $data['ci_current_premium']=$this->input->post('_qt_id_current_premium');
        $data['ci_current_excess']=$this->input->post('_qt_id_current_excess');
        $data['ci_finance_company']=$this->input->post('_qt_id_finance_company');
        $data['ci_current_ncd']=$this->input->post('_qt_id_current_ncd');
        $data['ci_ncd_per_renewal']=$this->input->post('_qt_id_ncd_on_renewal');
        $data['ci_ncd_affect']=$this->input->post('_qt_id_ncd_on_change');
        $data['ci_ssd']=$this->input->post('_qt_id_ssd');
        $data['ci_ssd_date']=date('Y-m-d',strtotime($this->input->post('_qt_ssd_date_check',TRUE)));                 
        $data['ci_period_start_date']=date('Y-m-d',strtotime($this->input->post('_qt_ci_start_date',TRUE)));                 
        $data['ci_poi_end_date']=date('Y-m-d',strtotime($this->input->post('_qt_ci_poi_end_date',TRUE)));                
        $data['ci_road_tax_due_date']=date('Y-m-d',strtotime($this->input->post('_qt_ci_road_tax_date',TRUE)));                 
        $data['ci_ncd_protection']=$this->input->post('_qt_ci_ncd_protection');
        $data['ci_claims_in_last3_year']=$this->input->post('_qt_ci_claim_in_3_years');
        //$data['quot_insurer']=$this->input->post('_qt_quot_insurer');
        //$data['quot_workshop']=$this->input->post('_qt_quot_worksop');
        //$data['quot_premium']=$this->input->post('_qt_quot_premium');
        //$data['quot_excess']=$this->input->post('_qt_quot_excess');
        //$data['quot_remark']=$this->input->post('_qt_quot_remark');
        $data['si_company']=$this->input->post('_qt_sid_company');
        $data['si_policy_no']=$this->input->post('_qt_sid_policy_no');
        $data['si_coverage']=$this->input->post('_qt_sid_coverage_type');
        $data['si_premium']=$this->input->post('_qt_sid_premium');
        $data['si_excess']=$this->input->post('_qt_sid_excess');
        $data['si_finance_company']=$this->input->post('_qt_sid_finance_company');
        $data['si_ncd']=$this->input->post('_qt_sid_ncd');
        $data['si_ncd_per_on_renewal']=$this->input->post('_qt_sid_ncd_on_renewal');
        $data['si_ssd']=$this->input->post('_qt_sid_ssd');
        $data['si_ssd_date_check']=date('Y-m-d',strtotime($this->input->post('_qt_sid_sdd_date_check',TRUE)));
        $data['si_start_date']=date('Y-m-d',strtotime($this->input->post('_qt_sid_start_date',TRUE)));                        
        $data['si_end_date']=date('Y-m-d',strtotime($this->input->post('_qt_sid_end_date',TRUE)));                        
        $data['si_road_tax_due']=date('Y-m-d',strtotime($this->input->post('_qt_sid_road_tax_due',TRUE)));        
        $data['si_ncd_protection']=$this->input->post('_qt_sid_ncd_protection');
        $data['qt_state']=$this->input->post('_qt_details_state');
        
        if(in_array('assign_commission', $this->session->userdata('user_access'))){                        
            
            if($data['qt_state']=='Closed' || $data['qt_state']=='Won'){
                $data['com_sn']=$this->input->post('_qt_aa_commission');            
            }
        }//end if
        $this->load->model('quotation_model');


        //print_r($data_pvt);
        //exit();
       $res= $this->quotation_model->update_full($data,$qt_ref_no);
       
        //$res=1;
        
        //print_r($new);
        
        if($res==1){
            $sub='';
            if($qt_insurance_type=='Private'){
                $sub='pvt';
                $sub.=' : '+$this->quotation_model->update_vehicle_private($data_pvt,$qt_ref_no);
                
            }else{
                $sub='com';
                $sub.=' : '+$this->quotation_model->update_vehicle_commercial($data_com,$qt_ref_no);
            }
            //$new=array('recrd: '=>$qt_ref_no,'data'=>$data,'sub'=>$data_pvt,'status'=>$res);
            
            //update history
            $update=array('qt_ref_no'=>$this->input->post('qt_ref_no'),
            'update_by'=>$this->session->userdata('user_sn'),
            'update_from'=>$this->input->post('_qt_current_state'),
            'update_to'=>$this->input->post('_qt_details_state'));
            $this->quotation_model->updateHistory($update);
            
            $new=array('recrd: '=>$qt_ref_no,'status'=>$res,'data: '=>$data,'sub: '=>$sub);
            print_r($new);
        }//end if
        else{
            echo 'error';
        }
        
        //print_r($res);
        //print_r($data);

    }//end function
    
    public function delete(){
    
        if(in_array('quotation_delete', $this->session->userdata('user_access'))){
            
            $qt_no=$this->input->post('del_qt_sn');
            
            $this->load->model('quotation_model');
            $res=$this->quotation_model->deleteRecord($qt_no);
            
            if($res==TRUE){
                $this->session->set_flashdata('delete_success', true);
                $this->session->set_flashdata('delete_id', $qt_no);
                redirect('quotation/index');
            }else{
                $this->session->set_flashdata('delete_fail', 'true');
                echo 'failed to delete';
            }
            
        
        }else{
             $data=  site_data();
            $this->template->access_denied($data);
        }
        
        
    }//end function

    public function getHistory(){

        $qt_ref_no=$this->input->post('_qt_ref_no');

        $this->load->model('quotation_model');
        $res=$this->quotation_model->getHistory($qt_ref_no);

        echo json_encode($res);
        //echo $res[0];

    }//end function
    
    public function update_claim_history(){
        
        $qt_ref_no=$this->input->post('_qt_ref_no');
        $clh_no=$this->input->post('_chsn');
        $data['clh_driver_name']=$this->input->post('_driver_name');
        $data['clh_vehicle_no']=$this->input->post('_vehicle_no');
        
        $data['clh_accident_date']=date('Y-m-d', strtotime($this->input->post('_accident_date')));
        $data['clh_reporting_date']=date('Y-m-d', strtotime($this->input->post('_reporting_date')));
        $data['clh_paid_od']=$this->input->post('_claims_paid_od');
        $data['clh_paid_tppd']=$this->input->post('_claims_paid_tppd');
        $data['clh_paid_tpbi']=$this->input->post('_claims_paid_tpbi');
        $data['clh_reserved_tppd']=$this->input->post('_claims_reserved_tppd');
        $data['clh_reserved_tpbi']=$this->input->post('_claims_reserved_tpbi');
        $data['clh_windscreen']=$this->input->post('_windscreen');
        $data['clh_reporting_only']=$this->input->post('_reporting_only');
        $data['clh_private_statement']=$this->input->post('_private_sattlement');
        $data['clh_ref_to_partner']=$this->input->post('_referred');
        
        $this->load->model('quotation_model');
        $res=$this->quotation_model->update_claim_history($data,$qt_ref_no,$clh_no);
        //$res=true;
        if($res==true){
            echo $res;
        }else{
            echo 'fail';
        }
                
    }//end function
    
    public function updateQuotationItem(){
        
        $qt_ref_no      = $this->input->post('_qt_ref_no');
        $ql_sn          = $this->input->post('_ql_sn');
        $data['ql_insurer']= $this->input->post('_insurer');
        $data['ql_workshop']= $this->input->post('_workstation');
        $data['ql_premium']= $this->input->post('_premium');
        $data['ql_excess']= $this->input->post('_excess');
        $data['ql_remark']= $this->input->post('_remark');
        
        $this->load->model('quotation_model');        
        $res=$this->quotation_model->update_quotation_item($qt_ref_no,$ql_sn,$data);
        
        echo $res;
        
    }//end function
    
    public function removeQuotationItem(){
        
        $qt_ref_no      = $this->input->post('_qt_ref_no');
        $ql_sn          = $this->input->post('_ql_sn');//quotation sn
        
        $this->load->model('quotation_model');        
        $res=$this->quotation_model->remove_quotation_item($qt_ref_no,$ql_sn);
        
        echo $res;
        
    }//end function
    
    public function removeClaimHistory(){
        
        $qt_ref_no      = $this->input->post('_qt_ref_no');
        $chn          = $this->input->post('_chn');//claim history no
        
        $this->load->model('quotation_model');        
        $res=$this->quotation_model->remove_claim_history($qt_ref_no,$chn);
        
        echo $res;
        
    }//end function removeClaimHistory
    
    public function removeNameDriver(){
        
        $qt_ref_no      = $this->input->post('_qt_ref_no');
        $dsn          = $this->input->post('_dsn');//claim history no
        
        $this->load->model('quotation_model');        
        $res=$this->quotation_model->remove_name_driver($qt_ref_no,$dsn);
        
        echo $res;
        
    }//end function removeClaimHistory
    
    public function saveNameDriver(){
        
        $qt_ref_no=$this->input->post('_qt_ref_no');
        $_dsn=$this->input->post('_dsn');
        
        $data['nd_name']=$this->input->post('_name');
        $data['nd_nric']=$this->input->post('_nric');
        
        $data['nd_dob']=date('Y-m-d', strtotime($this->input->post('_dob')));
        $data['nd_license_pass_date']=date('Y-m-d', strtotime($this->input->post('_license_date')));
        $data['nd_relationship']=$this->input->post('_relationsip');
        $data['nd_gender']=$this->input->post('_gender');
        $data['nd_mstatus']=$this->input->post('_mstatus');//
        $data['nd_occupation']=$this->input->post('_occupation');
        $data['nd_history']=$this->input->post('_history');
        
        
        $this->load->model('quotation_model');
        $res=$this->quotation_model->update_name_driver($data,$qt_ref_no,$_dsn);
        
        if($res==true){
            echo $res;
        }else{
            echo 'fail';
        }
        
    }//end function saveNameDriver

}//end class
?>