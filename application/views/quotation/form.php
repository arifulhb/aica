<p id="save_message" class=""><i class="icon-save"></i> Record Saved</p>
<section class="scrollable" id="quotation-add">    
    <header>
        <div class="row b-b m-l-none m-r-none">
            <div class="col-sm-10">                
                <h3 class="m-t m-b-none"><?php echo $_page_caption;?></h3>
                <p class="block text-muted"><?php echo $_page_description;?></p>
            </div>
            <div class="col-sm-2 pull-right text-right">                
            </div>
        </div>
    </header>
    <section class="wrapper">
        <?php
        if(isset($_record)){
            //print_r($_record);
            $_qt_renewal=$_record[0]['qt_renewal']==0?'no':'yes';
            $_qt_state=$_record[0]['qt_state'];
            $qt_insurance_type=$_record[0]['qt_insurance_type'];
            $_qt_reasons_lost=$_record[0]['qt_reasons_lost'];
            $_qt_remarks=$_record[0]['qt_remarks'];
            $_qt_consultant=$_record[0]['qt_consultant_sn'];
            $_qt_agent_sn=$_record[0]['qt_agent_sn'];
            $_cust_name=$_record[0]['customer_name'];
            $_cust_sn=$_record[0]['cust_sn'];
            $_cust_nric=$_record[0]['cust_nric'];
            $_cust_dob=date('d M Y',$_record[0]['cust_dob']);
            $_cust_gender=$_record[0]['cust_gender'];
            $_cust_contact_hp=$_record[0]['cust_contact_hp'];
            $_cust_contact_office=$_record[0]['cust_contact_office'];
            $_cust_contact_house=$_record[0]['cust_contact_house'];
            $_cust_contact_fax=$_record[0]['cust_contact_fax'];
            $_cust_contact_email=$_record[0]['cust_contact_email'];
            $_cust_address_1=$_record[0]['cust_address_1'];
            $_cust_address_2=$_record[0]['cust_address_2'];
            $_cust_post_code=$_record[0]['cust_post_code'];
            $_cust_license_date=$_record[0]['cust_license_date'];
            $_qt_insured_driving=$_record[0]['qt_insured_driving'];
            $_qt_marital_status=$_record[0]['qt_marital_status'];
            $_qt_occupation=$_record[0]['qt_occupation'];
            $_qt_dlicense_pass_date=date('d-m-Y',$_record[0]['qt_dlicense_pass_date']);
            $_qt_instructions=$_record[0]['qt_instructions'];
            $_vi_number=$_record[0]['vi_number'];
            $_vi_make=$_record[0]['vi_make'];
            $_vi_model=$_record[0]['vi_model'];
            $_vi_cc=$_record[0]['vi_cc'];
            $_vi_man_year=$_record[0]['vi_man_year'];
            $_vi_regn_date=date('d-m-Y',$_record[0]['vi_regn_date']);
            $_vi_tax_expire_date=date('d-m-Y',$_record[0]['vi_tax_expire_date']);
            $_vi_additional=$_record[0]['vi_additional'];
            $_ci_company=$_record[0]['ci_company'];
            $_ci_coverage=$_record[0]['ci_coverage'];
            $_ci_current_premium=$_record[0]['ci_current_premium'];
            $_ci_current_excess=$_record[0]['ci_current_excess'];
            $_ci_finance_company=$_record[0]['ci_finance_company'];
            $_ci_policy_no=$_record[0]['ci_policy_no'];
            $_ci_current_ncd=$_record[0]['ci_current_ncd'];
            $_ci_ncd_per_renewal=$_record[0]['ci_ncd_per_renewal'];
            $_ci_ncd_affect=$_record[0]['ci_ncd_affect'];
            $_ci_ssd=$_record[0]['ci_ssd'];
            $_ci_ssd_date=date('d-m-Y',$_record[0]['ci_ssd_date']);
            $_ci_period_start=date('d-m-Y',$_record[0]['ci_period_start']);
            $_ci_poi_end_date=date('d-m-Y',$_record[0]['ci_poi_end_date']);
            $_ci_road_tax_due_date=date('d-m-Y',$_record[0]['ci_road_tax_due_date']);
            $_ci_ncd_protection=$_record[0]['ci_ncd_protection'];
            $_ci_claims_in_last3_year=$_record[0]['ci_claims_in_last3_year'];            
            //$_quot_insurer=$_record[0]['quot_insurer'];
            //$_quot_workshop=$_record[0]['quot_workshop'];
            //$_quot_premium=$_record[0]['quot_premium'];
            //$_quot_excess=$_record[0]['quot_excess'];
            //$_quot_remarkr=$_record[0]['quot_remark'];            
            $_si_company=$_record[0]['si_company'];
            $_si_coverage=$_record[0]['si_coverage'];
            $_si_premium=$_record[0]['si_premium'];
            $_si_excess=$_record[0]['si_excess'];
            $_si_finance_company=$_record[0]['si_finance_company'];
            $_si_policy_no=$_record[0]['si_policy_no'];
            $_si_ncd=$_record[0]['si_ncd'];
            $_si_ncd_per_on_renewal=$_record[0]['si_ncd_per_on_renewal'];
            $_si_ssd=$_record[0]['si_ssd'];
            $_si_ssd_date_check=date('d-m-Y',$_record[0]['si_ssd_date_check']);
            $_si_start_date=date('d-m-Y',$_record[0]['si_start_date']);
            $_si_end_date=date('d-m-Y',$_record[0]['si_end_date']);
            $_si_road_tax_due=date('d-m-Y',$_record[0]['si_road_tax_due']);
            $_si_ncd_protection=$_record[0]['si_ncd_protection'];
            $_aa_commission=$_record[0]['com_sn'];
            $_vip_scheme_type=$_record[0]['vip_scheme_type'];
            $_vip_fet_sunroof=$_record[0]['vip_fet_sunroof'];
            $_vip_fet_soft_top=$_record[0]['vip_fet_soft_top'];
            $_vip_fet_turbo_eng=$_record[0]['vip_fet_turbo_eng'];
            $_vip_fet_moonroof=$_record[0]['vip_fet_moonroof'];
            $_vip_fet_skyroof=$_record[0]['vip_fet_skyroof'];
            $_vip_fet_roof_pan=$_record[0]['vip_fet_roof_pan'];
            $_vip_vt_super_model=$_record[0]['vip_vt_super_model']; 
            $_vip_vt_mpv=$_record[0]['vip_vt_mpv'];
            $_vip_vt_suv=$_record[0]['vip_vt_suv'];
            $_vip_vt_sedan=$_record[0]['vip_vt_sedan'];
            $_vip_vt_couple=$_record[0]['vip_vt_couple'];
            $_vip_vt_cabriolet=$_record[0]['vip_vt_cabriolet'];
            $_vip_vt_parallel_import=$_record[0]['vip_vt_parallel_import'];
            $_vic_type=$_record[0]['vic_type'];
            $_vic_weight_unladen=$_record[0]['vic_weight_unladen']; 
            $_vic_weight_laden=$_record[0]['vic_weight_laden']; 
        }else{
            $_qt_renewal='no';
            $_qt_state='';
            $qt_insurance_type="";
            $_qt_reasons_lost='';
            $_qt_remarks='';
            $_qt_consultant='';
            $_qt_agent_sn='';
            $_cust_nric='';
            $_cust_dob='';//today
            $_cust_name='';
            $_cust_sn='';
            $_cust_gender='';
            $_cust_contact_hp='';
            $_cust_contact_office='';
            $_cust_contact_house='';
            $_cust_contact_fax='';
            $_cust_contact_email='';
            $_cust_address_1='';
            $_cust_address_2='';
            $_cust_post_code='';
            $_cust_license_date=date('d M Y',time());
            $_qt_insured_driving='';
            $_qt_marital_status='';
            $_qt_occupation='';
            $_qt_dlicense_pass_date=date( "d M Y");
            //echo 'date: '.$_qt_dlicense_pass_date;
            $_qt_instructions='';
            $_vi_number='';
            $_vi_make='';
            $_vi_model='';
            $_vi_cc='';
            $_vi_man_year='';
            $_vi_regn_date=date( "d M Y");
            $_vi_tax_expire_date=date( "d M Y");
            $_vi_additional='';
            $_ci_company='';
            $_ci_coverage='';
            $_ci_current_premium='';
            $_ci_current_excess='';
            $_ci_finance_company='';
            $_ci_policy_no='';
            $_ci_current_ncd='';
            $_ci_ncd_per_renewal='';
            $_ci_ncd_affect='';
            $_ci_ssd='';
            $_ci_ssd_date=date( "d M Y");;
            $_ci_period_start=date( "d M Y");
            $_ci_poi_end_date=date( "d M Y");
            $_ci_road_tax_due_date=date( "d M Y");
            $_ci_ncd_protection='';
            $_ci_claims_in_last3_year='';
            //$_quot_insurer='';
            //$_quot_workshop='';
            //$_quot_premium='';
            //$_quot_excess='';
            //$_quot_remarkr='';            
            $_si_company='';
            $_si_policy_no='';
            $_si_coverage='';
            $_si_premium='';
            $_si_excess='';
            $_si_finance_company='';
            $_si_ncd='';
            $_si_ncd_per_on_renewal='';
            $_si_ssd='';
            $_si_ssd_date_check=date( "d M Y");;
            $_si_start_date=date( "d M Y");;
            $_si_end_date=date( "d M Y");;
            $_si_road_tax_due=date( "d M Y");;
            $_si_ncd_protection='';
            $_aa_commission='';
            $_vip_scheme_type='';
            $_vip_fet_sunroof='';
            $_vip_fet_soft_top='';
            $_vip_fet_turbo_eng='';
            $_vip_fet_moonroof='';
            $_vip_fet_skyroof='';
            $_vip_fet_roof_pan='';
            $_vip_vt_super_model=''; 
            $_vip_vt_mpv='';
            $_vip_vt_suv='';
            $_vip_vt_sedan='';
            $_vip_vt_couple='';
            $_vip_vt_cabriolet='';
            $_vip_vt_parallel_import='';
            $_vic_type='';
            $_vic_weight_unladen=''; 
            $_vic_weight_laden=''; 
        }//end else
        ?>
        <!-- Quotation Details -->
        <section class="panel" id="qt_details">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">
                            <i class="icon-caret-down text-active"></i>
                            <i class="icon-caret-up text"></i>
                        </a>
                    </li>
                </ul>Quotation Details</header>
            <section class="panel-body">
           
               <input type="hidden" id="_action" name="_action" value="<?php echo $_action;?>">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req">Ref. No.</label>
                            <label class="col-md-6" style="padding-top: 7px;">QT<?php echo $new_qt_ref_no;?></label>
                            <input type="hidden" id="qt_ref_no" name="qt_ref_no" value="<?php echo isset($new_qt_ref_no)?$new_qt_ref_no:'';?>">
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req">Date</label>
                            <label class="col-md-6 " style="padding-top: 7px;">
                                <span id="qt_date"><?php echo isset($_record)?date('d M Y',$_record[0]['qt_date']):'';?></span>
                            </label>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req">Renewal</label>
                            <input type="hidden" name="qt_renewal" id="qt_renewal" value="<?php echo $_qt_renewal;?>">
                            <label class="col-md-6"><span id="qt_renewal_info"><?php echo $_qt_renewal;?></span></label>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_details_state">State </label>
                            <div class="col-md-6">
                                <input type="hidden" id="current_status" name="current_status" value="<?php echo $_qt_state;?>">
                                <select name="qt_details_state" id="qt_details_state" class="form-control m-b" required>
                                    <option <?php echo $_qt_state=='Draft'?'SELECTED':'';?>>Draft</option>
                                    <option <?php echo $_qt_state=='New'?'SELECTED':'';?>>New</option>
                                    <option <?php echo $_qt_state=='Renewal'?'SELECTED':'';?>>Renewal</option>
                                    <option <?php echo $_qt_state=='Quoted'?'SELECTED':'';?>>Quoted</option>
                                    <option <?php echo $_qt_state=='Sent'?'SELECTED':'';?>>Sent</option>
                                    <option <?php echo $_qt_state=='Accepted'?'SELECTED':'';?>>Accepted</option>
                                    <option <?php echo $_qt_state=='Lost'?'SELECTED':'';?>>Lost</option>
                                    <option <?php echo $_qt_state=='Paid'?'SELECTED':'';?>>Paid</option>
                                    <option <?php echo $_qt_state=='Closed'?'SELECTED':'';?>>Closed</option>
                                    <?php
                                    /* IF Current user is a super admin or accountant
                                     * => will show the won optioin
                                     */
                                    /**
                                    * Access Code: qt_state_won
                                    */
                                    if(in_array('qt_state_won',$this->session->userdata('user_access'))){?>
                                    <option <?php echo $_qt_state=='Won'?'SELECTED':'';?>>Won</option>
                                        <?php
                                    }//end if
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_insurance_type_pvt">Insurance Type</label>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="qt_details_insurance_type" id="qt_insurance_type_pvt" 
                                                   value="Private" <?php echo $qt_insurance_type=='Private'?'checked':'';?>
                                                   <?php echo $qt_insurance_type!=''?'disabled':'';?>>Private</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="qt_details_insurance_type" id="qt_insurance_type_com" 
                                                   value="Commercial" <?php echo $qt_insurance_type=='Commercial'?'checked':''; ?>
                                                   <?php echo $qt_insurance_type!=''?'disabled':'';?>>Commercial</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <div class="col-sm-6">     
                                <?php
                                /**
                                 * IF qt.status==lost
                                 * => LOAD Reasons Lost 
                                 * END IF
                                 */
                                $display='none';
                                if($_qt_state=='Lost'){
                                    $display='block';
                                }
                                ?>       
                                <div id="qt_details_status_lost_wrapper" style="display: <?php echo $display?>;">
                                    <label class="col-sm-3 control-label req" for="qt_details_reason_lost">Reasons Lost</label>
                                    <div class="col-md-6">
                                        <select name="qt_details_reason_lost" id="qt_details_reason_lost" class="form-control m-b">
                                            <option <?php echo $_qt_reasons_lost=='Car Sold'?'SELECTED':'';?>>Car Sold</option>
                                            <option <?php echo $_qt_reasons_lost=='Car Deregistered'?'SELECTED':'';?>>Car Deregistered</option>
                                            <option <?php echo $_qt_reasons_lost=='Switched-Out'?'SELECTED':'';?>>Switched-Out</option>
                                            <option <?php echo $_qt_reasons_lost=='- Direct Insurer'?'SELECTED':'';?>>- Direct Insurer</option>
                                            <option <?php echo $_qt_reasons_lost=='- Competitive Pricing'?'SELECTED':'';?>>- Competitive Pricing</option>
                                            <option <?php echo $_qt_reasons_lost=='- Scheme Price'?'SELECTED':'';?>>- Scheme Price</option>
                                            <option <?php echo $_qt_reasons_lost=='- Staff Price'?'SELECTED':'';?>>- Staff Price</option>
                                            <option <?php echo $_qt_reasons_lost=='- Support Relatives/Friends'?'SELECTED':'';?>>- Support Relatives/Friends</option>
                                            <option <?php echo $_qt_reasons_lost=='Others'?'SELECTED':'';?>>Others</option>
                                        </select>
                                    </div>
                                </div><!--end kist wraooer-->
                            </div><!--col-sm-6-->
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label">Quotation History</label>
                            
                            <div id="qt_history_wrapper">
                                <div class="col-md-9">
                                     <?php 
                                if(isset($_history)){                                
                                    $h=1;
                                    foreach($_history as $row):
                                        if($h==1){?>
                                            <p class="edit_history">Created by <?php echo $row->add_by_name;?> on <?php echo date('d M y',strtotime($row->add_date));?></p>
                                            <?php                                                                               
                                        }//end if
                                         if($row->update_by_name!=''){
                                             $name = explode(' ',trim($row->update_by_name));
                                             if($row->update_from != $row->update_to){

                                                 ?>
                                                <p class="edit_history"><?php echo $name[0];?> edited state <?php echo $row->update_from;?> to <?php echo $row->update_to;?> on <?php echo date('d M y : h:i A',strtotime($row->update_date));?></p>
                                                <?php                                        
                                             }else{
                                                 ?>
                                                <p class="edit_history">Edited by <?php echo $name[0];?> on <?php echo date('d M y : h:i A',strtotime($row->update_date));?></p>
                                                <?php                                        
                                             }

                                            }// update by name                                    
                                        $h++;
                                    endforeach;
                                    }//end iseet
                                ?>
                                    <div id="edit_history_wrap"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label">Remarks</label>
                            <div class="col-md-6">
                                <input type="hidden" id="qt_details_remark" name="qt_details_remark" value="<?php echo $_qt_remarks;?>">
                                <div id="qt_details_remark_div" class="form-control" style="overflow:scroll;height:150px;max-height:150px"
                                     contenteditable="true"><?php echo $_qt_remarks;?></div>
                            </div>
                        </div>
                    </div>                
            </section>
        </section>
        <!-- Assignees Details -->
        <section class="panel" id="qt_assignee">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">
                            <i class="icon-caret-down text-active"></i>
                            <i class="icon-caret-up text"></i>
                        </a>
                    </li>
                </ul>Assignees</header>
            <section class="panel-body">
                
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_consultant_sn">Consultant</label>
                            <div class="col-md-6">
                                <select name="qt_consultant_sn" id="qt_consultant_sn" class="form-control m-b" required>
                                    <?php 
                                    foreach($consultants as $record): ?>
                                    <option value="<?php echo $record['user_sn'];?>"
                                            <?php echo $_qt_consultant==$record['user_sn']?'SELECTED':'';?>><?php echo $record['user_name'];?></option>
                                        <?php                                        
                                    endforeach;
                                    ?>                                    
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="qt_agent_sn">External Agent</label>
                            <div class="col-md-6">
                                <select name="qt_agent_sn" id="qt_agent_sn" class="form-control m-b">

                                    <option>None</option>
                                    <?php 
                                    foreach($agents as $record): ?>
                                    <option value="<?php echo $record['user_sn'];?>"
                                            <?php echo $_qt_agent_sn==$record['user_sn']?'SELECTED':'';?>><?php echo $record['user_name'];?></option>
                                        <?php                                        
                                    endforeach;
                                    ?>                                    
                                </select>
                            </div>
                        </div>
                    </div>	                  
            </section>
        </section>
        <!-- Customer Details -->
        <section class="panel" id="qt_customer">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">

                            <i class="icon-caret-down text-active"></i>

                            <i class="icon-caret-up text"></i>

                        </a>
                    </li>
                </ul>Customer Details
            </header>
            <section class="panel-body">
                <form class="form-horizontal" method="get">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_customer_sn">Insured Name</label>
                            <div class="col-md-6">
                                <input type="text" maxlength="50" id="qt_customer_name" name="qt_customer_name"
                                       value="<?php echo $_cust_name;?>" class="form-control ui-autocomplete-input" placeholder="Insured Name">
                                <input type="hidden" id="qt_customer_sn" name="qt_customer_sn" 
                                       value="<?php echo $_cust_sn;?>">                         
                            </div>
                            <div class="col-md-3">
                                <span id="results"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="cust_nric">NRIC/FIN/ACRA</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" id="cust_nric" name="cust_nric" maxlength="50"
                                       value="<?php echo $_cust_nric;?>"
                                       placeholder="NRIC/FIN/ACRA">                                
                            </div>
                            <div class="col-sm3">
                            <span id="res_nric"></span>
                            </div>
                        </div>                        

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_cust_insured_driving_yes">Insured Driving</label>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="qt_cust_insured_driving" id="qt_cust_insured_driving_yes" 
                                                   value="Yes" <?php echo $_qt_insured_driving=='Yes'?'checked':''; ?>>Yes</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="qt_cust_insured_driving" id="qt_cust_insured_driving_no" 
                                                   value="No" <?php echo $_qt_insured_driving=='No'?'checked':''; ?>>No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Customer Type</label>
                            <div class="col-md-6">
                                <label class="control-label"><span id="cust_type"><?php echo '';?></span></label>
                            </div>
                        </div>
                    </div>


                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label">Date of Birth</label>

                            <div class="col-md-6">
                                <label class="control-label"><span id="cust_dob"><?php echo date('d M Y',  strtotime($_cust_dob));?></span></label>                                

                            </div>

                        </div>

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label">Age</label>

                            <div class="col-md-6">

                                <label class="col-sm-12 control-label">
                                    <span id="cust_age" class="pull-left text-left"></span>
                                </label>

                            </div>

                        </div>

                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_gender">Gender</label>
                            <div class="col-md-6">
                                <label class="control-label"><span id="cust_gender"><?php echo $_cust_gender;?></span></label>                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="qt_cust_mstatus">Marital Status</label>
                            <div class="col-md-6">                                
                                <select name="qt_cust_mstatus" id="qt_cust_mstatus" class="form-control m-b">
                                    <option value="Single"
                                            <?php echo $_qt_marital_status=='Single'?'SELECTED':'';?>
                                            >Single</option>
                                    <option value="Married"
                                            <?php echo $_qt_marital_status=='Married'?'SELECTED':'';?>>Married</option>
                                </select> 
                            </div>
                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="cust_contact_house">Contact (H)</label>

                            <div class="col-md-6">
                                <label class="control-label"><span id="cust_contact_house"><?php echo $_cust_contact_house;?></span></label>                                
                            </div>

                        </div>

                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_contact_office" >Contact (O)</label>
                            <div class="col-md-6">
                                <label class="control-label"><span id="cust_contact_office"><?php echo $_cust_contact_office;?></span></label>                               
                            </div>
                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_contact_hp">Contact (hp)</label>
                            <div class="col-md-6">
                                <label class="control-label"><span id="cust_contact_hp"><?php echo $_cust_contact_hp;?></span></label>                                
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_contact_fax">Fax </label>
                            <div class="col-md-6">
                                <label class="control-label"><span id="cust_contact_fax"><?php echo $_cust_contact_fax;?></span></label>                                
                            </div>
                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label">E-mail</label>
                            <div class="col-md-6">
                                <label class="control-label"><span id="cust_contact_email"><?php echo $_cust_contact_email;?></span></label>
                            </div>
                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="cust_address_line1">Address Line 1</label>
                            <div class="col-md-6">
                                <label class="control-label"><span id="cust_address_line1"><?php echo $_cust_address_1;?></span></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req">Address Line 2</label>
                            <div class="col-md-6">
                            <label class="control-label"><span id="cust_address_line2"><?php echo $_cust_address_2;?></span></label>                                
                            </div>
                        </div>

                    </div>

                    <div class="form-group">

                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req">Postal Code</label>
                            <div class="col-md-6">
                                <label class="control-label"><span id="cust_post_code"><?php echo $_cust_post_code;?></span></label>                                
                            </div>
                        </div>

                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="qt_cust_occupation">Occupation / Nature of Business</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="qt_cust_occupation" 
                                       value="<?php echo $_qt_occupation;?>"
                                       name="qt_cust_occupation" placeholder="Occupation / Nature of Business"/>
                            </div>

                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label  req" for="cust_license_date">Driving License Pass Date</label>
                            <div class="col-md-6">              
                                <input type="hidden" name="qt_cust_license_date" id="qt_cust_license_date" 
                                       value="<?php echo $_qt_dlicense_pass_date;?>">
                                <label class="control-label"><span id="cust_license_date"><?php echo $_qt_dlicense_pass_date;?></span></label>                                
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Driving Experience</label>
                            <div class="col-md-6">
                                <label class="control-label"><span id="cust_driving_experience"></span></label>
                            </div>
                        </div>

                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label">Instructions</label>

                            <div class="col-md-6">
                                <input type="hidden" name="qt_cust_instructions" 
                                       id="qt_cust_instructions" value="<?php echo $_qt_instructions;?>">
                                <div id="cust_instructions_wrap" class="form-control" style="overflow:scroll;height:150px;max-height:150px"
                                     contenteditable="true"><?php echo $_qt_instructions;?></div>

                            </div>

                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-10"></div>
                        <div class="col-sm-2">                            
                                <!--button check point customer -->
                                <button type="button" id="btn_cp_customer"
                                        class="btn btn-primary pull-right"><i class="icon-save"></i> Save</button>
                                <!-- <div class="col-sm-3 m-b-xs" style="padding-left:0px;"></div> -->
                        </div>
                    </div>
                </form>
            </section>
        </section>

        <!-- Private Vehicle & Commercial Vehicle Details -->
        <!-- Private -->
        <section class="panel" id="panel_vehicle_info_pvt">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">

                            <i class="icon-caret-down text-active"></i>

                            <i class="icon-caret-up text"></i>

                        </a>
                    </li>
                </ul><span id="qt_ins_type_name">Vehicle Information (<?php echo $qt_insurance_type;?>)</span>
            </header>
            <section class="panel-body">
                <form class="form-horizontal" method="get">

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label req" for="qt_vi_number">Number</label>

                            <div class="col-md-6">
                                <input type="text" id="qt_vi_number" name="qt_vi_number" value="<?php echo $_vi_number;?>"
                                       placeholder="Vehicle Number" class="form-control">
                            </div>

                        </div>

                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label req" for="qt_vi_make">Make</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" id="qt_vi_make" required                                       
                                       name="qt_vi_make" placeholder="Make" value="<?php echo $_vi_make;?>" maxlength="50"/>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label  req" for="qt_vi_model">Model</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="qt_vi_model" name="qt_vi_model" 
                                       placeholder="Model" value="<?php echo $_vi_model;?>" required maxlength="50"/>
                            </div>
                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <?php                   
                        if(isset($qt_insurance_type)){                        
                        if($qt_insurance_type=='Private'){ ?>                       
                        <div class="col-sm-6 qt_type_pvt">
                            <!--private type-->
                            <label class="col-sm-3 control-label req" for="qt_vipvt_scheme_type">Scheme Type</label>
                            <div class="col-md-6">
                                <select name="qt_vipvt_scheme_type" id="qt_vipvt_scheme_type" 
                                        class="form-control m-b" required>
                                    <option <?php echo $_vip_scheme_type=='Normal'?'SELECTED':'';?> >Normal</option>
                                    <option <?php echo $_vip_scheme_type=='Off-peak'?'SELECTED':'';?>>Off-peak</option>
                                    <option <?php echo $_vip_scheme_type=='Company'?'SELECTED':'';?>>Company</option>
                                </select>
                            </div>

                        </div>
                         <?php
                         }      //pvt                   
                        }//isset
                         
                        if(isset($qt_insurance_type)){
                        //echo 'type: '.$qt_insurance_type;
                        if($qt_insurance_type=='Commercial'){ ?>
                        <!--commercial type-->
                         <div class="col-sm-6 qt_type_com">
                            <label class="col-sm-3 control-label req" for="qt_vicom_type">Type</label>
                            <div class="col-md-6">
                                <select name="qt_vicom_type" id="qt_vicom_type" class="form-control m-b" required>
                                    <option <?php echo $_vic_type=='Hood/Canopy'?'SELECTED':'';?>>Hood/Canopy</option>
                                    <option <?php echo $_vic_type=='Std Lorry'?'SELECTED':'';?>>Std Lorry</option>
                                    <option <?php echo $_vic_type=='Std Van'?'SELECTED':'';?>>Std Van</option>
                                    <option <?php echo $_vic_type=='Refrigerated Van'?'SELECTED':'';?>>Refrigerated Van</option>
                                    <option <?php echo $_vic_type=='Crane/Tailgate'?'SELECTED':'';?>>Crane/Tailgate</option>
                                    <option <?php echo $_vic_type=='Garbage Truck'?'SELECTED':'';?>>Garbage Truck</option>
                                    <option <?php echo $_vic_type=='Mixer'?'SELECTED':'';?>>Mixer</option>
                                    <option <?php echo $_vic_type=='Prime Mover'?'SELECTED':'';?>>Prime Mover</option>
                                    <option <?php echo $_vic_type=='Tipper'?'SELECTED':'';?>>Tipper</option>
                                    <option <?php echo $_vic_type=='Tanker'?'SELECTED':'';?>>Tanker</option>
                                    <option <?php echo $_vic_type=='Ambulance'?'SELECTED':'';?>>Ambulance</option>
                                    <option <?php echo $_vic_type=='Tow Truck'?'SELECTED':'';?>>Tow Truck</option>
                                </select>
                            </div>
                        </div>
                        <?php
                        } //
                        }//
                        ?>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_vi_cc">CC</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="qt_vi_cc" required maxlength="50"
                                       name="qt_vi_cc" value="<?php echo $_vi_cc;?>" placeholder="CC" value=""/>
                            </div>
                        </div>

                    </div>
                    <?php
                    
                    if(isset($qt_insurance_type)){
                        //echo 'type: '.$qt_insurance_type;
                        if($qt_insurance_type=='Commercial'){ ?>
                    <!--commercial Type-->
                    <div class="qt_type_com">
                        <div class="form-group">

                            <div class="col-sm-6">
                                <label class="col-sm-3 control-label req" for="qt_vicom_unladen_weight">Unladen Weight</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="qt_vicom_unladen_weight" required
                                           value="<?php echo $_vic_weight_laden;?>"
                                           name="qt_vicom_unladen_weight" placeholder="Unladen Weight"/>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label class="col-sm-3 control-label req" for="qt_vicom_laden_weight">Laden Weight</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="qt_vicom_laden_weight" required
                                           value="<?php echo $_vic_weight_laden;?>"
                                           name="qt_vicom_laden_weight" placeholder="Laden Weigh"/>
                                </div>
                            </div>

                        </div>

                        <div class="line line-dashed line-lg pull-in"></div>

                        <div class="form-group">

                            <div class="col-sm-6">

                                <label class="col-sm-3 control-label">Tonnage</label>

                                <label class="col-sm-3 control-label" id="qt_vicom_tonnage">[Equation]</label>

                            </div>

                        </div>
                        
                    </div><!--end qt_type_com -->
                            <?php
                        }//end Commercial
                    }//end if
                    ?>                    
                    
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <label class="col-sm-3 control-label req" for="qt_vi_year_of_manufacture">Year of Manufacture</label>
                        <div class="col-md-7">
                            <input type="number" class="form-control" id="qt_vi_year_of_manufacture" maxlength="4" max="2030" min="1900"
                                   value="<?php echo $_vi_man_year;?>"
                                   name="qt_vi_year_of_manufacture" placeholder="Year of Manufacture"/>
                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label req" for="qt_vi_regn_date">Regn. Date</label>

                        <div class="col-md-7">
                            <input class="input-sm datepicker-input form-control" id="qt_vi_regn_date" 
                                   size="16" type="text" name="qt_vi_regn_date" maxlength="12"  required
                                   parsley-maxlength="12" parsley-trigger="focusout"  value="<?php echo $_vi_regn_date;?>"
                                   data-date-format="dd-mm-yyyy" placeholder="Regn. Date">                            
                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <label class="col-sm-3 control-label req" for="qt_vi_road_tax_expire_date">Road Tax Expiry Date</label>
                        <div class="col-md-7">
                            <input class="input-sm datepicker-input form-control" id="qt_vi_road_tax_expire_date" 
                                   size="16" type="text" name="qt_vi_road_tax_expire_date" maxlength="12" 
                                   parsley-maxlength="12" parsley-trigger="focusout"  required value="<?php echo $_vi_tax_expire_date;?>"
                                   data-date-format="dd-mm-yyyy" placeholder="Road Tax Expiry Date">   
                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                    <?php
                    if(isset($qt_insurance_type)){
                        if($qt_insurance_type=='Private'){ ?>
                    <div class="qt_type_pvt">
                        <div class="form-group">

                            <label class="col-sm-3 control-label"></label>
                            <!--additional features-->
                            <div class="col-sm-4">

                                <label class="control-label req">Additional Features</label>
                                <div class="checkbox">
                                    <label><input type="checkbox" id="qt_vipvt_feature_sunroof" 
                                                  <?php echo $_vip_fet_sunroof==1?'CHECKED':'';?>
                                                  name="qt_vipvt_feature_sunroof" value="">sunroof</label>
                                </div>

                                <div class="checkbox">
                                    <label><input type="checkbox" id="qt_vipvt_feature_soft_top"
                                                  <?php echo $_vip_fet_soft_top==1?'CHECKED':'';?>
                                                  name="qt_vipvt_feature_soft_top" value="">soft-top</label>
                                </div>

                                <div class="checkbox">
                                    <label><input type="checkbox" id="qt_vipvt_feature_turbo_engine" 
                                                  <?php echo $_vip_fet_turbo_eng==1?'CHECKED':'';?>
                                                  name="qt_vipvt_feature_turbo_engine" value="">turbo engine</label>
                                </div>

                                <div class="checkbox">
                                    <label><input type="checkbox" id="qt_vipvt_feature_moonroof"
                                                  <?php echo $_vip_fet_moonroof==1?'CHECKED':'';?>
                                                  name="qt_vipvt_feature_moonroof" value="">moonroof</label>
                                </div>								

                                <div class="checkbox">
                                    <label><input type="checkbox" id="qt_vipvt_feature_skyroof" 
                                                  <?php echo $_vip_fet_skyroof==1?'CHECKED':'';?>
                                                  name="qt_vipvt_feature_skyroof" value="">skyroof</label>
                                </div>								

                                <div class="checkbox">
                                    <label><input type="checkbox" id="qt_vipvt_feature_roof_panoramic" 
                                                  <?php echo $_vip_fet_roof_pan==1?'CHECKED':'';?>
                                                  name="qt_vipvt_feature_roof_panoramic" value="">roof panoramic</label>
                                </div>								

                            </div>
                            <!--vehicle type-->
                            <div class="col-sm-4">

                                <label class="control-label  req">Vehicle Type</label>							

                                <div class="checkbox">
                                    <label><input type="checkbox" id="qt_vipvt_type_sport_model"
                                                  <?php echo $_vip_vt_super_model==1?'CHECKED':'';?>
                                                  name="qt_vipvt_type_sport_model" value="">sport model</label>
                                </div>

                                <div class="checkbox">
                                    <label><input type="checkbox" id="qt_vipvt_type_mpv"
                                                  <?php echo $_vip_vt_mpv==1?'CHECKED':'';?>
                                                  name="qt_vipvt_type_mpv" value="">MPV</label>
                                </div>

                                <div class="checkbox">
                                    <label><input type="checkbox" id="qt_vipvt_type_suv"
                                                  <?php echo $_vip_vt_suv==1?'CHECKED':'';?>
                                                  name="qt_vipvt_type_suv" value="">SUV</label>
                                </div>

                                <div class="checkbox">
                                    <label><input type="checkbox" id="qt_vipvt_type_sedan" 
                                                  <?php echo $_vip_vt_sedan==1?'CHECKED':'';?>
                                                  name="qt_vipvt_type_sedan" value="">Sedan</label>
                                </div>								

                                <div class="checkbox">

                                    <label><input type="checkbox" id="qt_vipvt_type_coupe" 
                                                  <?php echo $_vip_vt_couple==1?'CHECKED':'';?>
                                                  name="qt_vipvt_type_coupe " value="">Coupe</label>
                                </div>

                                <div class="checkbox">
                                    <label><input type="checkbox" id="qt_vipvt_type_cabriolet"
                                                  <?php echo $_vip_vt_cabriolet==1?'CHECKED':'';?>
                                                  name="qt_vipvt_type_cabriolet" value="">Cabriolet</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" id="qt_vipvt_type_parallel_import"
                                                  <?php echo $_vip_vt_parallel_import==1?'CHECKED':'';?>
                                                  name="qt_vipvt_type_parallel_import" value="">Parallel Import</label>
                                </div>								
                            </div>
                        </div>

                        <div class="line line-dashed line-lg pull-in"></div>
                    </div><!--end qt_type_pvt-->
                    <?php                            
                        }//Private end
                    }//end if
                    ?>
                    
                    
                    
                    <div class="form-group">

                        <label class="col-sm-3 control-label">Additional Accesories/Coverage</label>
                        <div class="col-sm-7">
                            <input type="hidden" id="qt_vi_additional_accessories" name="qt_vi_additional_accessories" 
                                   value="">
                            <div id="qt_vi_additional_accessories_wrap" class="form-control" style="overflow:scroll;height:150px;max-height:150px"
                                 contenteditable="true"><?php echo $_vi_additional;?></div>
                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-10"></div>
                        <div class="col-sm-2">
                             <!--button check point vehicle info pvt  -->
                                <button type="button" id="btn_cp_vechicle_info_pvt"
                                        class="btn btn-primary btn-save pull-right"><i class="icon-save"></i> Save</button>                            
                        </div>
                    </div>
                </form>
            </section>
        </section>
                
        <!-- Insurance Details -->
        <section class="panel" id="qt_insurance_details">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">
                            <i class="icon-caret-down text-active"></i>
                            <i class="icon-caret-up text"></i>
                        </a>
                    </li>
                </ul>Current Insurance Details</header>            
            <section class="panel-body">
                <form class="form-horizontal" method="get">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_id_company">Current Company</label>
                            <div class="col-md-6">
                                <select id="qt_id_company" name="qt_id_company" required class="form-control m-b">
                                    <optgroup>
                                    <option <?php echo $_ci_company=='AIG'?'SELECTED':'';?>>AIG</option>
                                    <option <?php echo $_ci_company=='AXA'?'SELECTED':'';?>>AXA</option>
                                    <option <?php echo $_ci_company=='China Taiping'?'SELECTED':'';?>>China Taiping</option>
                                    <option <?php echo $_ci_company=='Liberty'?'SELECTED':'';?>>Liberty</option>
                                    <option <?php echo $_ci_company=='MSIG'?'SELECTED':'';?>>MSIG</option>
                                    <option  <?php echo $_ci_company=='NTUC Income'?'SELECTED':'';?> >NTUC Income</option>
                                    </optgroup>
                                    <optgroup label="-----------------">                                   
                                    <option <?php echo $_ci_company=='ACE'?'SELECTED':'';?> >ACE</option>
                                    <option <?php echo $_ci_company=='Aetna'?'SELECTED':'';?> >Aetna</option>
                                    <option <?php echo $_ci_company=='Allianz Global'?'SELECTED':'';?> >Allianz Global</option>
                                    <option <?php echo $_ci_company=='Allied World Assurance'?'SELECTED':'';?> >Allied World Assurance</option>
                                    <option <?php echo $_ci_company=='Aviva'?'SELECTED':'';?> >Aviva</option>
                                    <option <?php echo $_ci_company=='Cigna Europe'?'SELECTED':'';?> >Cigna Europe</option>
                                    <option <?php echo $_ci_company=='Direct Asia'?'SELECTED':'';?> >Direct Asia</option>
                                    <option <?php echo $_ci_company=='ECICS'?'SELECTED':'';?> >ECICS</option>
                                    <option <?php echo $_ci_company=='EQ'?'SELECTED':'';?> >EQ</option>
                                    <option <?php echo $_ci_company=='Etiqa'?'SELECTED':'';?> >Etiqa</option>
                                    <option <?php echo $_ci_company=='Federal'?'SELECTED':'';?> >Federal</option>
                                    <option <?php echo $_ci_company=='First Capital'?'SELECTED':'';?> >First Capital</option>
                                    <option <?php echo $_ci_company=='HDI-Gerling Industrie Versicherung'?'SELECTED':'';?> >HDI-Gerling Industrie Versicherung</option>
                                    <option <?php echo $_ci_company=='HL Assurance'?'SELECTED':'';?> >HL Assurance</option>
                                    <option <?php echo $_ci_company=='India International'?'SELECTED':'';?> >India International</option>
                                    <option <?php echo $_ci_company=='InterGlobal'?'SELECTED':'';?> >InterGlobal</option>
                                    <option <?php echo $_ci_company=='Liberty'?'SELECTED':'';?> >Liberty</option>
                                    <option <?php echo $_ci_company=='Lloyds of London'?'SELECTED':'';?> >Lloyds of London</option>
                                    <option <?php echo $_ci_company=='Lonpac'?'SELECTED':'';?> >Lonpac</option>
                                    <option <?php echo $_ci_company=='Nipponkoa'?'SELECTED':'';?> >Nipponkoa</option>
                                    <option <?php echo $_ci_company=='Overseas Assurance'?'SELECTED':'';?> >Overseas Assurance</option>
                                    <option <?php echo $_ci_company=='QBE'?'SELECTED':'';?> >QBE</option>
                                    <option <?php echo $_ci_company=='Raffle Health'?'SELECTED':'';?> >Raffle Health</option>
                                    <option <?php echo $_ci_company=='Royah & Sun Alliance'?'SELECTED':'';?> >Royah & Sun Alliance</option>
                                    <option <?php echo $_ci_company=='Singapore Aviation'?'SELECTED':'';?> >Singapore Aviation</option>
                                    <option <?php echo $_ci_company=='SHC'?'SELECTED':'';?> >SHC</option>
                                    <option <?php echo $_ci_company=='Starr International'?'SELECTED':'';?> >Starr International</option>
                                    <option <?php echo $_ci_company=='Tenet Sompo'?'SELECTED':'';?> >Tenet Sompo</option>
                                    <option <?php echo $_ci_company=='Tokio Marine'?'SELECTED':'';?> >Tokio Marine</option>
                                    <option <?php echo $_ci_company=='United Overseas'?'SELECTED':'';?> >United Overseas</option>
                                    <option <?php echo $_ci_company=='XL'?'SELECTED':'';?> >XL</option>
                                    <option <?php echo $_ci_company=='Zurich'?'SELECTED':'';?> >Zurich</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_id_type_of_coverage">Type of Coverage</label>
                            <div class="col-md-6">
                                <select name="qt_id_type_of_coverage" id="qt_id_type_of_coverage" class="form-control m-b"
                                        required>
                                    <option <?php echo $_ci_coverage=='Comprehensive'?'SELECTED':'';?> >Comprehensive</option>
                                    <option <?php echo $_ci_coverage=='TPFT'?'SELECTED':'';?> >TPFT</option>
                                    <option <?php echo $_ci_coverage=='TPO'?'SELECTED':'';?> >TPO</option>							
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_id_current_premium">Current Premium</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" id="qt_id_current_premium" required
                                       value="<?php echo $_ci_current_premium;?>"
                                       name="qt_id_current_premium" placeholder="Current premium">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_id_current_excess">Current Excess</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" id="qt_id_current_excess" required
                                       value="<?php echo $_ci_current_excess;?>"
                                       name="qt_id_current_excess "placeholder="Current Excess">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_id_finance_company">Finance Company</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="qt_id_finance_company" maxlength="100" required
                                       value="<?php echo $_ci_finance_company;?>"
                                       name="qt_id_finance_company" placeholder="Finance Company">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_id_policy_no">Current Policy No</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="qt_id_policy_no" maxlength="50" required
                                       value="<?php echo $_ci_policy_no;?>"
                                       name="qt_id_policy_no" placeholder="Current Policy No">
                            </div>
                        </div>                        
                    </div>  
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_id_current_ncd">Current NCD</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="qt_id_current_ncd"
                                       value="<?php echo $_ci_current_ncd;?>"
                                       name="qt_id_current_ncd" placeholder="Current NCD">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_id_ncd_on_renewal">NCD % on Renewal</label>
                            <div class="col-md-6">
                                <select name="qt_id_ncd_on_renewal" name="qt_id_ncd_on_renewal" class="form-control m-b" required>
                                    <option <?php echo $_ci_ncd_per_renewal=='0'?'SELECTED':'';?> >0</option>
                                    <option <?php echo $_ci_ncd_per_renewal=='10'?'SELECTED':'';?> >10</option>
                                    <option <?php echo $_ci_ncd_per_renewal=='20'?'SELECTED':'';?> >20</option>
                                    <option <?php echo $_ci_ncd_per_renewal=='30'?'SELECTED':'';?> >30</option>
                                    <option <?php echo $_ci_ncd_per_renewal=='40'?'SELECTED':'';?> >40</option>
                                    <option <?php echo $_ci_ncd_per_renewal=='50'?'SELECTED':'';?> >50</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_id_ncd_on_change_yes">NCD affected on Change</label>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="qt_id_ncd_on_change" id="qt_id_ncd_on_change_yes" 
                                                   <?php echo $_ci_ncd_affect=='Yes'?'CHECKED':'';?>
                                                   value="Yes" >Yes</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="qt_id_ncd_on_change" id="qt_id_ncd_on_change_no" 
                                                   <?php echo $_ci_ncd_affect=='No'?'CHECKED':'';?>
                                                   value="No" checked="">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="line line-dashed line-lg pull-in"></div>


                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_id_ssd_yes">SDD</label>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label><input type="radio" name="qt_id_ssd" id="qt_id_ssd_yes" value="Yes" 
                                                      <?php echo $_ci_ssd=='Yes'?'CHECKED':'';?>>Yes</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label><input type="radio" name="qt_id_ssd" id="qt_id_ssd_no" value="No" 
                                                      <?php echo $_ci_ssd=='No'?'CHECKED':'';?>>No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_ssd_date_check">SDD Date Check</label>
                            <div class="col-md-6">
                                <input class="input-sm datepicker-input form-control" id="qt_ssd_date_check" 
                                       value="<?php echo $_ci_ssd_date;?>"
                                   size="16" type="text" name="qt_ssd_date_check" maxlength="12" 
                                   parsley-maxlength="12" parsley-trigger="focusout" required
                                   data-date-format="dd-mm-yyyy" placeholder="SDD Date Check">   
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </section>
        
        <!-- Insurance Period -->
        <section class="panel" id="qt_insurance_period">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">
                            <i class="icon-caret-down text-active"></i>
                            <i class="icon-caret-up text"></i>
                        </a>
                    </li>
                </ul>Current Insurance Period</header>
            <section class="panel-body">
                <form class="form-horizontal" method="get">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_ci_start_date">Start Date</label>
                            <div class="col-md-6">
                                <input class="input-sm datepicker-input form-control" id="qt_ci_start_date" 
                                   value="<?php echo $_ci_period_start;?>"
                                   size="16" type="text" name="qt_ci_start_date" maxlength="12" 
                                   parsley-maxlength="12" parsley-trigger="focusout" 
                                   data-date-format="dd-mm-yyyy" placeholder="Start Date">   
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label  req" for="qt_ci_poi_end_date">POI End Date</label>
                            <div class="col-md-6">
                                <input class="input-sm datepicker-input form-control" id="qt_ci_poi_end_date" type="text"
                                       value="<?php echo $_ci_poi_end_date;?>"
                                       size="16" type="text" name="qt_ci_poi_end_date" maxlength="12" 
                                       parsley-maxlength="12" parsley-trigger="focusout" 
                                       data-date-format="dd-mm-yyyy" placeholder="POI End Date">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>				  
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_ci_road_tax_date">Road Tax Due</label>
                            <div class="col-md-6">
                                <input class="input-sm datepicker-input form-control" id="qt_ci_road_tax_date" 
                                   value="<?php echo $_ci_road_tax_due_date;?>"
                                   size="16" type="text" name="qt_ci_road_tax_date" maxlength="12" 
                                   parsley-maxlength="12" parsley-trigger="focusout" 
                                   data-date-format="dd-mm-yyyy" placeholder="Road Tax Due">   
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_ci_ncd_protection">NCD Protection</label>
                            <div class="col-md-6">
                                <select name="qt_ci_ncd_protection" id="qt_ci_ncd_protection" class="form-control m-b">
                                    <option <?php echo $_ci_ncd_protection=='Unknown'?'SELECTED':'';?> >Unknown</option>
                                    <option <?php echo $_ci_ncd_protection=='Yes'?'SELECTED':'';?> >Yes</option>
                                    <option <?php echo $_ci_ncd_protection=='No'?'SELECTED':'';?> >No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_ci_claim_in_3_years_yes">Claims in last 3 years</label>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="qt_ci_claim_in_3_years" id="qt_ci_claim_in_3_years_yes" 
                                                   value="yes" <?php echo $_ci_claims_in_last3_year=='yes'?'CHECKED':'';?>>Yes</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="qt_ci_claim_in_3_years" id="qt_ci_claim_in_3_years_no" 
                                                   value="no"  <?php echo $_ci_claims_in_last3_year=='no'?'CHECKED':'';?>>No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-10"></div>
                        <div class="col-sm-2">
                            <button type="button" id="btn_cp_current_insurance"
                                    class="btn btn-primary btn-save pull-right"><i class="icon-save"></i> Save</button>                            
                        </div>
                    </div>

                </form>
            </section>
        </section>
        
        <!-- Claim History 1 & 2 -->
        <div id="claim_area">
                
        <?php         
        if (!empty($_claim_history )){            
       // $h=0;// History Counter
        $maxchn=array(0);
        foreach($_claim_history as $claim):
            //DYNAMIC CLAIM HISTORY
        
    ?>
        <section class="panel" id="qt_claim_history_<?php echo $claim['clh_no'];?>">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">   
                    <li>
                        <button class="btn btn-xs btn-link remove_dynamic remove_claim" value="<?php echo $claim['clh_no'];?>" title="Remove"><i class="icon-trash"></i></button>
                    </li>
                    <li>
                        <a href="#" class="panel-toggle text-muted">
                            <i class="icon-caret-down text-active"></i>
                            <i class="icon-caret-up text"></i>
                        </a>
                    </li>
                </ul>Claim History (<?php echo $claim['clh_no'];?>)</header>
            <section class="panel-body">
                <form class="form-horizontal" method="get">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_claim_<?php echo $claim['clh_no'];?>_driver_name">Driver Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="qt_claim_<?php echo $claim['clh_no'];?>_driver_name" maxlength="50"
                                       name="qt_claim_<?php echo $claim['clh_no'];?>_driver_name" 
                                       value="<?php echo $claim['clh_driver_name'];?>" required placeholder="Driver Name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_claim_<?php echo $claim['clh_no'];?>_vehicle_no">Vehicle No.</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="qt_claim_<?php echo $claim['clh_no'];?>_vehicle_no"
                                       name="qt_claim_<?php echo $claim['clh_no'];?>_vehicle_no" 
                                       value="<?php echo $claim['clh_vehicle_no'];?>" required placeholder="Vehicle No.">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_claim_<?php echo $claim['clh_no'];?>_accident_date">Accident Date</label>
                            <div class="col-md-9">
                                <input class="input-sm datepicker-input form-control" id="qt_claim_<?php echo $claim['clh_no'];?>_accident_date" 
                                   size="16" type="text" name="qt_claim_<?php echo $claim['clh_no'];?>_accident_date" maxlength="12" 
                                   parsley-maxlength="12" parsley-trigger="focusout" value="<?php echo date('d-m-Y',$claim['clh_accident_date']);?>"
                                   data-date-format="dd-mm-yyyy" placeholder="Accident Date">   
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_claim_<?php echo $claim['clh_no'];?>_reporting_date">Reporting Date</label>
                            <div class="col-md-9">
                                <input class="input-sm datepicker-input form-control" id="qt_claim_<?php echo $claim['clh_no'];?>_reporting_date" 
                                   size="16" type="text" name="qt_claim_<?php echo $claim['clh_no'];?>_reporting_date" maxlength="12" 
                                   parsley-maxlength="12" parsley-trigger="focusout"  value="<?php echo date('d-m-Y',$claim['clh_reporting_date']);?>" 
                                   data-date-format="dd-mm-yyyy" placeholder="Reporting Date">  
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="qt_claim_<?php echo $claim['clh_no'];?>_claims_paid_od">Claims Paid (OD)</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" id="qt_claim_<?php echo $claim['clh_no'];?>_claims_paid_od" 
                                       name="qt_claim_<?php echo $claim['clh_no'];?>_claims_paid_od" 
                                       value="<?php echo $claim['clh_paid_od'];?>" placeholder="Claims Paid (OD)">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="qt_claim_<?php echo $claim['clh_no'];?>_claims_paid_tppd">Claims Paid (TPPD)</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" id="qt_claim_<?php echo $claim['clh_no'];?>_claims_paid_tppd"
                                       name="qt_claim_<?php echo $claim['clh_no'];?>_claims_paid_tppd" 
                                       value="<?php echo $claim['clh_paid_tppd'];?>" placeholder="Claims Paid (TPPD)">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="qt_claim_1_claims_paid_tpbi">Claims Paid (TPBI)</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" id="qt_claim_<?php echo $claim['clh_no'];?>_claims_paid_tpbi"
                                       name="qt_claim_<?php echo $claim['clh_no'];?>_claims_paid_tpbi" 
                                       value="<?php echo $claim['clh_paid_tpbi'];?>" placeholder="Claims Paid (TPBI)">
                            </div>
                        </div>
                    </div>	
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="qt_claim_<?php echo $claim['clh_no'];?>_claims_reserved_tppd">Claims Reserved (TPPD)</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" id="qt_claim_<?php echo $claim['clh_no'];?>_claims_reserved_tppd"
                                       name="qt_claim_<?php echo $claim['clh_no'];?>_claims_reserved_tppd" 
                                       value="<?php echo $claim['clh_reserved_tppd'];?>" placeholder="Claims Reserved (TPPD)">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="qt_claim_<?php echo $claim['clh_no'];?>_claims_reserved_tpbi">Claims Reserved (TPBI)</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" id="qt_claim_<?php echo $claim['clh_no'];?>_claims_reserved_tpbi"
                                       name="qt_claim_<?php echo $claim['clh_no'];?>_claims_reserved_tpbi" 
                                       value="<?php echo $claim['clh_reserved_tpbi'];?>" placeholder="Claims Reserved (TPBI)">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="qt_claim_<?php echo $claim['clh_no'];?>_windscreen">Windscreen</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="qt_claim_<?php echo $claim['clh_no'];?>_windscreen"
                                       name="qt_claim_<?php echo $claim['clh_no'];?>_windscreen" 
                                       value="<?php echo $claim['clh_windscreen'];?>"  placeholder="Windscreen">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="qt_claim_<?php echo $claim['clh_no'];?>_reporting_only">Reporting Only</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="qt_claim_<?php echo $claim['clh_no'];?>_reporting_only"
                                       name="qt_claim_<?php echo $claim['clh_no'];?>_reporting_only" 
                                       value="<?php echo $claim['clh_reporting_only'];?>" placeholder="Reporting Only">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="qt_claim_<?php echo $claim['clh_no'];?>_private_sattlement">Private Settlement</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="qt_claim_<?php echo $claim['clh_no'];?>_private_sattlement" 
                                       name="qt_claim_<?php echo $claim['clh_no'];?>_private_sattlement" 
                                       value="<?php echo $claim['clh_private_statement'];?>" placeholder="Private Settlement">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_claim_<?php echo $claim['clh_no'];?>_referred">Referred to Partner Workshop</label>
                            <div class="col-md-9">
                                <select id="qt_claim_<?php echo $claim['clh_no'];?>_referred" class="form-control">
                                    <option <?php echo $claim['clh_ref_to_partner']=='Yes'?'SELECTED':''; ?> value="Yes">Yes</option>
                                    <option <?php echo $claim['clh_ref_to_partner']=='No'?'SELECTED':''; ?> value="No">No</option>
                                </select>                                
                            </div>
                        </div>
                    </div>
                </form>
                 <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-10"></div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-primary btn-save-claim pull-right"
                                    value="<?php echo $claim['clh_no'];?>"><i class="icon-save"></i> Save</button>                            
                        </div>
                    </div>
            </section>
        </section>
            <?php
            array_push($maxchn,$claim['clh_no']);
            //$h++;
        endforeach;        
        ?>        
        <input id="total_claim_history" type="hidden" value="<?php echo max($maxchn);?>">        
        <?php        
        }//isset
        else{ 
            //DEFAULT CLAIM HISTORY
            ?>
        <input id="total_claim_history" type="hidden" value="1">        
            <section class="panel" id="qt_claim_history_1">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">                        
                    <li>
                        <a href="#" class="panel-toggle text-muted">
                            <i class="icon-caret-down text-active"></i>
                            <i class="icon-caret-up text"></i>
                        </a>
                    </li>
                </ul>Claim History (1)</header>
            <section class="panel-body">
                <form class="form-horizontal" method="get">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_claim_1_driver_name">Driver Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="qt_claim_1_driver_name" maxlength="50"
                                       name="qt_claim_1_driver_name" required placeholder="Driver Name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_claim_1_vehicle_no">Vehicle No.</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="qt_claim_1_vehicle_no"
                                       name="qt_claim_1_vehicle_no" required placeholder="Vehicle No.">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_claim_1_accident_date">Accident Date</label>
                            <div class="col-md-9">
                                <input class="input-sm datepicker-input form-control" id="qt_claim_1_accident_date" 
                                   size="16" type="text" name="qt_claim_1_accident_date" maxlength="12" 
                                   parsley-maxlength="12" parsley-trigger="focusout" 
                                   data-date-format="dd-mm-yyyy" placeholder="Accident Date">   
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_claim_1_reporting_date">Reporting Date</label>
                            <div class="col-md-9">
                                <input class="input-sm datepicker-input form-control" id="qt_claim_1_reporting_date" 
                                   size="16" type="text" name="qt_claim_1_reporting_date" maxlength="12" 
                                   parsley-maxlength="12" parsley-trigger="focusout" 
                                   data-date-format="dd-mm-yyyy" placeholder="Reporting Date">  
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="qt_claim_1_claims_paid_od">Claims Paid (OD)</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" id="qt_claim_1_claims_paid_od" 
                                       name="qt_claim_1_claims_paid_od" placeholder="Claims Paid (OD)">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="qt_claim_1_claims_paid_tppd">Claims Paid (TPPD)</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" id="qt_claim_1_claims_paid_tppd"
                                       name="qt_claim_1_claims_paid_tppd" placeholder="Claims Paid (TPPD)">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="qt_claim_1_claims_paid_tpbi">Claims Paid (TPBI)</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" id="qt_claim_1_claims_paid_tpbi"
                                       name="qt_claim_1_claims_paid_tpbi" placeholder="Claims Paid (TPBI)">
                            </div>
                        </div>
                    </div>	
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="qt_claim_1_claims_reserved_tppd">Claims Reserved (TPPD)</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" id="qt_claim_1_claims_reserved_tppd"
                                       name="qt_claim_1_claims_reserved_tppd" placeholder="Claims Reserved (TPPD)">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="qt_claim_1_claims_reserved_tpbi">Claims Reserved (TPBI)</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" id="qt_claim_1_claims_reserved_tpbi"
                                       name="qt_claim_1_claims_reserved_tpbi" placeholder="Claims Reserved (TPBI)">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="qt_claim_1_windscreen">Windscreen</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="qt_claim_1_windscreen"
                                       name="qt_claim_1_windscreen" placeholder="Windscreen">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="qt_claim_1_reporting_only">Reporting Only</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="qt_claim_1_reporting_only"
                                       name="qt_claim_1_reporting_only" placeholder="Reporting Only">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="qt_claim_1_private_sattlement">Private Settlement</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="qt_claim_1_private_sattlement" 
                                       name="qt_claim_1_private_sattlement" placeholder="Private Settlement">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_claim_1_referred">Referred to Partner Workshop</label>
                            <div class="col-md-9">
                                <select id="qt_claim_1_referred" class="form-control">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>                                
                            </div>
                        </div>
                    </div>
                </form>
                 <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-10"></div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-primary btn-save-claim pull-right"
                                    value="1"><i class="icon-save"></i> Save</button>                            
                        </div>
                    </div>
            </section>
        </section>
            <?php
        }
        ?>
        <div id="claim_history_wrap">            
        </div><!--claim history wrap-->      
        <div class="row">
            <div class="col-sm-12 text-right">
                <a href="#" class="add_claim_history btn btn-info m-b" title="Add New Claim History">
                    <i class="icon-plus"> Add New Claim History</i>
                </a>
          </div>
        </div>
        </div><!--claim area-->
        <!-- Named Driver 1 & 2 -->

        <section class="panel" id="qt_driver_1">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="add_named_driver text-muted" title="Add New Named Driver">
                            <i class="icon-plus"></i>
                        </a>
                    </li>                    
                    <li>
                        <a href="#" class="panel-toggle text-muted">
                            <i class="icon-caret-down text-active"></i>
                            <i class="icon-caret-up text"></i>
                        </a>
                    </li>
                </ul>Named Driver (1)</header>
            <section class="panel-body">
                
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_driver_1_name">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="qt_driver_1_name" required
                                       name="qt_driver_1_name" placeholder="Name" maxlength="50">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_driver_1_nric">NRIC/FIN</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="qt_driver_1_nric" required
                                       name="qt_driver_1_nric" placeholder="NRIC/FIN" maxlength="50">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_driver_1_relationship">Relationship</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="qt_driver_1_relationship"  required
                                       name="qt_driver_1_relationship" placeholder="Relationship" maxlength="50">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_driver_1_dob">Date of Birth</label>
                            <div class="col-md-6">
                                <input class="input-sm datepicker-input form-control" id="qt_driver_1_dob" 
                                   size="16" type="text" name="qt_driver_1_dob" maxlength="12" required
                                   parsley-maxlength="12" parsley-trigger="focusout" 
                                   data-date-format="dd-mm-yyyy" placeholder="Date of Birth">   
                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Age</label>
                            <div class="col-md-6">
                                <label class="col-sm-3 control-label"><span id="qt_driver_1_age">[Equation]</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_driver_1_gender">Gender</label>
                            <div class="col-md-6">
                                <select name="qt_driver_1_gender" id="qt_driver_1_gender" class="form-control m-b">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_driver_1_marital_status">Marital Status</label>
                            <div class="col-md-6">
                                <select name="qt_driver_1_marital_status" id="qt_driver_1_marital_status" class="form-control m-b">
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                </select>
                            </div>
                        </div>
                    </div>  
                    <div class="line line-dashed line-lg pull-in"></div>				  
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_driver_1_occupation">Occupation</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="qt_driver_1_occupation" 
                                       placeholder="Occupation" maxlength="50"  required>
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_driver_1_license_date">Driving License Pass Date</label>
                            <div class="col-md-6">
                                <input class="input-sm datepicker-input form-control" id="qt_driver_1_license_date" 
                                   size="16" type="text" name="qt_driver_1_license_date" maxlength="12" 
                                   parsley-maxlength="12" parsley-trigger="focusout"  required
                                   data-date-format="dd-mm-yyyy" placeholder="Driving License Pass Date">                                   
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Driving Experience</label>
                            <div class="col-md-6">
                                <label class="control-label"><span id="qt_driver_1_experience">[CALCULATED]</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="col-sm-3 control-label">Claim History (3 Years)</label>
                            <div class="col-sm-7">
                                <input type="hidden" id="qt_driver_1_history" name="qt_driver_1_history">
                                <div id="qt_driver_1_history_wrap" class="form-control" style="overflow:scroll;height:150px;max-height:150px" contenteditable="true">Multiline Text</div>
                            </div>
                        </div>
                    </div>                
            </section>
        </section>
        <div id="named_driver_wrap">            
        </div>
        <!-- Quotation (Private and Commercial) -->
        <!-- Private -->
        <section class="panel" id="qt_quot_pvt">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">
                            <i class="icon-caret-down text-active"></i>
                            <i class="icon-caret-up text"></i>
                        </a>
                    </li>
                </ul>Quotation (<span id="qt_quot"><?php echo $qt_insurance_type;?></span>)
            </header>
            <section class="panel-body">
                <div class="form-group">
                    <div class="col-sm-12">
                        <table class="table table-condensed table-bordered table-striped table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th>Insurer</th>
                                    <th>Workshop</th>
                                    <th>Premium</th>
                                    <th>Excess</th>
                                    <th>Remark</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="quotation_list">
                                <?php
                                $max_ql_sn=array(1);
                                if(isset($_quot_list)){ 
                                    foreach ($_quot_list as $item): ?>
                                        <tr id="ql_<?php echo $item['ql_sn'];?>">
                                        <td>
                                              <select id="qt_quot_insurer_<?php echo $item['ql_sn'];?>" name="qt_quot_insurer_<?php echo $item['ql_sn'];?>" class="form-control">                                
                                                <option selected disabled>Select an Insurer</option>   
                                                <?php
                                                if(isset($qt_insurance_type)){ 
                                                    //isset                                                
                                                    if($qt_insurance_type=='Private'){ ?>

                                                        <option <?php echo $item['ql_insurer']=='AIG (All Age)'?'SELECTED':'';?> value="AIG (All Age)">AIG (All Age)</option>
                                                        <option <?php echo $item['ql_insurer']=='AIG (All Age NCD P)'?'SELECTED':'';?>  value="AIG (All Age NCD P)">AIG (All Age NCD P)</option>
                                                        <option <?php echo $item['ql_insurer']=='AIG (Restricted Age)'?'SELECTED':'';?>  value="AIG (Restricted Age)">AIG (Restricted Age)</option>
                                                        <option <?php echo $item['ql_insurer']=='AIG (Restricted NCD P)'?'SELECTED':'';?>  value="AIG (Restricted NCD P)">AIG (Restricted NCD P)</option>
                                                        <option <?php echo $item['ql_insurer']=='AXA'?'SELECTED':'';?>  value="AXA">AXA</option>
                                                        <option <?php echo $item['ql_insurer']=='AXA (NCD P)'?'SELECTED':'';?>  value="AXA (NCD P)">AXA (NCD P)</option>
                                                        <option <?php echo $item['ql_insurer']=='China Taiping'?'SELECTED':'';?>  value="China Taiping">China Taiping</option>
                                                        <option <?php echo $item['ql_insurer']=='Liberty'?'SELECTED':'';?>  value="Liberty">Liberty</option>
                                                        <option <?php echo $item['ql_insurer']=='Liberty (NCD P)'?'SELECTED':'';?>  value="Liberty (NCD P)">Liberty (NCD P)</option>
                                                        <option <?php echo $item['ql_insurer']=='MSIG'?'SELECTED':'';?>  value="MSIG">MSIG</option>
                                                        <option <?php echo $item['ql_insurer']=='MSIG (NCD P)'?'SELECTED':'';?>  value="MSIG (NCD P)">MSIG (NCD P)</option>
                                                        <option <?php echo $item['ql_insurer']=='NTUC'?'SELECTED':'';?>  value="NTUC">NTUC</option>
                                                        <option <?php echo $item['ql_insurer']=='NTUC (NCD P)'?'SELECTED':'';?>  value="NTUC (NCD P)">NTUC (NCD P)</option>
                                                        <?php                                        
                                                    }elseif($qt_insurance_type=='Commercial'){?>                                                    
                                                        <option <?php echo $item['ql_insurer']=='AIG'?'SELECTED':'';?> value="AIG">AIG</option>
                                                        <option <?php echo $item['ql_insurer']=='AXA'?'SELECTED':'';?> value="AXA">AXA</option>
                                                        <option <?php echo $item['ql_insurer']=='China Taiping'?'SELECTED':'';?> value="China Taiping">China Taiping</option>
                                                        <option <?php echo $item['ql_insurer']=='MSIG'?'SELECTED':'';?> value="MSIG">MSIG</option>
                                                        <option <?php echo $item['ql_insurer']=='NTUC'?'SELECTED':'';?> value="NTUC">NTUC</option>
                                                        <?php 
                                                    }
                                                }//end if
                                                ?>
                                            </select>
                                        </td>
                                        <td>  <select id="qt_quot_workshop_<?php echo $item['ql_sn'];?>" name="qt_quot_workshop_<?php echo $item['ql_sn'];?>"
                                                    class="form-control">
                                                <option selected disabled>Select a Workshop</option>
                                                <option  <?php echo $item['ql_workshop']=='Any'?'SELECTED':'';?> value="Any">Any</option>
                                                <option  <?php echo $item['ql_workshop']=='Authorised'?'SELECTED':'';?> value="Authorised">Authorised</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" id="qt_quot_premium_<?php echo $item['ql_sn'];?>" name="qt_quot_premium_<?php echo $item['ql_sn'];?>" class="form-control m-b"
                                       value="<?php echo $item['ql_premium'];?>" required>
                                        </td>
                                        <td>
                                            <input type="number" id="qt_quot_excess_<?php echo $item['ql_sn'];?>" name="qt_quot_excess_<?php echo $item['ql_sn'];?>" class="form-control m-b"
                                       value="<?php echo $item['ql_excess'];?>" required>
                                        </td>
                                        <td>
                                            <input type="text" id="qt_quot_remark_<?php echo $item['ql_sn'];?>" name="qt_quot_remark_<?php echo $item['ql_sn'];?>" class="form-control m-b"
                                       value="<?php echo $item['ql_remark'];;?>" required>
                                        </td>
                                        <td class="action">
                                            <button id="ql_save_<?php echo $item['ql_sn'];?>" class="btn btn-link btn-primary btn-sm ql_save" title="Save" value="<?php echo $item['ql_sn'];?>"><i class="icon-save"></i> </button>
                                            <button id="ql_remove_<?php echo $item['ql_sn'];?>" class="btn btn-link btn-danger btn-sm ql_remove" value="<?php echo $item['ql_sn'];?>" title="Remove"><i class="icon-trash"></i></button>
                                        </td>
                                    </tr>
                                        
                                        <?php                                        
                                        array_push($max_ql_sn,$item['ql_sn']);
                                    endforeach;
                                }//end if
                                else{ /* ?>
                               
                                <tr id="ql_1">
                                    <td>
                                          <select id="qt_quot_insurer_1" name="qt_quot_insurer_1" class="form-control">                                
                                            <option selected disabled>Select an Insurer</option>   
                                            <?php
                                            if(isset($qt_insurance_type)){ 
                                                //isset                                                
                                                if($qt_insurance_type=='Private'){ ?>
                                                    
                                                    <option <?php echo $_quot_insurer=='AIG (All Age)'?'SELECTED':'';?> value="AIG (All Age)">AIG (All Age)</option>
                                                    <option <?php echo $_quot_insurer=='AIG (All Age NCD P)'?'SELECTED':'';?>  value="AIG (All Age NCD P)">AIG (All Age NCD P)</option>
                                                    <option <?php echo $_quot_insurer=='AIG (Restricted Age)'?'SELECTED':'';?>  value="AIG (Restricted Age)">AIG (Restricted Age)</option>
                                                    <option <?php echo $_quot_insurer=='AIG (Restricted NCD P)'?'SELECTED':'';?>  value="AIG (Restricted NCD P)">AIG (Restricted NCD P)</option>
                                                    <option <?php echo $_quot_insurer=='AXA'?'SELECTED':'';?>  value="AXA">AXA</option>
                                                    <option <?php echo $_quot_insurer=='AXA (NCD P)'?'SELECTED':'';?>  value="AXA (NCD P)">AXA (NCD P)</option>
                                                    <option <?php echo $_quot_insurer=='China Taiping'?'SELECTED':'';?>  value="China Taiping">China Taiping</option>
                                                    <option <?php echo $_quot_insurer=='Liberty'?'SELECTED':'';?>  value="Liberty">Liberty</option>
                                                    <option <?php echo $_quot_insurer=='Liberty (NCD P)'?'SELECTED':'';?>  value="Liberty (NCD P)">Liberty (NCD P)</option>
                                                    <option <?php echo $_quot_insurer=='MSIG'?'SELECTED':'';?>  value="MSIG">MSIG</option>
                                                    <option <?php echo $_quot_insurer=='MSIG (NCD P)'?'SELECTED':'';?>  value="MSIG (NCD P)">MSIG (NCD P)</option>
                                                    <option <?php echo $_quot_insurer=='NTUC'?'SELECTED':'';?>  value="NTUC">NTUC</option>
                                                    <option <?php echo $_quot_insurer=='NTUC (NCD P)'?'SELECTED':'';?>  value="NTUC (NCD P)">NTUC (NCD P)</option>
                                                    <?php                                        
                                                }elseif($qt_insurance_type=='Commercial'){?>                                                    
                                                    <option <?php echo $_quot_insurer=='AIG'?'SELECTED':'';?> value="AIG">AIG</option>
                                                    <option <?php echo $_quot_insurer=='AXA'?'SELECTED':'';?> value="AXA">AXA</option>
                                                    <option <?php echo $_quot_insurer=='China Taiping'?'SELECTED':'';?> value="China Taiping">China Taiping</option>
                                                    <option <?php echo $_quot_insurer=='MSIG'?'SELECTED':'';?> value="MSIG">MSIG</option>
                                                    <option <?php echo $_quot_insurer=='NTUC'?'SELECTED':'';?> value="NTUC">NTUC</option>
                                                    <?php 
                                                }
                                            }//end if
                                            ?>
                                        </select>
                                    </td>
                                    <td>  <select id="qt_quot_workshop_1" name="qt_quot_workshop_1"
                                                class="form-control">
                                            <option selected disabled>Select a Workshop</option>
                                            <option  <?php echo $_quot_workshop=='Any'?'SELECTED':'';?> value="Any">Any</option>
                                            <option  <?php echo $_quot_workshop=='Authorised'?'SELECTED':'';?> value="Authorised">Authorised</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" id="qt_quot_premium_1" name="qt_quot_premium_1" class="form-control m-b"
                                   value="<?php echo $_quot_premium;?>" required>
                                    </td>
                                    <td>
                                        <input type="number" id="qt_quot_excess_1" name="qt_quot_excess_1" class="form-control m-b"
                                   value="<?php echo $_quot_excess;?>" required>
                                    </td>
                                    <td>
                                        <input type="text" id="qt_quot_remark_1" name="qt_quot_remark_1" class="form-control m-b"
                                   value="<?php echo '';?>" required>
                                    </td>
                                    <td class="action">
                                        <button id="ql_save_1" class="btn btn-link btn-info btn-sm ql_save" title="Save" value="1"><i class="icon-save"></i> </button>
                                        <button id="ql_remove_1" class="btn btn-link btn-danger btn-sm ql_save" value="1" title="Remove"><i class="icon-trash"></i></button>
                                    </td>
                                </tr>
                                <?php
                                */
                                }//end else
                                ?>
                            </tbody>
                            <input type="hidden" id="total_ql" value="<?php echo max($max_ql_sn);?>">
                            <tfoot>
                                <td colspan="5"></td>
                                <td><button id="ql_add" class="btn btn-sm btn-info"><i class="icon-plus"></i> Add New</button></td>
                            </tfoot>
                        </table>
                    </div>
                </div>
                
            </section>
        </section>      
        <!-- Selected Insurance Detail -->
        <section class="panel" id="qt_selected_insurance_details">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">
                            <i class="icon-caret-down text-active"></i>
                            <i class="icon-caret-up text"></i>
                        </a>
                    </li>
                </ul>Selected Insurance</header>
            <section class="panel-body">
                <form class="form-horizontal" method="get">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_sid_company">Company</label>
                            <div class="col-md-6">
                                <select id="qt_sid_company" name="qt_sid_company" class="form-control m-b">
                                    <optgroup>
                                    <option <?php echo $_si_company=='AIG'?'SELECTED':'';?> >AIG</option>
                                    <option <?php echo $_si_company=='AXA'?'SELECTED':'';?> >AXA</option>
                                    <option <?php echo $_si_company=='China Taiping'?'SELECTED':'';?> >China Taiping</option>
                                    <option <?php echo $_si_company=='Liberty'?'SELECTED':'';?> >Liberty</option>
                                    <option <?php echo $_si_company=='MSIG'?'SELECTED':'';?> >MSIG</option>
                                    <option <?php echo $_si_company=='NTUC Income'?'SELECTED':'';?> >NTUC Income</option>
                                    </optgroup>
                                    <optgroup label="———">                                                                                                                
                                    <option <?php echo $_si_company=='ACE'?'SELECTED':'';?> >ACE</option>
                                    <option <?php echo $_si_company=='Aetna'?'SELECTED':'';?> >Aetna</option>
                                    <option <?php echo $_si_company=='Allianz Global'?'SELECTED':'';?> >Allianz Global</option>
                                    <option <?php echo $_si_company=='Allied World Assurance'?'SELECTED':'';?> >Allied World Assurance</option>
                                    <option <?php echo $_si_company=='Aviva'?'SELECTED':'';?> >Aviva</option>
                                    <option <?php echo $_si_company=='Cigna Europe'?'SELECTED':'';?> >Cigna Europe</option>
                                    <option <?php echo $_si_company=='Direct Asia'?'SELECTED':'';?> >Direct Asia</option>
                                    <option <?php echo $_si_company=='ECICS'?'SELECTED':'';?> >ECICS</option>
                                    <option <?php echo $_si_company=='EQ'?'SELECTED':'';?> >EQ</option>
                                    <option <?php echo $_si_company=='Etiqa'?'SELECTED':'';?> >Etiqa</option>
                                    <option <?php echo $_si_company=='Federal'?'SELECTED':'';?> >Federal</option>
                                    <option <?php echo $_si_company=='First Capital'?'SELECTED':'';?> >First Capital</option>
                                    <option <?php echo $_si_company=='HDI-Gerling Industrie Versicherung'?'SELECTED':'';?> >HDI-Gerling Industrie Versicherung</option>
                                    <option <?php echo $_si_company=='HL Assurance'?'SELECTED':'';?> >HL Assurance</option>
                                    <option <?php echo $_si_company=='India International'?'SELECTED':'';?> >India International</option>
                                    <option <?php echo $_si_company=='InterGlobal'?'SELECTED':'';?> >InterGlobal</option>
                                    <option <?php echo $_si_company=='Liberty'?'SELECTED':'';?> >Liberty</option>
                                    <option <?php echo $_si_company=='Lloyds of London'?'SELECTED':'';?> >Lloyds of London</option>
                                    <option <?php echo $_si_company=='Lonpac'?'SELECTED':'';?> >Lonpac</option>
                                    <option <?php echo $_si_company=='Nipponkoa'?'SELECTED':'';?> >Nipponkoa</option>
                                    <option <?php echo $_si_company=='Overseas Assurance'?'SELECTED':'';?> >Overseas Assurance</option>
                                    <option <?php echo $_si_company=='QBE'?'SELECTED':'';?> >QBE</option>
                                    <option <?php echo $_si_company=='Raffle Health'?'SELECTED':'';?> >Raffle Health</option>
                                    <option <?php echo $_si_company=='Royah & Sun Alliance'?'SELECTED':'';?> >Royah & Sun Alliance</option>
                                    <option <?php echo $_si_company=='Singapore Aviation<'?'SELECTED':'';?> >Singapore Aviation</option>
                                    <option <?php echo $_si_company=='SHC'?'SELECTED':'';?> >SHC</option>
                                    <option <?php echo $_si_company=='Starr International'?'SELECTED':'';?> >Starr International</option>
                                    <option <?php echo $_si_company=='Tenet Sompo'?'SELECTED':'';?> >Tenet Sompo</option>
                                    <option <?php echo $_si_company=='Tokio Marine'?'SELECTED':'';?> >Tokio Marine</option>
                                    <option <?php echo $_si_company=='United Overseas'?'SELECTED':'';?> >United Overseas</option>
                                    <option <?php echo $_si_company=='XL'?'SELECTED':'';?> >XL</option>
                                    <option <?php echo $_si_company=='Zurich'?'SELECTED':'';?> >Zurich</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_sid_coverage_type">Type of Coverage</label>
                            <div class="col-md-6">
                                <select name="qt_sid_coverage_type" id="qt_sid_coverage_type" class="form-control m-b">
                                    <option <?php echo $_si_coverage=='Comprehensive'?'SELECTED':'';?> >Comprehensive</option>
                                    <option <?php echo $_si_coverage=='TPFT'?'SELECTED':'';?> >TPFT</option>
                                    <option <?php echo $_si_coverage=='TPO'?'SELECTED':'';?> >TPO</option>						
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_sid_premium">Premium</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" id="qt_sid_premium"
                                       value="<?php echo $_si_premium;?>"
                                       name="qt_sid_premium" placeholder="Premium">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_sid_excess">Excess</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" id="qt_sid_excess"
                                       value="<?php echo $_si_excess;?>"
                                       name="qt_sid_excess" placeholder="Excess">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_sid_finance_company">Finance Company</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="qt_sid_finance_company" 
                                       value="<?php echo $_si_finance_company;?>"
                                       name="qt_sid_finance_company" placeholder="Finance Company">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_sid_policy_no">Policy No</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="qt_sid_policy_no" maxlength="50"
                                       value="<?php echo $_si_policy_no;?>"
                                       name="qt_sid_policy_no" placeholder="Policy No">
                            </div>
                        </div>                        
                    </div>  
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_sid_ncd">NCD</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" id="qt_sid_ncd"
                                       value="<?php echo $_si_ncd;?>"
                                       name="qt_sid_ncd" placeholder="NCD">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_sid_ncd_on_renewal">NCD % on Renewal</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="qt_sid_ncd_on_renewal"
                                       value="<?php echo $_si_ncd_per_on_renewal;?>"
                                       name="qt_sid_ncd_on_renewal" placeholder="NCD % on Renewal">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_sid_ssd_yes">SDD</label>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label><input type="radio" name="qt_sid_ssd" id="qt_sid_ssd" value="Yes" 
                                                      <?php echo $_si_ssd=='1'?'CHECKED':'';?>>Yes</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label><input type="radio" name="qt_sid_ssd" id="qt_sid_ssd_no" value="No" 
                                                      <?php echo $_si_ssd=='0'?'CHECKED':'';?>>No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_sid_sdd_date_check">SDD Date Check</label>
                            <div class="col-md-6">
                                <input class="input-sm datepicker-input form-control" id="qt_sid_sdd_date_check" 
                                       value="<?php echo $_si_ssd_date_check;?>"
                                   size="16" type="text" name="qt_sid_sdd_date_check" maxlength="12" 
                                   parsley-maxlength="12" parsley-trigger="focusout" 
                                   data-date-format="dd-mm-yyyy" placeholder="SDD Date Check">   
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_sid_start_date">Start Date</label>
                            <div class="col-md-6">
                                 <input class="input-sm datepicker-input form-control" id="qt_sid_start_date" 
                                        value="<?php echo $_si_start_date;?>"
                                   size="16" type="text" name="qt_sid_start_date" maxlength="12" 
                                   parsley-maxlength="12" parsley-trigger="focusout" 
                                   data-date-format="dd-mm-yyyy" placeholder="Start Date"> 
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_sid_end_date">End Date</label>
                            <div class="col-md-6">
                                   <input class="input-sm datepicker-input form-control" id="qt_sid_end_date" 
                                   value="<?php echo $_si_end_date;?>"
                                   size="16" type="text" name="qt_sid_end_date" maxlength="12" 
                                   parsley-maxlength="12" parsley-trigger="focusout" 
                                   data-date-format="dd-mm-yyyy" placeholder="End Date"> 
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>				  
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_sid_road_tax_due">Road Tax Due</label>
                            <div class="col-md-6">
                                 <input class="input-sm datepicker-input form-control" id="qt_sid_road_tax_due" 
                                  value="<?php echo $_si_road_tax_due;?>"
                                   size="16" type="text" name="qt_sid_road_tax_due" maxlength="12" 
                                   parsley-maxlength="12" parsley-trigger="focusout" 
                                   data-date-format="dd-mm-yyyy" placeholder="Road Tax Due"> 
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_sid_ncd_protection">NCD Protection</label>
                            <div class="col-md-6">
                                <select name="qt_sid_ncd_protection" id="qt_sid_ncd_protection" class="form-control m-b">
                                    <option <?php echo $_si_ncd_protection=='Yes'?'SELECTED':'';?> >Yes</option>
                                    <option <?php echo $_si_ncd_protection=='No'?'SELECTED':'';?> >No</option>
                                </select>
                            </div>
                        </div>
                        <div class="line line-dashed line-lg pull-in"></div>                       
                    </div>	
                     <div class="form-group">
                            <div class="col-sm-9"></div>
                            <div class="col-sm-3">                                
                                <!-- selected insurance -->
                                <button type="button" id="btn_cp_selected_insurance"
                                        class="btn btn-primary btn-save pull-right">
                                    <i class="icon-save"></i> Save</button>                                
                            </div>
                        </div>
                </form>
            </section>
        </section>
        
        <?php         
        /**
         * Access Code: assign_commission
         */
        if(in_array('assign_commission', $this->session->userdata('user_access'))){
            /**
            * IF (Status==closed){
            * => SHOW Account Assessment Panel here (panel_account_assessment.php)
            * END IF
            */        
            //echo 'state: '.$_qt_state;
            if(isset($_qt_state)){
                if($_qt_state=='Closed' || $_qt_state=='Won'){
                   // echo 'set com: '.$_aa_commission;
                    //$this->load->view('quotation/panel_account_assessment');                
                    ?>
                <!-- Account Assessment -->
                <section class="panel" id="qt_account_assessment">
                    <header class="panel-heading font-bold">
                        <ul class="nav nav-pills pull-right">
                            <li>
                                <a href="#" class="panel-toggle text-muted">
                                    <i class="icon-caret-down text-active"></i>
                                    <i class="icon-caret-up text"></i>
                                </a>
                            </li>
                        </ul>Account Assessment</header>
                    <section class="panel-body">
                        <form class="form-horizontal" method="get">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label class="col-sm-3 control-label" for="qt_aa_commission">Commission</label>
                                    <div class="col-md-6">

                                        <select name="qt_aa_commission" id="qt_aa_commission" class="form-control m-b">
                                            <?php
                                            foreach($_commissions as $row): ?>
                                            <option value="<?php echo $row['com_sn'];?>"
                                                <?php echo $_aa_commission==$row['com_sn']?'SELECTED':'';?>>
                                                <?php echo $row['com_name'];?> (<?php echo $row['com_coy_rate'];?>%)</option>
                                                <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="line line-dashed line-lg pull-in"></div>
                        </form>
                    </section>
                </section>                        
                        
                        <?php
                    
                }//end if closed or won
            }//END IF
            
        }//end if
        
        ?>
        
        <!-- Submit & Cancel Buttons -->
        <div class="col-sm-6">

            <div class="col-sm-3"></div>
            <div class="col-md-6">                               
                <div class="col-sm-4 m-b-xs" style="padding-left:0px;">                    
                    <button type="button" id="full_save" class="btn btn-primary"><i class="icon-save"></i> Save</button>
                </div> 
                <div class="col-sm-1 m-b-xs" style="padding-left:0px;">
                    <a href="#" class="btn btn-white"> Cancel</a>
                </div>
            </div>
        </div>
    </section>
</section>
<!-- Modal -->
<div class="modal fade" id="remove_ql_item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Remove Quotation Item</h4>
      </div>
      <div class="modal-body">
          <p>Are you sure to remove <strong><span id="remove_item_name"></span></strong>?</p>
          <input type="hidden" id="remove_ql_sn" value="">
          <input type="hidden" id="remove_qt_ref_no" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="remove_quot_item" class="btn btn-danger"><i class="icon-trash"></i> Remove</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal -->
<div class="modal fade" id="remove_claim_history" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Remove Claim History</h4>
      </div>
      <div class="modal-body">
          <p>Are you sure to delete <strong><span id="remove_ch_name"></span></strong> ?</p>
          <input type="hidden" id="remove_chn_sn" value="">
          <input type="hidden" id="remove_ch_ref_no" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="remove_ch_item" class="btn btn-danger"><i class="icon-trash"></i> Remove</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>require(['page/quotation_add']);</script>