<?php 
/*
 * Customer form
 */
?>
<section class="scrollable" id="pjax-container">
    <header>
        <div class="row b-b m-l-none m-r-none">
            <div class="col-sm-11">
                <h3 class="m-t m-b-none"><?php echo $_page_caption; ?></h3>
                <p class="block text-muted"><?php echo $_page_description; ?></p>
            </div>
            <div class="col-sm-1 m-b-xs" style="padding-left:0px; padding-top:17px">
                <?php /*
                  <a href="<?php echo base_url() . 'customer/add'; ?>" class="btn btn-success"><i class="icon-plus"></i> Create</a>
                 */ ?>
            </div>
        </div>
    </header>

    <div class="wrapper">
        <form class="form-horizontal" action="<?php echo base_url().'customer/save';?>" method="POST" parsley-validate>
        <?php 
        if(isset($action)){            
            if($action=='update'){                                
                ?>
            <input type="hidden" name="customer_sn" value="<?php echo $customer[0]['cust_sn'];?>">   
            <input type="hidden" name="action" value="update">
                 <?php
            }//end update
        }//end isset
        //echo 'now: '.date('l jS \of F Y h:i:s A').'<br>';
        //echo 'timestamp '.date('Y m d h:i:s A',strtotime("2013-12-21")).'<br>';
        if(isset($customer)){
            //print_r($customer);
            $cust_name              = $customer[0]['cust_name'];
            $cust_nric              = $customer[0]['cust_nric'];
            $cust_dob               = date('d-m-Y',$customer[0]['cust_dob']);
            $cust_gender            = $customer[0]['cust_gender'];
            $cust_marital_status    = $customer[0]['cust_marital_status'];
            $cust_type              = $customer[0]['cust_type'];
           // $cust_contach_hp        = $customer[0]['cust_contact_hp'];
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
            //$cust_update_date       =$customer[0]['update_date'];
            
            
        }else{
            $cust_name='';
            $cust_nric ='';
            $cust_dob ='';
            $cust_gender  ='';
            $cust_marital_status    = '';
            $cust_type              = '';
            //$cust_contach_hp        = '';
            $cust_contact_hp        = '';
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
        //echo '<br>dob: '.$cust_dob.'<br>';
        ?>    
        
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
                            <input type="text" class="form-control" id="cust_name" name="cust_name" 
                                   value="<?php echo $cust_name; ?>"
                                   parsley-required="true" required="true" max="250" parsley-maxlength="250" parsley-trigger="keypress"
                                   placeholder="Customer Name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_nric">NRIC</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="cust_nric" name="cust_nric"
                                   value="<?php echo $cust_nric;?>"
                                   parsley-required="true" required="true" max="250" parsley-maxlength="250" parsley-trigger="keypress"
                                   placeholder="NRIC">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>


                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_dob">Date of Birth</label>
                            <div class="col-md-6">                                
                                <input class="input-sm datepicker-input form-control" id="cust_dob"
                                       size="16" type="text" value="<?php echo $cust_dob;?>" name="cust_dob"
                                       max="12" parsley-maxlength="12" parsley-trigger="focusout"
                                       data-date-format="dd-mm-yyyy" placeholder="Date of Birth">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_gender">Gender</label>
                            <div class="col-md-6">
                                <select name="cust_gender" id="cust_gender" class="form-control m-b">
                                    <option value="Male" <?php echo $cust_gender=='Male'?'SELECTED':''; ?>>Male</option>
                                    <option value="Female" <?php echo $cust_gender=='Female'?'SELECTED':''; ?>>Female</option>                                    
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_type">Customer Type</label>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="cust_type" id="cust_type" value="Individual" 
                                                   <?php echo $cust_type=='Individual'?'checked="checked"':''; ?>>
                                            Individual
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="cust_type" id="cust_type" value="Company" 
                                                   <?php echo $cust_type=='Company'?'checked="checked"':''; ?>>
                                            Company
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_marital_status">Marital Status</label>
                            <div class="col-md-6">
                                <select name="cust_marital_status" id="cust_marital_status" class="form-control m-b">
                                    <option value="Married" <?php echo $cust_marital_status=='Married'?'SELECTED':''; ?>>Married</option>
                                    <option value="Single" <?php echo $cust_marital_status=='Single'?'SELECTED':''; ?>>Single</option>                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="cust_license_date">Driving License Pass Date</label>

                            <div class="col-md-6">                                
                                 <input class="input-sm datepicker-input form-control" id="cust_license_date"
                                       size="16" type="text" value="<?php echo $cust_license_date;?>" name="cust_license_date"
                                       max="12" parsley-maxlength="12" parsley-trigger="focusout" required="true" parsley-required="true"
                                       data-date-format="dd-mm-yyyy" placeholder="Driving License Pass Date">
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
                        <div class="col-sm-12">
                            <label class="col-sm-3 control-label" for="cust_instruction_div">Instructions</label>                            
                            <div class="col-sm-7">
                                <div id="cust_instruction_div" class="form-control"
                                     style="overflow:scroll;height:150px;max-height:150px" 
                                     contenteditable="true"><?php echo $cust_instructions;?></div>
                                <input type="hidden" id="cust_instruction" name="cust_instruction" 
                                       value="<?php echo $cust_instructions;?>">
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
                            <input type="text" class="form-control" id="cust_occupation" name="cust_occupation"
                                   value="<?php echo $cust_occupation;?>"
                                   max="50" parsley-maxlength="50" parsley-trigger="keypress"
                                   placeholder="Occupation/name of Business">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_email">Email</label>
                            <div class="col-sm-9">
                            <input type="email" class="form-control" id="cust_email" name="cust_email" 
                                   value="<?php echo $cust_contact_email;?>"
                                   max="50" parsley-maxlength="50" parsley-trigger="focusout" parsley-type="email"
                                   placeholder="Email">
                            </div>
                        </div>
                    </div>
                <div class="line line-dashed line-lg pull-in"></div>
                <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_contact_office">Contact Office</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="cust_contact_office" name="cust_contact_office"
                                   value="<?php echo $cust_contact_office;?>"
                                   max="20" parsley-maxlength="20" parsley-trigger="keypress"
                                   placeholder="Contact Office">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_contact_hp">Contact Hand Phone</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="cust_contact_hp" name="cust_contact_hp" 
                                   value="<?php echo $cust_contact_hp;?>"
                                   max="30" parsley-maxlength="30" parsley-trigger="keypress"
                                   placeholder="Contact Hand Phone">
                            </div>
                        </div>
                    </div>
                <div class="line line-dashed line-lg pull-in"></div>
                <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_contact_house">Contact House</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="cust_contact_house" name="cust_contact_house"
                                   value="<?php echo $cust_contact_house;?>"
                                   max="30" parsley-maxlength="30" parsley-trigger="keypress"
                                   placeholder="Contact House">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_contact_fax">Fax</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="cust_contact_fax" name="cust_contact_fax" 
                                   value="<?php echo $cust_contact_fax;?>"
                                   max="30" parsley-maxlength="30" parsley-trigger="keypress"
                                   placeholder="Fax">
                            </div>
                        </div>
                    </div>
                <div class="line line-dashed line-lg pull-in"></div>   
                <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_address_1">Address Line 1</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="cust_address_1" name="cust_address_1"
                                   value="<?php echo $cust_address_1;?>"
                                   parsley-required="true" required="true" max="250" parsley-maxlength="250" parsley-trigger="keypress"
                                   placeholder="Address Line 1">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_address_2">Address Line 2</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="cust_address_2" name="cust_address_2" 
                                   value="<?php echo $cust_address_2;?>"
                                   parsley-required="true" required="true" max="250" parsley-maxlength="250" parsley-trigger="keypress"
                                   placeholder="Address Line 2">
                            </div>
                        </div>
                    </div>
                <div class="line line-dashed line-lg pull-in"></div>   
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="cust_address_postcode">Post Code</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="cust_address_postcode" name="cust_address_postcode" 
                                   value="<?php echo $cust_post_code;?>"
                                   parsley-required="true" required="true" max="10" parsley-maxlength="10" parsley-trigger="keypress"
                                   placeholder="Postcode">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Record History</label>
                            <div class="col-md-9">Created by <?php echo $cust_add_by_name;?> on <?php echo $cust_date_of_add;?> <br> Edited by <?php echo $cust_update_by_name;?> on <?php echo $cust_update_date;?></div>                            
                        </div>
                    </div>
            </section>
        </section>
        <section class="panel">
            <header class="panel-heading font-bold">
                <?php /*
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">
                            <i class="icon-caret-down text-active"></i>
                            <i class="icon-caret-up text"></i>
                        </a>
                    </li>
                </ul>*/?>Operation
            </header>
            <section class="panel-body">
                
                <div class="col-md-12">

                    <div class="col-sm-2 m-b-xs" style="padding-left:0px;">
                        <button type="submit" id="customer_save" class="btn btn-primary"><i class="icon-save"></i> Save</button>                        
                    </div>
                    <div class="col-sm-2 m-b-xs pull-right text-right" style="padding-left:0px;">
                        <button type="button" id="customer_cancel" class="btn btn-white">Cancel</button>                        
                    </div>               
                </div>
            </section>
        </section>
            
        </form><!--EN FORM-->
    </div><!--end wrap-->
</section><!--end customer form-->
    <script>require(['page/customer_add']);</script>