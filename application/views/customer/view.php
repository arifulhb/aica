<?php
/*
 * Customer view
 */
  if(isset($customer)){
            //print_r($customer);
            $cust_sn                =$customer[0]['cust_sn'];
            $cust_name              = $customer[0]['cust_name'];
            $cust_nric              = $customer[0]['cust_nric'];
            $cust_dob               = date('d-m-Y',$customer[0]['cust_dob']);
            $cust_gender            = $customer[0]['cust_gender'];
            $cust_marital_status    = $customer[0]['cust_marital_status'];
            $cust_type              = $customer[0]['cust_type'];
            $cust_contach_hp        = $customer[0]['cust_contact_hp'];
            $cust_contact_office    = $customer[0]['cust_contact_office'];
            $cust_contact_hp        = $customer[0]['cust_contact_hp'];
            $cust_contact_house     = $customer[0]['cust_contact_house'];
            $cust_contact_fax       = $customer[0]['cust_contact_fax'];
            $cust_contact_email     = $customer[0]['cust_contact_email'];
            $cust_address_1         = $customer[0]['cust_address_1'];
            $cust_address_2         = $customer[0]['cust_address_2'];
            $cust_post_code         = $customer[0]['cust_post_code'];
            $cust_occupation        = $customer[0]['cust_occupation'];
            $cust_license_date      = date('d-m-Y',$customer[0]['cust_license_date']);
            $cust_instructions      = $customer[0]['cust_instructions'];
            $cust_add_by            = $customer[0]['add_by'];
            $cust_add_by_name       = $customer[0]['add_by_name'];
            $cust_date_of_add       = date('d M y - h:m A',$customer[0]['date_of_add']);
            $cust_update_by         = $customer[0]['update_by'];
            $cust_update_by_name    = $customer[0]['update_by_name'];
            $cust_update_date       = date('d M y - h:i:s A',strtotime($customer[0]['update_date']));            

        }else{
            $cust_name='';
            $cust_nric ='';
            $cust_dob ='';
            $cust_gender  ='';
            $cust_marital_status    = '';
            $cust_type              = '';
            $cust_contach_hp        = '';
            $cust_contact_office    = '';
            $cust_contact_house     = '';
            $cust_contact_fax       = '';
            $cust_contact_email     = '';
            $cust_address_1         = '';
            $cust_address_2         = '';
            $cust_post_code         = '';
            $cust_occupation        = '';
            $cust_license_date      = '';
            $cust_instructions      = '';
            $cust_add_by            = '';
            $cust_add_by_name       = '';
            $cust_date_of_add       = '';
            $cust_update_by         = '';
            $cust_update_by_name    = '';
            $cust_update_date       = '';
        }
?>
<section class="scrollable" id="pjax-container">
    <header>
        <div class="row b-b m-l-none m-r-none">
            <div class="col-sm-10">
                <h3 class="m-t m-b-none"><?php echo $_page_caption; ?></h3>
                <p class="block text-muted"><?php echo $_page_description; ?></p>
            </div>
            <div class="col-sm-2 m-b-xs text-right" style="padding-left:0px; padding-top:17px">
                <?php
                if(in_array('cust_edit', $this->session->userdata('user_access'))){ ?>
                    
               <a href="<?php echo base_url().'customer/edit/'.$cust_sn;?>" class="btn btn-primary">
                            <i class="icon-pencil"></i> Edit
                        </a> 
                <?php                    
                }//end if
                if(in_array('cust_edit', $this->session->userdata('user_access'))){ 
                ?>                
                
                    <button id="del_customer" value="<?php echo $cust_sn;?>" 
                            type="button" class="btn btn-danger"><i class="icon-trash"></i> Delete</button>
                
                <?php                    
                }//end if
                ?>
            </div>
        </div>
    </header>

    <div class="wrapper">
        <?php
        //echo '<br>dob: '.$cust_dob.'<br>';
        if($this->session->flashdata('success')==true){
        ?>
        <div class="alert alert-success fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Update Success Message!</strong>&nbsp;&nbsp;Customer Record updated successfully.
        </div>
        <?php }//end success?>
        <section class="panel">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">
                            <i class="icon-caret-down text-active"></i>
                            <i class="icon-caret-up text"></i>
                        </a>
                    </li>
                </ul>Personal Details
            </header>            
            <section class="panel-body">

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_name">Customer Name</label>
                            <div class="col-sm-9">
                                <label class="control-label"><?php echo $cust_name; ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_nric">NRIC/FIN/ACRA</label>
                            <div class="col-sm-9">
                                <label class="control-label"><?php echo $cust_nric; ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>


                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_dob">Date of Birth</label>
                            <div class="col-md-6">
                                <label class="control-label"><?php echo $cust_dob; ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label">Age</label>
                            <div class="col-md-6">
                                <label class="control-label"><?php echo round(((time()- strtotime ($cust_dob))  /(3600 * 24 * 365))); ?> years</label>
                            </div>
                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                             <label class="col-sm-3 control-label" for="cust_gender">Gender</label>
                            <div class="col-md-6">
                                <label class="control-label"><?php echo $cust_gender; ?></label>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_marital_status">Marital Status</label>
                            <div class="col-md-6">
                                <label class="control-label"><?php echo $cust_marital_status; ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="cust_license_date">Driving License Pass Date</label>

                            <div class="col-md-6">
                                <label class="control-label"><span><?php echo $cust_license_date; ?></label>
                                <input type="hidden" id="cust_license_date" value="<?php echo $cust_license_date;?>">
                            </div>

                        </div>

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="">Driving Experience</label>
                            <div class="col-md-6">
                                <label class="control-label"><span id="getDrivingExperience"></span></label>
                            </div>

                        </div>

                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_type">Customer Type</label>
                            <div class="col-md-6">
                                <label class="control-label"><?php echo $cust_type; ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_instruction_div">Instructions</label>
                            <div class="col-sm-7">
                                <div id="cust_instruction_div" class="form-control"
                                     style="overflow:scroll;height:150px;max-height:150px"
                                     contenteditable="false"><?php echo $cust_instructions;?></div>
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
                </ul>Contact Details
            </header>
            <section class="panel-body">

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_occupation">Occupation/name of Business</label>
                            <div class="col-sm-9">
                                <label class="control-label"><span><?php echo $cust_occupation; ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_email">Email</label>
                            <div class="col-sm-9">
                                <label class="control-label"><span><?php echo $cust_contact_email; ?></label>
                            </div>
                        </div>
                    </div>
                <div class="line line-dashed line-lg pull-in"></div>
                <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_contact_office">Contact Office</label>
                            <div class="col-sm-9">
                                <label class="control-label"><span><?php echo $cust_contact_office; ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_contact_hp">Contact Hand Phone</label>
                            <div class="col-sm-9">
                                <label class="control-label"><span><?php echo $cust_contact_hp; ?></label>
                            </div>
                        </div>
                    </div>
                <div class="line line-dashed line-lg pull-in"></div>
                <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_contact_house">Contact House</label>
                            <div class="col-sm-9">
                                <label class="control-label"><span><?php echo $cust_contact_house; ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_contact_fax">Fax</label>
                            <div class="col-sm-9">
                            <label class="control-label"><span><?php echo $cust_contact_fax; ?></label>
                            </div>
                        </div>
                    </div>
                <div class="line line-dashed line-lg pull-in"></div>
                <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_address_1">Address Line 1</label>
                            <div class="col-sm-9">
                            <label class="control-label"><span><?php echo $cust_address_1; ?></label>                            
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_address_2">Address Line 2</label>
                            <div class="col-sm-9">
                                <label class="control-label"><span><?php echo $cust_address_2; ?></label>                            
                            </div>
                        </div>
                    </div>
                <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_address_postcode">Post Code</label>
                            <div class="col-sm-9">
                            <label class="control-label"><span><?php echo $cust_post_code; ?></label>    
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Record History</label>
                            <div class="col-md-9">Created by <?php echo $cust_add_by_name;?> on <?php echo $cust_date_of_add;?> <br> Edited by <?php echo $cust_update_by_name;?> on <?php echo $cust_update_date;?></div>
                        </div>
                    </div>
            </section>
        </section>        

    </div><!--end wrap-->
</section><!--end customer form-->
    <script>require(['page/customer_profile']);</script>