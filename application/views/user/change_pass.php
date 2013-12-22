<section class="scrollable" id="pjax-container">
    <header>
        <div class="row b-b m-l-none m-r-none">
            <div class="col-sm-11">
                <h3 class="m-t m-b-none"><?php echo $_page_caption;?></h3>
                <p class="block text-muted"><?php echo $_page_description;?></p>
            </div>
        </div>
    </header>

    <div class="wrapper">
        <form method="post" action="<?php echo base_url().'user/change_password_validation'?>">
                              
        <section class="panel">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">
                            <i class="icon-caret-down text-active"></i>
                            <i class="icon-caret-up text"></i>
                        </a>
                    </li>
                </ul>Create New Plan</header>
            <section class="panel-body">
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <label class="col-sm-2 control-label" for="cur_pass">Current Password</label>
                        <div class="col-sm-4"><input type="password" required id="cur_pass" name="curr_pass" class="form-control"></div>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
                <div class="line line-dashed line-lg pull-in"></div>
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <label class="col-sm-2 control-label" for="new_pass">New Password</label>
                        <div class="col-sm-4"><input type="password" required id="new_pass" name="new_pass" class="form-control"></div>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
                <div class="line line-dashed line-lg pull-in"></div>
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <label class="col-sm-2 control-label" for="re_pass">Confirm New Password</label>
                        <div class="col-sm-4"><input type="password" required id="re_pass" name="re_pass" class="form-control"></div>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
                <?php
                if($this->session->flashdata('pc_message')!=''){
                    ?>
                <div class="line line-dashed line-lg pull-in"></div>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6">
                        <div class="alert alert-warning fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Notice!</strong> <?php echo $this->session->flashdata('pc_message');?>
                        </div>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                        <?php
                }//end if flashdata
                ?>                                
            </section>
        </section>
            
        <!-- Submit & Cancel Buttons -->
        <div class="col-sm-3"></div>
        <div class="col-sm-6">

            <div class="col-sm-3"></div>
            <div class="col-md-6">

                <div class="col-sm-5 m-b-xs" style="padding-left:0px;">
                    <button class="btn btn-primary" type="submit"><i class="icon-edit"></i> Change</button>                    
                </div>
                <div class="col-sm-1 m-b-xs" style="padding-left:0px;">
                    <a href="prospect.html" class="btn btn-white"> Cancel</a>
                </div>

            </div>
        </div>
        </form><!--end form-->
    </div>
</section>