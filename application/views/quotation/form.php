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
           <form class="form-horizontal" method="post">
               
               <input type="hidden" id="_action" name="_action" value="<?php echo $_action;?>">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req">Ref. No.</label>
                            <label class="col-md-6" style="padding-top: 7px;">QT<?php echo $new_qt_ref_no;?></label>
                            <input type="hidden" id="qt_ref_no" name="qt_ref_no" >
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req">Date</label>
                            <label class="col-md-6 " style="padding-top: 7px;"><span id="qt_date"></span></label>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>


                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req">Renewal</label>
                            <input type="hidden" name="qt_renewal" id="qt_renewal" value="no">
                            <label class="col-md-6" style="padding-top: 7px;"><span id="qt_renewal_info">No</span></label>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_details_state">State </label>
                            <div class="col-md-6">
                                <input type="hidden" id="current_status" name="current_status" value="">
                                <select name="qt_details_state" id="qt_details_state" class="form-control m-b" required>
                                    <option>Draft</option>
                                    <option>New</option>
                                    <option>Renewal</option>
                                    <option>Quoted</option>
                                    <option>Sent</option>
                                    <option>Accepted</option>
                                    <option>Lost</option>
                                    <option>Paid</option>
                                    <option>Closed</option>
                                    <?php
                                    /* IF Current user is a super admin or accountant
                                     * => will show the won optioin
                                     */
                                    /**
                                    * Access Code: qt_state_won
                                    */
                                    if(in_array('qt_state_won',$this->session->userdata('user_access'))){?>
                                    <option>Won</option>
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
                                                   value="Private" checked>Private</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="qt_details_insurance_type" id="qt_insurance_type_com" 
                                                   value="Commercial">Commercial</label>
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
                                ?>       
                                <div id="qt_details_status_lost_wrapper" style="display: none;">
                                    <label class="col-sm-3 control-label req" for="qt_details_reason_lost">Reasons Lost</label>
                                    <div class="col-md-6">
                                        <select name="qt_details_reason_lost" id="qt_details_reason_lost" class="form-control m-b">
                                            <option>Car Sold</option>
                                            <option>Car Deregistered</option>
                                            <option>Switched-Out</option>
                                            <option>- Direct Insurer</option>
                                            <option>- Competitive Pricing</option>
                                            <option>- Scheme Price</option>
                                            <option>- Staff Price</option>
                                            <option>- Support Relatives/Friends</option>
                                            <option>Others</option>
                                        </select>
                                    </div>
                                </div><!--end kist wraooer-->
                            </div><!--col-sm-6-->
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label">Quotation History</label>
                            <div id="qt_history_wrapper" style="display: none;">
                                <div class="col-md-9">Created by <span id="created_by">User A</span> on <span id="create_date"></span><br>
                                    <div id="edit_history_wrap"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label">Remarks</label>
                            <div class="col-md-6">
                                <input type="hidden" id="qt_details_remark" name="qt_details_remark" value="">
                                <div id="qt_details_remark_div" class="form-control" style="overflow:scroll;height:150px;max-height:150px"
                                     contenteditable="true"> </div>
                            </div>
                        </div>
                    </div>
                </form>
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
                <form class="form-horizontal" method="get">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_consultant_sn">Consultant</label>
                            <div class="col-md-6">
                                <select name="qt_consultant_sn" id="qt_consultant_sn" class="form-control m-b" required>
                                    <?php 
                                    foreach($consultants as $record): ?>
                                    <option value="<?php echo $record['user_sn'];?>"><?php echo $record['user_name'];?></option>
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
                                    <option value="<?php echo $record['user_sn'];?>"><?php echo $record['user_name'];?></option>
                                        <?php                                        
                                    endforeach;
                                    ?>                                    
                                </select>
                            </div>

                        </div>

                    </div>	  
                </form>
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

                                <select id="qt_customer_sn" name="qt_customer_sn" class="form-control m-b">
                                     <?php 
                                    foreach($customers as $record): ?>
                                    <option value="<?php echo $record['cust_sn'];?>"><?php echo $record['cust_name'];?></option>
                                        <?php                                        
                                    endforeach;
                                    ?>                                      
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="cust_nric">NRIC/FIN/ACRA</label>

                            <div class="col-md-6">

                                <select name="cust_nric" id="cust_nric" class="form-control m-b">
                                    <?php 
                                    foreach($customers as $record): ?>
                                    <option value="<?php echo $record['cust_sn'];?>"><?php echo $record['cust_nric'];?></option>
                                        <?php                                        
                                    endforeach;
                                    ?>
                                </select>
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
                                                   value="Yes" checked="">Yes</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="qt_cust_insured_driving" id="qt_cust_insured_driving_no" 
                                                   value="No" checked="">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Customer Type</label>
                            <div class="col-md-6">
                                <label class="control-label"><span id="cust_type"></span></label>
                            </div>
                        </div>
                    </div>


                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label">Date of Birth</label>

                            <div class="col-md-6">
                                <label class="control-label"><span id="cust_dob"></span></label>
                                <?php /*
                                <input type="text" class="form-control" id="cust_dob" 
                                       name="cust_dob" placeholder="Datepicker"/> */?>

                            </div>

                        </div>

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">Age</label>

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
                                <label class="control-label"><span id="cust_gender"></span></label>
                                <?php /*
                                <select name="cust_gender" id="cust_gender" class="form-control m-b">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                */?>
                            </div>

                        </div>

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="qt_cust_mstatus">Marital Status</label>
                            <div class="col-md-6">                                
                                <select name="qt_cust_mstatus" id="qt_cust_mstatus" class="form-control m-b">
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                </select> 
                            </div>

                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="cust_contact_house">Contact (H)</label>

                            <div class="col-md-6">
                                <label class="control-label"><span id="cust_contact_house"></span></label>
                                <?php /*
                                <input type="text" class="form-control" id="cust_contact_house"
                                       name="cust_contact_house" placeholder="txt" maxlength="50"/>
                                       */?>
                            </div>

                        </div>

                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_contact_office" >Contact (O)</label>
                            <div class="col-md-6">
                                <label class="control-label"><span id="cust_contact_office"></span></label>
                                <?php /*
                                <input type="text" class="form-control" id="cust_contact_office"
                                       name="cust_contact_office"placeholder="txt"  maxlength="50"/> */?>
                            </div>
                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_contact_hp">Contact (hp)</label>
                            <div class="col-md-6">
                                <label class="control-label"><span id="cust_contact_hp"></span></label>
                                <?php /*
                                <input type="text" class="form-control" id="cust_contact_hp"
                                       name="cust_contact_hp" maxlength="50" placeholder="txt"/> */?>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_contact_fax">Fax </label>
                            <div class="col-md-6">
                                <label class="control-label"><span id="cust_contact_fax"></span></label>
                                <?php /*
                                <input type="text" class="form-control" id="cust_contact_hp"
                                       name="cust_contact_hp"maxlength="50" placeholder="txt"/>
                                       */?>
                            </div>
                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">E-mail</label>
                            <div class="col-md-6">
                                <label class="control-label"><span id="cust_contact_email"></span></label>
                                <?php /*
                                <input type="text" class="form-control" id="input-id-1" placeholder="email"/> */?>
                            </div>
                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="cust_address_line1">Address Line 1</label>
                            <div class="col-md-6">
                                <label class="control-label"><span id="cust_address_line1"></span></label>
                                <?php /*
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt"/> */?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label req">Address Line 2</label>

                            <div class="col-md-6">
                            <label class="control-label"><span id="cust_address_line2"></span></label>
                                <?php /*
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt"/> */?>

                            </div>

                        </div>

                    </div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label req">Postal Code</label>

                            <div class="col-md-6">

                                <label class="control-label"><span id="cust_post_code"></span></label>
                                <?php /*
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt"/> */?>

                            </div>

                        </div>

                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="qt_cust_occupation">Occupation / Nature of Business</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="qt_cust_occupation" 
                                       name="qt_cust_occupation" placeholder="Occupation / Nature of Business"/>
                            </div>

                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label  req" for="cust_license_date">Driving License Pass Date</label>
                            <div class="col-md-6">              
                                <input type="hidden" name="qt_cust_license_date" id="qt_cust_license_date" value="">
                                <label class="control-label"><span id="cust_license_date"></span></label>                                
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
                                       id="qt_cust_instructions">
                                <div id="cust_instructions_wrap" class="form-control" style="overflow:scroll;height:150px;max-height:150px"
                                     contenteditable="true"></div>

                            </div>

                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-10"></div>
                        <div class="col-sm-2">                            
                                <!--button check point customer -->
                                <button type="button" id="btn_cp_customer"
                                        class="btn btn-primary btn-save pull-right"><i class="icon-save"></i> customer Save</button>
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
                </ul>Vehicle Information (Private)
            </header>
            <section class="panel-body">
                <form class="form-horizontal" method="get">

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label req" for="qt_vipvt_number">Number</label>

                            <div class="col-md-6">
                                <input type="text" id="qt_vipvt_number" name="qt_vipvt_number" value=""
                                       placeholder="Private Vehicle Number" class="form-control">
                            </div>

                        </div>

                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label req" for="qt_vipvt_make">Make</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" id="qt_vipvt_number" required
                                       name="qt_vipvt_number" placeholder="Make" value="" maxlength="50"/>
                            </div>
                        </div>

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label  req" for="qt_vipvt_model">Model</label>

                            <div class="col-md-6">

                                <input type="text" class="form-control" id="qt_vipvt_model" name="qt_vipvt_model" 
                                       placeholder="Model" value="" required maxlength="50"/>

                            </div>

                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label req" for="qt_vipvt_scheme_type">Scheme Type</label>
                            <div class="col-md-6">
                                <select name="qt_vipvt_scheme_type" id="qt_vipvt_scheme_type" class="form-control m-b" required>
                                    <option>Normal</option>
                                    <option>Off-peak</option>
                                    <option>Company</option>
                                </select>
                            </div>

                        </div>

                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_vipvt_cc">CC</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="qt_vipvt_cc" required maxlength="50"
                                       name="qt_vipvt_cc" placeholder="Number" value=""/>
                            </div>
                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <label class="col-sm-3 control-label req" for="qt_vipvt_year_of_manufacture">Year of Manufacture</label>
                        <div class="col-md-7">
                            <input type="number" class="form-control" id="qt_vipvt_year_of_manufacture" maxlength="4"
                                   name="qt_vipvt_year_of_manufacture" placeholder="Year of Manufacture"/>
                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label req" for="qt_vipvt_regn_date">Regn. Date</label>

                        <div class="col-md-7">
                            <input class="input-sm datepicker-input form-control" id="qt_vipvt_regn_date" 
                                   size="16" type="text" name="qt_vipvt_regn_date" maxlength="12"  required
                                   parsley-maxlength="12" parsley-trigger="focusout" 
                                   data-date-format="dd-mm-yyyy" placeholder="Regn. Date">                            
                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <label class="col-sm-3 control-label req" for="qt_vipvt_road_tax_expire_date">Road Tax Expiry Date</label>
                        <div class="col-md-7">
                            <input class="input-sm datepicker-input form-control" id="qt_vipvt_road_tax_expire_date" 
                                   size="16" type="text" name="qt_vipvt_road_tax_expire_date" maxlength="12" 
                                   parsley-maxlength="12" parsley-trigger="focusout"  required
                                   data-date-format="dd-mm-yyyy" placeholder="Road Tax Expiry Date">   
                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-4">
                            
                            <label class="control-label req">Additional Features</label>
                            <div class="checkbox">
                                <label><input type="checkbox" id="qt_vipvt_feature_sunroof" 
                                              name="qt_vipvt_feature_sunroof" value="">sunroof</label>
                            </div>

                            <div class="checkbox">
                                <label><input type="checkbox" id="qt_vipvt_feature_soft_top"
                                              name="qt_vipvt_feature_soft_top" value="">soft-top</label>
                            </div>

                            <div class="checkbox">
                                <label><input type="checkbox" id="qt_vipvt_feature_turbo_engine" 
                                              name="qt_vipvt_feature_turbo_engine" value="">turbo engine</label>
                            </div>

                            <div class="checkbox">
                                <label><input type="checkbox" id="qt_vipvt_feature_moonroof" 
                                              name="qt_vipvt_feature_moonroof" value="">moonroof</label>
                            </div>								

                            <div class="checkbox">
                                <label><input type="checkbox" id="qt_vipvt_feature_skyroof" 
                                              name="qt_vipvt_feature_skyroof" value="">skyroof</label>
                            </div>								

                            <div class="checkbox">
                                <label><input type="checkbox" id="qt_vipvt_feature_roof_panoramic" 
                                              name="qt_vipvt_feature_roof_panoramic" value="">roof panoramic</label>
                            </div>								

                        </div>

                        <div class="col-sm-4">

                            <label class="control-label  req">Vehicle Type</label>							

                            <div class="checkbox">
                                <label><input type="checkbox" id="qt_vipvt_type_sport_model"
                                              name="qt_vipvt_type_sport_model" value="">sport model</label>
                            </div>

                            <div class="checkbox">
                                <label><input type="checkbox" id="qt_vipvt_type_mpv"
                                              name="qt_vipvt_type_mpv" value="">MPV</label>
                            </div>

                            <div class="checkbox">
                                <label><input type="checkbox" id="qt_vipvt_type_suv"
                                              name="qt_vipvt_type_suv" value="">SUV</label>
                            </div>

                            <div class="checkbox">
                                <label><input type="checkbox" id="qt_vipvt_type_sedan" 
                                              name="qt_vipvt_type_sedan" value="">Sedan</label>
                            </div>								

                            <div class="checkbox">

                                <label><input type="checkbox" id="qt_vipvt_type_coupe" 
                                              name="qt_vipvt_type_coupe "value="">Coupe</label>
                            </div>

                            <div class="checkbox">
                                <label><input type="checkbox" id="qt_vipvt_type_cabriolet"
                                              name="qt_vipvt_type_cabriolet" value="">Cabriolet</label>
                            </div>

                            <div class="checkbox">
                                <label><input type="checkbox" id="qt_vipvt_type_parallel_import"
                                              name="qt_vipvt_type_parallel_import" value="">Parallel Import</label>
                            </div>								

                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <label class="col-sm-3 control-label">Additional Accesories/Coverage</label>
                        <div class="col-sm-7">
                            <input type="hidden" id="qt_vipvt_additional_accessories" name="qt_vipvt_additional_accessories" 
                                   value="">
                            <div id="qt_vipvt_additional_accessories_wrap" class="form-control" style="overflow:scroll;height:150px;max-height:150px"
                                 contenteditable="true"></div>
                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-10"></div>
                        <div class="col-sm-2">
                             <!--button check point vehicle info pvt  -->
                                <button type="button" id="btn_cp_vechicle_info_pvt"
                                        class="btn btn-primary btn-save pull-right"><i class="icon-save"></i> Save</button>
                            <!--<div class="col-sm-3 m-b-xs" style="padding-left:0px;"></div>-->
                        </div>
                    </div>
                </form>
            </section>
        </section>
        
        <!-- Commercial -->
        <section class="panel" id="panel_vehicle_info_com">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">

                            <i class="icon-caret-down text-active"></i>

                            <i class="icon-caret-up text"></i>

                        </a>
                    </li>
                </ul>Vehicle Information (Commercial)
            </header>
            <section class="panel-body">
                <form class="form-horizontal" method="get">

                    <div class="form-group">

                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_vicom_number">Number</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="qt_vicom_number" name="qt_vicom_number" 
                                       required placeholder="Vehicle Number">
                            </div>
                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_vicom_make">Make</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="qt_vicom_make"
                                       name="qt_vicom_make" placeholder="Make" required/>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_vicom_model">Model</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="qt_vicom_model" 
                                       name="qt_vicom_model" placeholder="Model" required/>
                            </div>
                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_vicom_type">Type</label>
                            <div class="col-md-6">
                                <select name="qt_vicom_type" id="qt_vicom_type" class="form-control m-b" required>
                                    <option>Hood/Canopy</option>
                                    <option>Std Lorry</option>
                                    <option>Std Van</option>
                                    <option>Refrigerated Van</option>
                                    <option>Crane/Tailgate</option>
                                    <option>Garbage Truck</option>
                                    <option>Mixer</option>
                                    <option>Prime Mover</option>
                                    <option>Tipper</option>
                                    <option>Tanker</option>
                                    <option>Ambulance</option>
                                    <option>Tow Truck</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_vicom_cc">CC</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="qt_vicom_cc" name="qt_vicom_cc"
                                       placeholder="CC" required/>
                            </div>
                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_vicom_unladen_weight">Unladen Weight</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="qt_vicom_unladen_weight" required
                                       name="qt_vicom_unladen_weight" placeholder="Unladen Weight"/>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_vicom_laden_weight">Laden Weight</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="qt_vicom_laden_weight" required
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

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <label class="col-sm-3 control-label req" for="qt_vicom_year_of_manufacture">Year of Manufacture</label>

                        <div class="col-md-7">

                            <input type="number" class="form-control" id="qt_vicom_year_of_manufacture" maxlength="4"
                                   placeholder="Year of Manufacture" required/>

                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label req" for="qt_vicom_regn_date">Regn. Date</label>
                        <div class="col-md-7">
                             <input class="input-sm datepicker-input form-control" id="qt_vicom_regn_date" 
                                   size="16" type="text" name="qt_vicom_regn_date" maxlength="12" 
                                   parsley-maxlength="12" parsley-trigger="focusout" required
                                   data-date-format="dd-mm-yyyy" placeholder="Regn. Date">
                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label req" for="qt_vicom_road_tax_expire">Road Tax Expiry Date</label>
                        <div class="col-md-7">
                                    <input class="input-sm datepicker-input form-control" id="qt_vicom_road_tax_expire" 
                                   size="16" type="text" name="qt_vicom_road_tax_expire" maxlength="12" required
                                   parsley-maxlength="12" parsley-trigger="focusout" 
                                   data-date-format="dd-mm-yyyy" placeholder="Road Tax Expiry Date">
                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Additional Accesories/Coverage</label>
                        <div class="col-sm-7">
                            <input type="hidden" id="qt_vicom_additional_accessories" name="qt_vicom_additional_accessories">
                            <div id="qt_vicom_additional_accessories_wrap" class="form-control" style="overflow:scroll;height:150px;max-height:150px"
                                 contenteditable="true">multiline text</div>
                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-10"></div>
                        <div class="col-sm-2">
                            <!--button check point vehicle info commercial -->
                            <button type="button" id="btn_cp_vehicle_info_com"
                                    class="btn btn-primary btn-save pull-right">Save</button>
                            <?php /*<div class="col-sm-3 m-b-xs" style="padding-left:0px;">
                                <a href="prospect.html" class="btn btn-primary"> Save</a>
                            </div>*/?>
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
                                    <option>AIG</option>
                                    <option>AXA</option>
                                    <option>China Taiping</option>
                                    <option>Liberty</option>
                                    <option>MSIG</option>
                                    <option>NTUC Income</option>
                                    </optgroup>
                                    <optgroup label="-----------------">                                   
                                    <option>ACE</option>
                                    <option>Aetna</option>
                                    <option>Allianz Global</option>
                                    <option>Allied World Assurance</option>
                                    <option>Aviva</option>
                                    <option>Cigna Europe</option>
                                    <option>Direct Asia</option>
                                    <option>ECICS</option>
                                    <option>EQ</option>
                                    <option>Etiqa</option>
                                    <option>Federal</option>
                                    <option>First Capital</option>
                                    <option>HDI-Gerling Industrie Versicherung</option>
                                    <option>HL Assurance</option>
                                    <option>India International</option>
                                    <option>InterGlobal</option>
                                    <option>Liberty</option>
                                    <option>Lloyds of London</option>
                                    <option>Lonpac</option>
                                    <option>Nipponkoa</option>
                                    <option>Overseas Assurance</option>
                                    <option>QBE</option>
                                    <option>Raffle Health</option>
                                    <option>Royah & Sun Alliance</option>
                                    <option>Singapore Aviation</option>
                                    <option>SHC</option>
                                    <option>Starr International</option>
                                    <option>Tenet Sompo</option>
                                    <option>Tokio Marine</option>
                                    <option>United Overseas</option>
                                    <option>XL</option>
                                    <option>Zurich</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_id_type_of_coverage">Type of Coverage</label>
                            <div class="col-md-6">
                                <select name="qt_id_type_of_coverage" id="qt_id_type_of_coverage" class="form-control m-b"
                                        required>
                                    <option>Comprehensive</option>
                                    <option>TPFT</option>
                                    <option>TPO</option>							
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
                                       name="qt_id_current_premium" placeholder="Current premium">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_id_current_excess">Current Excess</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" id="qt_id_current_premium" required
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
                                       name="qt_id_finance_company" placeholder="Finance Company">
                            </div>
                        </div>
                    </div>  
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_id_current_ncd">Current NCD</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="qt_id_current_ncd"
                                       name="qt_id_current_ncd" placeholder="Current NCD">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_id_ncd_on_renewal">NCD % on Renewal</label>
                            <div class="col-md-6">
                                <select name="qt_id_ncd_on_renewal" name="qt_id_ncd_on_renewal" class="form-control m-b" required>
                                    <option>0</option>
                                    <option>10</option>
                                    <option>20</option>
                                    <option>30</option>
                                    <option>40</option>
                                    <option>50</option>
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
                                                   value="Yes" checked="">Yes</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="qt_id_ncd_on_change" id="qt_id_ncd_on_change_no" 
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
                                        <label><input type="radio" name="qt_id_ssd" id="qt_id_ssd_yes" value="Yes" checked="">Yes</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label><input type="radio" name="qt_id_ssd" id="qt_id_ssd_no" value="No" checked="">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_ssd_date_check">SDD Date Check</label>
                            <div class="col-md-6">
                                <input class="input-sm datepicker-input form-control" id="qt_ssd_date_check" 
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
                                   size="16" type="text" name="qt_ci_start_date" maxlength="12" 
                                   parsley-maxlength="12" parsley-trigger="focusout" 
                                   data-date-format="dd-mm-yyyy" placeholder="Start Date">   
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label  req" for="qt_ci_poi_end_date">POI End Date</label>
                            <div class="col-md-6">
                                <input class="input-sm datepicker-input form-control" id="qt_ci_poi_end_date" type="text"
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
                                   size="16" type="text" name="qt_ci_road_tax_date" maxlength="12" 
                                   parsley-maxlength="12" parsley-trigger="focusout" 
                                   data-date-format="dd-mm-yyyy" placeholder="Road Tax Due">   
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_ci_ncd_protection">NCD Protection</label>
                            <div class="col-md-6">
                                <select name="qt_ci_ncd_protection" id="qt_ci_ncd_protection" class="form-control m-b">
                                    <option>Unknown</option>
                                    <option>Yes</option>
                                    <option>No</option>
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
                                                   value="yes" checked="">Yes</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="qt_ci_claim_in_3_years" id="qt_ci_claim_in_3_years_no" 
                                                   value="no" checked="">No</label>
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
                                    class="btn btn-primary btn-save pull-right">current insurance Save</button>
                            <?php /*<div class="col-sm-3 m-b-xs" style="padding-left:0px;">
                                <a href="prospect.html" class="btn btn-primary"> Save</a>
                            </div> */?>
                        </div>
                    </div>

                </form>
            </section>
        </section>
        
        <!-- Claim History 1 & 2 -->
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
                                <input type="text" class="form-control" id="qt_claim_1_claims_paid_od" 
                                       name="qt_claim_1_claims_paid_od" placeholder="Claims Paid (OD)">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="qt_claim_1_claims_paid_tppd">Claims Paid (TPPD)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="qt_claim_1_claims_paid_tppd"
                                       name="qt_claim_1_claims_paid_tppd" placeholder="Claims Paid (TPPD)">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="qt_claim_1_claims_paid_tpbi">Claims Paid (TPBI)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="qt_claim_1_claims_paid_tpbi"
                                       name="qt_claim_1_claims_paid_tpbi" placeholder="Claims Paid (TPBI)">
                            </div>
                        </div>
                    </div>	
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="qt_claim_1_claims_reserved_tppd">Claims Reserved (TPPD)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="qt_claim_1_claims_reserved_tppd"
                                       name="qt_claim_1_claims_reserved_tppd" placeholder="Claims Reserved (TPPD)">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="qt_claim_1_claims_reserved_tpbi">Claims Reserved (TPBI)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="qt_claim_1_claims_reserved_tpbi"
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
                                <input type="text" class="form-control" id="qt_claim_1_referred"
                                       name="qt_claim_1_referred" placeholder="Referred to Partner Workshop">
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </section>
        <?php /*
         * Claim History 
        <section class="panel">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">
                            <i class="icon-caret-down text-active"></i>
                            <i class="icon-caret-up text"></i>
                        </a>
                    </li>
                </ul>Claim History (2)</header>
            <section class="panel-body">
                <form class="form-horizontal" method="get">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Driver Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Vehicle No.</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Accident Date</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="datepicker">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Reporting Date</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="datepicker">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Claims Paid (OD)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="number">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Claims Paid (TPPD)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="number">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Claims Paid (TPBI)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="number">
                            </div>
                        </div>
                    </div>	
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Claims Reserved (TPPD)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="number">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Claims Reserved (TPBI)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="number">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Windscreen</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Reporting Only</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Private Settlement</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Referred to Partner Workshop</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-10"></div>
                        <div class="col-sm-2">
                            <div class="col-sm-3 m-b-xs" style="padding-left:0px;">
                                <a href="prospect.html" class="btn btn-primary"> Save</a>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </section>
        */?>
        
        <!-- Named Driver 1 & 2 -->

        <section class="panel" id="qt_driver_1">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">
                            <i class="icon-caret-down text-active"></i>
                            <i class="icon-caret-up text"></i>
                        </a>
                    </li>
                </ul>Named Driver (1)</header>
            <section class="panel-body">
                <form class="form-horizontal" method="get">
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
                </form>
            </section>
        </section>
        
        <?php /*
         * Named Driver 2
        <section class="panel">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">
                            <i class="icon-caret-down text-active"></i>
                            <i class="icon-caret-up text"></i>
                        </a>
                    </li>
                </ul>Named Driver (2)</header>
            <section class="panel-body">
                <form class="form-horizontal" method="get">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">NRIC/FIN</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Relationship</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Date of Birth</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="datepicker">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Age</label>
                            <div class="col-md-6">
                                <label class="col-sm-3 control-label" for="input-id-1">[Equation]</label>
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Gender</label>
                            <div class="col-md-6">
                                <select name="account" class="form-control m-b">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Marital Status</label>
                            <div class="col-md-6">
                                <select name="account" class="form-control m-b">
                                    <option>Single</option>
                                    <option>Married</option>
                                </select>
                            </div>
                        </div>
                    </div>  
                    <div class="line line-dashed line-lg pull-in"></div>				  
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Occupation</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Driving License Pass Date</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="datepicker">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Driving Experience</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="Equation">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="col-sm-3 control-label" for="input-id-1">Claim History (3 Years)</label>
                            <div class="col-sm-7">
                                <div id="editor" class="form-control" style="overflow:scroll;height:150px;max-height:150px" contenteditable="true">Multiline Text</div>
                            </div>
                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-10"></div>
                        <div class="col-sm-2">
                            <div class="col-sm-3 m-b-xs" style="padding-left:0px;">
                                <a href="prospect.html" class="btn btn-primary"> Save</a>
                            </div>
                        </div>
                    </div>

                </form>
            </section>
        </section>
        */?>
        
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
                </ul>Quotation (Private)
            </header>
            <section class="panel-body">
                <form class="form-horizontal" method="get">

                </form>
            </section>
        </section>
        <!-- Commercial -->
        <section class="panel" id="qt_quot_com">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">

                            <i class="icon-caret-down text-active"></i>

                            <i class="icon-caret-up text"></i>

                        </a>
                    </li>
                </ul>Quotation (Commercial)
            </header>
            <section class="panel-body">
                <form class="form-horizontal" method="get">

                </form>
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
                                <select name="qt_sid_company" name="qt_sid_company" class="form-control m-b">
                                    <optgroup>
                                    <option>AIG</option>
                                    <option>AXA</option>
                                    <option>China Taiping</option>
                                    <option>Liberty</option>
                                    <option>MSIG</option>
                                    <option>NTUC Income</option>
                                    </optgroup>
                                    <optgroup label="———">                                                                                                                
                                    <option>ACE</option>
                                    <option>Aetna</option>
                                    <option>Allianz Global</option>
                                    <option>Allied World Assurance</option>
                                    <option>Aviva</option>
                                    <option>Cigna Europe</option>
                                    <option>Direct Asia</option>
                                    <option>ECICS</option>
                                    <option>EQ</option>
                                    <option>Etiqa</option>
                                    <option>Federal</option>
                                    <option>First Capital</option>
                                    <option>HDI-Gerling Industrie Versicherung</option>
                                    <option>HL Assurance</option>
                                    <option>India International</option>
                                    <option>InterGlobal</option>
                                    <option>Liberty</option>
                                    <option>Lloyds of London</option>
                                    <option>Lonpac</option>
                                    <option>Nipponkoa</option>
                                    <option>Overseas Assurance</option>
                                    <option>QBE</option>
                                    <option>Raffle Health</option>
                                    <option>Royah & Sun Alliance</option>
                                    <option>Singapore Aviation</option>
                                    <option>SHC</option>
                                    <option>Starr International</option>
                                    <option>Tenet Sompo</option>
                                    <option>Tokio Marine</option>
                                    <option>United Overseas</option>
                                    <option>XL</option>
                                    <option>Zurich</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_sid_coverage_type">Type of Coverage</label>
                            <div class="col-md-6">
                                <select name="qt_sid_coverage_type" name="qt_sid_coverage_type" class="form-control m-b">
                                    <option>Comprehensive</option>
                                    <option>TPFT</option>
                                    <option>TPO</option>						
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
                                       name="qt_sid_premium" placeholder="Premium">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_sid_excess">Excess</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" id="qt_sid_excess"
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
                                       name="qt_sid_finance_company" placeholder="Finance Company">
                            </div>
                        </div>
                    </div>  
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_sid_ncd">NCD</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" id="qt_sid_ncd"
                                       name="qt_sid_ncd" placeholder="NCD">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_sid_ncd_on_renewal">NCD % on Renewal</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="qt_sid_ncd_on_renewal"
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
                                        <label><input type="radio" name="qt_sid_ssd" id="qt_sid_ssd" value="Yes" checked="">Yes</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label><input type="radio" name="qt_sid_ssd" id="qt_sid_ssd_no" value="No" checked="">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_sid_sdd_date_check">SDD Date Check</label>
                            <div class="col-md-6">
                                <input class="input-sm datepicker-input form-control" id="qt_sid_sdd_date_check" 
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
                                   size="16" type="text" name="qt_sid_start_date" maxlength="12" 
                                   parsley-maxlength="12" parsley-trigger="focusout" 
                                   data-date-format="dd-mm-yyyy" placeholder="Start Date"> 
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_sid_end_date">End Date</label>
                            <div class="col-md-6">
                                   <input class="input-sm datepicker-input form-control" id="qt_sid_end_date" 
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
                                   size="16" type="text" name="qt_sid_road_tax_due" maxlength="12" 
                                   parsley-maxlength="12" parsley-trigger="focusout" 
                                   data-date-format="dd-mm-yyyy" placeholder="Road Tax Due"> 
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label req" for="qt_sid_ncd_protection">NCD Protection</label>
                            <div class="col-md-6">
                                <select name="qt_sid_ncd_protection" id="qt_sid_ncd_protection" class="form-control m-b">
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                            </div>
                        </div>
                        <div class="line line-dashed line-lg pull-in"></div>
                        <div class="form-group">
                            <div class="col-sm-10"></div>
                            <div class="col-sm-2">
                                <!-- selected insurance -->
                                <button type="button" id="btn_cp_selected_insurance"
                                        class="btn btn-primary btn-save pull-right"> selected insurance Save</button>
                                <?php /*<div class="col-sm-3 m-b-xs" style="padding-left:0px;">
                                    <a href="prospect.html" class="btn btn-primary"> Save</a>
                                </div> */?>
                            </div>
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
            if(isset($state)){
                if($state=='Closed' || $state=='Won'){
                    $this->load->view('quotation/panel_account_assessment');                
                }
            }
            
        }//end if
        
        ?>
        
        <!-- Submit & Cancel Buttons -->
        <div class="col-sm-6">

            <div class="col-sm-3"></div>
            <div class="col-md-6">
                <?php /*<button type="button" id="full_save"
                        class="btn btn-primary"><i class="icon-save"></i> Save</button>*/?>
                
                <div class="col-sm-3 m-b-xs" style="padding-left:0px;">
                    <a href="#" id="full_save" class="btn btn-primary"> Save</a>
                </div> 
                <div class="col-sm-1 m-b-xs" style="padding-left:0px;">
                    <a href="#" class="btn btn-white"> Cancel</a>
                </div>

            </div>
        </div>
    </section>
</section>
<script>require(['page/quotation_add']);</script>