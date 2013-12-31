<header class="header bg-black navbar navbar-inverse">
    <div class="collapse navbar-collapse pull-in">
        <ul class="nav navbar-nav m-l-n">
            <li>
                <a href="<?php echo base_url().'admin';?>">Quotations</a>
            </li>
            <li>
                <a href="">Won Deals</a>
            </li>
            <li>
                <a href="#">Reconciliation</a>
            </li>
            <li>
                <a href="#">Renewals</a>
            </li>
            <?php 
            /**
             * Access Code: cust
             */
            //print_r($this->session->userdata('user_access'));
            if(in_array('cust',$this->session->userdata('user_access'))){
            ?>
            <li>
                <a href="<?php echo base_url().'customer';?>">Customers</a>
            </li>
            <?php 
            }//end customer access
            ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="prospect.html#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="thumb-sm avatar pull-left m-t-n-xs m-r-xs">
                        <img src="<?php echo base_url() . 'assets/images/' ?>avatar_default.jpg" />
                    </span> <?php echo $this->session->userdata('user_name');?></a>
                <ul class="dropdown-menu animated fadeInLeft">
                    
                    <?php 
                    /**
                    * Access Code: user
                    */
                    if(in_array('user',$this->session->userdata('user_access'))){
                        //Can assess user management
                        ?>
                    <li>
                        <a href="<?php echo base_url().'user';?>"><i class="icon-user"></i> User Management</a>
                    </li>
                    <?php
                    }
                    
                    /**
                     * Access Code: css Commission Schemes Structure (set commission)
                     */
                    if(in_array('css',$this->session->userdata('user_access'))){ ?>
                        <li>
                            <a href="<?php echo base_url().'commission'?>"><i class="icon-dollar"></i> Set Commission</a>
                        </li>                        
                        <li><hr></li>
                        <?php
                    }//end if
                    ?>
                                        
                    <li>
                        <a href="<?php echo base_url().'user/profile';?>"><i class="icon-male"></i> My Profile</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'user/change_password';?>"><i class="icon-pencil"></i> Change Password</a>
                    </li>
                    <li><hr></li>
                    <li>
                        <a href="<?php echo base_url().'user/signout';?>"><i class="icon-off"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</header>
