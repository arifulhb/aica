<section class="scrollable" id="pjax-container">
    <header>
        <div class="row b-b m-l-none m-r-none">
            <div class="col-sm-10">
                <h3 class="m-t m-b-none"><?php echo $_page_caption;?></h3>
                <p class="block text-muted"><?php echo $_page_description;?></p>
            </div>
            <div class="col-sm-2 m-b-xs" style="padding-left:0px; padding-top:17px">
                <div class="col-sm-5">
                    <a href="QT1e.html" class="btn btn-success"><i class="icon-edit"></i> Edit</a>
                </div>
                <div class="col-sm-7">
                    <a href="QT1v.html" class="btn btn-success"><i class="icon-trash"></i> Delete</a>
                </div>
            </div>
        </div>
    </header>
    <section class="wrapper">
        <!-- Quotation Details -->
        <?php //print_r($_record);?>
        <section class="panel">
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
                
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Ref. No.</label>
                            <label class="col-md-6 control-label">QT<?php echo $_record[0]['qt_ref_no'];?></label>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Date</label>
                            <label class="col-md-6 control-label" ><?php echo date('d M Y',$_record[0]['qt_date']);?></label>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>


                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Renewal</label>
                            <label class="col-md-6 control-label" ><?php echo $_record[0]['qt_renewal']==0?'No':'Yes';?></label>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >State</label>
                            <label class="col-md-6 control-label"><?php echo $_record[0]['qt_state'];?></label>
                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Insurance Type</label>
                            <label class="col-md-6 control-label"><?php echo $_record[0]['qt_insurance_type'];?></label>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Quotation History</label>
                            <div class="col-md-9">
                                <?php 
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
                                
                                ?>
                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Remarks</label>
                            <div class="col-md-6">
                                <?php echo $_record[0]['qt_remarks'];?>
                            </div>
                        </div>
                    </div>
                
            </section>
        </section>
        <!-- Assignees Details -->
        <section class="panel">
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
                            <label class="col-sm-3 control-label" >Consultant</label>
                            <label class="col-md-6 control-label" ><?php echo $_record[0]['consultant_name'];?></label>
                        </div>

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" >External Agent</label>
                            <label class="col-md-6 control-label" ><?php echo $_record[0]['agent_name'];?></label>

                        </div>

                    </div>                
            </section>
        </section>
        <!-- Customer Details -->
        <section class="panel">
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
                            <label class="col-sm-3 control-label" >Insured Name</label>
                            <label class="col-md-6"  style="padding-top: 7px;"><?php echo $_record[0]['customer_name'];?></label>
                        </div>
                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" >NRIC/FIN/ACRA</label>
                            <label class="col-md-6 "  style="padding-top: 7px;"><?php echo $_record[0]['cust_nric'];?></label>
                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Insured Driving</label>
                            <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo $_record[0]['qt_insured_driving'];?></label>
                        </div>
                    </div>


                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" >Date of Birth</label>
                            <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo date('d M Y',$_record[0]['cust_dob']);?></label>
                        </div>

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" >Age</label>

                            <div class="col-md-6">

                                <label class="col-sm-3 control-label" >13</label>

                            </div>

                        </div>

                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" >Gender</label>
                            <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo $_record[0]['cust_gender'];?></label>
                        </div>

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" >Marital Status</label>

                            <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo $_record[0]['qt_marital_status'];?></label>
                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" >Contact (H)</label>

                            <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo $_record[0]['cust_contact_house'];?></label>
                        </div>

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" >Contact (O)</label>

                            <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo $_record[0]['cust_contact_office'];?></label>
                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" >Contact (hp)</label>
                            <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo $_record[0]['cust_contact_hp'];?></label>
                        </div>

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" >Fax </label>

                            <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo $_record[0]['cust_contact_fax'];?></label>
                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" >E-mail</label>

                            <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo $_record[0]['cust_contact_email'];?></label>
                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" >Address Line 1</label>

                            <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo $_record[0]['cust_address_1'];?></label>
                        </div>

                    </div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" >Address Line 2</label>

                            <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo $_record[0]['cust_address_2'];?></label>

                        </div>

                    </div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" >Postal Code</label>

                            <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo $_record[0]['cust_post_code'];?></label>
                        </div>

                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" >Occupation / Nature of Business</label>

                            <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo $_record[0]['qt_occupation'];?></label>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" >Driving License Pass Date</label>

                            <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo date('d M Y',$_record[0]['qt_dlicense_pass_date']);?></label>

                        </div>

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" >Driving Experience</label>
                            <label class="col-md-6 " style="padding-top: 7px;"  >15</label>

                        </div>

                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" >Instructions</label>

                            <div class="col-md-6"><?php echo $_record[0]['qt_instructions'];?></div>

                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                </form>
            </section>
        </section>

        <!-- Private Vehicle & Commercial Vehicle Details -->
        <!-- Private -->
        <section class="panel">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">

                            <i class="icon-caret-down text-active"></i>

                            <i class="icon-caret-up text"></i>

                        </a>
                    </li>
                </ul>Vehicle Information (<?php echo $_record[0]['qt_insurance_type'];?>)
            </header>
            <section class="panel-body">
                
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Number</label>
                            <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo $_record[0]['vi_number'];?></label>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Make</label>
                            <label class="col-md-6 " ><?php echo $_record[0]['vi_make'];?></label>
                        </div>

                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Model</label>
                            <label class="col-md-6 "><?php echo $_record[0]['vi_model'];?></label>
                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <div class="col-sm-6">
                            <?php
                            if($_record[0]['qt_insurance_type']=='Private'){?>
                                                        
                            <label class="col-sm-3 control-label" >Scheme Type</label>

                            <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo $_record[0]['vip_scheme_type'];?></label>
                            <?php
                            }//end if
                            else{ ?>
                                <label class="col-sm-3 control-label" >Type</label>
                                <label class="col-md-6" ><?php echo $_record[0]['vic_type'];?></label>
                            
                                <?php
                            }//end else
                            ?>
                        </div>

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" >CC</label>

                            <label class="col-md-6 " ><?php echo $_record[0]['vi_cc'];?></label>
                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">


                            <label class="col-sm-3 control-label" >Year of Manufacture</label>
                            <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo $_record[0]['vi_man_year'];?></label>
                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" >Regn. Date</label>

                            <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo date('d M Y',$_record[0]['vi_regn_date']);?></label>
                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" >Road Tax Expiry Date</label>

                            <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo date('d M Y',$_record[0]['vi_tax_expire_date']);?></label>
                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                    <?php
                    if($_record[0]['qt_insurance_type']=='Private'){ ?>
                    
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Additional Features</label>
                            <label class="col-md-6 " >
                                <?php
                                echo $_record[0]['vip_fet_sunroof']==1?'sunroof<br>':'';
                                echo $_record[0]['vip_fet_soft_top']==1?'soft-top<br>':'';
                                echo $_record[0]['vip_fet_turbo_eng']==1?'turbo engine<br>':'';
                                echo $_record[0]['vip_fet_moonroof']==1?'moonroof<br>':'';
                                echo $_record[0]['vip_fet_skyroof']==1?'skyroof<br>':'';
                                echo $_record[0]['vip_fet_roof_pan']==1?'roof panoramic':'';
                                ?>
                            </label>
                        </div>
                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" >Vehicle Type</label>

                            <label class="col-md-6 ">
                                <?php 
                                    echo $_record[0]['vip_vt_super_model']==1?'sport model<br> ':'';
                                    echo $_record[0]['vip_vt_mpv']==1?'MPV<br> ':'';
                                    echo $_record[0]['vip_vt_suv']==1?'SUV<br> ':'';
                                    echo $_record[0]['vip_vt_sedan']==1?'Sedan<br> ':'';
                                    echo $_record[0]['vip_vt_couple']==1?'Coupe<br> ':'';
                                    echo $_record[0]['vip_vt_cabriolet']==1?'Cabriolet<br> ':'';
                                    echo $_record[0]['vip_vt_parallel_import']==1?'Parallel Import ':'';
                                ?>
                                </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Unladen Weigh</label>
                            <label class="col-md-6 "><?php echo $_record[0]['vic_weight_unladen']; ?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Laden Weight</label>
                            <label class="col-md-6 "><?php echo $_record[0]['vic_weight_laden']; ?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label">Tonnage</label>
                            <label class="col-md-6 "></label>
                        </div>
                    </div>
                        <?php
                    }//end if
                    else{ ?>
                    
                        <?php
                    }//end else
                    ?>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" >Additional Accessories/Coverage</label>

                            <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo $_record[0]['vi_additional'];?></label>
                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
               
            </section>
        </section>
        <!-- Insurance Details -->
        <section class="panel">
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
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Current Company</label>
                            <div class="col-md-6">
                                <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo $_record[0]['ci_company'];?></label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Type of Coverage</label>
                            <div class="col-md-6">
                                <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo $_record[0]['ci_coverage'];?></label>
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Current Premium</label>
                            <div class="col-md-6">
                                <label class="col-md-6 " style="padding-top: 7px;"  >$<?php echo $_record[0]['ci_current_premium'];?></label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Current Excess</label>
                            <div class="col-md-6">
                                <label class="col-md-6 " style="padding-top: 7px;"  >$<?php echo $_record[0]['ci_current_excess'];?></label>
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Finance Company</label>
                            <div class="col-md-6">
                                <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo $_record[0]['ci_finance_company'];?></label>
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Current NCD</label>
                            <div class="col-md-6">
                                <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo $_record[0]['ci_current_ncd'];?>%</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >NCD % on Renewal</label>
                            <div class="col-md-6">
                                <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo $_record[0]['ci_ncd_per_renewal'];?></label>
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >NCD affected on Change</label>
                            <div class="col-md-6">
                                <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo $_record[0]['ci_ncd_affect'];?></label>
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>


                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >SDD</label>
                            <div class="col-md-6">
                                <label class="col-md-6 " ><?php echo $_record[0]['ci_ssd'];?></label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >SDD Date Check</label>
                            <div class="col-md-6">
                                <label class="col-md-6 " ><?php echo date('d M Y',$_record[0]['ci_ssd_date']);?></label>
                            </div>
                        </div>
                    </div>
                
            </section>
        </section>
        <!-- Insurance Period -->
        <section class="panel">
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
                
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Start Date</label>
                            <div class="col-md-6">
                                <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo date('d M Y',$_record[0]['ci_period_start']);?></label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >POI End Date</label>
                            <div class="col-md-6">
                                <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo date('d M Y',$_record[0]['ci_poi_end_date']);?></label>
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Road Tax Due</label>
                            <div class="col-md-6">
                                <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo date('d M Y',$_record[0]['ci_road_tax_due_date']);?></label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >NCD Protection</label>
                            <div class="col-md-6">
                                <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo $_record[0]['ci_ncd_protection'];?></label>
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Claims in last 3 years</label>
                            <div class="col-md-6">
                                <label class="col-md-6 " style="padding-top: 7px;"  ><?php echo $_record[0]['ci_claims_in_last3_year'];?></label>
                            </div>
                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>                
            </section>
        </section>
        <!-- Claim History 1 & 2 -->
        <section class="panel">
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
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Driver Name</label>
                            <div class="col-md-9" style="padding-top: 7px;">
                                Driver A
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Vehicle No.</label>
                            <div class="col-md-9" style="padding-top: 7px;">
                                SAB1234C
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Accident Date</label>
                            <div class="col-md-9" style="padding-top: 7px;">
                                01 Jan 01
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Reporting Date</label>
                            <div class="col-md-9" style="padding-top: 7px;">
                                01 Jan 01
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Claims Paid (OD)</label>
                            <div class="col-md-9" style="padding-top: 7px;">
                                $1000
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Claims Paid (TPPD)</label>
                            <div class="col-md-9" style="padding-top: 7px;">$1000</div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Claims Paid (TPBI)</label>
                            <div class="col-md-9" style="padding-top: 7px;">$1000</div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Claims Reserved (TPPD)</label>
                            <div class="col-md-9" style="padding-top: 7px;">$1000</div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Claims Reserved (TPBI)</label>
                            <div class="col-md-9" style="padding-top: 7px;">$1000</div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Windscreen</label>
                            <div class="col-md-9" style="padding-top: 7px;">NA</div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Reporting Only</label>
                            <div class="col-md-9" style="padding-top: 7px;">$NA</div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Private Settlement</label>
                            <div class="col-md-9" style="padding-top: 7px;">NA</div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Referred to Partner Workshop</label>
                            <div class="col-md-9" style="padding-top: 7px;">No</div>
                        </div>
                    </div>
                
            </section>
        </section>

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
                
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Driver Name</label>
                            <div class="col-md-9" style="padding-top: 7px;">
                                Driver A
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Vehicle No.</label>
                            <div class="col-md-9" style="padding-top: 7px;">
                                SAB1234C
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Accident Date</label>
                            <div class="col-md-9" style="padding-top: 7px;">
                                01 Jan 01
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Reporting Date</label>
                            <div class="col-md-9" style="padding-top: 7px;">
                                01 Jan 01
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Claims Paid (OD)</label>
                            <div class="col-md-9" style="padding-top: 7px;">
                                $1000
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Claims Paid (TPPD)</label>
                            <div class="col-md-9" style="padding-top: 7px;">$1000</div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Claims Paid (TPBI)</label>
                            <div class="col-md-9" style="padding-top: 7px;">$1000</div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Claims Reserved (TPPD)</label>
                            <div class="col-md-9" style="padding-top: 7px;">$1000</div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Claims Reserved (TPBI)</label>
                            <div class="col-md-9" style="padding-top: 7px;">$1000</div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Windscreen</label>
                            <div class="col-md-9" style="padding-top: 7px;">NA</div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Reporting Only</label>
                            <div class="col-md-9" style="padding-top: 7px;">$NA</div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Private Settlement</label>
                            <div class="col-md-9" style="padding-top: 7px;">NA</div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Referred to Partner Workshop</label>
                            <div class="col-md-9" style="padding-top: 7px;">No</div>
                        </div>
                    </div>
                
            </section>
        </section>

        <!-- Named Driver 1 & 2 -->

        <section class="panel">
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
                
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Name</label>
                            <div class="col-md-6">Mr ABC</div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >NRIC/FIN</label>
                            <div class="col-md-6">S1234567B</div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Relationship</label>
                            <div class="col-md-6">Friend</div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Date of Birth</label>
                            <div class="col-md-6">01 Jan 01</div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Age</label>
                            <div class="col-md-6">13</div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Gender</label>
                            <div class="col-md-6">Male</div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Marital Status</label>
                            <div class="col-md-6">Single</div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Occupation</label>
                            <div class="col-md-6">Occupation A</div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Driving License Pass Date</label>
                            <div class="col-md-6">01 Jan 01</div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Driving Experience</label>
                            <div class="col-md-6">13</div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Claim History (3 Years)</label>
                            <div class="col-sm-6">
                                NA
                            </div>
                        </div>
                    </div>
                
            </section>
        </section>

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
                
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Name</label>
                            <div class="col-md-6">Mr ABC</div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >NRIC/FIN</label>
                            <div class="col-md-6">S1234567B</div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Relationship</label>
                            <div class="col-md-6">Friend</div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Date of Birth</label>
                            <div class="col-md-6">01 Jan 01</div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Age</label>
                            <div class="col-md-6">13</div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Gender</label>
                            <div class="col-md-6">Male</div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Marital Status</label>
                            <div class="col-md-6">Single</div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Occupation</label>
                            <div class="col-md-6">Occupation A</div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Driving License Pass Date</label>
                            <div class="col-md-6">01 Jan 01</div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Driving Experience</label>
                            <div class="col-md-6">13</div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Claim History (3 Years)</label>
                            <div class="col-sm-6">
                                NA
                            </div>
                        </div>
                    </div>
                
            </section>
        </section>

        <!-- Quotation (Private and Commercial) -->
        <!-- Private -->
        <section class="panel">
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
                
            </section>
        </section>
        <!-- Selected Insurance Detail -->
        <section class="panel">
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
                
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Company</label>
                            <div class="col-md-6"><?php echo $_record[0]['si_company'];?></div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Type of Coverage</label>
                            <div class="col-md-6"><?php echo $_record[0]['si_coverage'];?></div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Premium</label>
                            <div class="col-md-6"><?php echo $_record[0]['si_premium'];?></div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Excess</label>
                            <div class="col-md-6"><?php echo $_record[0]['si_excess'];?></div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Finance Company</label>
                            <div class="col-md-6"><?php echo $_record[0]['si_finance_company'];?></div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >NCD</label>
                            <div class="col-md-6"><?php echo $_record[0]['si_ncd'];?></div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >NCD % on Renewal</label>
                            <div class="col-md-6"><?php echo $_record[0]['si_ncd_per_on_renewal'];?>%</div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >SDD</label>
                            <div class="col-md-6"><?php echo $_record[0]['si_ssd'];?></div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >SDD Date Check</label>
                            <div class="col-md-6"><?php echo date('d M Y',$_record[0]['si_ssd_date_check']);?></div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Start Date</label>
                            <div class="col-md-6"><?php echo date('d M Y',$_record[0]['si_start_date']);?></div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >End Date</label>
                            <div class="col-md-6"><?php echo date('d M Y',$_record[0]['si_end_date']);?></div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >Road Tax Due</label>
                            <div class="col-md-6"><?php echo $_record[0]['si_road_tax_due'];?></div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" >NCD Protection</label>
                            <div class="col-md-6"><?php echo $_record[0]['si_ncd_protection'];?></div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    </div>
                
            </section>
        </section>
        <?php
        //if($_record[0]['qt_state']=='Lost' || $_record[0]['qt_state']=='Won'){
            
         if(in_array('assign_commission', $this->session->userdata('user_access'))){ ?>
                               
        <!-- Account Assessment -->
        <section class="panel">
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
                
                    <div class="form-group">
                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" >Commission</label>

                            <div class="col-md-6"><?php echo $_record[0]['aa_commission'];?></div>

                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                
            </section>
        </section>
        <?php
         }//end if permission
            
        //}//end if
        ?>
    </section>
</section>
<script>require(['page/quotation_view']);</script>