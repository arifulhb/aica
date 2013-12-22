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
        <form class="form-horizontal" action="<?php echo base_url().'user/save';?>" method="POST" parsley-validate>
        <?php 
        if(isset($action)){            
            if($action=='update'){                                
                ?>
            <input type="hidden" name="user_sn" value="<?php echo $rec[0]['user_sn'];?>">   
            <input type="hidden" name="action" value="update">
                 <?php
            }//end update
        }//end isset
        //echo 'now: '.date('l jS \of F Y h:i:s A').'<br>';
        //echo 'timestamp '.date('Y m d h:i:s A',strtotime("2013-12-21")).'<br>';
        
        if(isset($rec)){
            //print_r($rec);
            $user_sn            = $rec[0]['user_sn'];
            $user_email         = $rec[0]['user_email'];            
            $user_name          = $rec[0]['user_name'];
            $user_status        = $rec[0]['user_status'];
            $user_role          = $rec[0]['user_role'];                        
            $user_last_login    = date('d M y - h:m:s A',strtotime($rec[0]['last_login']));
            //$cust_update_date       =$customer[0]['update_date'];
            
            
        }else{
            $user_sn            ="";
            $user_email         ="";            
            $user_name          ="";
            $user_status        ="";
            $user_role          ="";
            $user_last_login    ="";
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
                </ul>User Details
            </header>
            <section class="panel-body">
                
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="user_name">User Name</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="user_name" name="user_name" 
                                   value="<?php echo $user_name; ?>"
                                   parsley-required="true" required="true" maxlength="250" parsley-maxlength="250" 
                                   parsley-trigger="keypress" placeholder="User Name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="usesr_email">User Email</label>
                            <div class="col-sm-9">
                            <input type="email" class="form-control" id="user_email" name="user_email"
                                   value="<?php echo $user_email;?>"
                                   parsley-required="true" required="true" maxlength="50" parsley-maxlength="50" 
                                   parsley-trigger="keypress" placeholder="User Email">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>


                    <div class="form-group">
                        
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="user_role">User Role</label>
                            <div class="col-md-6">
                                <select name="user_role" id="user_role" class="form-control m-b">
                                    <option value="1" <?php echo $user_role=='1'?'SELECTED':''; ?>>Super User</option>
                                    <option value="2" <?php echo $user_role=='2'?'SELECTED':''; ?>>Sales Consultant</option>                                    
                                    <option value="3" <?php echo $user_role=='3'?'SELECTED':''; ?>>Quotation Team</option>                                    
                                    <option value="4" <?php echo $user_role=='4'?'SELECTED':''; ?>>Accountant</option>                                    
                                    <option value="5" <?php echo $user_role=='5'?'SELECTED':''; ?>>External Agent</option>
                                </select>
                            </div>
                         </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="user_status">User Status</label>
                            <div class="col-md-6">
                                <select name="user_status" id="user_status" class="form-control m-b" <?php if(isset($action)==false){echo 'disabled';} ; ?>>
                                    <option value="inactive" <?php echo $user_status=='inactive'?'SELECTED':''; ?>>Inactive</option>
                                    <option value="active" <?php echo $user_status=='active'?'SELECTED':''; ?>>Active</option>                                                       
                                </select>
                            </div>
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

<script>require(['page/user_add']);</script>