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
        
        <?php     
    
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
                            <label class="control-label"><?php echo $user_name;?></label>                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="usesr_email">User Email</label>
                            <div class="col-sm-9">
                                <label class="control-label"><?php echo $user_email;?></label>                                                            
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>


                    <div class="form-group">
                        
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="user_role">User Role</label>
                            <div class="col-md-6">
                                <label class="control-label">
                                    <?php 
                                            switch ($user_role){
                                                case 1:
                                                    echo 'Super User';
                                                    break;
                                                case 2:
                                                    echo 'Sales Consultant';
                                                    break;
                                                case 3:
                                                    echo 'Quotation Team';
                                                    break;
                                                case 4:
                                                    echo 'Accountant';
                                                    break;
                                                case 5:
                                                    echo 'External Agent';
                                                    break;
                                            }
                                
                                    ?></label>
                            </div>
                         </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="user_status">User Status</label>
                            <div class="col-md-6">
                                <label class="control-label"><?php echo ucfirst($user_status);?></label>                                
                            </div>
                        </div>
                    </div>
                                                                                                    
                
            </section>
        </section>
                
        <section class="panel">
            <header class="panel-heading font-bold">Operation</header>
            <section class="panel-body">                
                <div class="col-md-12">

                    <div class="col-sm-2 m-b-xs" style="padding-left:0px;">
                        <a href="<?php echo base_url().'user/edit/'.$this->session->userdata('user_sn');?>"
                           class="btn btn-primary">
                            <i class="icon-pencil"></i> Edit</a>                        
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